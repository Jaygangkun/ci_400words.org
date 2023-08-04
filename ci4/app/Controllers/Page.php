<?php

namespace App\Controllers;

use App\Models\StoryModel;
use App\Models\ViewModel;
use App\Models\UpvoteModel;
use App\Models\UserModel;

class Page extends BaseController
{
    protected $helpers = ['form', 'global']; 

    public function login()
    {
        $this->session->remove('login');

        $data = [
            'title' => 'Login',
            'page' => 'login'
        ];

        return view('layout', $data);
    }

    public function admin()
    {
        $data = [
            'title' => 'Admin',
            'page' => 'admin'
        ];

        return view('layout', $data);
    }

    public function resetAdmin()
    {
        $user_name = isset($_GET['user_name']) ? $_GET['user_name'] : 'admin';
        $password = isset($_GET['password']) ? $_GET['password'] : 'admin';

        $model = new UserModel();
        $admin = $model->where('role', 'superAdmin')->findAll();

        if(count($admin) > 0) {
            $model->update($admin[0]['id'], [
                'user_name' => $user_name,
                'password' => md5($password)
            ]);

        } else {
            $model->insert([
                'user_name' => $user_name,
                'password' => md5($password),
                'role' => 'superAdmin'
            ]);
        }

        return $this->response->setJson([
            'success' => true
        ]);
    }

    public function index() {

        $sort = isset($_GET['sort']) ? $_GET['sort'] : null;

        if (!isset(getSorts()[$sort])) {
            $sort = 'alphabetical';
        }

        $data = [
            'title' => 'Index',
            'page' => 'indexs',
            'sort' => $sort
        ];

        return view('layout', $data);
    }

    public function home() {

        $model = new StoryModel();
        $stories = $model->where('is_home', 1)->orderBy('published_at', 'DESC')->limit(4)->findAll();

        $data = [
            'title' => 'Home',
            'page' => 'home',
            'stories' => $stories
        ];

        return view('layout', $data);
    }

    public function submit() {

        $data = [
            'title' => 'Submit',
            'page' => 'submit'
        ];

        return view('layout', $data);
    }

    public function submitSuccess() {

        $data = [
            'title' => 'Submit',
            'page' => 'submit-success'
        ];

        return view('layout', $data);
    }

    public function guide() {

        $data = [
            'title' => 'Guide',
            'page' => 'guide'
        ];

        return view('layout', $data);
    }

    public function manageStories() {

        if(!$this->session->has('login')) {
            return redirect()->to('/login');
        }

        $subPage = isset($_GET['subPage']) ? $_GET['subPage'] : null;

        if (!isset(getSorts()[$subPage])) {
            $subPage = 'alphabetical';
        }

        
        $model = new StoryModel();
        $awaitings = $model->where('is_publish <> 1 OR is_publish IS NULL')->findAll();
        $awaitingCount = count($awaitings);

        if ($subPage == 'awaitingReview') {

            if ($awaitingCount == 0) {
                $subPage = 'alphabetical';
            }
        }

        $data = [
            'title' => 'Manage Stories',
            'page' => 'manage-stories',
            'subPage' => $subPage,
            'redirect' => isset($_GET['redirect']) ? $_GET['redirect'] : null,
            'awaitingCount' => $awaitingCount
        ];

        return view('layout', $data);
    }

    public function storyEdit($id) {
        
        if(!$this->session->has('login')) {
            return redirect()->to('/login');
        }

        $model = new StoryModel();
        $story = $model->find($id);

        $data = [
            'title' => 'Story Edit',
            'page' => 'story-edit',
            'story' => $story
        ];

        return view('layout', $data);
    }

    public function storyView($id) {

        $model = new StoryModel();
        $story = $model->find($id);
        $nextStory = null;
        $previousStory = null;

        if ($story['is_publish'] != 1 && $story['is_show'] != 1) {
            return redirect()->to(base_url('/index'));
        }

        if ($story) {

            if ($this->session->has('indexSort')) {
                $sort = $this->session->get('indexSort');
            } else {
                $sort = 'alphabetical';
            }

            $nextStory = $model->getNextStory($story, $sort);
            $previousStory = $model->getPreviousStory($story, $sort);
        }

        $modelView = new ViewModel();
        
        $browser = $_SERVER['HTTP_USER_AGENT'];
        $ip = $_SERVER['REMOTE_ADDR'];

        $views = $modelView->where('story_id', $id)->where('user_ip', $ip)->where('user_browser', $browser)->findAll();

        if (count($views) == 0) {
            $modelView->insert([
                'story_id' => $id,
                'user_ip' => $ip,
                'user_browser' => $browser
            ]);

            $model->update($story['id'], [
                'views' => $story['views'] + 1
            ]);
        }
        
        $modelUpvote = new UpvoteModel();
        $upvotes = $modelUpvote->where('story_id', $id)->where('user_ip', $ip)->where('user_browser', $browser)->findAll();


        $data = [
            'title' => 'Story',
            'page' => 'story-view',
            'story' => $story,
            'nextStory' => $nextStory,
            'previousStory' => $previousStory,
            'isUpvoted' => count($upvotes) > 0
        ];

        return view('layout', $data);
    }

    public function test() {
        sendMail('jaygangkun@hotmail.com', 'New story submitted', '<a href="'.base_url('/login').'">Admin Login</a>');
    }
}
