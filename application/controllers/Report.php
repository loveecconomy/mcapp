<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Report extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->model('report_model');
	}
	
	public function index()
	{
		$data = [];
		$data['reports'] = $this->report_model->list_all_report();
		$this->load->view('report', $data);
	}

	public function add_view() {
		$this->load->view('add_report');
	}

	public function create() {
		header('Access-Control-Allow-Origin: *');
		header("Access-Control-Allow-Methods: GET, OPTIONS");
		
		$new_report = $_POST;
		$new_report['user_id'] = 1;
		$new_report['mc_id'] = 1;
		$new_report['questionaire_id'] = 1 ;
		$reportId = $this->report_model->create_report($new_report);
		
		$data['report_id'] = $reportId;
		$data['questionaire_id'] = $new_report['questionaire_id'];

		echo json_encode($data);
	}

	public function get_next_question(){
		header('Access-Control-Allow-Origin: *');
		header("Access-Control-Allow-Methods: GET, OPTIONS");

		$formRequest = $_POST;
		$nextQuestion = $this->report_model->next_question($formRequest);
		echo json_encode($nextQuestion);
	}
}
