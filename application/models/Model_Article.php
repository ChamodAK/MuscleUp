<?php
/**
 * Created by PhpStorm.
 * User: ylmat
 * Date: 11/27/2018
 * Time: 1:50 AM
 */

class Model_Article extends CI_Model
{

    public function add_new_article($data) {

        $data = array(

            'title' => $this->input->post('title', TRUE),
            'details' => $this->input->post('content', TRUE),
            'timestamp' => date('Y-m-d H:i:s'),
            'image' => $data['image']

        );

        return $this->db->insert('article', $data);
    }

    public function get_few_articles() {

        $query = $this->db->query("SELECT * FROM article ORDER BY timestamp ASC LIMIT 4;");

        if($query->num_rows()>0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }


    }

    public function get_articles() {

        $query = $this->db->query("SELECT * FROM article ORDER BY timestamp DESC;");

        if($query->num_rows()>0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }


    }

    public function get_full_article($id) {

        $query = $this->db->query("SELECT * FROM article WHERE id=$id;");

        return $query->row(0);

    }

    public function delete_articles($id){
        if(is_array($id)){
            $this->db->where_in('id', $id);
        }else{
            $this->db->where('id', $id);
        }
        $delete = $this->db->delete('article');
        return $delete ? true : false;
    }

    public function count_articles() {
        $query = $this->db->query("SELECT * FROM article;");
        return $query->num_rows();
    }
}