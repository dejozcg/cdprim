<?php

class Prijave_model extends CI_Model{
    
    public function __construct()
    {
        $this->load->model('Users_model');
        if(!$this->Users_model->isLoggedIn())
        redirect('login');
    }
    
    function getPrijave($params = array()){
        $this->db->select('k.naziv, p.grad, p.primjedba, p.datum_i, status');
        $this->db->from('prijave p');
        $this->db->join('status s', 's.id = p.status');
        $this->db->join('kategorija k', 'k.id = p.kategorija');        
        // $this->db->where('p.status != 5');
        //filter data by user
        // if(!empty($params['search']['group'])){
        //     $this->db->where('pages_groups.groupId = ',$params['search']['group']);
        // }
        // if($this->session->userdata('user')['role'] == 2){
        //     $this->db->where('pages.userId = ',$this->session->userdata('user')['user_id']);
        // }
        // //filter data by user
        // if(!empty($params['search']['pwithoutPL24'])){
        //     $this->db->where('page_dashboard_statistic.current_posts24',0);
        // }
        // // //filter data by user
        // if(!empty($params['search']['pwithoutPL72'])){
        //     $this->db->where('page_dashboard_statistic.current_posts72',0);
        // }
        // //filter data by searched keywords
        // if(!empty($params['search']['pagename'])){
        //     $this->db->like('pages.fbPageName',$params['search']['pagename']);
        // }

        // //set start and limit
        // if(array_key_exists("start",$params) && array_key_exists("limit",$params)){
        //     $this->db->limit($params['limit'],$params['start']);
        // }elseif(!array_key_exists("start",$params) && array_key_exists("limit",$params)){
        //     $this->db->limit($params['limit']);
        // }
        // //get records
        // $this->db->group_by('pages.id');
        $this->db->order_by('p.id desc');
        $query = $this->db->get();
        //return fetched data
        return ($query->num_rows() > 0)?$query->result_array():array();
    }

    function getRows1($params = array()){
        $this->db->select();
        $this->db->from('kategorija');
        $this->db->where('isActive = 1');
    
        //get records
        $this->db->order_by('naziv asc');
        $query = $this->db->get();
        //return fetched data
        return ($query->num_rows() > 0)?$query->result_array():array();
    }
    
}
