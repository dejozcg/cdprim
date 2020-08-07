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

    public function show_opstine(){
        $data = array();
        
       
        //get the posts data
        $data['opstine'] = $this->Kategorije_model->getOpstine();
        
        $data['title'] = 'Opštine';

        // if($this->session->userdata('user')['role'] == 1){
        //     $gstat = $this->Kategorije_model->get_gstatistic();
        // }else{
        //     $gstat = $this->Kategorije_model->get_gstatistic($this->session->userdata('user')['user_id']);
        // }
        // $data['global'] = $gstat[0];

        //load the view
        //$this->output->enable_profiler();
        $this->load->view('opstina/opstina_view', $data);
    }

    public function createOpst(){
        
        $this->no_Admin_permition();

        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');

        $this->form_validation->set_rules(
            'naziv', 'opština',
            'trim|required|min_length[3]|is_unique[grad.naziv_gr]',
            array(
                    'required'      => 'You have not provided %s.',
                    'is_unique'     => 'Ovaj %s vec postoji.'
            )
        );

        $data = array(
            'naziv_gr' => $this->input->post('naziv')
        );
      
        if ($this->form_validation->run() === FALSE){
            $data['title'] = 'Opštine';
            $data['opstina'] = false;
            // $this->load->view('templates/header', $data);
            // $this->load->view('news/create');
            // $this->load->view('templates/footer');
            // $this->load->view('users/users_view', $data);
            $this->load->view('opstina/create_opstina_view', $data);
        }else{

            // $this->input->post('role')? $data['roleid'] = $this->input->post('role'):false;

            $a = $this->Kategorije_model->insertG($data);

            // $this->output->enable_profiler();
            $data['title'] = 'Opštine';
            //$this->output->enable_profiler();
            redirect('/opstine');
        }
    }

    public function createkat(){
        
        $this->no_Admin_permition();

        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');

        $this->form_validation->set_rules(
            'naziv', 'kategorija',
            'trim|required',
            array(
                    'required'      => 'You have not provided %s.'
            )
        );

        $this->form_validation->set_rules(
            'opis', 'kategorija',
            'trim|required',
            array(
                    'required'      => 'You have not provided %s.'
            )
        );

        $data = array(
            'naziv' => $this->input->post('naziv'),
            'opis' => $this->input->post('opis')
        );
      
        if ($this->form_validation->run() === FALSE){
            $data['title'] = 'Kategorije';
            $data['opstina'] = false;
            // $this->load->view('templates/header', $data);
            // $this->load->view('news/create');
            // $this->load->view('templates/footer');
            // $this->load->view('users/users_view', $data);
            $this->load->view('kategorije/create_kategorija_view', $data);
        }else{

            // $this->input->post('role')? $data['roleid'] = $this->input->post('role'):false;

            $a = $this->Kategorije_model->insertK($data);

            // $this->output->enable_profiler();
            $data['title'] = 'Kategorije';
            //$this->output->enable_profiler();
            redirect('/kategorije');
        }
    }

    public function no_Admin_permition(){
        if(!isset($this->session->userdata('user')['role'])){
            return redirect('/');
        }
        if($this->session->userdata('user')['role']== 2){
            return redirect('/');
        }
    return true;
    }
}