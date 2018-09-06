<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Report_model extends CI_Model{
    private $table = 'reports';

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

	public function list_all_report(){
        $this->db->select("title, (SELECT user_fname FROM users WHERE users.user_id = reports.user_id) 
                        AS username, (SELECT user_role FROM users WHERE users.user_id = reports.user_id) 
                        AS userrole, (SELECT user_lname FROM users WHERE users.user_id = reports.user_id) 
                        AS lastname, report_date AS date");
        $result = $this->db->get('reports');
        return $result->result_array();
    }

	public function list_mc_reports($mc){
        $this->db->where('mc_id', $mc);
        $result = $this->db->get($table);
        return $result->result_array();
    }

    public function create_report($data){
        $this->db->insert('reports',$data);
        $insert_id = $this->db->insert_id();
        return $insert_id;
    }

    public function next_question($data){
        $this->db->where('questionaire_id', $data['questionaire']);
        $this->db->where('question_id', $data['lastQues']);
        $result = $this->db->get('questions');
        return $result->row_array();
    }

}
