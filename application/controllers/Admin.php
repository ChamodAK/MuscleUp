<?php

class Admin extends CI_Controller {

    public function index() {

        $this->load->model('Model_Article');
        $article_count = $this->Model_Article->count_articles();
        $data = array('article_count' => $article_count);
        $this->load->view('admin/admin_main' , $data);
    }

    public function admin_articles() {

        $this->load->model('Model_Article');

        // If record delete request is submitted
        if($this->input->post('bulk_delete_submit')){
            // Get all selected IDs
            $ids = $this->input->post('checked_id');

            // If id array is not empty
            if(!empty($ids)){
                // Delete records from the database
                $delete = $this->Model_Article->delete_articles($ids);

                // If delete is successful
                if($delete){
                    $this->session->set_flashdata('msg', '<div class="alert alert-primary text-center" role="alert"> Selected articles have been deleted successfully.</div>');
                    //$result['statusMsg'] = 'Selected articles have been deleted successfully.';
                }else{
                    $this->session->set_flashdata('msg', '<div class="alert alert-danger text-center" role="alert"> Oops! Something went wrong </div>');
                    //$result['statusMsg'] = 'Some problem occurred, please try again.';
                }
            }else{
                $this->session->set_flashdata('msg', '<div class="alert alert-danger text-center" role="alert"> Select at least 1 record to delete.</div>');
                //$result['statusMsg'] = 'Select at least 1 record to delete.';
            }
        }
        $result['articles'] = $this->Model_Article->get_articles();

        if($result!=false) {

            $this->load->view('admin/admin_articles' , $result);

        }
        else {
            echo "Something went wrong !";
        }

    }

    public function admin_forum() {
        $this->load->view('admin/admin_forum');
    }

    public function admin_enquiries() {
        $this->load->view('admin/admin_enquiries');
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

}