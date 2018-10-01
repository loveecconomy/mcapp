<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Account_model extends CI_Model{
    public function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->library('auth', 'admin_auth');
    }

    protected function hash_password($data)
	{
		if (isset($data['password']) && !empty($data['password'])) {
			$data['password'] = $this->admin_auth->hash($data['password']);
		} else {
			unset($data['password']);
		}
		return $data;
    }

    public function build_session($field, $key)
	{
		$data = $this->db->where($field, $key)->get($this->_table, 1)->row();
		$this->session->set_userdata('session_username', $data->name);
		$this->session->set_userdata('session_mail', $data->email);
		$this->session->set_userdata('session_name', $data->name);
		$this->session->set_userdata('session_id', $data->id);
		$this->session->unset_userdata('session_ref');
	}

    public function login($loginData)
	{
		$query = $this->db->where('mc_name', $loginData['name'])->get('mcs', 1);

		if ($query->num_rows() == 1) {
			$data = $query->row_array();

			if ($this->check($loginData['password'], $data['password'])) {
				$this->load->library('session');
				$this->session->set_userdata('mc', TRUE);
				return TRUE;
            }
        }

		$this->session->set_flashdata('login', array('message' => 'Incorrect account details','class' => 'danger'));
        return FALSE;
    }

    public function register($data){
		$this->hash_password($data);
		$id = $this->insert($data);
		if($id){ 
			return True;
		}
        return False;
	}

}