<?php

class Setup extends CI_Controller
{

    public function index()
    {
        $this->load->view('setup');
        $this->load->helper('url');
    }

    public function do_migration(){
        $this->load->library('migration');
        if ($this->migration->current() === FALSE)
        {
            show_error($this->migration->error_string());
        }
    }

}