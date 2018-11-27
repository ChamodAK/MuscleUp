<?php

class Model_Admin extends CI_Model {

    function get_all_emails() {

        $query = $this->db->query("SELECT email FROM muscleup.users;");

        if($query->num_rows()>0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }

    }

    function get_schedule() {

        $query = $this->db->query("SELECT * FROM muscleup.schedule;");

        if($query->num_rows()>0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }

    }

    function add_new_schedule($id, $content, $days) {

        $data = array(
            'id' =>  $id,
            'content' => $content,
            'daysPerWeek' => $days
        );

        return $this->db->insert('schedule', $data);


    }

    function get_full_schedule($id) {

        $query = $this->db->query("SELECT schedule.content, schedule.daysPerWeek FROM muscleup.schedule WHERE schedule.id = $id;");

        return $query->row(0);

    }

    function add_edit_schedule($id, $content, $days) {

        $data = array(
            'content' => $content,
            'daysPerWeek' => $days
        );

        $this->db->where('id', $id);
        return $this->db->update('schedule', $data);


    }

    function delete_schedule_confirm($id) {

        return $this->db->delete('schedule', array('id' => $id));


    }

}