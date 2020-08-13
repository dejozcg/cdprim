<?php

class Dashboard_model extends CI_Model{
    
    public function __construct()
    {
        $this->load->model('Users_model');
        if(!$this->Users_model->isLoggedIn())
        redirect('login');
    }
    
    function getPrijave($params = array()){
        $this->db->select('p.id ,k.naziv kategorija, g.naziv_gr grad, p.primjedba, p.ime, p.email, p.datum_i, s.naziv status');
        $this->db->from('prijava p');
        $this->db->join('status s', 's.id = p.status');
        $this->db->join('kategorija k', 'k.id = p.kategorija');  
        $this->db->join('grad g', 'g.id = p.grad');
        // $this->db->where('p.status != 5');
        //filter data by user
        // if(!empty($params['search']['group'])){
        //     $this->db->where('pages_groups.groupId = ',$params['search']['group']);
        // }
        // if($this->session->userdata('user')['role'] == 2){
        //     $this->db->where('pages.userId = ',$this->session->userdata('user')['user_id']);
        // }
        //filter data by status
        if(!empty($params['search']['status'])){
            $this->db->where('p.status',$params['search']['status']);
        }
        if(!empty($params['search']['grad'])){
            $this->db->where('p.grad',$params['search']['grad']);
        }
        if(!empty($params['search']['datumod'])){
            $this->db->where('p.datum_i >=',$params['search']['datumod']);
        }
        if(!empty($params['search']['datumdo'])){
            $this->db->where('p.datum_i <=',$params['search']['datumdo']);
        }
        // //filter data by searched keywords
        // if(!empty($params['search']['pagename'])){
        //     $this->db->like('pages.fbPageName',$params['search']['pagename']);
        // }

        //set start and limit
        if(array_key_exists("start",$params) && array_key_exists("limit",$params)){
            $this->db->limit($params['limit'],$params['start']);
        }elseif(!array_key_exists("start",$params) && array_key_exists("limit",$params)){
            $this->db->limit($params['limit']);
        }
        // //get records
        // $this->db->group_by('pages.id');
        $this->db->where('p.status <> 5');
        $this->db->order_by('p.id desc');
        $query = $this->db->get();
        //return fetched data
        return $query->result_array();
        // return ($query->num_rows() > 0)?$query->result_array():array();
    }

    function getPrijavu($id){
        $this->db->select('p.id ,k.naziv kategorija, k.opis opis, g.naziv_gr grad, p.primjedba, p.datum_i, s.naziv status, s.id id_stat');
        $this->db->from('prijava p');
        $this->db->join('status s', 's.id = p.status');
        $this->db->join('kategorija k', 'k.id = p.kategorija');    
        $this->db->join('grad g', 'g.id = p.grad');
        $this->db->where("p.id= '$id'");
        
        $query = $this->db->get();
        return ($query->num_rows() > 0)?$query->result_array():array();
    }

    function getFajlove($id){
        $this->db->select('file_name, file_path');
        $this->db->from('fajlovi');
        $this->db->where("id_prijave = $id");
        
        $query = $this->db->get();
        return ($query->num_rows() > 0)?$query->result_array():array();
    }

    function getStatusi() {
        $this->db->select();
        $this->db->from('status');
        $this->db->where('id <> 5');
        $query = $this->db->get();
        return ($query->num_rows() > 0)?$query->result_array():array();
    }

    function getGradovi() {
        $this->db->select();
        $this->db->from('grad');
        $this->db->where('status = 1');
        $this->db->order_by('naziv_gr asc');
        $query = $this->db->get();
        return ($query->num_rows() > 0)?$query->result_array():array();
    }

    function updatePrijave($id, $idstat) {
		$this->db->set('status', $idstat);
		$this->db->where('id', $id);
		$this->db->update('prijava');

		return $this->db->affected_rows() > 0;
    }
    
    function getRowsCount(){
        $this->db->select('s2.id, COUNT(s2.naziv) ukupno');
        $this->db->from('prijava p');
        $this->db->join('status s2', 'p.status = s2.id ');

        //get records
        $this->db->group_by('s2.id');

        $query = $this->db->get();
        //return fetched data
        return ($query->num_rows() > 0)?$query->result_array():array();
    }

}
