<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class EnglishM extends CI_Model {

	function get_menu_by_empid($empid)
	{
		$qry = $this->db->query("select menu,title,controller,group_concat(model order by morder separator ',') as model,group_concat(modelname order by morder separator ',') as modelname from permission where empid=".$empid." and status=1 and mobile = 0 group by menu,title order by morder");
		return $qry->result_array();
	}

	function get_remarks_data($db,$empid)
	{
		$DB= $this->load->database($db,TRUE);
		$DB->select()->from('eod');
		$DB->where('empid',$empid);
		$DB->where('status',0);
		$qry = $DB->get();
		return $qry->num_rows();
	}

	function get_branchcode($branchid)
	{
		$this->db->select('branchcode')->from('branch');
		$this->db->where('branchid',$branchid);
		$query = $this->db->get();
		return $query->row()->branchcode;
	}

	/*
	 ** State Details
	 */

	function get_state_data($state)
	{
		$this->db->select()->from('state');
		$this->db->like('engname',$state);
		$query = $this->db->get();
		return $query->row();
	}

	function get_pre_result_by_state($state)
	{
		
		$query = $this->db->query(' select a.*,(select engname from state where id = a.stateid)eng_statename,(select engname from parties where id = a.partycode)eng_partyname,(select telname from state where id = a.stateid)tel_statename,(select telname from parties where id = a.partycode)tel_partyname,count(a.partycode)as votes from pre_results a where a.stateid = (select id from state where engname like "'.$state.'") and a.status=1 and a.year = 2014 and a.distid != 0 and a.constid != 0 group by a.partycode order by votes desc; ');
		return $query->result_array();
	}

	function get_seats_data_state($state)
	{
		
		$query = $this->db->query('select a.*,group_concat(a.noofvotes order by a.status)noofvotes,(select engname from state where id = a.stateid)eng_statename,(select engname from district where id = a.distid )eng_distname,(select engname from constituency where id = a.constid)eng_constname,(select engname from district where id = a.distid )hindi_distname,(select engname from constituency where id = a.constid)hindi_constname,group_concat((select engname from parties where id=a.partycode) order by a.status)eng_partyname,group_concat((select engname from candidates where id=a.candidatecode) order by a.status)eng_candidatename,(select telname from state where id = a.stateid)tel_statename,(select telname from district where id = a.distid )tel_distname,(select telname from constituency where id = a.constid)tel_constname,group_concat((select telname from parties where id=a.partycode) order by a.status)tel_partyname,group_concat((select shortname from parties where id=a.partycode) order by a.status)eng_partyname,group_concat((select telname from candidates where id=a.candidatecode) order by a.status)tel_candidatename,group_concat((select engname from candidates where id=a.candidatecode) order by a.status)hindi_candidatename,(select noofvoters from constituency where id = a.constid)totalvotes from pre_results a where a.stateid = (select id from state where engname like "'.$state.'") and a.year != 0 and a.year is not null and a.year = 2014  and a.distid != 0 and a.constid != 0 group by a.distid,a.constid order by a.distid,a.constid,a.noofvotes desc' );
		//$query = $this->db->query('select a.*,(select engname from state where id = a.stateid)eng_statename,(select engname from district where id = a.distid )eng_distname,(select engname from constituency where id = a.constid)eng_constname,(select engname from parties where id=a.partycode)eng_partyname,(select engname from candidates where id=a.candidatecode)eng_candidatename,(select telname from state where id = a.stateid)tel_statename,(select telname from district where id = a.distid )tel_distname,(select telname from constituency where id = a.constid)tel_constname,(select telname from parties where id=a.partycode)tel_partyname,(select telname from candidates where id=a.candidatecode)tel_candidatename from pre_results a where a.stateid = (select id from state where engname like "'.$state.'") and a.year != 0 and a.year is not null and a.year = 2014  and a.distid != 0 and a.constid != 0  order by a.distid,a.constid,a.noofvotes desc' );
		return $query->result_array();
	}

	function get_campaigns_data_state($state)
	{
		
		$query = $this->db->query(' select a.*,(select engname from state where id = a.stateid)eng_statename,(select engname from district where id = a.distid and stateid = a.stateid)eng_distname,(select engname from constituency where id = a.constid and stateid = a.stateid)eng_constname,(select engname from parties where id=a.partyid and stateid = a.stateid)eng_partyname,(select engname from campaigners where id = a.campainerid)eng_campaigner,(select telname from state where id = a.stateid)tel_statename,(select telname from district where id = a.distid and stateid = a.stateid)tel_distname,(select engname from constituency where id = a.constid )tel_constname,(select shortname from parties where id=a.partyid )tel_partyname,(select engname from campaigners where id = a.campainerid)tel_campaigner,(select engname from campaigners where id = a.campainerid)hindi_campaigner from campaigns a where a.stateid = (select id from state where engname like "'.$state.'")  order by a.campaign_date desc' );
		return $query->result_array();
	}

	/*
	 ** District Details
	 */


	function get_all_district()
	{
		$query = $this->db->query('select a.*,(select engname from state where id = a.stateid)eng_statename,(select telname from state where id = a.stateid)tel_statename from district a where a.stateid = 2 group by a.stateid,a.id ');
		return $query->result_array();

	}

	function get_district_data($district)
	{
		$this->db->select('a.*,(select engname from state where id = a.stateid)statename,(select telname from state where id = a.stateid)tel_statename,(select engname from state where id = a.stateid)hindi_statename')->from('district a');
		$this->db->like('a.engname',$district);
		$query = $this->db->get();
		return $query->row();
	}

	function get_pre_result_by_district($district)
	{
		
		$query = $this->db->query(' select a.*,(select engname from state where id = a.stateid)eng_statename,(select engname from parties where id = a.partycode)eng_partyname,count(a.partycode)as votes,(select telname from state where id = a.stateid)tel_statename,(select telname from district where id = a.distid )tel_distname,(select telname from constituency where id = a.constid)tel_constname,(select shortname from parties where id=a.partycode)tel_partyname,(select telname from candidates where id=a.candidatecode)tel_candidatename from pre_results a where a.distid = (select id from district where engname like "'.$district.'") and a.status=1   and a.year=2014 and status =1  group by a.partycode,a.year order by a.year desc,votes desc; ');
		return $query->result_array();
	}

	function get_seats_data_distid($district)
	{
		
		$query = $this->db->query(' select a.*,group_concat(a.noofvotes order by a.status)noofvotes,(select engname from state where id = a.stateid)eng_statename,(select engname from district where id = a.distid )eng_distname,(select engname from constituency where id = a.constid)eng_constname,group_concat((select engname from parties where id=a.partycode) order by a.status)eng_partyname,group_concat((select engname from candidates where id=a.candidatecode) order by a.status)eng_candidatename,(select telname from state where id = a.stateid)tel_statename,(select engname from district where id = a.distid )tel_distname,(select engname from constituency where id = a.constid)tel_constname,group_concat((select shortname from parties where id=a.partycode) order by a.status)tel_partyname,group_concat((select engname from candidates where id=a.candidatecode) order by a.status)tel_candidatename,(select noofvoters from constituency where id = a.constid)totalvotes from pre_results a where a.distid = (select id from district where engname like "'.$district.'")   and a.year!=0    group by a.constid,a.year order by a.constid,a.year desc,a.noofvotes desc' );
		return $query->result_array();
	}

	function get_campaigns_data_district($district)
	{
		
		$query = $this->db->query(' select a.*,(select engname from state where id = a.stateid)eng_statename,(select engname from district where id = a.distid and stateid = a.stateid)eng_distname,(select engname from constituency where id = a.constid and stateid = a.stateid)eng_constname,(select engname from parties where id=a.partyid and stateid = a.stateid)eng_partyname,(select engname from campaigners where id = a.campainerid)eng_campaigner,(select telname from state where id = a.stateid)tel_statename,(select telname from district where id = a.distid and stateid = a.stateid)tel_distname,(select telname from constituency where id = a.constid and stateid = a.stateid)tel_constname,(select shortname from parties where id=a.partyid and stateid = a.stateid)tel_partyname,(select engname from campaigners where id = a.campainerid)tel_campaigner from campaigns a where a.distid = (select id from district where engname like "'.$district.'")  order by a.campaign_date desc' );
		return $query->result_array();
	}

	function get_candidates_by_district($district)
	{
		$query  = $this->db->query('select a.engname as telname,(select shortname from parties where id = a.partycode)party,(select symbolpath from parties where id = a.partycode)symbol,(select engname from constituency where id = a.constid)const from candidates a where a.year= 2018 and a.distid = (select id from district where engname like "'.$district.'")');
		return $query->result_array();
	}

	/*
	 ** Constituency Details
	 */

	function get_all_const()
	{
		$query = $this->db->query('select a.*,(select engname from state where id = a.stateid)eng_statename,(select telname from state where id = a.stateid)tel_statename,(select telname from district where id = a.distid)teldistname from constituency a where a.stateid = 2 group by a.stateid,a.distid,a.id order by engdistrictname,engname ');
		return $query->result_array();

	}

	function get_const_data($const)
	{
		$this->db->select('a.*,(select engname from state where id = a.stateid)statename,(select engname from district where id = a.distid)distname,(select engname from state where id = a.stateid)telstatename,(select engname from district where id = a.distid)teldistname')->from('constituency a');
		$this->db->like('a.engname',$const);
		$query = $this->db->get();
		return $query->row();
	}

	function get_pre_result_by_const($const)
	{
		
		$query = $this->db->query(' select a.*,(select engname from state where id = a.stateid)eng_statename,(select engname from parties where id = a.partycode)eng_partyname,count(a.noofvotes)as votes ,(select telname from state where id = a.stateid)tel_statename,(select telname from district where id = a.distid )tel_distname,(select telname from constituency where id = a.constid)tel_constname,(select shortname from parties where id=a.partycode)tel_partyname,(select telname from candidates where id=a.candidatecode)tel_candidatename from pre_results a where a.constid = (select id from constituency where engname like "'.$const.'" and status = 1) and a.status=1 and year !=0 group by a.partycode,year order by a.year desc,votes desc; ');
		return $query->result_array();
	}

	function get_seats_data_const($const)
	{
		
		$query = $this->db->query('  select a.*,group_concat(a.noofvotes order by a.status)noofvotes,(select engname from state where id = a.stateid)eng_statename,(select engname from district where id = a.distid )eng_distname,(select engname from constituency where id = a.constid)eng_constname,group_concat((select engname from parties where id=a.partycode) order by a.status)eng_partyname,group_concat((select engname from candidates where id=a.candidatecode) order by a.status)eng_candidatename,(select telname from state where id = a.stateid)tel_statename,(select engname from district where id = a.distid )tel_distname,(select telname from constituency where id = a.constid)tel_constname,group_concat((select shortname from parties where id=a.partycode) order by a.status)tel_partyname,group_concat((select engname from candidates where id=a.candidatecode) order by a.status)tel_candidatename,(select noofvoters from constituency where id = a.constid)totalvotes from pre_results a where a.constid = (select id from constituency where engname like "'.$const.'" and status = 1) and a.year != 0   group by a.constid,a.year order by a.constid,a.year desc,a.noofvotes desc' );
		return $query->result_array();
	}

	function get_campaigns_data_const($const)
	{
		
		$query = $this->db->query(' select a.*,(select engname from state where id = a.stateid)eng_statename,(select engname from district where id = a.distid and stateid = a.stateid)eng_distname,(select engname from constituency where id = a.constid and stateid = a.stateid)eng_constname,(select engname from parties where id=a.partyid and stateid = a.stateid)eng_partyname,(select engname from campaigners where id = a.campainerid)eng_campaigner,(select telname from state where id = a.stateid)tel_statename,(select engname from district where id = a.distid and stateid = a.stateid)tel_distname,(select engname from constituency where id = a.constid and stateid = a.stateid)tel_constname,(select shortname from parties where id=a.partyid and stateid = a.stateid)tel_partyname,(select engname from campaigners where id = a.campainerid)tel_campaigner from campaigns a where a.constid = (select id from constituency where engname like "'.$const.'" and status = 1)  order by a.campaign_date desc' );
		return $query->result_array();
	}
	

	function get_previous_election_result($const)
	{
		
		$query = $this->db->query(' select a.*,(select engname from state where id = a.stateid)eng_statename,(select engname from parties where id = a.partycode)eng_partyname,count(a.noofvotes)as votes ,(select telname from state where id = a.stateid)tel_statename,(select telname from district where id = a.distid )tel_distname,(select telname from constituency where id = a.constid)tel_constname,(select shortname from parties where id=a.partycode)tel_partyname,(select telname from candidates where id=a.candidatecode)tel_candidatename from pre_results a where a.constid = (select id from constituency where engname like "'.$const.'" and status = 1)  and year !=0 and year = 2014 group by a.partycode,year order by noofvotes desc; ');
		return $query->result_array();
	}

	function get_candidates_by_const($const)
	{
		$query  = $this->db->query('select a.engname as telname,(select shortname from parties where id = a.partycode)party,(select engname from constituency where id = a.constid)const,(select symbolpath from parties where id = a.partycode)symbol from candidates a where a.year= 2018 and a.constid = (select id from constituency where engname like "'.$const.'" and status = 1) ');
		return $query->result_array();
	}

	/*
	 ** Party Details
	 */

	function get_all_parties()
	{
		$this->db->select('a.*,(select engname from state where id = a.stateid)eng_statename')->from('parties a');
		$this->db->group_by(array('a.stateid','a.id'));
		$query = $this->db->get();
		return $query->result_array();
	}


	function get_party_data($party,$stateid)
	{
		$this->db->select()->from('parties');
		$this->db->like('engname',$party);
		$this->db->where('stateid = (select id from state where engname like "'.$stateid.'")');
		$query = $this->db->get();
		return $query->row();
	}

	function get_candidate_details_by_party($partyid,$state)
	{
		$this->db->select('a.*,(select engname from state where id = a.stateid)statename,(select engname from district where id = a.distid)distname,(select engname from constituency where id = a.constid)constname,(select engname from parties where id=a.partycode )partyname,(select telname from district where id = a.distid)teldistname,(select telname from constituency where id = a.constid)telconstname')->from('candidates a');
		$this->db->like('a.partycode',$partyid);
		$this->db->where('a.stateid = (select id from state where engname like "'.$state.'")');
		$this->db->order_by('distname');
		$query = $this->db->get();
		return $query->result_array();
	}

	function get_pre_result_by_party($partyid,$state)
	{
		
		$query = $this->db->query(' select a.*,(select engname from state where id = a.stateid)statename,(select engname from parties where id = a.partycode)eng_partyname,count(partycode)as votes from pre_results a where a.partycode = "'.$partyid.'" and a.stateid = (select id from state where engname like "'.$state.'") and a.status=1 group by a.partycode,a.year order by a.year desc,votes desc; ');
		return $query->result_array();
	}
	

	function get_seats_data_by_party($partyid,$state)
	{
		
		$query = $this->db->query(' select a.*,(select engname from state where id = a.stateid)statename,(select engname from district where id = a.distid and stateid = a.stateid)distname,(select engname from constituency where id = a.constid)constname,group_concat((select engname from parties where id=a.partycode) order by a.status)eng_partyname,group_concat((select engname from candidates where id=a.candidatecode) order by a.status)eng_candidatename,(select telname from state where id = a.stateid)tel_statename,(select telname from district where id = a.distid )tel_distname,(select telname from constituency where id = a.constid)tel_constname,group_concat((select telname from parties where id=a.partycode) order by a.status)tel_partyname,group_concat((select telname from candidates where id=a.candidatecode) order by a.status)tel_candidatename,(select noofvoters from constituency where id = a.constid)totalvotes from pre_results a where a.partycode = "'.$partyid.'" and a.stateid = (select id from state where engname like "'.$state.'") order by a.year desc,a.noofvotes desc' );
		return $query->result_array();
	}

	function get_campaigns_data_party($partyid,$state)
	{
		
		$query = $this->db->query(' select a.*,(select engname from state where id = a.stateid)eng_statename,(select engname from district where id = a.distid and stateid = a.stateid)eng_distname,(select engname from constituency where id = a.constid and stateid = a.stateid)eng_constname,(select engname from parties where id=a.partyid and stateid = a.stateid)eng_partyname,(select telname from parties where id=a.partyid and stateid = a.stateid)tel_partyname,(select engname from campaigners where id = a.campainerid)eng_campaigner from campaigns a where a.partyid ="'.$partyid.'" and a.stateid = (select id from state where engname like "'.$state.'") order by a.campaign_date desc' );
		return $query->result_array();
	}

	/*
	 ** Candidate Details
	 */

	function get_candidate_details($candidate)
	{
		$this->db->select('a.*,(select engname from state where id = a.stateid)statename,(select engname from district where id = a.distid and stateid = a.stateid)distname,(select engname from constituency where id = a.constid and stateid = a.stateid)constname,(select engname from parties where id=a.partycode and stateid = a.stateid)partyname,')->from('candidates a');
		(!empty($candidate))?$this->db->like('a.engname',$candidate):'';
		$query = $this->db->get();
		return $query->row();
	}
	
	
	function get_pre_result_by_candidate($candidateid,$state)
	{
		
		$query = $this->db->query(' select a.*,(select engname from state where id = a.stateid)statename,(select engname from parties where id = a.partycode)partyname,count(partycode)as votes from pre_results a where a.candidatecode = "'.$candidateid.'" and a.stateid = (select id from state where engname like "'.$state.'") and a.status=1 group by partyname,year order by a.year desc,votes desc; ');
		return $query->result_array();
	}

	function get_seats_data_by_candidate($candidateid,$state)
	{
		
		$query = $this->db->query(' select a.*,(select engname from state where id = a.stateid)statename,(select engname from district where id = a.distid and stateid = a.stateid)distname,(select engname from constituency where id = a.constid)constname,group_concat((select engname from parties where id=a.partycode) order by a.status)eng_partyname,group_concat((select engname from candidates where id=a.candidatecode) order by a.status)eng_candidatename,(select telname from state where id = a.stateid)tel_statename,(select telname from district where id = a.distid )tel_distname,(select telname from constituency where id = a.constid)tel_constname,group_concat((select telname from parties where id=a.partycode) order by a.status)tel_partyname,group_concat((select telname from candidates where id=a.candidatecode) order by a.status)tel_candidatename,(select noofvoters from constituency where id = a.constid)totalvotes from pre_results a where a.candidatecode = "'.$candidateid.'" and a.stateid = (select id from state where engname like "'.$state.'") order by a.year desc,a.noofvotes desc' );
		return $query->result_array();
	}

	function get_campaigns_data_candidate($candidateid,$state)
	{
		
		$query = $this->db->query(' select a.*,(select engname from state where id = a.stateid)eng_statename,(select engname from district where id = a.distid and stateid = a.stateid)eng_distname,(select engname from constituency where id = a.constid and stateid = a.stateid)eng_constname,(select engname from parties where id=a.partyid and stateid = a.stateid)eng_partyname,(select engname from campaigners where id = a.campainerid)eng_campaigner from campaigns a where a.constid = (select constid from candidates where id = '.$candidateid.') and a.partyid =(select partycode from candidates where id = '.$candidateid.' ) and a.stateid = (select id from state where engname like "'.$state.'") order by a.campaign_date desc' );
		return $query->result_array();
	}
	
	/*
	 ** Campaigners Details
	 */
	function get_campaigners_details($rid)
	{
		if(!empty($rid))
		{
			$query = $this->db->query(' select a.*,(select engname from state where id = a.stateid)eng_statename,(select engname from parties where id=a.partyid)eng_partyname,(select shortname from parties where id=a.partyid )eng_shortname,(select shortname from parties where id=a.partyid )tel_partyname from campaigners a where a.id in ('.$rid.')' );
		}
		else
		{
			$query = $this->db->query(' select a.*,(select engname from state where id = a.stateid)eng_statename,(select engname from parties where id=a.partyid )eng_partyname,(select shortname from parties where id=a.partyid )eng_shortname,(select shortname from parties where id=a.partyid)tel_partyname from campaigners a ' );
		}
		
		return $query->result_array();
	}

	/*
	 ** Election Details
	 */

	function get_election_schedule()
	{
		
		$query = $this->db->query(' select a.*,(select engname from state where id = a.stateid)eng_statename,(select engname from district where id = a.distid and stateid = a.stateid)eng_distname,(select engname from constituency where id = a.constid and stateid = a.stateid)eng_constname from election_schedule a order by a.election_date desc' );
		return $query->result_array();
	}

	/*
	 ** Campaign Details
	 */

	function get_campaigns_data()
	{
		
		$query = $this->db->query(' select a.*,(select engname from state where id = a.stateid)eng_statename,(select engname from district where id = a.distid )eng_distname,(select engname from constituency where id = a.constid )eng_constname,(select engname from parties where id=a.partyid )eng_partyname,(select telname from parties where id=a.partyid )tel_partyname,(select engname from campaigners where id = a.campainerid)eng_campaigner from campaigns a  order by a.campaign_date desc,eng_statename desc' );
		return $query->result_array();
	}

	// Notification
	function get_notifications()
	{
		$this->db->select()->from('elenotifications');
		$query = $this->db->get();
		return $query->result_array();
	}

	// Star Candidate
	function get_star_candidate()
	{
		$this->db->select('a.*,(select shortname from parties where id = a.partycode)telpartyname,(select engname from constituency where id = a.constid)telconstname')->from('candidates a')->where('a.star',1);
		$query = $this->db->get();
		return $query->result_array();
	}

	// All Candidate  Details
	function get_all_candidate_details()
	{
		//$query = $this->db->query('select a.*,(select engname from state where id = a.stateid)statename,(select engname from district where id = a.distid )distname,(select engname from constituency where id = a.constid )constname,(select engname from parties where id=a.partycode)partyname,(select engname from constituency where id = a.constid )telconstname,(select shortname from parties where id=a.partycode)telpartyname from candidates a where a.partycode is not null and a.year=2014  group by a.id,a.constid order by telconstname ');

		$query = $this->db->query('select a.engname,(select shortname from parties where id = a.partycode)party,(select engname from constituency where id = a.constid)const from candidates a where a.year= 2018 ');
		//$query = $this->db->query('select * from candidate_dmy3');
		
		return $query->result_array();
	}

	// ================================================ Graph Json ================================== //
	/*
	 * State Json
	  */


	function get_pre_result_json_by_state($state)
	{
		
		//$query = $this->db->query('select a.*,(select engname from state where id = a.stateid)statename,(select engname from parties where id = a.partycode)partyname,count(a.partycode)as votes from pre_results a where a.stateid = (select id from state where engname like "'.$state.'") and a.status=1 and a.year != 0 and a.year is not null group by partyname,year order by a.year desc,votes desc; ');
		$query = $this->db->query(' select year,group_concat(eng_shortname order by year desc,seats desc)shortname,group_concat(eng_partyname order by year desc,seats desc)partyname,group_concat(seats order by year desc,seats desc)seats,group_concat(color_codes order by year desc,seats desc)color_codes from  pre_results_view_state where eng_statename like "'.$state.'" and year = 2014 and status = 1 group by eng_statename,year order by year desc,seats desc ');
		return $query->result_array();
	}


	function get_vote_share_json_by_state($state)
	{
		
		//$query = $this->db->query('select a.*,(select engname from state where id = a.stateid)statename,(select engname from parties where id = a.partycode)partyname,count(a.partycode)as votes from pre_results a where a.stateid = (select id from state where engname like "'.$state.'") and a.status=1 and a.year != 0 and a.year is not null group by partyname,year order by a.year desc,votes desc; ');
		$query = $this->db->query('select a.year,group_concat(distinct(b.shortname) )partyname,group_concat(a.totalshare)voteshare from  voteshare a left join parties b on b.id = a.partycode where a.stateid = (select id from state where engname like "'.$state.'") and rtype = "state" group by a.stateid,a.year  ');
		return $query->result_array();
	}

	/*
	 * District
	 */
	function get_pre_result_json_by_district($district)
	{
		
		//$query = $this->db->query('select a.*,(select engname from state where id = a.stateid)statename,(select engname from parties where id = a.partycode)partyname,count(a.partycode)as votes from pre_results a where a.stateid = (select id from state where engname like "'.$state.'") and a.status=1 and a.year != 0 and a.year is not null group by partyname,year order by a.year desc,votes desc; ');
		$query = $this->db->query('select year,group_concat(eng_shortname order by year desc,seats desc)shortname,group_concat(eng_partyname order by year desc,seats desc)partyname,group_concat(seats order by year desc,seats desc)seats,group_concat(color_codes order by year desc,seats desc)color_codes from  pre_results_view_district where eng_distname like "'.$district.'" and year in (2014)  order by year desc,seats desc');
		return $query->result_array();
	}

	function get_pre_all_result_json_by_district($district)
	{
		
		//$query = $this->db->query('select a.*,(select engname from state where id = a.stateid)statename,(select engname from parties where id = a.partycode)partyname,count(a.partycode)as votes from pre_results a where a.stateid = (select id from state where engname like "'.$state.'") and a.status=1 and a.year != 0 and a.year is not null group by partyname,year order by a.year desc,votes desc; ');
		//$query = $this->db->query(' select year,group_concat(eng_shortname order by seats desc)shortname,group_concat(eng_partyname order by seats desc)partyname,group_concat(seats order by seats desc)seats,group_concat(color_codes order by seats desc)color_codes from  pre_results_view where eng_constname like "'.$const.'" and year != 0 group by eng_partyname  order by seats desc');$query = $this->db->query('select eng_constname,eng_shortname,tel_shortname,sum(seats)seats from  pre_results_view where eng_constname like "'.$const.'" and year != 0 group by eng_partyname  order by seats desc');
		$query = $this->db->query('select eng_distname,eng_shortname as tel_shortname,sum(seats)seats from  pre_results_view_district where eng_distname like "'.$district.'" and year !=0 and status =1  group by eng_partyname order by seats desc');
		return $query->result_array();
	}

	function get_vote_share_json_by_district($district)
	{
		
		//$query = $this->db->query('select a.*,(select engname from state where id = a.stateid)statename,(select engname from parties where id = a.partycode)partyname,count(a.partycode)as votes from pre_results a where a.stateid = (select id from state where engname like "'.$state.'") and a.status=1 and a.year != 0 and a.year is not null group by partyname,year order by a.year desc,votes desc; ');
		$query = $this->db->query('select a.year,group_concat(distinct(b.shortname) order by a.year desc)partyname,group_concat(a.totalshare order by a.year desc)voteshare from  voteshare a left join parties b on b.id = a.partycode where a.distid = (select id from district where engname like "'.$district.'") and rtype = "district" group by a.stateid,a.year desc order by a.year desc;');
		return $query->result_array();
	}

	/*
	 * Constituency
	 */
	function get_pre_result_json_by_const($const)
	{
		
		//$query = $this->db->query('select a.*,(select engname from state where id = a.stateid)statename,(select engname from parties where id = a.partycode)partyname,count(a.partycode)as votes from pre_results a where a.stateid = (select id from state where engname like "'.$state.'") and a.status=1 and a.year != 0 and a.year is not null group by partyname,year order by a.year desc,votes desc; ');
		//$query = $this->db->query(' select year,group_concat(eng_shortname order by seats desc)shortname,group_concat(eng_partyname order by seats desc)partyname,group_concat(seats order by seats desc)seats,group_concat(color_codes order by seats desc)color_codes from  pre_results_view where eng_constname like "'.$const.'" and year != 0 group by eng_partyname  order by seats desc');
		$query = $this->db->query('select eng_constname,eng_shortname as tel_shortname,sum(seats)seats from  pre_results_view where eng_constname like "'.$const.'" and year != 0  and status =1 group by eng_partyname  order by seats desc');
		return $query->result_array();
	}

	/*
	 * Party
	 */
	function get_pre_result_json_by_party($party)
	{
		
		//$query = $this->db->query('select a.*,(select engname from state where id = a.stateid)statename,(select engname from parties where id = a.partycode)partyname,count(a.partycode)as votes from pre_results a where a.stateid = (select id from state where engname like "'.$state.'") and a.status=1 and a.year != 0 and a.year is not null group by partyname,year order by a.year desc,votes desc; ');
		//$query = $this->db->query(' select year,group_concat(eng_shortname order by year desc,seats desc)shortname,group_concat(eng_partyname order by year desc,seats desc)partyname,group_concat(seats order by year desc,seats desc)seats,group_concat(color_codes order by year desc,seats desc)color_codes from  pre_results_view where eng_partyname like "'.$party.'" group by year  order by year desc,seats desc');
		echo $party;
		$query = $this->db->query('select a.year,a.stateid,(select engname from state where id = a.stateid)statename,(select engname from parties where id = a.partycode)eng_partyname,count(partycode)as votes from pre_results a where a.partycode = (select id from parties where engname like "'.$party.'") and a.status=1 group by a.partycode,a.year order by a.year desc,votes desc;');
		return $query->result_array();
	}
	
}



?>