<?php
    include "db.php";
    include "funkcije.php";
// sleep(3);
$errors = array();
$response = array();

// sleep(5);
if(isset($_POST['post'])) {
    // print_r($_POST);
    $url = "https://www.google.com/recaptcha/api/siteverify";
    $data = [
        'secret' => "6Lfz17cZAAAAANpPh3ayo5-6n3K5B8PUt12egQbt",
        'response' => $_POST['token'],
        // 'remoteip' => $_SERVER['REMOTE_ADDR']
    ];

    $options = array(
        'http' => array(
          'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
          'method'  => 'POST',
          'content' => http_build_query($data)
        )
      );

    $context  = stream_context_create($options);
      $response = file_get_contents($url, false, $context);

    $res = json_decode($response, true);
    if($res['success'] == true) {

        // Perform you logic here for ex:- save you data to database
          echo '<div class="alert alert-success">
                  <strong>Success!</strong> Your inquiry successfully submitted.
               </div>';
    } else {
        echo '<div class="alert alert-warning">
                  <strong>Error!</strong> You are not a human.
              </div>';
    }
}

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