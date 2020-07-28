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

$post_image = $_FILES['attachment']['name'];
$post_image_temp = $_FILES['attachment']['tmp_name'];
// $attachment 

move_uploaded_file($post_image_temp, "./images/$post_image");

$upisi = insertPrijava($kategorija, $opstina, $opis, $post_image, $email, $name);
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