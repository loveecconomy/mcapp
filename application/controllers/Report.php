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

	public function load_question(){
		header('Access-Control-Allow-Origin: *');
		header("Access-Control-Allow-Methods: GET, OPTIONS");

		$Question = $this->report_model->load_report_questions();
		echo json_encode($Question);
	}

	public function saveReport(){
		header('Access-Control-Allow-Origin: *');
		header("Access-Control-Allow-Methods: GET, OPTIONS");
		$answers = $_POST;
		foreach($answers['data'] as $answer){
			echo "Answer is =>";
			$response = $this->report_model->save_report_answers($answer);
			echo json_encode($response);
		}
	}
}
