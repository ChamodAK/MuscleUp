<?php

class Admin extends MY_Controller {

    public function index() {

        $this->load->model('Model_Article');
        $article_count = $this->Model_Article->count_articles();

        $this->load->model('Model_Forum');
        $post_count = $this->Model_Forum->count_posts();

        $data = array('article_count' => $article_count , 'post_count' => $post_count);
        $this->load->view('admin/admin_main' , $data);
    }

    public function admin_articles() {

        $this->load->model('Model_Article');
        $result['articles'] = $this->Model_Article->get_articles();

        if($result) {
            $this->load->view('admin/admin_articles', $result);
        }
        else {
            echo "OOps!! Something went wrong!";
        }



    }

    public function add_article() {

        $this->load->view('admin/admin_add_articles', array('error' => ' '));

    }

    public function add_new_article() {

        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('content', 'Article Content', 'required');

        if ($this->form_validation->run() == FALSE)
        {
            $this->add_article();
        }
        else
        {

            $config['upload_path'] = './asset/images/article/';
            $config['allowed_types'] = 'gif|jpg|jpeg|png';
            $config['encrypt_name'] = TRUE;
            $this->load->library('upload', $config);

            if ( ! $this->upload->do_upload('userfile'))
            {
                $error = array('error' => $this->upload->display_errors());

                $this->load->view('admin/admin_add_articles', $error);
            }
            else {

                $image_info = $this->upload->data();
                $image_path = base_url("asset/images/article/" . $image_info['raw_name'] . $image_info['file_ext']);
                $data['image'] = $image_path;

                $this->load->model('Model_Article');

                $result = $this->Model_Article->add_new_article($data);
                echo $result;

                if ($result) {

                    $this->session->set_flashdata('msg', '<div class="alert alert-primary text-center" role="alert"> Article Submitted Successfully! </div>');
                    redirect('Admin/admin_articles');
                } else {
                    $this->session->set_flashdata('msg', '<div class="alert alert-danger text-center" role="alert"> Oops! Something went wrong </div>');
                    redirect('Admin/add_article');
                }

            }

        }

    }

    public function admin_forum() {

        $this->load->model('Model_Forum');
        $result['posts'] = $this->Model_Forum->get_posts();

        if($result) {
            $this->load->view('admin/admin_forum', $result);
        }
        else {
            echo "OOps!! Something went wrong!";
        }
    }

    public function admin_enquiries() {
        $this->load->view('admin/admin_enquiries');
    }

    public function notifications() {
        $this->load->view('admin/notifications');
    }

    public function noti_all() {
        $this->load->view('admin/noti_all');
    }

    public function noti_one() {
        $this->load->view('admin/noti_one');
    }

    public function noti_all_send() {

        $this->load->model('Model_Admin');
        $result = $this->Model_Admin->get_all_emails();

        $title = $this->input->post('title');
        $content = $this->input->post('content');

        foreach ($result as $email) {
            $data[] = $email->email;
        }

        $result = $this->send_mail_to_list($data, $title, $content);

        if($result) {
            $this->session->set_flashdata('msg', '<div class="alert alert-primary text-center" role="alert"> Notifications Sent Successfully! </div>');
            redirect('admin/notifications');
        }
        else {
            $this->session->set_flashdata('msg', '<div class="alert alert-danger text-center" role="alert"> Notifications Sending Failed! </div>');
            redirect('admin/notifications');
        }

    }

    public function noti_one_send() {

        $title = $this->input->post('title');
        $content = $this->input->post('content');
        $email = $this->input->post('email');

        $result = $this->send_mail($email, $title, $content);

        if($result) {
            $this->session->set_flashdata('msg', '<div class="alert alert-primary text-center" role="alert"> Notification Sent Successfully! </div>');
            redirect('admin/notifications');
        }
        else {
            $this->session->set_flashdata('msg', '<div class="alert alert-danger text-center" role="alert"> Notification Sending Failed! </div>');
            redirect('admin/notifications');
        }

    }

    public function schedule() {

        $this->load->model('Model_Admin');
        $result['schedules'] = $this->Model_Admin->get_schedule();

        if($result) {
            $this->load->view('admin/schedule', $result);
        }
        else {
            echo "OOps!! Something went wrong!";
        }

    }

    public function add_schedule() {
        $this->load->view('admin/add_schedule');
    }

    public function add_new_schedule() {

        $id = $this->input->post('id');
        $content = $this->input->post('content');
        $days = $this->input->post('days');

        $this->load->model('Model_Admin');
        $result = $this->Model_Admin->add_new_schedule($id, $content, $days);

        if($result) {
            $this->session->set_flashdata('msg', '<div class="alert alert-primary text-center" role="alert"> Schedule Added Successfully! </div>');
            redirect('admin/schedule');
        }
        else {
            $this->session->set_flashdata('msg', '<div class="alert alert-danger text-center" role="alert"> Operation Failed! </div>');
            redirect('admin/schedule');
        }

    }

    public function edit_schedule($id) {

        $this->load->model('Model_Admin');
        $result = $this->Model_Admin->get_full_schedule($id);

        if($result!=false) {

            $data['schedule'] = array(
                'id' => $id,
                'content' => $result->content,
                'daysPerWeek' => $result->daysPerWeek
            );

            $this->load->view('admin/edit_schedule', $data);

        }
        else {
            echo "Something went wrong !";
        }

    }

    public function add_edit_schedule() {

        $id = $this->input->post('id');
        $content = $this->input->post('content');
        $days = $this->input->post('daysPerWeek');


        $this->load->model('Model_Admin');
        $result = $this->Model_Admin->add_edit_schedule($id, $content, $days);

        if($result) {
            $this->session->set_flashdata('msg', '<div class="alert alert-primary text-center" role="alert"> Schedule Added Successfully! </div>');
            redirect('admin/schedule');
        }
        else {
            $this->session->set_flashdata('msg', '<div class="alert alert-danger text-center" role="alert"> Operation Failed! </div>');
            redirect('admin/schedule');
        }

    }

    public function delete_schedule($id) {

        $data['id'] = $id;
        $this->load->view('admin/delete_schedule',$data);


    }

    public function delete_schedule_confirm($id) {


        $this->load->model('Model_Admin');
        $result = $this->Model_Admin->delete_schedule_confirm($id);

        if($result) {
            $this->session->set_flashdata('msg', '<div class="alert alert-primary text-center" role="alert"> Schedule Deleted Successfully! </div>');
            redirect('admin/schedule');
        }
        else {
            $this->session->set_flashdata('msg', '<div class="alert alert-danger text-center" role="alert"> Operation Failed! </div>');
            redirect('admin/schedule');
        }

    }

<<<<<<< HEAD
    public function delete_post($id) {

        $data['id'] = $id;
        $this->load->view('admin/delete_post',$data);


    }

    public function delete_post_confirm($id) {


        $this->load->model('Model_Admin');
        $result = $this->Model_Admin->delete_schedule_confirm($id);

        if($result) {
            $this->session->set_flashdata('msg', '<div class="alert alert-primary text-center" role="alert"> Post Deleted Successfully! </div>');
            redirect('admin/admin_forum');
        }
        else {
            $this->session->set_flashdata('msg', '<div class="alert alert-danger text-center" role="alert"> Operation Failed! </div>');
            redirect('admin/admin_forum');
        }

    }

    public function delete_article($id) {

        $data['id'] = $id;
        $this->load->view('admin/delete_article',$data);


    }

    public function delete_article_confirm($id) {


        $this->load->model('Model_Admin');
        $result = $this->Model_Admin->delete_article_confirm($id);

        if($result) {
            $this->session->set_flashdata('msg', '<div class="alert alert-primary text-center" role="alert"> Schedule Deleted Successfully! </div>');
            redirect('admin/admin_articles');
        }
        else {
            $this->session->set_flashdata('msg', '<div class="alert alert-danger text-center" role="alert"> Operation Failed! </div>');
            redirect('admin/admin_articles');
        }

    }

    public function edit_article($id) {

        $this->load->model('Model_Article');
        $result = $this->Model_Article->get_full_article($id);

        if($result!=false) {

            $data['article'] = array(
                'id' => $id,
                'title' => $result->title,
                'content' => $result->details
            );

            $this->load->view('admin/edit_article', $data);

        }
        else {
            echo "Something went wrong !";
        }

    }

    public function add_edit_article() {

        $id = $this->input->post('id');
        $title = $this->input->post('title');
        $details = $this->input->post('content');


        $this->load->model('Model_Admin');
        $result = $this->Model_Admin->add_edit_article($id, $title, $details);

        if($result) {
            $this->session->set_flashdata('msg', '<div class="alert alert-primary text-center" role="alert"> Schedule Added Successfully! </div>');
            redirect('admin/admin_articles');
        }
        else {
            $this->session->set_flashdata('msg', '<div class="alert alert-danger text-center" role="alert"> Operation Failed! </div>');
            redirect('admin/admin_articles');
=======
    public function admin_schedule() {
        $this->load->view('admin/admin_schedule');
    }

    public function set_fitness_details(){
        $this->form_validation->set_rules('id', 'UserID', 'trim|required|');
        $this->form_validation->set_rules('weight', 'Weight', 'trim|required|');
        $this->form_validation->set_rules('height', 'Height', 'trim|required|');
        $this->form_validation->set_rules('attendence', 'Attendence', 'trim|required|');

        if ($this->form_validation->run() == TRUE) {
            $this->load->view('admin/admin_schedule');
        }
        else {

            $id = $this->input->post('id');
            $checked_date = $this->input->post('checked_date');
            $attendence = $this->input->post('attendance');
            $weight = $this->input->post('weight');
            $height = $this->input->post('height');
            $remark = $this->input->post('remark');
            $schedule = $this->input->post('schedule');
            $message = "You have successfully entered fittness details.";

            $this->load->model('model_user');
            $result = $this->model_user->insert_fitness_data();

            if($result){
                $this->session->set_flashdata('msg', '<div class="alert alert-primary text-center" role="alert"> $message </div>');
                redirect('admin/admin_schedule');
            }
        }

    }
    public function admin_manage_users(){
        $this->load->model('Model_User');
        $result['userdata'] = $this->Model_User->fetch_users_data();

        if($result){
            $this->load->view('admin/admin_manage_users',$result);
        }
    }

    public function delete_user(){
        $userid = $this->input->post('userid');
        $this->load->model('model_user');
        $row = $this->model_user->delete_user($userid);


        if($row!=0){
            $m1 = "Deleted successfully";
            $this->session->set_flashdata('msg', '<div class="alert alert-primary text-center" role="alert"> $m1 </div>');
            redirect('admin/admin_manage_users');
        }
        else{
            $m2 = "Invalide UserID";
            $this->session->set_flashdata('msg', '<div class="alert alert-primary text-center" role="alert"> $m2 </div>');
>>>>>>> 86ebfb0118cb7aa06b8f3e5ce46064691f20ace1
        }

    }

}