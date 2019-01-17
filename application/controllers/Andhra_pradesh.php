<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Andhra_pradesh extends CI_Controller {
	
	function __construct(){
		parent::__construct();
		$this->load->library('javascript');
		$this->load->library('session');
		$this->load->library('pagination');
		$this->load->helper('url');
		$this->load->model('Andhra_pradeshm');
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

		$data['state'] = $this->Andhra_pradeshm->get_state_data($state);
		$data['pre_result'] = $this->Andhra_pradeshm->get_pre_result_by_state($state);
		$data['seats_data'] = $this->Andhra_pradeshm->get_seats_data_state($state);
		$data['campaigns_data'] = $this->Andhra_pradeshm->get_campaigns_data_state($state);
		
		foreach($data['campaigns_data'] as $row)
		{
			$rid1[] = $row['id'];
		}
		if(!empty($rid1))
		{
			$rid = implode(',',$rid1);
			$data['campaigners_details'] = $this->Andhra_pradeshm->get_campaigners_details($rid);
		}
		else
		{
			$rid = '';
			$data['campaigners_details'] = '';
		}
		
		$data['election_data'] = $this->Andhra_pradeshm->get_election_schedule();		
		$data['star_candidate'] = $this->Andhra_pradeshm->get_star_candidate();
		$data['candidate_details_side'] = $this->Andhra_pradeshm->get_all_candidate_details();

		$data['show'] = 1;

		$this->load->view('common/header',$data);
		//$this->load->view('common/main_navigation');
		//$this->load->view('english/map/ts/'.strtolower($data['state']->shortname),$data);
		
		$this->load->view('english/views/ap/state/stateview',$data);
		$this->load->view('common/sidebar');	
		$this->load->view('common/footer');	
	}

	/*
	 ** District View
	 */

	function district($district='')
	{
		if(empty($district) )
		{
			$data['district'] = $this->Andhra_pradeshm->get_all_district();
			
		$data['election_data'] = $this->Andhra_pradeshm->get_election_schedule();		
		$data['star_candidate'] = $this->Andhra_pradeshm->get_star_candidate();
		$data['candidate_details_side'] = $this->Andhra_pradeshm->get_all_candidate_details();
			//print_r($data);
			$this->load->view('common/header',$data);
			$this->load->view('english/views/ap/district/all',$data);
			$this->load->view('common/sidebar');	
			$this->load->view('common/footer');	
		}

		else
		{

			$data['graph_distname'] = $district;
			$district = str_ireplace('-', ' ', $district);

			$data['district'] = $this->Andhra_pradeshm->get_district_data($district);
			$data['pre_result'] = $this->Andhra_pradeshm->get_pre_result_by_state('andhra pradesh');
			$data['seats_data'] = $this->Andhra_pradeshm->get_seats_data_state(''); 
			$data['campaigns_data'] = $this->Andhra_pradeshm->get_campaigns_data_district($district);
			foreach($data['campaigns_data'] as $row)
			{
				$rid1[] = $row['id'];
			}
			if(!empty($rid1))
			{
				$rid = implode(',',$rid1);
				$data['campaigners_details'] = $this->Andhra_pradeshm->get_campaigners_details($rid);
			}
			else
			{
				$rid = '';
				$data['campaigners_details'] = '';
			}
			
			
		$data['election_data'] = $this->Andhra_pradeshm->get_election_schedule();		
		$data['star_candidate'] = $this->Andhra_pradeshm->get_star_candidate();
		$data['candidate_details_side'] = $this->Andhra_pradeshm->get_all_candidate_details();
		$data['candidate_details_district'] = $this->Andhra_pradeshm->get_candidates_by_district($district);

			$this->load->view('common/header',$data);
			//$this->load->view('common/main_navigation');
			//$this->load->view('english/map/ts/district/'.strtolower(str_ireplace(' ', '-', $data['district']->engname)),$data);
			$this->load->view('english/views/ap/district/districtview',$data);
			$this->load->view('common/sidebar');	
			$this->load->view('common/footer');	
		}
	}

	/*
	 ** Constituency View
	 */

	function constituency($const='')
	{
		if(empty($const) )
		{
			$data['const'] = $this->Andhra_pradeshm->get_all_const();
			
		$data['election_data'] = $this->Andhra_pradeshm->get_election_schedule();		
		$data['star_candidate'] = $this->Andhra_pradeshm->get_star_candidate();
		$data['candidate_details_side'] = $this->Andhra_pradeshm->get_all_candidate_details();
			//print_r($data);
			$this->load->view('common/header',$data);
			$this->load->view('english/views/ap/constituency/all',$data);
			$this->load->view('common/sidebar');	
			$this->load->view('common/footer');	
		}
		else
		{
			$data['graph_constname'] = $const;
			$const = str_ireplace('-', ' ', $const);
			$data['const'] = $this->Andhra_pradeshm->get_const_data($const);
			$data['pre_result'] = $this->Andhra_pradeshm->get_pre_result_by_const($const);
			$data['seats_data'] = $this->Andhra_pradeshm->get_seats_data_const($const); 
			$data['campaigns_data'] = $this->Andhra_pradeshm->get_campaigns_data_const($const);
			$data['election_result'] = $this->Andhra_pradeshm->get_previous_election_result($const);
			foreach($data['campaigns_data'] as $row)
			{
				$rid1[] = $row['id'];
			}
			if(!empty($rid1))
			{
				$rid = implode(',',$rid1);
				$data['campaigners_details'] = $this->Andhra_pradeshm->get_campaigners_details($rid);
			}
			else
			{
				$rid = '';
				$data['campaigners_details'] = '';
			}
			
			
		$data['election_data'] = $this->Andhra_pradeshm->get_election_schedule();		
		$data['star_candidate'] = $this->Andhra_pradeshm->get_star_candidate();
		$data['candidate_details_side'] = $this->Andhra_pradeshm->get_all_candidate_details();
		$data['candidate_details_const'] = $this->Andhra_pradeshm->get_candidates_by_const($const);

			$this->load->view('common/header',$data);
			//$this->load->view('common/main_navigation');
			//$this->load->view('english/map/ts/constituency/constmap',$data);
			$this->load->view('english/views/ap/constituency/constview',$data);
			$this->load->view('common/sidebar');	
			$this->load->view('common/footer');	
		}
	}

	/*
	 ** Party View
	 */

	function party($party_state='')
	{
		if(empty($party_state) )
		{
			$data['parties'] = $this->Andhra_pradeshm->get_all_parties();
			
		$data['election_data'] = $this->Andhra_pradeshm->get_election_schedule();		
		$data['star_candidate'] = $this->Andhra_pradeshm->get_star_candidate();
		$data['candidate_details_side'] = $this->Andhra_pradeshm->get_all_candidate_details();
			//print_r($data);
			$this->load->view('common/header');
			$this->load->view('english/views/ap/party/all',$data);
			$this->load->view('common/sidebar');	
			$this->load->view('common/footer');	
		}
		else
		{


			$party1 = explode('_',$party_state);
			$data['graph_partyname'] = $party1[0];
			//print_r($party1);
			$party = str_ireplace('-', ' ', $party1[0]);
			$state = str_ireplace('-', ' ', $party1[1]);		

			$data['party'] = $this->Andhra_pradeshm->get_party_data($party,$state);
			//print_r($data);
			if(empty($data['party']->id))
			{
				redirect();
			}
			else
			{
				$partyid = $data['party']->id;
			}
			$data['candidate_details'] = $this->Andhra_pradeshm->get_candidate_details_by_party($partyid,$state);
			$data['pre_result'] = $this->Andhra_pradeshm->get_pre_result_by_party($partyid,$state);
			$data['seats_data'] = $this->Andhra_pradeshm->get_seats_data_by_party($partyid,$state);
			$data['campaigns_data'] = $this->Andhra_pradeshm->get_campaigns_data_party($partyid,$state);
			foreach($data['campaigns_data'] as $row)
			{
				$rid1[] = $row['id'];
			}
			if(!empty($rid1))
			{
				$rid = implode(',',$rid1);
				$data['campaigners_details'] = $this->Andhra_pradeshm->get_campaigners_details($rid);
			}
			else
			{
				$rid = '';
				$data['campaigners_details'] = '';
			}
			
			
			$data['election_data'] = $this->Andhra_pradeshm->get_election_schedule();		
			$data['star_candidate'] = $this->Andhra_pradeshm->get_star_candidate();
			$data['candidate_details_side'] = $this->Andhra_pradeshm->get_all_candidate_details();

			$this->load->view('common/header');
			$this->load->view('english/views/ap/party/partyview',$data);
			$this->load->view('common/sidebar');	
			$this->load->view('common/footer');	
		}
	}

	/*
	 ** Candidate View
	 */
/*
	function candidate($candidate_state ='')
	{
		if(!empty($candidate_state) )
		{
			redirect();
		}
		$candidate1 = explode('_',$candidate_state);
		//print_r($party1);
		$candidate = str_ireplace('-', ' ', $candidate1[0]);
		$state = str_ireplace('-', ' ', $candidate1[1]);
		
		$data['candidate_details'] = $this->Andhra_pradeshm->get_candidate_details($candidate);
		if(empty($data['candidate_details']->id))
		{
			redirect();
		}
		else
		{
			$candidateid = $data['candidate_details']->id;
		}
		$data['pre_result'] = $this->Andhra_pradeshm->get_pre_result_by_candidate($candidateid,$state);
		$data['seats_data'] = $this->Andhra_pradeshm->get_seats_data_by_candidate($candidateid,$state);
		$data['campaigns_data'] = $this->Andhra_pradeshm->get_campaigns_data_candidate($candidateid,$state);
		foreach($data['campaigns_data'] as $row)
		{
			$rid1[] = $row['id'];
		}
		if(!empty($rid1))
		{
			$rid = implode(',',$rid1);
			$data['campaigners_details'] = $this->Andhra_pradeshm->get_campaigners_details($rid);
		}
		else
		{
			$rid = '';
			$data['campaigners_details'] = '';
		}
		
		
		
		$data['election_data'] = $this->Andhra_pradeshm->get_election_schedule();		
		$data['star_candidate'] = $this->Andhra_pradeshm->get_star_candidate();
		$data['candidate_details_side'] = $this->Andhra_pradeshm->get_all_candidate_details();
		//print_r($data['campaigners_details'] );

		$this->load->view('common/header');
		$this->load->view('english/views/ap/candidate/candidateview',$data);
		$this->load->view('common/sidebar');	
		$this->load->view('common/footer');	
	}

*/
	/*
	 ** Schedule View
	 */

	function schedule()
	{
		
		
		
		$data['election_data'] = $this->Andhra_pradeshm->get_election_schedule();		
		$data['star_candidate'] = $this->Andhra_pradeshm->get_star_candidate();
		$data['candidate_details_side'] = $this->Andhra_pradeshm->get_all_candidate_details();
		//print_r($data['campaigners_details'] );

		$this->load->view('common/header');
		$this->load->view('english/views/ap/election_schedule',$data);
		$this->load->view('common/sidebar');	
		$this->load->view('common/footer');	
	}

	/*
	 ** Campaign View
	 */

	function campaign()
	{
		
		
		$data['campaigners_details'] = $this->Andhra_pradeshm->get_campaigners_details('');
		$data['campaigns_data'] = $this->Andhra_pradeshm->get_campaigns_data();
		
		$data['election_data'] = $this->Andhra_pradeshm->get_election_schedule();		
		$data['star_candidate'] = $this->Andhra_pradeshm->get_star_candidate();
		$data['candidate_details_side'] = $this->Andhra_pradeshm->get_all_candidate_details();
		//print_r($data['campaigners_details'] );

		$this->load->view('common/header');
		$this->load->view('english/views/ap/campaignview',$data);
		$this->load->view('common/sidebar');	
		$this->load->view('common/footer');	
	}


	/*
	 ** Notification View
	 */

	function notification()
	{
		$data['notifications'] = $this->Andhra_pradeshm->get_notifications();
		
		$data['election_data'] = $this->Andhra_pradeshm->get_election_schedule();		
		$data['star_candidate'] = $this->Andhra_pradeshm->get_star_candidate();
		$data['candidate_details_side'] = $this->Andhra_pradeshm->get_all_candidate_details();
		
		$this->load->view('common/header');
		$this->load->view('english/views/ap/notifications',$data);
		$this->load->view('common/sidebar');	
		$this->load->view('common/footer');	
	}

	/*
	 * Candidates List Party Wise
	 */

	function candidates()
	{
		$data['candidate_details_side'] = $this->Andhra_pradeshm->get_all_candidate_details();
		$data['star_candidate'] = $this->Andhra_pradeshm->get_star_candidate();
		//print_r($data['campaigners_details'] );

		$this->load->view('common/header');
		$this->load->view('english/views/ap/candidate/candidateview',$data);
		$this->load->view('common/sidebar');	
		$this->load->view('common/footer');	
	}

	/*
	 * General Observers
	 */

	function general_observers()
	{
		$data['general_observers'] = $this->Andhra_pradeshm->get_general_observers();
		$data['candidate_details_side'] = $this->Andhra_pradeshm->get_all_candidate_details();
		//print_r($data['campaigners_details'] );

		$this->load->view('common/header');
		$this->load->view('common/general_observers',$data);
		$this->load->view('common/sidebar');	
		$this->load->view('common/footer');	
	}

	/*
	 * Police Observers
	 */

	function police_observers()
	{
		$data['police_observers'] = $this->Andhra_pradeshm->get_police_observers();
		$data['candidate_details_side'] = $this->Andhra_pradeshm->get_all_candidate_details();
		//print_r($data['campaigners_details'] );

		$this->load->view('common/header');
		$this->load->view('common/police_observers',$data);
		$this->load->view('common/sidebar');	
		$this->load->view('common/footer');	
	}



 // ============================  Graph Json ============================================ //

	/*
	 * State Json
	 */
	
	function pre_result_json_by_state($state){
		 header('Access-Control-Allow-Origin: *'); 
		$jsonData = $this->Andhra_pradeshm->get_pre_result_json_by_state($state);
		//print_r($jsonData);
		

		$json = '{
				  "cols": [
				        {"id":"","label":"Report","pattern":"","type":"string"},
				 ';

		
		foreach($jsonData as $row)
			{
				$count_rep = 0;
				$parties = explode(',',$row['partyname']);
				$shortname = explode(',',$row['shortname']);
				//echo count($parties);
				$color_codes = explode(',',$row['color_codes']);
				//print_r($parties);
				for($j=0;$j<5;$j++)
					{
						$json .= '{"id":"","label":"'.$shortname[$j].'","pattern":"","type":"number"},
				         {"id":"","label":"'.$shortname[$j].'","role":"annotation","type":"string"}';
				        if($count_rep < 4)
				        	{
				         		$json .= ',';
				         	}
				        $count_rep++;
					}
				break;

			}
				$json .= '
				      ],
				  "rows": [
				  ';
			$i = 0;
			foreach($jsonData as $row)
			{
				$count_rep = 0;
				
				$json .= '{"c":[{"v":"'.$row['year'].'","f":null},';
				$parties = explode(',',$row['shortname']);
				$seats = explode(',',$row['seats']);
				for($j=0;$j<5;$j++)
					{
						
						$json.='{"v":'.$seats[$j].',"f":null},{"v":"'.$parties[$j].'-'.$seats[$j].'","f":null}';
						if($count_rep < 4)
				        	{
				         		$json .= ',';
				         	}
				        $count_rep++;
													
					}	
				if($i < count($jsonData)-1)
		        	{
		         		$json .= ']},';
		         	}
		         	else
		         	{
		         		$json .= ']}';
		         	}
		        $i++;

			}
				$json .= ']}';

		if(!is_dir('Jsons/'.$state))
		{
			mkdir('Jsons/'.$state,0777,true);
		}
		
		$path = 'Jsons/'.$state.'/pre_results_state.json';
		$fp = fopen($path,'w+');
		fwrite($fp,$json);
		fclose($fp);
		echo $json;
		//$this->load->view('english/views/ap/state_chart');
	}



	function vote_share_json_state($state){
		 header('Access-Control-Allow-Origin: *'); 
		$jsonData = $this->Andhra_pradeshm->get_vote_share_json_by_state($state);
		//print_r($jsonData);
		
		/*
		$json = '{
				  "cols": [
				        {"id":"","label":"Report","pattern":"","type":"string"},
				        {"id":"","label":"","role":"annotation","type":"string"},
				        {"id":"","label":"","role":"annotation","type":"string"}
				      ],
				  "rows": [
				        {"c":[{"v":"TRS","f":null},{"v":3,"f":null},{"v":3,"f":null}]},
				        {"c":[{"v":"BJP","f":null},{"v":3,"f":null},{"v":3,"f":null}]}
				      ]
				}';
		echo $json;*/

		//$this->load->view('english/views/ap/state_chart');
		$json = '{
				  "cols": [
				        {"id":"","label":"Report","pattern":"","type":"string"},{"id":"","label":"","pattern":"","type":"number"}
				  ';
				  /*
		foreach($jsonData as $row)
		{
			$parties = explode(',',$row['partyname']);
			for($i=0;$i<count($parties);$i++)
				{
					$json.='{"id":"","label":"","pattern":"","type":"number"},{"id":"","label":"","role":"annotation","type":"string"}';	
					if($i < count($parties)-1)
					{
						$json.=',';
					}
				}
			break;
		}*/

		$json .= '],
				  "rows": [
				  ';
		foreach($jsonData as $row)
		{
			$parties = explode(',',$row['partyname']);
			$voteshare = explode(',',$row['voteshare']);
			for($i=0;$i<count($parties);$i++)
				{
					$json.= '{"c":[{"v":"'.$parties[$i].'","f":null},{"v":'.$voteshare[$i].',"f":null}]}';
					if($i < count($parties)-1)
					{
						$json .= ',';
		         	}
		         	
				}
		}

		$json .= ']}';

		if(!is_dir('Jsons/'.$state))
		{
			mkdir('Jsons/'.$state,0777,true);
		}
		
		$path = 'Jsons/'.$state.'/vote_share_state.json';
		$fp = fopen($path,'w+');
		fwrite($fp,$json);
		fclose($fp);
		echo $json;
	}

	/*
	 * District
	 */
	function pre_result_json_by_district($district){
		 header('Access-Control-Allow-Origin: *'); 
		$district = str_ireplace('-', ' ', $district);
		$jsonData = $this->Andhra_pradeshm->get_pre_result_json_by_district($district);
		//print_r($jsonData);
		

		$json = '{
				  "cols": [
				        {"id":"","label":"Report","pattern":"","type":"string"},
				 ';

		
		foreach($jsonData as $row)
			{
				$count_rep = 0;
				$parties = explode(',',$row['partyname']);
				$shortname = explode(',',$row['shortname']);
				//echo count($parties);
				$color_codes = explode(',',$row['color_codes']);
				//print_r($parties);
				for($j=0;$j<count($parties);$j++)
					{
						$json .= '{"id":"","label":"'.$shortname[$j].'","pattern":"","type":"number"},
				         {"id":"","label":"'.$shortname[$j].'","role":"annotation","type":"number"}';
				        if($count_rep < count($parties)-1)
				        	{
				         		$json .= ',';
				         	}
				        $count_rep++;
					}
				break;

			}
				$json .= '
				      ],
				  "rows": [
				  ';
			$i = 0;
			foreach($jsonData as $row)
			{
				$count_rep = 0;
				
				$json .= '{"c":[{"v":"'.$row['year'].'","f":null},';
				//$parties = explode(',',$row['partyname']);
				$seats = explode(',',$row['seats']);
				for($j=0;$j<count($parties);$j++)
					{
						
						$json.='{"v":'.$seats[$j].',"f":null},{"v":'.$seats[$j].',"f":null}';
						if($count_rep < count($parties)-1)
				        	{
				         		$json .= ',';
				         	}
				        $count_rep++;
													
					}	
				if($i < count($jsonData)-1)
		        	{
		         		$json .= ']},';
		         	}
		         	else
		         	{
		         		$json .= ']}';
		         	}
		        $i++;

			}
				$json .= ']}';
		echo $json;

		if(!is_dir('Jsons/telangana/district'))
		{
			mkdir('Jsons/telangana/district',0777,true);
		}
		$path = 'Jsons/telangana/district/pre_results_'.str_ireplace(' ', '-', $district).'.json';
		$fp = fopen($path,'w+');
		fwrite($fp,$json);
		fclose($fp);
		echo $json;

		//$this->load->view('english/views/ap/state_chart');
	}

	function pre_all_result_json_by_district($district){
		 header('Access-Control-Allow-Origin: *'); 
		$district = str_ireplace('-', ' ', $district);
		$jsonData = $this->Andhra_pradeshm->get_pre_all_result_json_by_district($district);
		//print_r($jsonData);
		
		$i=0;$j=0;
		$json = '{
				  "cols": [{"id":"","label":"","pattern":"","type":"string"},';
		foreach($jsonData as $row)
		{
			$json .= '{"id":"","label":"'.$row['tel_shortname'].'","pattern":"","type":"number"},
	         {"id":"","label":"'.$row['tel_shortname'].'","role":"annotation","type":"string"}';
	        if($i < count($jsonData)-1)
	        	{
	         		$json .= ',';
	         	}
	         $i++;
		}
		$json .= '
				      ],
				  "rows": [
				  {"c":[{"v":"","f":null},';
		foreach($jsonData as $row)
		{
			$json.='{"v":'.$row['seats'].',"f":null},{"v":"'.$row['tel_shortname'].' - '.$row['seats'].'","f":null}';
	        if($j < count($jsonData)-1)
	        	{
	         		$json .= ',';
	         	}
	         
	         $j++;
		}
		$json .= ']}]}';
		echo $json;
		if(!is_dir('Jsons/telangana/district'))
		{
			mkdir('Jsons/telangana/district',0777,true);
		}
		$path = 'Jsons/telangana/district/pre_all_results_'.str_ireplace(' ', '-', $district).'.json';
		$fp = fopen($path,'w+');
		fwrite($fp,$json);
		fclose($fp);
		echo $json;
	}


	function vote_share_json_district($district){

		 header('Access-Control-Allow-Origin: *'); 
		$district = str_ireplace('-', ' ', $district);
		$jsonData = $this->Andhra_pradeshm->get_vote_share_json_by_district($district);
		//print_r($jsonData);
		
		/*
		$json = '{
				  "cols": [
				        {"id":"","label":"Report","pattern":"","type":"string"},
				        {"id":"","label":"","role":"annotation","type":"string"},
				        {"id":"","label":"","role":"annotation","type":"string"}
				      ],
				  "rows": [
				        {"c":[{"v":"TRS","f":null},{"v":3,"f":null},{"v":3,"f":null}]},
				        {"c":[{"v":"BJP","f":null},{"v":3,"f":null},{"v":3,"f":null}]}
				      ]
				}';
		echo $json;*/

		//$this->load->view('english/views/ap/state_chart');
		$json = '{
				  "cols": [
				        {"id":"","label":"Report","pattern":"","type":"string"},
				  ';
		foreach($jsonData as $row)
		{
			$parties = explode(',',$row['partyname']);
			for($i=0;$i<count($parties);$i++)
				{
					$json.='{"id":"","label":"","role":"annotation","type":"string"}';	
					if($i < count($parties)-1)
					{
						$json.=',';
					}
				}
			break;
		}

		$json .= '],
				  "rows": [
				  ';
		foreach($jsonData as $row)
		{
			$voteshare = explode(',',$row['voteshare']);
			for($i=0;$i<count($parties);$i++)
				{
					$json.= '{"c":[{"v":"'.$parties[$i].'","f":null},{"v":'.$voteshare[$i].',"f":null},{"v":'.$voteshare[$i].',"f":null}]}';
					if($i < count($parties)-1)
					{
						$json .= ',';
		         	}
		         	
				}
		}

		$json .= ']}';
		echo $json;

	}

	/*
	 * Constituency
	 */
	function pre_result_json_by_const($constid){
		 header('Access-Control-Allow-Origin: *'); 
		$constid = str_ireplace('-', ' ', $constid);
		$jsonData = $this->Andhra_pradeshm->get_pre_result_json_by_const($constid);
		//print_r($jsonData);
		
		$i=0;$j=0;
		$json = '{
				  "cols": [{"id":"","label":"","pattern":"","type":"string"},';
		foreach($jsonData as $row)
		{
			$json .= '{"id":"","label":"'.$row['tel_shortname'].'","pattern":"","type":"number"},
	         {"id":"","label":"'.$row['tel_shortname'].'","role":"annotation","type":"string"}';
	        if($i < count($jsonData)-1)
	        	{
	         		$json .= ',';
	         	}
	         $i++;
		}
		$json .= '
				      ],
				  "rows": [
				  {"c":[{"v":"","f":null},';
		foreach($jsonData as $row)
		{
			$json.='{"v":'.$row['seats'].',"f":null},{"v":"'.$row['tel_shortname'].' - '.$row['seats'].'","f":null}';
	        if($j < count($jsonData)-1)
	        	{
	         		$json .= ',';
	         	}
	         
	         $j++;
		}
		$json .= ']}]}';
		echo $json;
		if(!is_dir('Jsons/telangana/constituency'))
		{
			mkdir('Jsons/telangana/constituency',0777,true);
		}
		$path = 'Jsons/telangana/constituency/pre_results_'.str_ireplace(' ', '-', $constid).'.json';
		$fp = fopen($path,'w+');
		fwrite($fp,$json);
		fclose($fp);
		echo $json;
	}

	/*
	 * Parties
	 */
	function pre_result_json_by_party($party){
		 header('Access-Control-Allow-Origin: *'); 
		$party = str_ireplace('-', ' ', $party);
		$jsonData = $this->Andhra_pradeshm->get_pre_result_json_by_party($party);
		//print_r($jsonData);

			
	$json = '{
				  "cols": [
				        {"id":"","label":"Year","pattern":"","type":"string"},
				        {"id":"","label":"Seats","pattern":"","type":"number"},				 
				        {"id":"","label":"Seats","role":"annotation","type":"number"}				 
				      ],
				  "rows": [';

				 $j = 0;
			foreach($jsonData as $row)
			{
				$json .= '{"c":[{"v":'.$row['year'].',"f":null},{"v":'.$row['votes'].',"f":null},{"v":'.$row['votes'].',"f":null}';
				if($j < count($jsonData)-1)
				{
					$json .= ']},';
				}
				else
				{
					$json .= ']}';
				}
				$j++;
			}
			$json .= ']}';
		/*	$json = '{
  "cols": [
        {"id":"","label":"Topping","pattern":"","type":"string"},
        {"id":"","label":"Slices","pattern":"","type":"number"}
      ],
  "rows": [
        {"c":[{"v":"Mushrooms","f":null},{"v":3,"f":null}]},
        {"c":[{"v":"Onions","f":null},{"v":1,"f":null}]},
        {"c":[{"v":"Olives","f":null},{"v":1,"f":null}]},
        {"c":[{"v":"Zucchini","f":null},{"v":1,"f":null}]},
        {"c":[{"v":"Pepperoni","f":null},{"v":2,"f":null}]}
      ]
}';*/
		echo $json;

/*		$json = '{
				  "cols": [
				        {"id":"","label":"Report","pattern":"","type":"string"},
				 ';

		
		foreach($jsonData as $row)
			{
				$parties = explode(',',$row['partyname']);
				$shortname = explode(',',$row['shortname']);
				//echo count($parties);
				//print_r($parties);
				for($j=0;$j<count($parties);$j++)
					{
						$json .= '{"id":"","label":"'.$shortname[$j].'","pattern":"","type":"number"},
				         {"id":"","label":"'.$shortname[$j].'","role":"annotation","type":"number"}';
				        if($j < count($parties)-1)
				        	{
				         		$json .= ',';
				         	}
					}

			}
				$json .= '
				      ],
				  "rows": [
				  ';
			$i = 0;
			foreach($jsonData as $row)
			{
				
				$json .= '{"c":[{"v":"'.$row['year'].'","f":null},';
				//$parties = explode(',',$row['partyname']);
				$seats = explode(',',$row['seats']);
				for($j=0;$j<count($parties);$j++)
					{
						
						$json.='{"v":'.$seats[$j].',"f":null},{"v":'.$seats[$j].',"f":null}';
						if($j < count($parties)-1)
				        	{
				         		$json .= ',';
				         	}
													
					}	
				if($i < count($jsonData)-1)
		        	{
		         		$json .= ']},';
		         	}
		         	else
		         	{
		         		$json .= ']}';
		         	}
		        $i++;

			}
				$json .= ']}';
		echo $json;

*/
		//$this->load->view('english/views/ap/state_chart');
	}

	function state_json()
	{
		
			exec('curl http://192.168.150.157/elections-2018/telangana/pre_result_json_by_state/telangana');
			exec('curl http://192.168.150.157/elections-2018/telangana/vote_share_json_state/telangana');
		
	}

	function district_json()
	{
		$district = $this->Andhra_pradeshm->get_all_district();
		foreach($district as $row)
		{
			$dist = strtolower(str_ireplace(' ', '-', $row['engname']));
			echo $dist.'<br>';
			exec('curl http://192.168.150.157/elections-2018/telangana/pre_result_json_by_district/'.$dist);
			exec('curl http://192.168.150.157/elections-2018/telangana/pre_all_result_json_by_district/'.$dist);
		}
	}

	function const_json()
	{
		$const = $this->Andhra_pradeshm->get_all_const();
		foreach($const as $row)
		{
			$const = strtolower(str_ireplace(' ', '-', $row['engname']));
			echo $const.'<br>';
			exec('curl http://192.168.150.157/elections-2018/telangana/pre_result_json_by_const/'.$const);
		}
	}

	function graph()
	{
		
		$this->load->view('common/header');
		$this->load->view('english/views/ap/state_chart');
		$this->load->view('common/footer');	
	}


	function sidebar($blockn='')
	{
		if($blockn == "schedule"){
			$data['block'] =  'schedule';
		}else {
			$data['block'] =  'ALL';
		}
			
		$data['election_data'] = $this->Andhra_pradeshm->get_election_schedule();		
		$data['star_candidate'] = $this->Andhra_pradeshm->get_star_candidate();
		$data['candidate_details_side'] = $this->Andhra_pradeshm->get_all_candidate_details();
		$data['campaigners_details'] = $this->Andhra_pradeshm->get_campaigners_details('');
		$data['campaigns_data'] = $this->Andhra_pradeshm->get_campaigns_data();
		$this->load->view('common/sidebar_header');
		$this->load->view('common/sidebar_1',$data);
		$this->load->view('common/sidebar_footer');	
		
	}


	
}
?>