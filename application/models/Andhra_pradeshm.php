<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Andhra_pradeshM extends CI_Model {

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
		
		$query = $this->db->query(' select a.*,(select engname from state where id = a.stateid)eng_statename,(select engname from party where id = a.partyid)eng_partyname,(select telname from state where id = a.stateid)tel_statename,(select telshortname from party where id = a.partyid)tel_partyname,count(a.partyid)as votes,(select symbolpath from party where id = a.partyid)symbol from results a where a.stateid = (select id from state where engname like "'.$state.'") and a.status=1 and a.year = 2014 and a.distid != 0 and a.constid != 0 group by a.partyid order by votes desc; ');
		return $query->result_array();
	}

	function get_seats_data_state($state)
	{
		
		//$query = $this->db->query('select a.*,group_concat(a.noofvotes order by a.status)noofvotes,(select engname from state where id = a.stateid)eng_statename,(select engname from district where id = a.distid )eng_distname,(select engname from constituency where id = a.constid)eng_constname,group_concat((select engname from party where id=a.partyid) order by a.status)eng_partyname,group_concat((select engname from candidate where id=a.candidatecode) order by a.status)eng_candidatename,(select telname from state where id = a.stateid)tel_statename,(select telname from district where id = a.distid )tel_distname,(select telname from constituency where id = a.constid)tel_constname,group_concat((select telshortname from party where id=a.partyid) order by a.status)tel_partyname,group_concat((select telname from candidate where id=a.candidatecode) order by a.status)tel_candidatename,(select noofvoters from constituency where id = a.constid)totalvotes,group_concat((select symbolpath from party where id = a.partyid) order by a.status)symbol from results a where a.stateid = (select id from state where engname like "'.$state.'") and a.year != 0 and a.year is not null and a.year = 2014  and a.distid != 0 and a.constid != 0 group by a.distid,a.constid order by a.distid,a.constid,a.noofvotes desc' );
		//$query = $this->db->query('select a.*,(select engname from state where id = a.stateid)eng_statename,(select engname from district where id = a.distid )eng_distname,(select engname from constituency where id = a.constid)eng_constname,(select engshortname from party where id=a.partyid)eng_partyname,(select engname from candidate where id=a.candidatecode)eng_candidatename,(select telname from state where id = a.stateid)tel_statename,(select telname from district where id = a.distid )tel_distname,(select telname from constituency where id = a.constid)tel_constname,(select telshortname from party where id=a.partyid)tel_partyname,(select telname from candidate where id=a.candidatecode)tel_candidatename,(select symbolpath from party where id = a.partyid)symbol from results a where a.stateid = (select id from state where engname like "'.$state.'") and a.year != 0 and a.year is not null and a.year = 2014  and a.distid != 0 and a.constid != 0  order by a.distid,a.constid,a.noofvotes desc' );
		$query = $this->db->query('select (select telname from district where id = a.distid)tel_district_name,(select engname from district where id = a.distid)eng_district_name, (select telname from constituency where id = a.constid)tel_const_name,(select telugu_candidate_name from results where constid=a.constid and distid = a.distid and status=1 and year=a.year limit 1)tel_winner_candidate_name,(select telugu_candidate_name from results where constid=a.constid and distid = a.distid and status=2 and year=a.year limit 1)tel_loser_candidate_name,(select telshortname from party where id=(select partyid from results where constid=a.constid and distid = a.distid and status=1 and year=a.year limit 1))tel_winner_party_name,(select telshortname from party where id=(select partyid from results where constid=a.constid and distid = a.distid and status=2 and year=a.year limit 1))tel_loser_party_name,(select engname from constituency where id = a.constid)eng_const_name,(select english_candidate_name from results where constid=a.constid and distid = a.distid and status=1 and year=a.year limit 1)eng_winner_candidate_name,(select english_candidate_name from results where constid=a.constid and distid = a.distid and status=2 and year=a.year limit 1)eng_loser_candidate_name,(select engshortname from party where id=(select partyid from results where constid=a.constid and distid = a.distid and status=1 and year=a.year limit 1))eng_winner_party_name,(select engshortname from party where id=(select partyid from results where constid=a.constid and distid = a.distid and status=2 and year=a.year limit 1))eng_loser_party_name,(select hindiname from constituency where id = a.constid)hindi_const_name,(select hindi_candidate_name from results where constid=a.constid and distid = a.distid and status=1 and year=a.year limit 1)hindi_winner_candidate_name,(select hindi_candidate_name from results where constid=a.constid and distid = a.distid and status=2 and year=a.year limit 1)hindi_loser_candidate_name,(select engshortname from party where id=(select partyid from results where constid=a.constid and distid = a.distid and status=1 and year=a.year limit 1))hindi_winner_party_name,(select engshortname from party where id=(select partyid from results where constid=a.constid and distid = a.distid and status=2 and year=a.year limit 1))hindi_loser_party_name,(select noofvotes from results where constid=a.constid and distid = a.distid and status=1 and year=a.year limit 1)winner_votes,(select noofvotes from results where constid=a.constid and distid = a.distid and status=2 and year=a.year limit 1)loser_votes,(select symbolpath from party where id=(select partyid from results where constid=a.constid and distid = a.distid and status=1 and year=a.year limit 1))winner_symbol,(select symbolpath from party where id=(select partyid from results where constid=a.constid and distid = a.distid and status=2 and year=a.year limit 1))loser_symbol,(select status from results where constid=a.constid and distid = a.distid and status=1 and year=a.year limit 1)winner_status,(select status from results where constid=a.constid and distid = a.distid and status=2 and year=a.year limit 1)loser_status from results a where a.year = 2014 group by a.constid,a.distid;' );
		return $query->result_array();
	}

	function get_campaigns_data_state($state)
	{
		
		$query = $this->db->query(' select a.*,(select engname from state where id = a.stateid)eng_statename,(select engname from district where id = a.distid )eng_distname,(select engname from constituency where id = a.constid )eng_constname,(select engname from party where id=a.partyid )eng_partyname,(select engname from campaigners where id = a.campainerid)eng_campaigner,(select telname from state where id = a.stateid)tel_statename,(select telname from district where id = a.distid )tel_distname,(select telname from constituency where id = a.constid )tel_constname,(select telshortname from party where id=a.partyid )tel_partyname,(select telname from campaigners where id = a.campainerid)tel_campaigner from campaigns a where a.stateid = (select id from state where engname like "'.$state.'")  order by a.campaign_date desc' );
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
		$this->db->select('a.*,(select engname from state where id = a.stateid)statename,(select telname from state where id = a.stateid)tel_statename')->from('district a');
		$this->db->like('a.engname',$district);
		$query = $this->db->get();
		return $query->row();
	}

	function get_pre_result_by_district($district)
	{
		
		$query = $this->db->query(' select a.*,(select engname from state where id = a.stateid)eng_statename,(select engname from party where id = a.partyid)eng_partyname,count(a.partyid)as votes,(select telname from state where id = a.stateid)tel_statename,(select telname from district where id = a.distid )tel_distname,(select telname from constituency where id = a.constid)tel_constname,(select telshortname from party where id=a.partyid)tel_partyname,(select telname from candidate where id=a.candidateid)tel_candidatename,(select symbolpath from party where id = a.partyid)symbol from results a where a.distid = (select id from district where engname like "'.$district.'") and a.status=1   and a.year=2014 and status =1  group by a.partyid,a.year order by a.year desc,votes desc; ');
		return $query->result_array();
	}

	function get_seats_data_distid($district)
	{
		
		$query = $this->db->query(' select a.*,group_concat(a.noofvotes order by a.status)noofvotes,(select engname from state where id = a.stateid)eng_statename,(select engname from district where id = a.distid )eng_distname,(select engname from constituency where id = a.constid)eng_constname,group_concat((select engname from party where id=a.partyid) order by a.status)eng_partyname,group_concat((select engname from candidate where id=a.candidateid) order by a.status)eng_candidatename,(select telname from state where id = a.stateid)tel_statename,(select telname from district where id = a.distid )tel_distname,(select telname from constituency where id = a.constid)tel_constname,group_concat((select telshortname from party where id=a.partyid) order by a.status)tel_partyname,group_concat((select telname from candidate where id=a.candidateid) order by a.status)tel_candidatename,(select noofvoters from constituency where id = a.constid)totalvotes,group_concat((select symbolpath from party where id = a.partyid) order by a.status)symbol from results a where a.distid = (select id from district where engname like "'.$district.'")   and a.year!=0     group by a.constid,a.year order by a.constid,a.year desc,a.noofvotes desc' );
		return $query->result_array();
	}

	function get_campaigns_data_district($district)
	{
		
		$query = $this->db->query(' select a.*,(select engname from state where id = a.stateid)eng_statename,(select engname from district where id = a.distid )eng_distname,(select engname from constituency where id = a.constid )eng_constname,(select engname from party where id=a.partyid )eng_partyname,(select engname from campaigners where id = a.campainerid)eng_campaigner,(select telname from state where id = a.stateid)tel_statename,(select telname from district where id = a.distid )tel_distname,(select telname from constituency where id = a.constid )tel_constname,(select telshortname from party where id=a.partyid )tel_partyname,(select telname from campaigners where id = a.campainerid)tel_campaigner from campaigns a where a.distid = (select id from district where engname like "'.$district.'")  order by a.campaign_date desc' );
		return $query->result_array();
	}

	function get_candidates_by_district($district)
	{
		$query  = $this->db->query('select a.telname,(select telshortname from party where id = a.partyid)party,(select symbolpath from party where id = a.partyid)symbol,(select telname from constituency where id = a.constid)const from candidate a where a.year= 2018 and a.districtid = (select id from district where engname like "'.$district.'")');
		return $query->result_array();
	}

	/*
	 ** Constituency Details
	 */

	function get_all_const()
	{
		$query = $this->db->query('select a.*,(select engname from state where id = a.stateid)eng_statename,(select telname from state where id = a.stateid)tel_statename,(select telname from district where id = a.distid)teldistname,(select engname from district where id = a.distid)eng_distname from constituency a where a.stateid = 2 and a.status = 1 group by a.distid,a.id order by teldistname,a.engname ');
		return $query->result_array();

	}

	function get_const_data($const)
	{
		$this->db->select('a.*,(select engname from state where id = a.stateid)statename,(select engname from district where id = a.distid)distname,(select telname from state where id = a.stateid)telstatename,(select telname from district where id = a.distid)teldistname')->from('constituency a');
		$this->db->like('a.engname',$const);
		$query = $this->db->get();
		return $query->row();
	}

	function get_pre_result_by_const($const)
	{
		
		$query = $this->db->query(' select a.*,(select engname from state where id = a.stateid)eng_statename,(select engname from party where id = a.partyid)eng_partyname,count(a.noofvotes)as votes ,(select telname from state where id = a.stateid)tel_statename,(select telname from district where id = a.distid )tel_distname,(select telname from constituency where id = a.constid)tel_constname,(select telshortname from party where id=a.partyid)tel_partyname,(select telname from candidate where id=a.candidatecode)tel_candidatename,(select symbolpath from party where id = a.partyid)symbol from results a where a.constid = (select id from constituency where engname like "'.$const.'" and status = 1) and a.status=1 and year !=0 group by a.partyid,year order by a.year desc,votes desc; ');
		return $query->result_array();
	}

	function get_seats_data_const($const)
	{
		
		$query = $this->db->query('  select a.*,group_concat(a.noofvotes order by a.status)noofvotes,(select engname from state where id = a.stateid)eng_statename,(select engname from district where id = a.distid )eng_distname,(select engname from constituency where id = a.constid)eng_constname,group_concat((select engname from party where id=a.partyid) order by a.status)eng_partyname,group_concat((select engname from candidate where id=a.candidatecode) order by a.status)eng_candidatename,(select telname from state where id = a.stateid)tel_statename,(select telname from district where id = a.distid )tel_distname,(select telname from constituency where id = a.constid)tel_constname,group_concat((select telshortname from party where id=a.partyid) order by a.status)tel_partyname,group_concat((select telname from candidate where id=a.candidatecode) order by a.status)tel_candidatename,(select noofvoters from constituency where id = a.constid)totalvotes,group_concat((select symbolpath from party where id = a.partyid) order by a.status)symbol from results a where a.constid = (select id from constituency where engname like "'.$const.'" and status = 1) and a.year != 0 and a.is_active = 1  group by a.constid,a.year order by a.constid,a.year desc,a.noofvotes desc' );
		return $query->result_array();
	}

	function get_campaigns_data_const($const)
	{
		
		$query = $this->db->query(' select a.*,(select engname from state where id = a.stateid)eng_statename,(select engname from district where id = a.distid )eng_distname,(select engname from constituency where id = a.constid )eng_constname,(select engname from party where id=a.partyid )eng_partyname,(select engname from campaigners where id = a.campainerid)eng_campaigner,(select telname from state where id = a.stateid)tel_statename,(select telname from district where id = a.distid )tel_distname,(select telname from constituency where id = a.constid )tel_constname,(select telshortname from party where id=a.partyid )tel_partyname,(select telname from campaigners where id = a.campainerid)tel_campaigner from campaigns a where a.constid = (select id from constituency where engname like "'.$const.'" and status = 1)  order by a.campaign_date desc' );
		return $query->result_array();
	}
	

	function get_previous_election_result($const)
	{
		
		$query = $this->db->query(' select a.*,(select engname from state where id = a.stateid)eng_statename,(select engname from party where id = a.partyid)eng_partyname,count(a.noofvotes)as votes ,(select telname from state where id = a.stateid)tel_statename,(select telname from district where id = a.distid )tel_distname,(select telname from constituency where id = a.constid)tel_constname,(select telshortname from party where id=a.partyid)tel_partyname,(select telname from candidate where id=a.candidatecode)tel_candidatename,(select symbolpath from party where id = a.partyid)symbol from results a where a.constid = (select id from constituency where engname like "'.$const.'" and status = 1)  and year !=0 and year = 2014 group by a.partyid,year order by noofvotes desc; ');
		return $query->result_array();
	}

	function get_candidate_by_const($const)
	{
		$query  = $this->db->query('select a.telname,(select telshortname from party where id = a.partyid)party,(select telname from constituency where id = a.constid)const,(select symbolpath from party where id = a.partyid)symbol from candidate a where a.year= 2018 and a.constid = (select id from constituency where engname like "'.$const.'" and status = 1) ');
		return $query->result_array();
	}


	/*
	 ** Party Details
	 */

	function get_all_party()
	{
		$this->db->select('a.*,(select engname from state where id = a.stateid)eng_statename')->from('party a');
		$this->db->group_by(array('a.stateid','a.id'));
		$query = $this->db->get();
		return $query->result_array();
	}


	function get_party_data($party,$stateid)
	{
		$this->db->select()->from('party');
		$this->db->like('engname',$party);
		$this->db->where('stateid = (select id from state where engname like "'.$stateid.'")');
		$query = $this->db->get();
		return $query->row();
	}

	function get_candidate_details_by_party($partyid,$state)
	{
		$this->db->select('a.*,(select engname from state where id = a.stateid)statename,(select engname from district where id = a.distid)distname,(select engname from constituency where id = a.constid)constname,(select engname from party where id=a.partyid )partyname,(select telname from district where id = a.distid)teldistname,(select telname from constituency where id = a.constid)telconstname')->from('candidate a');
		$this->db->like('a.partyid',$partyid);
		$this->db->where('a.stateid = (select id from state where engname like "'.$state.'")');
		$this->db->order_by('distname');
		$query = $this->db->get();
		return $query->result_array();
	}

	function get_pre_result_by_party($partyid,$state)
	{
		
		$query = $this->db->query(' select a.*,(select engname from state where id = a.stateid)statename,(select engname from party where id = a.partyid)eng_partyname,count(partyid)as votes from results a where a.partyid = "'.$partyid.'" and a.stateid = (select id from state where engname like "'.$state.'") and a.status=1 group by a.partyid,a.year order by a.year desc,votes desc; ');
		return $query->result_array();
	}
	

	function get_seats_data_by_party($partyid,$state)
	{
		
		$query = $this->db->query(' select a.*,(select engname from state where id = a.stateid)statename,(select engname from district where id = a.distid )distname,(select engname from constituency where id = a.constid)constname,group_concat((select engname from party where id=a.partyid) order by a.status)eng_partyname,group_concat((select engname from candidate where id=a.candidatecode) order by a.status)eng_candidatename,(select telname from state where id = a.stateid)tel_statename,(select telname from district where id = a.distid )tel_distname,(select telname from constituency where id = a.constid)tel_constname,group_concat((select telshortname from party where id=a.partyid) order by a.status)tel_partyname,group_concat((select telname from candidate where id=a.candidatecode) order by a.status)tel_candidatename,(select noofvoters from constituency where id = a.constid)totalvotes from results a where a.partyid = "'.$partyid.'" and a.stateid = (select id from state where engname like "'.$state.'") order by a.year desc,a.noofvotes desc' );
		return $query->result_array();
	}

	function get_campaigns_data_party($partyid,$state)
	{
		
		$query = $this->db->query(' select a.*,(select engname from state where id = a.stateid)eng_statename,(select engname from district where id = a.distid )eng_distname,(select engname from constituency where id = a.constid )eng_constname,(select engname from party where id=a.partyid )eng_partyname,(select telshortname from party where id=a.partyid )tel_partyname,(select engname from campaigners where id = a.campainerid)eng_campaigner from campaigns a where a.partyid ="'.$partyid.'" and a.stateid = (select id from state where engname like "'.$state.'") order by a.campaign_date desc' );
		return $query->result_array();
	}

	/*
	 ** Candidate Details
	 */

	function get_candidate_details($candidate)
	{
		$this->db->select('a.*,(select engname from state where id = a.stateid)statename,(select engname from district where id = a.distid )distname,(select engname from constituency where id = a.constid )constname,(select engname from party where id=a.partyid )partyname,')->from('candidate a');
		(!empty($candidate))?$this->db->like('a.engname',$candidate):'';
		$query = $this->db->get();
		return $query->row();
	}
	
	
	function get_pre_result_by_candidate($candidateid,$state)
	{
		
		$query = $this->db->query(' select a.*,(select engname from state where id = a.stateid)statename,(select engname from party where id = a.partyid)partyname,count(partyid)as votes from results a where a.candidatecode = "'.$candidateid.'" and a.stateid = (select id from state where engname like "'.$state.'") and a.status=1 group by partyname,year order by a.year desc,votes desc; ');
		return $query->result_array();
	}

	function get_seats_data_by_candidate($candidateid,$state)
	{
		
		$query = $this->db->query(' select a.*,(select engname from state where id = a.stateid)statename,(select engname from district where id = a.distid )distname,(select engname from constituency where id = a.constid)constname,group_concat((select engname from party where id=a.partyid) order by a.status)eng_partyname,group_concat((select engname from candidate where id=a.candidatecode) order by a.status)eng_candidatename,(select telname from state where id = a.stateid)tel_statename,(select telname from district where id = a.distid )tel_distname,(select telname from constituency where id = a.constid)tel_constname,group_concat((select telshortname from party where id=a.partyid) order by a.status)tel_partyname,group_concat((select telname from candidate where id=a.candidatecode) order by a.status)tel_candidatename,(select noofvoters from constituency where id = a.constid)totalvotes from results a where a.candidatecode = "'.$candidateid.'" and a.stateid = (select id from state where engname like "'.$state.'") order by a.year desc,a.noofvotes desc' );
		return $query->result_array();
	}

	function get_campaigns_data_candidate($candidateid,$state)
	{
		
		$query = $this->db->query(' select a.*,(select engname from state where id = a.stateid)eng_statename,(select engname from district where id = a.distid )eng_distname,(select engname from constituency where id = a.constid )eng_constname,(select engname from party where id=a.partyid )eng_partyname,(select engname from campaigners where id = a.campainerid)eng_campaigner from campaigns a where a.constid = (select constid from candidate where id = '.$candidateid.') and a.partyid =(select partyid from candidate where id = '.$candidateid.' ) and a.stateid = (select id from state where engname like "'.$state.'") order by a.campaign_date desc' );
		return $query->result_array();
	}
	
	/*
	 ** Campaigners Details
	 */
	function get_campaigners_details($rid)
	{
		if(!empty($rid))
		{
			$query = $this->db->query(' select a.*,(select engname from state where id = a.stateid)eng_statename,(select engname from party where id=a.partyid )eng_partyname,(select telshortname from party where id=a.partyid )tel_partyname from campaigners a where a.id in ('.$rid.')' );
		}
		else
		{
			$query = $this->db->query(' select a.*,(select engname from state where id = a.stateid)eng_statename,(select engname from party where id=a.partyid )eng_partyname,(select telshortname from party where id=a.partyid )tel_partyname from campaigners a ' );
		}
		
		return $query->result_array();
	}

	/*
	 ** Election Details
	 */

	function get_election_schedule()
	{
		
		$query = $this->db->query(' select a.*,(select engname from state where id = a.stateid)eng_statename,(select engname from district where id = a.distid )eng_distname,(select engname from constituency where id = a.constid )eng_constname from schedule a order by a.schedule desc' );
		return $query->result_array();
	}

	/*
	 ** Campaign Details
	 */

	function get_campaigns_data()
	{
		
		$query = $this->db->query(' select a.*,(select engname from state where id = a.stateid)eng_statename,(select engname from district where id = a.distid )eng_distname,(select engname from constituency where id = a.constid )eng_constname,(select engname from party where id=a.partyid )eng_partyname,(select telshortname from party where id=a.partyid )tel_partyname,(select engname from campaigners where id = a.campainerid)eng_campaigner from campaigns a  order by a.campaign_date desc,eng_statename desc' );
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
		$this->db->select('a.*,(select telshortname from party where id = a.partyid)telpartyname,(select telname from constituency where id = a.constid)telconstname')->from('candidate a')->where('a.starstatus',1)->order_by('priority_order');
		$query = $this->db->get();
		return $query->result_array();
	}

	// All Candidate  Details
	function get_all_candidate_details()
	{
		//$query = $this->db->query('select a.*,(select engname from state where id = a.stateid)statename,(select engname from district where id = a.distid )distname,(select engname from constituency where id = a.constid )constname,(select engname from party where id=a.partyid)partyname,(select telname from constituency where id = a.constid )telconstname,(select telshortname from party where id=a.partyid)telpartyname from candidate a where a.partyid is not null and a.year=2014  group by a.id,a.constid order by telconstname ');
		$query = $this->db->query('select a.imagepath,a.engname,a.telname,(select telshortname from party where id = a.partyid)party,(select symbolpath from party where id = a.partyid)symbol,(select telname from constituency where id = a.constid)const from candidate a where a.year= 2018 ');
		//$query = $this->db->query('select * from candidate_dmy3');
		
		return $query->result_array();
	}

	// General Observers

	function get_general_observers()
	{
		$query = $this->db->query('select * from generaloff_raw where mobileno is not null and mobileno != 0 ');
		return $query->result_array();
	}

	// Police Observers

	function get_police_observers()
	{
		$query = $this->db->query('select group_concat(constituency)constituency,observer,cadre,mobileno from policeobservers group by observer');
		return $query->result_array();
	}

	// ================================================ Graph Json ================================== //
	/*
	 * State Json
	  */


	function get_pre_result_json_by_state($state)
	{
		
		//$query = $this->db->query('select a.*,(select engname from state where id = a.stateid)statename,(select engname from party where id = a.partyid)partyname,count(a.partyid)as votes from results a where a.stateid = (select id from state where engname like "'.$state.'") and a.status=1 and a.year != 0 and a.year is not null group by partyname,year order by a.year desc,votes desc; ');
		$query = $this->db->query(' select year,group_concat(tel_shortname order by year desc,seats desc)shortname,group_concat(eng_partyname order by year desc,seats desc)partyname,group_concat(seats order by year desc,seats desc)seats,group_concat(color_codes order by year desc,seats desc)color_codes from  results_view_state where eng_statename like "'.$state.'" and year = 2014 and status = 1 group by eng_statename,year order by year desc,seats desc ');
		return $query->result_array();
	}


	function get_vote_share_json_by_state($state)
	{
		
		//$query = $this->db->query('select a.*,(select engname from state where id = a.stateid)statename,(select engname from party where id = a.partyid)partyname,count(a.partyid)as votes from results a where a.stateid = (select id from state where engname like "'.$state.'") and a.status=1 and a.year != 0 and a.year is not null group by partyname,year order by a.year desc,votes desc; ');
		$query = $this->db->query('select a.year,group_concat(distinct(b.telname) )partyname,group_concat(a.totalshare)voteshare from  voteshare a left join party b on b.id = a.partyid where a.stateid = (select id from state where engname like "'.$state.'") and rtype = "state" group by a.stateid,a.year  ');
		return $query->result_array();
	}

	/*
	 * District
	 */
	function get_pre_result_json_by_district($district)
	{
		
		//$query = $this->db->query('select a.*,(select engname from state where id = a.stateid)statename,(select engname from party where id = a.partyid)partyname,count(a.partyid)as votes from results a where a.stateid = (select id from state where engname like "'.$state.'") and a.status=1 and a.year != 0 and a.year is not null group by partyname,year order by a.year desc,votes desc; ');
		$query = $this->db->query('select year,group_concat(tel_shortname order by year desc,seats desc)shortname,group_concat(eng_partyname order by year desc,seats desc)partyname,group_concat(seats order by year desc,seats desc)seats,group_concat(color_codes order by year desc,seats desc)color_codes from  results_view_district where eng_distname like "'.$district.'" and year in (2014)  order by year desc,seats desc');
		return $query->result_array();
	}

	function get_pre_all_result_json_by_district($district)
	{
		
		//$query = $this->db->query('select a.*,(select engname from state where id = a.stateid)statename,(select engname from party where id = a.partyid)partyname,count(a.partyid)as votes from results a where a.stateid = (select id from state where engname like "'.$state.'") and a.status=1 and a.year != 0 and a.year is not null group by partyname,year order by a.year desc,votes desc; ');
		//$query = $this->db->query(' select year,group_concat(eng_shortname order by seats desc)shortname,group_concat(eng_partyname order by seats desc)partyname,group_concat(seats order by seats desc)seats,group_concat(color_codes order by seats desc)color_codes from  results_view where eng_constname like "'.$const.'" and year != 0 group by eng_partyname  order by seats desc');$query = $this->db->query('select eng_constname,eng_shortname,tel_shortname,sum(seats)seats from  results_view where eng_constname like "'.$const.'" and year != 0 group by eng_partyname  order by seats desc');
		$query = $this->db->query('select eng_distname,eng_shortname,tel_shortname,sum(seats)seats from  results_view_district where eng_distname like "'.$district.'" and year !=0 and status =1  group by eng_partyname order by seats desc');
		return $query->result_array();
	}

	function get_vote_share_json_by_district($district)
	{
		
		//$query = $this->db->query('select a.*,(select engname from state where id = a.stateid)statename,(select engname from party where id = a.partyid)partyname,count(a.partyid)as votes from results a where a.stateid = (select id from state where engname like "'.$state.'") and a.status=1 and a.year != 0 and a.year is not null group by partyname,year order by a.year desc,votes desc; ');
		$query = $this->db->query('select a.year,group_concat(distinct(b.shortname) order by a.year desc)partyname,group_concat(a.totalshare order by a.year desc)voteshare from  voteshare a left join party b on b.id = a.partyid where a.distid = (select id from district where engname like "'.$district.'") and rtype = "district" group by a.stateid,a.year desc order by a.year desc;');
		return $query->result_array();
	}

	/*
	 * Constituency
	 */
	function get_pre_result_json_by_const($const)
	{
		
		//$query = $this->db->query('select a.*,(select engname from state where id = a.stateid)statename,(select engname from party where id = a.partyid)partyname,count(a.partyid)as votes from results a where a.stateid = (select id from state where engname like "'.$state.'") and a.status=1 and a.year != 0 and a.year is not null group by partyname,year order by a.year desc,votes desc; ');
		//$query = $this->db->query(' select year,group_concat(eng_shortname order by seats desc)shortname,group_concat(eng_partyname order by seats desc)partyname,group_concat(seats order by seats desc)seats,group_concat(color_codes order by seats desc)color_codes from  results_view where eng_constname like "'.$const.'" and year != 0 group by eng_partyname  order by seats desc');
		$query = $this->db->query('select eng_constname,eng_shortname,tel_shortname,sum(seats)seats from  results_view where eng_constname like "'.$const.'" and year != 0  and status =1 group by eng_partyname  order by seats desc');
		return $query->result_array();
	}

	/*
	 * Party
	 */
	function get_pre_result_json_by_party($party)
	{
		
		//$query = $this->db->query('select a.*,(select engname from state where id = a.stateid)statename,(select engname from party where id = a.partyid)partyname,count(a.partyid)as votes from results a where a.stateid = (select id from state where engname like "'.$state.'") and a.status=1 and a.year != 0 and a.year is not null group by partyname,year order by a.year desc,votes desc; ');
		//$query = $this->db->query(' select year,group_concat(eng_shortname order by year desc,seats desc)shortname,group_concat(eng_partyname order by year desc,seats desc)partyname,group_concat(seats order by year desc,seats desc)seats,group_concat(color_codes order by year desc,seats desc)color_codes from  results_view where eng_partyname like "'.$party.'" group by year  order by year desc,seats desc');
		//echo $party;
		$query = $this->db->query('select a.year,a.stateid,(select engname from state where id = a.stateid)statename,(select engname from party where id = a.partyid)eng_partyname,count(partyid)as votes from results a where a.partyid = (select id from party where engname like "'.$party.'") and a.status=1 group by a.partyid,a.year order by a.year desc,votes desc;');
		return $query->result_array();
	}
	
}



?>