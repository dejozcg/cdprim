<?php
//require_once './core/MY_controller.php';
class Dashboard extends CI_Controller {

    public function __construct()
    {
            parent::__construct();
            $this->load->model('Dashboard_model');
            $this->load->library('Pdf');
            $this->load->helper('url_helper');
            $this->load->library('Ajax_pagination');
            $this->perPage = 20;
    }

    function ajaxPaginationData(){
        $conditions = array();
        
        //calc offset number
        $page = $this->input->post('page');
        if(!$page){
            $offset = 0;
        }else{
            $offset = $page;
        }
        
        //set conditions for search
        $status = $this->input->post('status');
        $grad = $this->input->post('grad');
        $datumod = $this->input->post('datumod');
        $datumdo = $this->input->post('datumdo');
        if(!empty($status)){
            $conditions['search']['status'] = $status;
        }
        if(!empty($grad)){
            $conditions['search']['grad'] = $grad;
        }
        if(!empty($datumod)){
            $conditions['search']['datumod'] = $datumod;
        }
        if(!empty($datumdo)){
            $conditions['search']['datumdo'] = $datumdo;
        }

        //total rows count
        $totalRec = count($this->Dashboard_model->getPrijave($conditions));
        
        //pagination configuration
        $config['target']      = '#postList';
        $config['base_url']    = base_url().'dashboard/ajaxPaginationData';
        $config['total_rows']  = $totalRec;
        $config['per_page']    = $this->perPage;
        $config['link_func']   = 'searchFilter';
        $this->ajax_pagination->initialize($config);

        //set start and limit
        $conditions['start'] = $offset;
        $conditions['limit'] = $this->perPage;
        
        //get posts data
        $data['prijave'] = $this->Dashboard_model->getPrijave($conditions);
        //load the view
        // $this->output->enable_profiler();
        $this->load->view('dashboard/ajax-pagination-data', $data, false);
    }

    public function index(){
        $data = array();

        //total rows count
        $totalRec = count($this->Dashboard_model->getPrijave());

        //pagination configuration
        $config['target']      = '#postList';
        $config['base_url']    = base_url().'dashboard/ajaxPaginationData';
        $config['total_rows']  = $totalRec;
        $config['per_page']    = $this->perPage;
        $config['link_func']   = 'searchFilter';
        $this->ajax_pagination->initialize($config);

        $data['title'] = 'Dashboard';

        //get the posts data
        $data['prijave'] = $this->Dashboard_model->getPrijave(array('limit'=>$this->perPage));

        // load status ande opstine for filter
        $data['statusi'] = $this->Dashboard_model->getStatusi();
        $data['gradovi'] = $this->Dashboard_model->getgradovi();

        $data['statistic'] = $this->Dashboard_model->getRowsCount();

        // $this->output->enable_profiler();
        // $this->output->enable_profiler(true);
        $this->load->view('dashboard/dashboard_view', $data);
    }

    public function editPrijava($id){
        $data = array();

        $data['title'] = 'Edit';

        $data['prijava'] = $this->Dashboard_model->getPrijavu($id);
        $data['prijava'] = array_shift($data['prijava']);
        $data['fajlovi'] = $this->Dashboard_model->getFajlove($id);
        $data['statusi'] = $this->Dashboard_model->getStatusi();
        // $data['statusi'] = array_shift($data['statusi']);

        // echo '<pre>';
        // print_r($data['prijava']);
        // echo '</pre>';
        // $this->output->enable_profiler();
        $this->load->view('dashboard/edit_prijave_view', $data);
    }

    public function promjenaStatusa(){
        $id = $this->input->post('idprij');
        $idstat = $this->input->post('status');
        // var_dump($id);
        // var_dump($idstat);
        $this->Dashboard_model->updatePrijave($id, $idstat);
        // redirect($_SERVER['REQUEST_URI'], 'refresh'); 
        // $this->editPrijava($id);
        // redirect('/prijava' . $id);
        redirect("prijava/$id");
    }
    
    public function createPDF($id){
        $data = $this->Dashboard_model->getPrijavu($id);
        $data = array_shift($data);
        $fajlovi = $this->Dashboard_model->getFajlove($data['id']);
        // $html1 = "<pre>" . print_r($fajlovi) . "</pre>";
        $prilog = "";

        if(!empty($fajlovi)){
            foreach($fajlovi as $file){
                $prilog = $prilog . "<p>{$file['file_name']}</p>";
            }
        }         
        
        $pdf = new Pdf(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

        // set document information
        $pdf->SetCreator(PDF_CREATOR);
        $pdf->SetAuthor('Nicola Asuni');
        $pdf->SetTitle('TCPDF Example 003');
        $pdf->SetSubject('TCPDF Tutorial');
        $pdf->SetKeywords('TCPDF, PDF, example, test, guide');
        
        // set default header data
        // $pdf->SetHeaderData('test.jpg', '30', 'Britanska ambasada', "www.britanija.com\nbroj telefona");
        $pdf->setPrintHeader(false);

        // set header and footer fonts
        $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
        $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
        
        // set default monospaced font
        $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
        
        // set margins
        $pdf->SetMargins(PDF_MARGIN_LEFT, '10', PDF_MARGIN_RIGHT);
        $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
        $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
        
        // set auto page breaks
        $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
        
        // set image scale factor
        $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);
        
        // set some language-dependent strings (optional)
        if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
            require_once(dirname(__FILE__).'/lang/eng.php');
            $pdf->setLanguageArray($l);
        }
        
        // ---------------------------------------------------------
        
        // set font
        $pdf->SetFont('freesans', '', 10);
        
        // add a page
        $pdf->AddPage();
        
        // set some text to print
        // $txt = '
        // TCPDF Example 003
        
        // Custom page header and footer are defined by extending the TCPDF class and overriding the Header() and Footer() methods.
        // ';
        
        // print a block of text using Write()
        // $pdf->Write(0, $txt, '', 0, 'C', true, 0, false, false, 0);
        
        // ---------------------------------------------------------
        
        // $html1 = "<pre>" . print_r($data) . "</pre>";
        $html =  "<h1>Poštovani,</h1>
        <i>Na portal za prijavu zloupotreba u toku izbrone kampanje za Parlamentarne izbore 2020.godine, pristigla je nova prijava zbog mogućeg kršenja Zakona o finansiranju političkih subjekata i izbornih kampanja.</i>
        <i>Ovim putem Vas najljubaznije molimo da istu razmotrite i da nas pisano obavijestite o postupku po prijavi.</i>
        <p>Pravni osnov prijave: {$data['kategorija']} - <em> ({$data['opis']}) </em></p>"
         . "
         <strong>Podnosioc prijave je naveo:</strong>
        <span style='text-align:justify;'><p style='text-align:justify;'>{$data['primjedba']}.</p></span>
        <span style='text-align:justify;'><p style='text-align:justify;'>Vrijeme podnošenja prijave: {$data['datum_i']}.</p></span>";
        // "<p style='color:#CC0000;'>Prilog uz prijavu mozete preuzeti sa sledece stranice<a href='#'></a></p>";

        if(!empty($data['ime']) || !empty($data['email'])){
            if(!empty($data['ime'])){
                $html = $html . "<span style='text-align:justify;'><p style='text-align:justify;'>Ime podnosioca prijave: {$data['ime']}.</p></span>";
            }
            if(!empty($data['email'])){
                $html = $html . "<span style='text-align:justify;'><p style='text-align:justify;'>Email podnosioca prijave: {$data['email']}.</p></span>";
            }
        }
        if(!empty($prilog)){
            $html = $html . "<strong>Prilog: Uz prijavu dostavljeni su i prilozi</strong> <p>{$prilog}</p>";
        }
        
        // Print text using writeHTMLCell()
        $pdf->writeHTMLCell($w=0, $h=0, $x='', $y='', $html, $border=0, $ln=1, $fill=0, $reseth=true, $align='J', $autopadding=true);

        $pdf->Write(5, '', '');
  

  

        //Close and output PDF document
        $pdf->Output('example_003.pdf', 'I');
        
    
    }

}