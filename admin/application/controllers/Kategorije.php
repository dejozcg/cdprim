<?php
//require_once './core/MY_controller.php';
class Kategorije extends CI_Controller {

    public function __construct()
    {
            parent::__construct();
            $this->load->model('Kategorije_model');
            // $this->load->helper('url_helper');
            // $this->load->library('Ajax_pagination');
            // $this->perPage = 4;
    }

    public function index(){
        $data = array();
        
       
        //get the posts data
        $data['kategorije'] = $this->Kategorije_model->getRows();
        
        $data['title'] = 'Kategorije';

        // if($this->session->userdata('user')['role'] == 1){
        //     $gstat = $this->Kategorije_model->get_gstatistic();
        // }else{
        //     $gstat = $this->Kategorije_model->get_gstatistic($this->session->userdata('user')['user_id']);
        // }
        // $data['global'] = $gstat[0];

        //load the view
        //$this->output->enable_profiler();
        $this->load->view('kategorije/kategorije_view', $data);
    }
}