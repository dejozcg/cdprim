<?php

class Kategorije_model extends CI_Model{
    
    public function __construct()
    {
        $this->load->model('Users_model');
        if(!$this->Users_model->isLoggedIn())
        redirect('login');
    }
    
    function getRows($params = array()){
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
