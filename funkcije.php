<?php
include "db.php";
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

function filter_filename($filename, $beautify=true) {
    // sanitize filename
    $filename = preg_replace(
        '~
        [<>:"/\\|?*]|            # file system reserved https://en.wikipedia.org/wiki/Filename#Reserved_characters_and_words
        [\x00-\x1F]|             # control characters http://msdn.microsoft.com/en-us/library/windows/desktop/aa365247%28v=vs.85%29.aspx
        [\x7F\xA0\xAD]|          # non-printing characters DEL, NO-BREAK SPACE, SOFT HYPHEN
        [#\[\]@!$&\'()+,;=]|     # URI reserved https://tools.ietf.org/html/rfc3986#section-2.2
        [{}^\~`]                 # URL unsafe characters https://www.ietf.org/rfc/rfc1738.txt
        ~x',
        '-', $filename);
    // avoids ".", ".." or ".hiddenFiles"
    $filename = ltrim($filename, '.-');
    // optional beautification
    if ($beautify) $filename = beautify_filename($filename);
    // maximize filename length to 255 bytes http://serverfault.com/a/9548/44086
    $ext = pathinfo($filename, PATHINFO_EXTENSION);
    $filename = mb_strcut(pathinfo($filename, PATHINFO_FILENAME), 0, 255 - ($ext ? strlen($ext) + 1 : 0), mb_detect_encoding($filename)) . ($ext ? '.' . $ext : '');
    return $filename;
}
function beautify_filename($filename) {
    // reduce consecutive characters
    $filename = preg_replace(array(
        // "file   name.zip" becomes "file-name.zip"
        '/ +/',
        // "file___name.zip" becomes "file-name.zip"
        '/_+/',
        // "file---name.zip" becomes "file-name.zip"
        '/-+/'
    ), '-', $filename);
    $filename = preg_replace(array(
        // "file--.--.-.--name.zip" becomes "file.name.zip"
        '/-*\.-*/',
        // "file...name..zip" becomes "file.name.zip"
        '/\.{2,}/'
    ), '.', $filename);
    // lowercase for windows/unix interoperability http://support.microsoft.com/kb/100625
    $filename = mb_strtolower($filename, mb_detect_encoding($filename));
    // ".file-name.-" becomes "file-name"
    $filename = trim($filename, '.-');
    return $filename;
}


function millitime() {
    $microtime = microtime();
    $comps = explode(' ', $microtime);
  
    // Note: Using a string here to prevent loss of precision
    // in case of "overflow" (PHP converts it to a double)
    return sprintf('%d%03d', $comps[1], $comps[0] * 1000);
  }
?>