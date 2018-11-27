<?php

class MY_Controller extends CI_Controller {

    public function send_mail($mail, $sub, $mess) {

        $config = Array(
            "protocol" => "smtp",
            "smtp_host" => "ssl://smtp.googlemail..com",
            "smtp_port" => 465,
            "smtp_user" => "muslceupgymnasium@gmail.com",
            "smtp_pass" => "muslceup123",
            'mailtype'  => 'html',
            'charset'   => 'iso-8859-1',
            'wordwrap' => TRUE
        );

        $this->load->library('email', $config);
        $this->email->set_newline("\r\n");
        $this->email->from('muslceupgymnasium@gmail.com', 'Muscle Up');
        $this->email->to($mail);
        $this->email->subject($sub);
        $this->email->message($mess);

        $result = $this->email->send();
        return $result;

//        if (!$this->email->send()) {
//            show_error($this->email->print_debugger()); }
//        else {
//            echo 'Your email has been sent!';
//        }

    }

    public function send_mail_to_list($list, $sub, $mess) {

        $config = Array(
            "protocol" => "smtp",
            "smtp_host" => "ssl://smtp.googlemail..com",
            "smtp_port" => 465,
            "smtp_user" => "muslceupgymnasium@gmail.com",
            "smtp_pass" => "muslceup123",
            'mailtype'  => 'html',
            'charset'   => 'iso-8859-1',
            'wordwrap' => TRUE
        );

        $this->load->library('email', $config);
        $this->email->set_newline("\r\n");
        $this->email->from('muslceupgymnasium@gmail.com', 'Muscle Up');
        $this->email->to($list);
        $this->email->subject($sub);
        $this->email->message($mess);

        $result = $this->email->send();
        return $result;


    }

}