<?php
/*
 ** Controller - Ajax 
 **	Model - AjaxM
 ** Developer - Srikanth
*/

defined('BASEPATH') OR exit('No direct script access allowed');

class AjaxM extends CI_Model {
	
	

	function get_district_details($district){
		$this->db->select('a.*,(select telname from state where id=a.stateid)stelname,(select engname from state where id=a.stateid)sengname,(select hindiname from state where id=a.stateid)shindiname')->from('district a');
		$this->db->like('a.engname',$district);
		$query = $this->db->get();
		return $query->row();
	}

	function get_prev_election_data($district){
		$this->db->select('a.*')->from('previous_elections a');
		$this->db->where('a.districtid','(select id from district where engname ="'.$district.'")');
		$query = $this->db->query('select * from previous_elections where districtid = (select id from district where engname ="'.$district.'" ) order by year desc');
		return $query->result_array();
	}

	function get_seats_data($stateid,$partycode,$year)
	{
		
		$query = $this->db->query(' select a.*,(select shortname from state where id = a.stateid)statename,(select shortname from district where id = a.distid)distname,(select shortname from parties where id = "'.$partycode.'")partyname from constituency a where a.id in (select constcode from pre_results where stateid = "'.$stateid.'" and partycode = "'.$partycode.'" and year= "'.$year.'") and a.stateid="'.$stateid.'" ');
		return $query->result_array();
	}

	function get_seats_data_distid($stateid,$partycode,$year,$distid)
	{
		
		$query = $this->db->query(' select a.*,(select shortname from state where id = a.stateid)statename,(select shortname from district where id = a.distid)distname,(select shortname from parties where id = "'.$partycode.'")partyname from constituency a where a.id in (select constcode from pre_results where stateid = "'.$stateid.'" and partycode = "'.$partycode.'" and year= "'.$year.'" and distid= "'.$distid.'") and a.stateid="'.$stateid.'" ');
		return $query->result_array();
	}
	
}



?>