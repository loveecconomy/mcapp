<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Account extends Core_Controller {
    function __construct() {
        parent::__construct();
        $this->load->model('account_model');
    }

    public function index()
    {
        if($this->input->method() === 'post'){
            $mc['name']     = $this->input->post('name');
            $mc['password'] = $this->input->post('password');
            $this->account_model->login($mc);
        }
        $data = [];
        $this->load->view('login', $data);
    }

    public function register(){
        if($this->input->method() === 'post'){
            $newMc = $_POST;
            $this->account_model->register($newMc);
        }
        $data = [];
        $this->load->view('register', $data);
    }
}
