<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once dirname(__FILE__) . '/tcpdf/tcpdf.php';
class Pdf extends TCPDF {
    
//Page header
// public function Header() {
//     // Logo
//     $image_file = 'test.jpg';
//     $this->Image($image_file, 10, 10, 40, '', 'JPG', '', 'T', false, 300, '', false, false, 0, false, false, false);
//     // Set font
//     $this->SetFont('helvetica', '', 8);
//     // Title
//     $this->Cell(100, 150, 'Ambasada Britanije', 0, false, 'C', 0, '', 0, false, 'M', 'M');
// }

// // Page footer
// public function Footer() {
//     // Position at 15 mm from bottom
//     $this->SetY(-15);
//     // Set font
//     $this->SetFont('helvetica', 'I', 8);
//     // Page number
//     $this->Cell(0, 10, 'Page '.$this->getAliasNumPage().'/'.$this->getAliasNbPages(), 0, false, 'C', 0, '', 0, false, 'T', 'M');
// }
}