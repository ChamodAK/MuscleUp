<?php
/**
 * Created by PhpStorm.
 * User: ylmat
 * Date: 11/27/2018
 * Time: 4:34 PM
 */

class Model_Forum extends CI_Model {

    public function add_new_post($data) {

        $data = array(

            'title' => $this->input->post('title', TRUE),
            'details' => $this->input->post('content', TRUE),
            'timestamp' => date('Y-m-d H:i:s'),
            'image' => $data['image'],
            'userId' => $this->session->userdata('id')

        );

        return $this->db->insert('forum', $data);
    }

    public function get_posts() {

        $query = $this->db->query("SELECT forum.id, forum.title, forum.details, forum.timestamp, forum.image, forum.userId, users.username FROM muscleup.forum JOIN users on forum.userId = users.id ORDER BY forum.timeStamp DESC;");

        if($query->num_rows()>0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }


    }

    public function get_full_post($id) {

        $query = $this->db->query("SELECT forum.id, forum.title, forum.details, forum.timestamp, forum.image, forum.userId, users.username FROM muscleup.forum JOIN users on forum.userId = users.id WHERE forum.id = $id;");

        return $query->row(0);

    }


    public function get_replies($id) {

        $query = $this->db->query("SELECT reply.reply_id, reply.details, reply.timestamp, reply.user_id, users.username FROM muscleup.reply JOIN users on reply.user_id = users.id WHERE reply.post_id = $id ORDER BY reply.timestamp DESC;");

        if($query->num_rows()>0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }


    }

    public function add_new_reply($id) {

        $data = array(

            'details' => $this->input->post('content', TRUE),
            'timestamp' => date('Y-m-d H:i:s'),
            'post_id' => $id,
            'user_id' => $this->session->userdata('id')

        );

        return $this->db->insert('reply', $data);
    }

    public function count_posts() {
        $query = $this->db->query("SELECT * FROM forum;");
        return $query->num_rows();
    }
}