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

    function getRowsKat($id = null){
        $this->db->select();
        $this->db->from('kategorija');
        $this->db->where('id',$id);
    
        //get records
        $query = $this->db->get();
        //return fetched data
        return $query->result_array();
    }
 
    function getOpstine(){
        $this->db->select();
        $this->db->from('grad');
        $this->db->where('status = 1');
    
        //get records
        $this->db->order_by('naziv_gr asc');
        $query = $this->db->get();
        //return fetched data
        return ($query->num_rows() > 0)?$query->result_array():array();
    }

    public function insertG($data){
        $this->db->insert('grad', $data);
        return $this->db->insert_id();
        // if($id > 0){
        //     $name = array('1.000 > Page like', '10.000 > Page like > 1000', '100.000 > Page like > 10.000', 'Page like >100.000');
        //     for($i=0; $i<4; $i++){
        //         $data = array(
        //             'name' => $name[$i],
        //             'createDate' => date('Y-m-d h:i:s', time()),
        //             'IsActive' => true,
        //             'userId' => $id,
        //             'groupType' => 2
        //         );
        //         $this->db->insert('groups', $data);
        //     }
        // }
        // return $id;
    }
    public function insertK($data){
        $this->db->insert('kategorija', $data);
        return $this->db->insert_id();
        // if($id > 0){
        //     $name = array('1.000 > Page like', '10.000 > Page like > 1000', '100.000 > Page like > 10.000', 'Page like >100.000');
        //     for($i=0; $i<4; $i++){
        //         $data = array(
        //             'name' => $name[$i],
        //             'createDate' => date('Y-m-d h:i:s', time()),
        //             'IsActive' => true,
        //             'userId' => $id,
        //             'groupType' => 2
        //         );
        //         $this->db->insert('groups', $data);
        //     }
        // }
        // return $id;
    }

    public function delete($id){
        $this->db->set('IsActive', false);
        $this->db->where('id', $id);
        $this->db->update('kategorija');
        //$this->db->delete('users', $id);
        return $this->db->affected_rows();
    }

    public function update($data, $id, $table){
		foreach ($data as $key => $value) {
			$this->db->set($key, $value);
		}
		$this->db->where("id", $id);
		$this->db->update($table);

		return $this->db->affected_rows() > 0;
    }
    
}
