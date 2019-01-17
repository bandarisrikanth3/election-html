<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Results extends CI_Controller {
	
	function __construct(){
		parent::__construct();
		$this->load->library('javascript');
		$this->load->library('session');
		$this->load->library('pagination');
		$this->load->helper('url');
		$this->load->model('Resultsm');
	}

	
	function index($block = '')
	{

		$data['block'] = $block;
		$this->load->view('common/sidebar_header');
		$this->load->view('english/views/results/home1',$data);
		$this->load->view('common/sidebar_footer');	
	}

	/*
	 ** State View
	 */

	function home($block = '')
	{
		
		if(empty($block))
		{
			$data['block'] = 'all';
		}
		else
		{
			if($block == 'result')
			{
				$data['nav'] = 1;
			}
			else
			{

				$data['nav'] = 2;
			}
			$data['block'] = $block;
		}

		$data['results1'] = $this->Resultsm->get_all_results_data('telangana');
		$data['results2'] = $this->Resultsm->get_all_results_data('chhattisgarh');
		$data['results3'] = $this->Resultsm->get_all_results_data('madhya pradesh');
		$data['results4'] = $this->Resultsm->get_all_results_data('rajasthan');
		$data['results5'] = $this->Resultsm->get_all_results_data('mizoram');

		$data['winner_list'] = $this->Resultsm->get_all_winner_list('telangana');
		$this->results_json('telangana');

		$this->load->view('common/sidebar_header',$data);
		$this->load->view('english/views/results/home',$data);
		$this->load->view('common/sidebar_footer');	
	}


	function results_tally($block = '')
	{
		
		
		$data['block'] = 'result';
		$data['nav'] = 1;

		$data['results1'] = $this->Resultsm->get_all_results_data('telangana');
		$data['results2'] = $this->Resultsm->get_all_results_data('chhattisgarh');
		$data['results3'] = $this->Resultsm->get_all_results_data('madhya pradesh');
		$data['results4'] = $this->Resultsm->get_all_results_data('rajasthan');
		$data['results5'] = $this->Resultsm->get_all_results_data('mizoram');

		$data['winner_list'] = $this->Resultsm->get_all_winner_list('telangana');
		$this->results_json('telangana');

		$this->load->view('common/sidebar_header',$data);
		$this->load->view('english/views/results/home',$data);
		$this->load->view('common/sidebar_footer');	
	}


	function results_winners($block = '')
	{
		
			$data['block'] = 'scroll';
			$data['nav'] = 2;
	

		$data['winner_list'] = $this->Resultsm->get_all_winner_list('telangana');
		//$this->results_json('telangana');

		$this->load->view('common/sidebar_header',$data);
		$this->load->view('english/views/results/home',$data);
		$this->load->view('common/sidebar_footer');	
	}
	
	/*
	 * Results Json
	 */
	function results_json($statename){
		 header('Access-Control-Allow-Origin: *'); 
		 $statename = str_ireplace('-', ' ', $statename);
		$jsonData = $data['results1'] = $this->Resultsm->get_all_results_data($statename);
		//print_r($jsonData);
		
		$json = '{
				  "cols": [
				        {"id":"","label":"Party","pattern":"","type":"string"},
				        {"id":"","label":"Seats","pattern":"","type":"number"},				 
				        {"id":"","label":"Seats","role":"annotation","type":"string"}				 
				      ],
				  "rows": [';

				 $j = 0;
			foreach($jsonData as $row)
			{
				//$text = $row['te_partyname'] .' - '.($row["lead"]+$row["won"]);
				$text = $row["lead"]+$row["won"];
				$image ='<img src="'.base_url().$row['symbol_path'].'" width="25px" height="20px">';
				$json .= '{"c":[{"v":"'.$row['en_partyname'].'","f":null},{"v":'.($row["lead"]+$row["won"]).',"f":null},{"v":"'.$text.'","f":null}';
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
		if(!is_dir('Jsons/telangana/results'))
		{
			mkdir('Jsons/telangana/results',0777,true);
		}
		$path = 'Jsons/telangana/results/results_'.str_ireplace(' ', '-', $statename).'.json';
		$fp = fopen($path,'w+');
		fwrite($fp,$json);
		fclose($fp);
		//echo $json;
	}


	/*
	 ** constituency
	 */

	function constituency()
	{
		$this->all_const_json();		

		$data['winner_list'] = $this->Resultsm->get_all_winner_list('telangana');
		$data['results1'] = $this->Resultsm->get_all_winner_list_by_const();


		$data['candidate_details_side'] = $this->Resultsm->get_all_candidate_details();
		$data['nav'] = 1;
		$data['show'] = 1;
		
		$this->load->view('common/header',$data);
		$this->load->view('english/views/results/constituency',$data);
		$this->load->view('english/views/results/results_sidebar',$data);
		$this->load->view('common/footer');	
	
	}

	
	/*
	 * Constituency Results Json
	 */
	function const_results_json($const){
		 header('Access-Control-Allow-Origin: *'); 
		 $const = str_ireplace('_', ' ', $const);
		$jsonData = $data['results1'] = $this->Resultsm->get_all_winner_list_by_const_json($const);
		//print_r($jsonData);
		
		$json = '{
				  "cols": [
				        {"id":"","label":"Party","pattern":"","type":"string"},
				        {"id":"","label":"Seats","pattern":"","type":"number"},				 
				        {"id":"","label":"Seats","role":"annotation","type":"string"}				 
				      ],
				  "rows": [';

				 $j = 0;
			foreach($jsonData as $row)
			{
				$image ='<img src="'.base_url().$row['symbol'].'" width="25px" height="20px">';
				$json .= '{"c":[{"v":"'.$row['eng_partyname'].'","f":null},{"v":'.$row["noofvotes"].',"f":null},{"v":"'.$row["noofvotes"].'","f":null}';
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
		if(!is_dir('Jsons/telangana/results/constituency'))
		{
			mkdir('Jsons/telangana/results/constituency',0777,true);
		}
		$path = 'Jsons/telangana/results/constituency/results_'.str_ireplace(' ', '_', $const).'.json';
		$fp = fopen($path,'w+');
		fwrite($fp,$json);
		fclose($fp);
		echo $json;
	}


	function all_const_json()
	{
		$const = ["boath","adilabad","kothagudem","pinapaka","aswaraopeta","bhadrachelam","yellandu","secundrabad","musheerabad","sanathnagar","nampally","goshamahal","khairatabad","amberpet","jubileehills","karwan","malakpet","chandrayangutta","yakutpura","charminar","bahdurpura","cantonment","dharmapuri","koratla","jagtial","ghanpur_station","jangaon","palakurthi","bhupalpally","mulug","alampur","gadwal","jukkal","yellareddy","kamareddy","manakondur","choppadandi","huzurabad","karimnagar","madira","sathupalle","palair","wyra","khammam","sirpur","asifabad","dornakal","mahbubabad","jadcherla","makthal","narayanpet","devarkadra","mahabubnagar","chennur","bellampalli","mancherial","narsapur","medak","medchal","malkajgiri","uppal","quthbullapur","kukatpally","achampet","nagarkurnool","kollapur","nakrekal","nalgonda","nagarjunasagar","munugode","devarakonda","miryalguda","khanapur","mudhole","nirmal","balkonda","armur","bodhan","nizamabad_rural","banswada","nizamabad_urban","manthani","ramagundam","peddapalle","vemulawada","sircilla","chevella","ibrahimpatnam","maheshwaram","rajendranagar","serilingampally","lalbahadurnagar","kalwakurthy","shadnagar","andole","zahirabad","sangareddy","narayankhed","patancheru","husnabad","dubbak","gajwel","siddipet","thungathurthi","kodad","suryapet","huzurnagar","vikarabad","pargi","tandur","kodangal","wanaparthy","parkal","narsampet","wardhanapet","warangal_west","warangal_east","alair","bhongir"];
		//echo count($const);
		for($i=0;$i<count($const);$i++)
		{
			//echo $const[$i].'<br>';
			 exec('curl http://192.168.150.157/elections-2018/results/const_results_json/'.$const[$i]);

		}

	}



	
}
?>