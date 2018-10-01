<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Core_Controller extends CI_Controller{
    private   $public    = array('login/', 'register/');
    private   $mc_auth   = 'mc_auth';

    public function __construct()
    {
        parent::__construct();
        $this->load->helper(array('url'));
        $this->load->library(array('session', 'form_validation'));
        $this->load->library('session');
        $this->load->model('Account_model');
        
        $current         = $this->uri->segment(1, '') . '/' . $this->uri->segment(2, '');
        $is_logged  = $this->session->has_userdata('');
        $is_public  = in_array($current, $this->public);

        if ( !$is_public && !$is_logged) {
			if(!in_array($this->uri->segment(1, '') . '/', $this->public))
			redirect(base_url('login'));
		}
    }
}