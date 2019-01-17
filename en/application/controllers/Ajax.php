<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
	** Project - Circulation   **
	** Controller - Ajax **
	** Model - AjaxM **
	** Developer - Srikanth **
*/

class Ajax extends CI_Controller {
	
	function __construct(){
		parent::__construct();
		$this->load->library('javascript');
		$this->load->library('session');
		$this->load->helper('url');
		$this->load->model('Ajaxm');
	}
	
	
	//get_promoter
	function ajax_get_district_details($district)
	{
		$data['district'] = $this->Ajaxm->get_district_details($district);
		$data['prev_election_data'] = $this->Ajaxm->get_prev_election_data($district);
		$this->load->view('ajax/ajax_get_district_details',$data);
	}
	
	//Check Input
	function check_input($data){
		$data = trim($data);
		$data = htmlspecialchars($data);
		$data = stripslashes($data);
		return $data;
	}

	function ajax_get_seats_data()
	{
		if(isset($_GET))
		{
			$stateid = $_GET['stateid'];
			$partycode = $_GET['partycode'];
			$year = $_GET['year'];
			$data['year'] = $year;
			$data['seats_data'] = $this->Ajaxm->get_seats_data($stateid,$partycode,$year); 
			$this->load->view('ajax/ajax_get_seats_data',$data);
		}
	}

	function ajax_get_seats_data_distid()
	{
		if(isset($_GET))
		{
			$stateid = $_GET['stateid'];
			$distid = $_GET['distid'];
			$partycode = $_GET['partycode'];
			$year = $_GET['year'];
			$data['year'] = $year;
			$data['seats_data'] = $this->Ajaxm->get_seats_data_distid($stateid,$partycode,$year,$distid); 
			$this->load->view('ajax/ajax_get_seats_data',$data);
		}
	}
	
}
	
	
?>