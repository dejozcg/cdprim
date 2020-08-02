<?php
    include "db.php";
    include "funkcije.php";
// sleep(3);
$errors = array();
$response = array();

// sleep(5);
 

$name = empty($_POST['name'])? '': $_POST['name'];
$email = empty($_POST['email'])? '': $_POST['email'];
$opstina = $_POST['opstina'];
$opis = $_POST['opis'];
$kategorija = $_POST['kategorija'];
$fajlovi = empty($_POST['fajlovi'])? '': $_POST['fajlovi'];
$fajlovi_obj = json_decode ($fajlovi);
$upisi = insertPrijava($kategorija, $opstina, $opis,  $email, $name, $fajlovi_obj);
//echo '<script>' .var_dump($upisi) . '</script>';
// var_dump($upisi);
if($upisi){
    $response['success'] = true;
    $response['message'] = 'SUCCESSED';
}else{
    $response['errors'] = $errors;
    $response['success'] = false;
    $response['message'] = 'FAIL!';
}




// if(empty($_POST['name'])){$errors['name'] = 'Name is needed!';}
// if(empty($_POST['email'])){$errors['email'] = 'Email is needed!';}



// if(!empty($errors)){
//     $response['errors'] = $errors;
//     $response['success'] = false;
//     $response['message'] = 'FAIL!';
// }else{
//     $response['success'] = true;
//     $response['message'] = 'SUCCESSED';
// }

echo json_encode($response);