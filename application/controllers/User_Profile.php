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
        $id = $this->session->userdata('id');
        $this->load->model('Model_User');
        $result['fitness'] = $this->Model_User->fetch_fitness_data($id);

        if($result){
            $this->load->view('user/my_schedule',$result);
        }

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

    public function edit_profile() {

        $this->load->view('user/edit_profile');

    }

    public function add_edit_profile() {

        $id = $this->session->userdata('id');
        $name = $this->input->post('name');
        $dob = $this->input->post('dob');
        $nic = $this->input->post('nic');
        $address = $this->input->post('address');
        $contactNo = $this->input->post('contactNo');


        $this->load->model('Model_My_Profile');
        $result = $this->Model_My_Profile->add_edit_profile($id, $name, $dob, $nic, $address, $contactNo);

        if($result) {
            $this->session->set_flashdata('msg', '<div class="alert alert-primary text-center" role="alert"> Edit details Added Successfully! </div>');
            redirect('home/my_profile');
        }
        else {
            $this->session->set_flashdata('msg', '<div class="alert alert-danger text-center" role="alert"> Operation Failed! </div>');
            redirect('home/my_profile');
        }

    }

}