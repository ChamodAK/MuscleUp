<?php

class User_Profile extends MY_Controller {

    public function my_payments() {

        $id = $this->session->userdata('id');

        $this->load->model('Model_My_Profile');
        $result['payments'] = $this->Model_My_Profile->get_payments($id);

        if($result) {
            $this->load->view('user/my_payments',$result);
        }
        else {
            $this->load->view('user/my_payments');
        }

    }

    public function my_schedule() {

        $this->load->view('user/my_schedule');

    }

    public function my_enquiries() {

        $this->load->view('user/my_enquiries');

    }

    public function send_enquiry() {

        $title = $this->input->post('title');
        $content = $this->input->post('content');
        $email = $this->input->post('email');
        $user_id = $this->session->userdata('id');

        $dest_email = "muscleupgymnasium@gmail.com";
        $message = "User ID: $user_id\n Email: $email\n\n $content";

        $result = $this->send_mail($dest_email, $title, $message);

        if($result) {
            $this->session->set_flashdata('msg', '<div class="alert alert-primary text-center" role="alert"> Enquiry sent Successfully! </div>');
            redirect('user_profile/my_enquiries');
        }
        else {
            $this->session->set_flashdata('msg', '<div class="alert alert-danger text-center" role="alert"> Enquiry sending Failed! </div>');
            redirect('user_profile/my_enquiries');
        }

    }

}