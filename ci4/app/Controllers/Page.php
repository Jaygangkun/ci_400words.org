<?php

namespace App\Controllers;

use App\Models\StoryModel;
use App\Models\ViewModel;

class Page extends BaseController
{
    protected $helpers = ['form', 'global']; 

    public function login()
    {
        $data = [
            'title' => 'Login',
            'page' => 'login'
        ];

        return view('layout', $data);
    }

    public function index() {

        $this->session->remove('login');

        $data = [
            'title' => 'Index',
            'page' => 'index'
        ];

        return view('layout', $data);
    }

    public function home() {

        $data = [
            'title' => 'Home',
            'page' => 'home'
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

        $data = [
            'title' => 'Manage Stories',
            'page' => 'manage-stories'
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

        if ($story) {
            $nextStory = $model->getNextStory($story['id']);
            $previousStory = $model->getPreviousStory($story['id']);
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
        

        $data = [
            'title' => 'Story',
            'page' => 'story-view',
            'story' => $story,
            'nextStory' => $nextStory,
            'previousStory' => $previousStory
        ];

        return view('layout', $data);
    }
}
