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

        $this->load->model('Model_Forum');
        $result['posts'] = $this->Model_Forum->get_posts();

        if($result!=false) {

            $this->load->view('forum', $result);

        }
        else {
            echo "Something went wrong !";
        }

    }


    public function my_profile() {

	    $id = $this->session->userdata('id');

	    $this->load->model('Model_My_Profile');
	    $result = $this->Model_My_Profile->get_my_profile($id);

        if($result!=false) {

            $data['profile'] = array(
                'id' => $id,
                'name' => $result->name,
                'username' => $result->username,
                'email' => $result->email,
                'dob'=>$result->dob,
                'nic' => $result->nic,
                'address' => $result->address,
                'contactNo' => $result->contactNo
            );

            $this->load->view('user/my_profile_main', $data);

        }
        else {
            echo "Something went wrong !";
        }

    }

    public function classes() {
        $this->load->view('classes');
    }

    public function about_us() {
        $this->load->view('about_us');
    }

}
