<?php
    include "funkcije.php";
// sleep(3);
$errors = array();
$response = array();

// sleep(5);
 
if(isset($_POST['g-recaptcha-response'])){
    $captcha=$_POST['g-recaptcha-response'];
  }
  if(!$captcha){
    $response['errors'] = "captcha_error";
    $response['success'] = false;
    $response['message'] = 'FAIL!';
    echo json_encode($response);
    exit;
  }
  $secretKey = "6LdGgbgZAAAAAC6ceMTmoExKLuu_cyfbYjBvegUj";
        $ip = $_SERVER['REMOTE_ADDR'];
        // post request to server
        $url = 'https://www.google.com/recaptcha/api/siteverify?secret=' . urlencode($secretKey) .  '&response=' . urlencode($captcha);
        $responseCaptcha = file_get_contents($url);
        $responseKeys = json_decode($responseCaptcha,true);
        // should return JSON with success as true
        if($responseKeys["success"]) { 

                $name = empty($_POST['name'])? '': $_POST['name'];
                $email = empty($_POST['email'])? '': $_POST['email'];
                $opstina = $_POST['opstina'];
                $opis = $_POST['opis'];
                $kategorija = $_POST['kategorija'];
                $fajlovi = empty($_POST['fajlovi'])? '': $_POST['fajlovi'];
                $fajlovi_obj = json_decode ($fajlovi);
                $upisi = insertPrijava($kategorija, $opstina, $opis,  $email, $name, $fajlovi_obj);
                if($upisi){
                    $response['success'] = true;
                    $response['message'] = 'SUCCESSED';
                } else {
                    $response['errors'] = $errors;
                    $response['success'] = false;
                    $response['message'] = 'FAIL!';
                } 
        }
        else 
        {
                $response['errors'] = "Captcha error!";
                $response['success'] = false;
                $response['message'] =  "Captcha error!";
                echo json_encode($response);
        }
 

echo json_encode($response);