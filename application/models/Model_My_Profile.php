<?php

class Model_My_Profile extends CI_Model {

    public function get_payments($id) {

        $query = $this->db->query("SELECT payments.id, payments.category, payments.method, payments.amount, payments.date FROM muscleup.payments WHERE payments.userId = '$id';");

        if($query->num_rows()>0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }

    }

    public function get_my_profile($id) {

        $query = $this->db->query("SELECT users.name, users.username, users.email, users.dob, users.nic, users.address, users.contactNo FROM muscleup.users WHERE users.id = $id;");

        return $query->row(0);

    }

    public function add_edit_profile($id, $name, $dob, $nic, $address, $contactNo) {

        $data = array(
            'name' => $name,
            'dob' => $dob,
            'nic' => $nic,
            'address' => $address,
            'contactNo' => $contactNo
        );

        $this->db->where('id', $id);
        return $this->db->update('users', $data);

    }


}