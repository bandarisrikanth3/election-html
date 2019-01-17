<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class ResultsM extends CI_Model {

	function get_all_results_data($statename)
	{
		$qry = $this->db->query('select * from final_results where en_statename like "'.$statename.'" order by won desc,lead desc');
		return $qry->result_array();
	}


	function get_all_winner_list($state)
	{
		$qry = $this->db->query('select a.*,(select engname from state where id = a.stateid)eng_statename,(select engname from district where id = a.distid and status = 1)eng_distname,(select engname from constituency where id = a.constid and status = 1)eng_constname,(select shortname from parties where id=a.partycode) eng_partyname,(select engname from candidates where id=a.candidatecode and status = 1 and year = a.year)eng_candidatename,(select telname from state where id = a.stateid)tel_statename,(select telname from district where id = a.distid and status = 1)tel_distname,(select telname from constituency where id = a.constid and status = 1)tel_constname,(select telname from parties where id=a.partycode)tel_partyname,(select telname from candidates where id=a.candidatecode and status = 1 and year = a.year)tel_candidatename,(select hindiname from state where id = a.stateid)hindi_statename,(select hindiname from district where id = a.distid and status = 1)hindi_distname,(select hindiname from constituency where id = a.constid and status = 1)hindi_constname,(select shortname from parties where id=a.partycode)hindi_partyname,(select hindiname from candidates where id=a.candidatecode and status = 1 and year = a.year)hindi_candidatename,(select img_path from candidates where engname=a.english_candidate_name and year = a.year and constid=a.constid)candidate_image,(select symbolpath from parties where id = a.partycode)symbol from pre_results_dmy1 a where a.stateid = (select id from state where engname like "'.$state.'") and a.year = 2018 and (a.home_winner = 1 or a.home_looser = 1 or a.home_special =1)   order by a.constid');
		return $qry->result_array();
	}

		// All Candidate  Details
	function get_all_candidate_details()
	{
		//$query = $this->db->query('select a.*,(select engname from state where id = a.stateid)statename,(select engname from district where id = a.distid )distname,(select engname from constituency where id = a.constid )constname,(select engname from parties where id=a.partycode)partyname,(select telname from constituency where id = a.constid )telconstname,(select telname from parties where id=a.partycode)telpartyname from candidates a where a.partycode is not null and a.year=2014  group by a.id,a.constid order by telconstname ');
		$query = $this->db->query('select a.img_path,a.engname,a.telname,(select telname from parties where id = a.partycode)party,(select symbolpath from parties where id = a.partycode)symbol,(select telname from constituency where id = a.constid)const from candidates a where a.year= 2018 ');
		//$query = $this->db->query('select * from candidate_dmy3');
		
		return $query->result_array();
	}

	function get_all_winner_list_by_const()
	{
		$qry = $this->db->query('select a.*,(select engname from state where id = a.stateid)eng_statename,(select engname from district where id = a.distid )eng_distname,(select distinct(engname) from constituency where id = a.constid)eng_constname,(select shortname from parties where id=a.partycode) eng_partyname,(select engname from candidates where id=a.candidatecode)eng_candidatename,(select telname from state where id = a.stateid)tel_statename,(select telname from district where id = a.distid )tel_distname,(select  distinct(telname) from constituency where id = a.constid)tel_constname,(select telname from parties where id=a.partycode)tel_partyname,(select telname from candidates where id=a.candidatecode)tel_candidatename,(select hindiname from state where id = a.stateid)hindi_statename,(select hindiname from district where id = a.distid )hindi_distname,(select distinct(hindiname) from constituency where id = a.constid)hindi_constname,(select shortname from parties where id=a.partycode)hindi_partyname,(select hindiname from candidates where id=a.candidatecode)hindi_candidatename,(select img_path from candidates where id=a.candidatecode)candidate_image,(select symbolpath from parties where id = a.partycode)symbol from pre_results_dmy1 a where  a.year = 2018 order by a.distid,a.constid,noofvotes desc');
		return $qry->result_array();
	}


	function get_all_district()
	{
		$query = $this->db->query('select * from district where stateid = 2 order by engname');
		return $query->result_array();

	}


	function get_all_winner_list_by_const_json($const)
	{
		$qry = $this->db->query('select a.*,(select engname from state where id = a.stateid)eng_statename,(select engname from district where id = a.distid )eng_distname,(select engname from constituency where id = a.constid)eng_constname,(select shortname from parties where id=a.partycode) eng_partyname,(select engname from candidates where id=a.candidatecode)eng_candidatename,(select telname from state where id = a.stateid)tel_statename,(select telname from district where id = a.distid )tel_distname,(select telname from constituency where id = a.constid)tel_constname,(select telname from parties where id=a.partycode)tel_partyname,(select telname from candidates where id=a.candidatecode)tel_candidatename,(select hindiname from state where id = a.stateid)hindi_statename,(select hindiname from district where id = a.distid )hindi_distname,(select hindiname from constituency where id = a.constid)hindi_constname,(select shortname from parties where id=a.partycode)hindi_partyname,(select hindiname from candidates where id=a.candidatecode)hindi_candidatename,(select img_path from candidates where id=a.candidatecode)candidate_image,(select symbolpath from parties where id = a.partycode)symbol from pre_results_dmy1 a where a.constid= (select id from constituency where engname like "'.$const.'" and status = 1) and a.year = 2018 order by a.distid,a.constid');
		return $qry->result_array();
	}
	

	function get_all_const()
	{
		$query = $this->db->query('select a.*,(select engname from state where id = a.stateid)eng_statename,(select telname from state where id = a.stateid)tel_statename,(select telname from district where id = a.distid)teldistname,(select engname from district where id = a.distid)eng_distname from constituency a where a.stateid = 2 and a.status = 1 group by a.distid,a.id order by teldistname,a.engname ');
		return $query->result_array();

	}
}



?>