<?php

// sql injections
function escape($string){
    global $conn;
    return mysqli_real_escape_string($conn, $string);
}

// query fuknkcija
function query($query){
    global $conn;
    return mysqli_query($conn, $query);
}

// redirekcija
function redirect($location){
    header("Location: " .$location);
    exit;
}

// Insert prijave
function insertPrijava($kategorija, $grad, $primjedba,  $email = '', $ime ='', $files_array){
    
    global $conn;
    
    $kategorija = mysqli_real_escape_string($conn, $kategorija);
    $grad = mysqli_real_escape_string($conn ,$grad);
    $primjedba = mysqli_real_escape_string($conn, $primjedba);
   // $attachment = mysqli_real_escape_string($conn, $attachment);
    $email = mysqli_real_escape_string($conn, $email);
    $ime = mysqli_real_escape_string($conn, $ime);
    //$dat_i = now();
  
    $query = "INSERT INTO prijava(kategorija, grad, primjedba, email, ime, datum_i) VALUES('{$kategorija}', '{$grad}', '{$primjedba}', '{$email}', '{$ime}', now())";
    $insert_prijava = mysqli_query($conn, $query);
    $id = mysqli_insert_id($conn);
    if(is_array($files_array)){
        foreach ($files_array as $value){
            $query = "INSERT INTO fajlovi(id_prijave, file_name, file_path) VALUES('{$id}', '{$value->file_name}', '{$value->uid}')";
            mysqli_query($conn, $query);
        }
    }
    if($insert_prijava){
        return true;
    }
        return false;
   
}

function findAllCategories() {
    global $conn;
    $query = "SELECT * FROM kategorija WHERE isActive = 1 ORDER BY naziv asc";
    $select_categories = mysqli_query($conn, $query);
    echo "<option title='-' value=''>--- Izaberite kategoriju zloupotrebe</option>";
    while ($row = mysqli_fetch_assoc($select_categories)){
        $cat_id = $row['id'];
        $cat_title = $row['naziv'];
        $cat_opis = $row['opis'];
        echo "<option title='$cat_opis' value='$cat_id'>$cat_title</option>";
    }
}

function findAllOpstina() {
    global $conn;
    $query = "SELECT * FROM grad WHERE status = 1 ORDER BY naziv_gr asc";
    $select_opstina = mysqli_query($conn, $query);
    echo "<option value=''>--- Izaberite opštinu</option>";
    while ($row = mysqli_fetch_assoc($select_opstina)){
        $opst_id = $row['id'];
        $opst_title = $row['naziv_gr'];
        echo "<option value='$opst_id'>$opst_title</option>";
    }
}


?>