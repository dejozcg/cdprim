<?php

include "funkcije.php";
// define absolute folder path
$dest_folder = 'uploads/';

$name = empty($_POST['name'])? '': $_POST['name'];
$email = empty($_POST['email'])? '': $_POST['email'];
// $opstina = $_POST['opstina'];
// $opis = $_POST['opis'];
// $kategorija = $_POST['kategorija'];
if (!empty($_FILES)) {
	
	// if dest folder doesen't exists, create it
	if(!file_exists($dest_folder) && !is_dir($dest_folder)) mkdir($dest_folder);
	
	/**
	 *	Single File 
	 *	uploadMultiple = false
	 *	@var $_FILES['file']['tmp_name'] string, file_name
	 */
	// $tempFile = $_FILES['file']['tmp_name'];        
    // $targetFile =  $dest_folder . $_FILES['file']['name'];
    // move_uploaded_file($tempFile,$targetFile); 
    
    /**
     *  Multiple Files
     *  uploadMultiple = true
     *  @var $_FILES['file']['tmp_name'] array
     *
     */
    $cart = array();
    
    foreach($_FILES['file']['tmp_name'] as $key => $value) {
        $tempFile = $_FILES['file']['tmp_name'][$key];
        $temp = filter_filename($_FILES['file']['name'][$key], true);
        $newfilename = millitime() .  $temp;
        $targetFile =  $dest_folder. $_FILES['file']['name'][$key];
        move_uploaded_file($tempFile,$targetFile);
        $data = [
    	   "uid" => $newfilename,
           "file_name" => $_FILES['file']['name'][$key],
           'file_link' => $newfilename
        ];
        array_push($cart, $data);
    }
    
    
    header('Content-type: application/json');
    echo json_encode($cart);

    exit();

}