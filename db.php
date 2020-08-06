<?php 
$db['db_host'] = "localhost";
$db['db_user'] = "root";
$db['db_pass'] = "";
$db['db_name'] = "prijave";

foreach($db as $key => $value){
    define(strtoupper($key), $value);
}

$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
//mysqli_set_charset($conn,"utf8");

// mysqli_close($conn);

if(!$conn){
    die("Problem sa konekcijom" . mysqli_error($conn));
}

?>