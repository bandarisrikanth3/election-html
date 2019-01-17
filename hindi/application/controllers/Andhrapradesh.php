<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Andhrapradesh extends CI_Controller {
	
	function __construct(){
		parent::__construct();
		$this->load->library('javascript');
		$this->load->library('session');
		$this->load->library('pagination');
		$this->load->helper('url');
		$this->load->model('Englishm');
	}

	

	function index()
	{
		$this->state('andhra-pradesh');
	}

	/*
	 ** State View
	 */

	function state($state)
	{
		if(empty($state) )
		{
			redirect();
		}
		$state = str_ireplace('-', ' ', $state);

		$data['state'] = $this->Englishm->get_state_data($state);
		$data['pre_result'] = $this->Englishm->get_pre_result_by_state($state);
		$data['seats_data'] = $this->Englishm->get_seats_data($state);
		$this->load->view('common/header');
		//$this->load->view('common/main_navigation');
		$this->load->view('english/map/ap/'.strtolower($data['state']->shortname),$data);
		$this->load->view('english/views/stateview',$data);
		$this->load->view('common/footer');	
	}

	/*
	 ** District View
	 */

	function district($district)
	{
		if(empty($district) )
		{
			redirect();
		}
		
		$district = str_ireplace('-', ' ', $district);
		$data['district'] = $this->Englishm->get_district_data($district);
		$data['pre_result'] = $this->Englishm->get_pre_result_by_district($district);
		$data['seats_data'] = $this->Englishm->get_seats_data_distid($district); 
		$this->load->view('common/header');
		//$this->load->view('common/main_navigation');
		$this->load->view('english/map/ap/district/'.strtolower($data['district']->shortname),$data);
		$this->load->view('english/views/districtview',$data);
		$this->load->view('common/footer');	
	}

	/*
	 ** Constituency View
	 */

	function constituency($const)
	{
		if(empty($const) )
		{
			redirect();
		}
		
		$const = str_ireplace('-', ' ', $const);
		$data['const'] = $this->Englishm->get_const_data($const);
		$data['pre_result'] = $this->Englishm->get_pre_result_by_const($const);
		$this->load->view('common/header');
		//$this->load->view('common/main_navigation');
		$this->load->view('english/map/ap/constituency/'.strtolower($data['const']->shortname),$data);
		$this->load->view('english/views/constview',$data);
		$this->load->view('common/footer');	
	}

	/*
	 ** Party View
	 */

	function party($party_state)
	{
		if(empty($party_state) )
		{
			redirect();
		}
		$party1 = explode('_',$party_state);
	//	print_r($party1);
		$party = str_ireplace('-', ' ', $party1[0]);
		$state = str_ireplace('-', ' ',$party1[1]);		

		$data['party'] = $this->Englishm->get_party_data($party,$state);
		//print_r($data);
		if(empty($data['party']->id))
		{
		//	redirect();
		}
		else
		{
			$partyid = $data['party']->id;
		}
		$data['candidate_details'] = $this->Englishm->get_candidate_details_by_party($partyid,$state);
		$data['pre_result'] = $this->Englishm->get_pre_result_by_party($partyid,$state);
		$data['seats_data'] = $this->Englishm->get_seats_data_by_party($partyid,$state);

		$this->load->view('common/header');
		$this->load->view('english/views/partyview',$data);
		$this->load->view('common/footer');	
	}

	/*
	 ** Candidate View
	 */

	function candidate($candidate)
	{
		if(empty($candidate) )
		{
			redirect();
		}
		$candidate = str_ireplace('-', ' ', $candidate);
		
		$data['candidate_details'] = $this->Englishm->get_candidate_details($candidate);
		//$data['pre_result'] = $this->Englishm->get_pre_result_by_party($partyid,$state);
		//$data['seats_data'] = $this->Englishm->get_seats_data_by_party($partyid,$state);

		$this->load->view('common/header');
		$this->load->view('english/views/candidateview',$data);
		$this->load->view('common/footer');	
	}




	
}
?>