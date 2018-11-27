<?php

class Model_user extends CI_Model {

    function insert_user_data () {

        $data = array(

            'username' => $this->input->post('username'),
            'password' => sha1($this->input->post('password')),
            'email' => $this->input->post('email'),
            'flag' => 'm',
            'name' => $this->input->post('name'),
            'dob' => $this->input->post('dob'),
            'nic' => $this->input->post('nic'),
            'address' => $this->input->post('address'),
            'contactNo' => $this->input->post('contact'),
        );

        return $this->db->insert('users', $data);

    }

    function login_user() {

        $username = $this->input->post('username');
        $password = sha1($this->input->post('password'));

        $this->db->where('username', $username);
        $this->db->where('password', $password);
        $result = $this->db->get('users');

        if($result->num_rows()==1) {
            return $result->row(0);
        }
        else {
            return false;
        }

    }

    function insert_fitness_data () {

        $data = array(

            'userId' => $this->input->post('id'),
            'weight' => $this->input->post('weight'),
            'height' => $this->input->post('height'),
            'schedule' => $this->input->post('schedule'),
            'attendance' => $this->input->post('attendence'),
            'remarks' => $this->input->post('remark'),
            'checkedDate' => $this->input->post('checked_date'),
        );

        return $this->db->insert('fitness', $data);

    }

    function fetch_fitness_data($id)
    {

        $query = $this->db->query("SELECT * FROM fitness WHERE userId = '$id' ORDER BY checkedDate DESC");
        return $query;
    }
    function fetch_users_data(){
        $query = $this->db->get("users");
        return $query;
    }
    function delete_user($userid){
        $this->db->where('id', $userid);
        $this->db->delete("users");
        $row = $this->db->affected_rows();
        return $row;
    }


}