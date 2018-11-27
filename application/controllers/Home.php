<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function index() {
		$this->load->view('home');
	}

    public function login() {
        $this->load->view('login');
    }

    public function sign_up() {
        $this->load->view('sign_up');
    }

    public function success_stories() {
        $this->load->view('stories/success_stories');
    }

    public function articles() {

        $this->load->model('Model_Article');
        $result['articles'] = $this->Model_Article->get_few_articles();

        if($result!=false) {

            $this->load->view('health_tips_articles', $result);

        }
        else {
            echo "Something went wrong !";
        }

    }
    public function get_photos() {
        
        $this->load->view('gallery');
    
}

    public function forum() {
        $this->load->view('forum');
    }

    public function my_profile() {
        $this->load->view('user/my_profile_main');

    }

}
