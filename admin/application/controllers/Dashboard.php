<?php
//require_once './core/MY_controller.php';
class Dashboard extends CI_Controller {

    public function __construct()
    {
            parent::__construct();
            $this->load->model('Dashboard_model');
            $this->load->library('Pdf');
            // $this->load->helper('url_helper');
            // $this->load->library('Ajax_pagination');
            // $this->perPage = 4;
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
        $pagename = $this->input->post('pagename');
        $group = $this->input->post('group');
        $pwithoutPL24 = $this->input->post('pwithoutPL24');
        $pwithoutPL72 = $this->input->post('pwithoutPL72');
        
        if(!empty($pagename)){
            $conditions['search']['pagename'] = $pagename;
        }
        if(!empty($group)){
            $conditions['search']['group'] = $group;
        }
        if($pwithoutPL24 == 'true'){
            $conditions['search']['pwithoutPL24'] = 'nn';
        }
        if($pwithoutPL72 == 'true'){
            $conditions['search']['pwithoutPL72'] = 'nn';
        }

        //total rows count
        $totalRec = count($this->Dashboard_model->getRows($conditions));
        
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
        $data['p_statistics'] = $this->Dashboard_model->getRows($conditions);
        
        //load the view
      //  $this->output->enable_profiler();
        $this->load->view('dashboard/ajax-pagination-data', $data, false);
    }

    public function index(){
        $data = array();

        $data['title'] = 'Dashboard';

        $data['statistic'] = $this->Dashboard_model->getRowsCount();
        $data['prijave'] = $this->Dashboard_model->getPrijave();

        // $this->output->enable_profiler();
        // $this->output->enable_profiler(true);
        $this->load->view('dashboard/dashboard_view', $data);
    }

    public function editPrijava($id){
        $data = array();

        $data['title'] = 'Edit';

        $data['prijava'] = $this->Dashboard_model->getPrijavu($id);
        $data['prijava'] = array_shift($data['prijava']);
        // echo '<pre>';
        // print_r($data['prijava']);
        // echo '</pre>';
        // $this->output->enable_profiler();
        $this->load->view('dashboard/edit_prijave_view', $data);
    }
    
    public function createPDF($id){
        $data = $this->Dashboard_model->getPrijavu($id);
        $data = array_shift($data);
        // create new PDF document
        $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

        // set document information
        $pdf->SetCreator(PDF_CREATOR);
        $pdf->SetAuthor('Dejan');
        $pdf->SetTitle($data['id']);
        $pdf->SetSubject('Moj subjekt');
        $pdf->SetKeywords('TCPDF, PDF, example, test, guide');

        // remove default header/footer
        $pdf->setPrintHeader(false);

        // set default header data
        $pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE.' 001', PDF_HEADER_STRING);

        // set header and footer fonts
        $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
        $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

        // set default monospaced font
        $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

        //set margins
        $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
        $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
        $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

        //set auto page breaks
        $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

        //set image scale factor
        $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

        //set some language-dependent strings
        //$pdf->setLanguageArray($l);

        // ---------------------------------------------------------

        // set default font subsetting mode
        $pdf->setFontSubsetting(true);

        // Set font
        // dejavusans is a UTF-8 Unicode font, if you only need to
        // print standard ASCII chars, you can use core fonts like
        // helvetica or times to reduce file size.
        // $pdf->SetFont('dejavusans', '', 14, '', true);

        // Add a page
        // This method has several options, check the source code documentation for more information.
        $pdf->AddPage('P','A4');

        // Set some content to print
        $html =  '<h1>Poštovani,</h1>
        <i>Na portal za prijavu zloupotreba pristigla je nova koja se odnosi na funkcionisanje vaše institucije. Ovim putem Vas najljubaznije molimo da istu razmotrite i da nas pisano obavijestite.</i>
        <i></i>
        <p>Pravni osnov prijave</p>
        <p>' . "{$data['kategorija']}</p>" . "
        <h2>Podnosioc prijave je naveo:</h2>
        <p>{$data['primjedba']}.</p>" . 
        "<p style='color:#CC0000;'>Prilog uz prijavu mozete preuzeti sa sledece stranice<a href='#'></a></p>";
     
        // Print text using writeHTMLCell()
        $pdf->writeHTMLCell($w=0, $h=0, $x='', $y='', $html, $border=0, $ln=1, $fill=0, $reseth=true, $align='', $autopadding=true);

        $pdf->Write(5, '', '');
        // ---------------------------------------------------------

        // Close and output PDF document
        // This method has several options, check the source code documentation for more information.
        $pdf->Output('examp.pdf', 'I');
    }

}