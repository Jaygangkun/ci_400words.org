<?php

namespace App\Controllers;

use App\Models\StoryModel;
use App\Models\UpvoteModel;

use Firebase\JWT\JWT;

class Ajax extends BaseController
{
    protected $helpers = ['form', 'global']; 

    public function storySubmit() {
        $model = new StoryModel();
        $now = new \DateTime('now');
        $model->insert([
            'title' => isset($_POST['title']) ? $_POST['title'] : '',
            'content' => isset($_POST['content']) ? $_POST['content'] : '',
            'upvotes' => 0,
            'views' => 1,
            'is_best_of' => 0,
            'is_home' => 0,
            'words' => isset($_POST['words']) ? $_POST['words'] : '',
            'created_at' => $now->format('Y-m-d H:i:s')
        ]);

        $storyId = $model->getInsertID();

        sendMail('400wordseditor@gmail.com', 'New story submitted', '<a href="'.base_url('/login').'">Admin Login</a>');
        
        return $this->response->setJson([
            'success' => true,
            'storyId' => $storyId
        ]);
    }

    public function storyLoad() {

        $sort = isset($_POST['sort']) ? $_POST['sort'] : getSorts()['alphabetical'];

        $model = new StoryModel();

        if ($sort == getSorts()['alphabetical']) {
            $all = $model->where('is_publish', 1)->orderBy('title', 'ASC')->findAll();

        } else if ($sort == getSorts()['popular']) {
            $all = $model->where('is_publish', 1)->orderBy('upvotes', 'DESC')->findAll();

        } else if ($sort == getSorts()['newest']) {
            $all = $model->where('is_publish', 1)->orderBy('created_at', 'DESC')->findAll();

        } else if ($sort == getSorts()['oldest']) {
            $all = $model->where('is_publish', 1)->orderBy('created_at', 'ASC')->findAll();

        } else if ($sort == getSorts()['awaitingReview']) {
            $all = $model->where('is_publish <> 1 OR is_publish IS NULL')->findAll();

        } else {
            $all = [];
        }
        

        $data = [];
        foreach($all as $row) {
            $dateTime = \DateTime::createFromFormat('Y-m-d H:i:s', $row['created_at']);

            $data[] = [
                '<a href="'.base_url('/story-edit/').'/'.$row['id'].'">'.$row['id'].'</a>',
                $row['title'],
                $row['upvotes'],
                $row['views'],
                $row['is_best_of'] == 1 ? 'Yes' : 'No',
                $row['is_home'] == 1 ? 'Yes' : 'No',
                $row['words'],
                $dateTime->format('m/d/y H:i'),
                $row['is_show'] != 1 ? '<span data-id="'.$row['id'].'" data-value="1" class="status status-green btn-status-toggle">Show</span>' : '<span data-id="'.$row['id'].'" data-value="0" class="status status-yellow btn-status-toggle">Hide</span>',
                '<span data-id="'.$row['id'].'" class="action-link action-link-delete">Delete</span>'
            ];
        }
        
        return $this->response->setJson([
            'success' => true,
            'data' => $data
        ]);
    }

    public function storyIndexLoad() {

        $sort = isset($_POST['sort']) ? $_POST['sort'] : getSorts()['alphabetical'];

        $this->session->set('indexSort', $sort);

        $model = new StoryModel();

        if ($sort == getSorts()['alphabetical']) {
            $all = $model->where('is_show', 1)->where('is_publish', 1)->orderBy('title', 'ASC')->findAll();

        } else if ($sort == getSorts()['popular']) {
            $all = $model->where('is_show', 1)->where('is_publish', 1)->orderBy('upvotes', 'DESC')->findAll();

        } else if ($sort == getSorts()['newest']) {
            $all = $model->where('is_show', 1)->where('is_publish', 1)->orderBy('created_at', 'DESC')->findAll();

        } else if ($sort == getSorts()['oldest']) {
            $all = $model->where('is_show', 1)->where('is_publish', 1)->orderBy('created_at', 'ASC')->findAll();

        } else {
            $all = [];
        }
        
        $pageLength = 10;

        for($index = 0; $index < count($all); $index ++ ) {

            $col1 = $all[$index];

            $colIndex2 = $index + $pageLength;
            $col2 = null;

            if (isset($all[$colIndex2])) {
                $col2 = $all[$colIndex2];
            }

            $colIndex3 = $index + $pageLength * 2;
            $col3 = null;

            if (isset($all[$colIndex3])) {
                $col3 = $all[$colIndex3];
            }

            $colIndex4 = $index + $pageLength * 3;
            $col4 = null;

            if (isset($all[$colIndex4])) {
                $col4 = $all[$colIndex4];
            }

            $data[] = [
                $col1 ? '<a href="'.base_url('/story/').'/'.$col1['id'].'">'.$col1['title'].'</a>' : '',
                $col2 ? '<a href="'.base_url('/story/').'/'.$col2['id'].'">'.$col2['title'].'</a>' : '',
                $col3 ? '<a href="'.base_url('/story/').'/'.$col3['id'].'">'.$col3['title'].'</a>' : '',
                $col4 ? '<a href="'.base_url('/story/').'/'.$col4['id'].'">'.$col4['title'].'</a>' : ''
            ];
            
        }
        
        return $this->response->setJson([
            'success' => true,
            'data' => $data
            // 'data' => $all
        ]);
    }

    public function storyChangeVisibility() {

        $id = isset($_POST['id']) ? $_POST['id'] : null;
        $value = isset($_POST['value']) ? $_POST['value'] : null;

        if (!$id) {
            return $this->response->setJson([
                'success' => false,
                'message' => 'No id parameter.'
            ]);
        }

        $model = new StoryModel();
        $story = $model->find($id);

        if (!$story) {
            return $this->response->setJson([
                'success' => false,
                'message' => 'No found story by id.'
            ]);
        }

        $model->update($id, [
            'is_show' => $value
        ]);

        return $this->response->setJson([
            'success' => true,
            'message' => 'Successfully updated'
        ]);
    }

    public function storyDelete() {

        $id = isset($_POST['id']) ? $_POST['id'] : null;

        if (!$id) {
            return $this->response->setJson([
                'success' => false,
                'message' => 'No id parameter.'
            ]);
        }

        $model = new StoryModel();
        $story = $model->find($id);

        if (!$story) {
            return $this->response->setJson([
                'success' => false,
                'message' => 'No found story by id.'
            ]);
        }

        $model->delete($id);

        return $this->response->setJson([
            'success' => true,
            'message' => 'Successfully deleted'
        ]);
    }

    public function storyChangePublish() {

        $id = isset($_POST['id']) ? $_POST['id'] : null;
        $value = isset($_POST['value']) ? $_POST['value'] : null;

        if (!$id) {
            return $this->response->setJson([
                'success' => false,
                'message' => 'No id parameter.'
            ]);
        }

        $model = new StoryModel();
        $story = $model->find($id);

        if (!$story) {
            return $this->response->setJson([
                'success' => false,
                'message' => 'No found story by id.'
            ]);
        }

        $model->update($id, [
            'is_publish' => $value
        ]);

        return $this->response->setJson([
            'success' => true,
            'message' => $value == 1 ? 'Successfully published' : 'Successfully unpublished'
        ]);
    }

    public function storyPublish() {

        $id = isset($_POST['id']) ? $_POST['id'] : null;
        $title = isset($_POST['title']) ? $_POST['title'] : null;
        $content = isset($_POST['content']) ? $_POST['content'] : null;
        $upvotes = isset($_POST['upvotes']) ? $_POST['upvotes'] : null;
        $views = isset($_POST['views']) ? $_POST['views'] : null;
        $is_home = isset($_POST['is_home']) ? $_POST['is_home'] : null;
        $is_best_of = isset($_POST['is_best_of']) ? $_POST['is_best_of'] : null;
        $notes = isset($_POST['notes']) ? $_POST['notes'] : null;
        $words = isset($_POST['words']) ? $_POST['words'] : null;

        if (!$id) {
            return $this->response->setJson([
                'success' => false,
                'message' => 'No id parameter.'
            ]);
        }

        $model = new StoryModel();
        $story = $model->find($id);

        if (!$story) {
            return $this->response->setJson([
                'success' => false,
                'message' => 'No found story by id.'
            ]);
        }

        $model->update($id, [
            'title' => $title,
            'content' => $content,
            'upvotes' => $upvotes,
            'views' => $views,
            'words' => $words,
            'notes' => $notes,
            'is_home' => $is_home,
            'is_best_of' => $is_best_of,
            'is_publish' => 1,
            'is_show' => 1
        ]);

        return $this->response->setJson([
            'success' => true,
            'message' => 'Successfully published'
        ]);
    }

    public function storyUpvote() {
        $id = isset($_POST['id']) ? $_POST['id'] : null;
        $browser = $_SERVER['HTTP_USER_AGENT'];
        $ip = $_SERVER['REMOTE_ADDR'];

        $modelStory = new StoryModel();
        $story = $modelStory->find($id);

        if (!$story) {
            return $this->response->setJson([
                'success' => false,
                'message' => 'No found story by id.'
            ]);
        }

        $modelUpvote = new UpvoteModel();
        $upvotes = $modelUpvote->where('story_id', $id)->where('user_ip', $ip)->where('user_browser', $browser)->findAll();

        if (count($upvotes) > 0) {
            return $this->response->setJson([
                'success' => false,
                'message' => 'You already upvoted this story.'
            ]);
        }

        $modelStory->update($story['id'], [
            'upvotes' => $story['upvotes'] + 1
        ]);

        $modelUpvote->insert([
            'story_id' => $id,
            'user_ip' => $ip,
            'user_browser' => $browser
        ]);

        return $this->response->setJson([
            'success' => true,
            'message' => 'Successfully upvoted.'
        ]);
    }

    public function login() {
        $user_name = isset($_POST['user_name']) ? $_POST['user_name'] : null;
        $password = isset($_POST['password']) ? $_POST['password'] : null;

        if ($user_name != 'admin' || $password != 'admin') {
            return $this->response->setJson([
                'success' => false,
                'message' => 'Incorrect user name or password'
            ]);
        }

        $this->session->set('login', true);

        return $this->response->setJson([
            'success' => true
        ]);
    }
}
