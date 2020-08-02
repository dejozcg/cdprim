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

//provjera da li sql query vrati gresku
function confirmQuery($result) {
    global $conn;
    if(!$result){
        return false;
        //die('QUERY FAILED' . mysqli_error($conn));
    }
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
    $query = "SELECT * FROM kategorija";
    $select_categories = mysqli_query($conn, $query);
    echo "<select id='' name='kategorija'>";
    while ($row = mysqli_fetch_assoc($select_categories)){
        $cat_id = $row['id'];
        $cat_title = $row['naziv'];
        $cat_opis = $row['opis'];
        echo "<option title='$cat_opis' value='$cat_id'>$cat_title</option>";
    }
    echo "</select>";
}

function deleteCategories() {
    if(isset($_GET['delete'])){
        if(isset($_SESSION['user_role'])){
        global $conn;
        $the_cat_id = mysqli_real_escape_string($conn, $_GET['delete']);
        $query = "DELETE FROM categories WHERE cat_id = {$the_cat_id}";
        $delete_categories = mysqli_query($conn, $query);
        header("Location: categories.php");
        }
    }
}

// select count-a za tabele kod ispisivanja na Dasboard
function selectCountTable($table){
    global $conn;

    $query = "SELECT * FROM {$table}";
    $query_count = mysqli_query($conn, $query);
    $result = mysqli_num_rows($query_count);
    confirmQuery($result);
    return $result;
}

// select count-a za chart kod ispisivanja na Dasboard
function selectTableColomn($tablee, $colomn, $value){
    global $conn;

    $query = "SELECT * FROM $tablee WHERE $colomn = '{$value}'";
    $query_select = mysqli_query($conn, $query);
    $result = mysqli_num_rows($query_select);
    return $result;     
}

//Provjera da li je user prijavljen kao admin
function is_admin($username) {

    global $conn; 

    $query = "SELECT user_role FROM users WHERE username = '$username'";
    $result = mysqli_query($conn, $query);
    confirmQuery($result);

    $row = mysqli_fetch_array($result);

    if($row['user_role'] == 'admin'){
        return true;
    }else {
        return false;
    }
}

//provjera da li postoji username prilikom registracije novog korisnika
function username_exist($username){
    global $conn;
    $query = "SELECT * FROM users WHERE username = '$username'";
    $chack_username = mysqli_query($conn, $query);
    $result = mysqli_num_rows($chack_username);

    if($result > 0){
        return true;
    }else{
        return false;
    }
}
function username_exist_onUpdateProfil($username, $id){
    global $conn;
    $query = "SELECT * FROM users WHERE username = '$username' AND user_id <> $id";
    $chack_username = mysqli_query($conn, $query);
    $result = mysqli_num_rows($chack_username);

    if($result > 0){
        return true;
    }else{
        return false;
    }
}
//provjera da li postoji email prilikom registracije novog korisnika
function email_exist($email){
    global $conn;
    $query = "SELECT * FROM users WHERE user_email = '{$email}'";
    $chack_email = mysqli_query($conn, $query);
    $result = mysqli_num_rows($chack_email);

    if($result > 0){
        return true;
    }else{
        return false;
    }
}
function email_exist_onUpdateProfil($email, $id){
    global $conn;
    $query = "SELECT * FROM users WHERE user_email = '{$email}' AND user_id <> $id";
    $chack_email = mysqli_query($conn, $query);
    $result = mysqli_num_rows($chack_email);

    if($result > 0){
        return true;
    }else{
        return false;
    }
}

// registracija korisnika
function register($username, $email, $password){
    
    global $conn;
    
    $username = mysqli_real_escape_string($conn, $username);
    $email = mysqli_real_escape_string($conn ,$email);
    $password = mysqli_real_escape_string($conn, $password);
    
    $password = password_hash($password, PASSWORD_BCRYPT, array('cost' => 10));
    
    $query = "INSERT INTO users(username, user_email, user_password, user_role) VALUES('{$username}', '{$email}', '{$password}', 'subscriber')";
    $insert_user = mysqli_query($conn, $query);
    confirmQuery($insert_user);
   
}

//prijavljivanje korisnika
function login_user($username, $password, $location, $locationForWrongUnameOrPwd){
    global $conn;

    $username = trim($username);
    $password = trim($password);
   
    $username = mysqli_real_escape_string($conn, $username);
    $password = mysqli_real_escape_string($conn, $password);

    $query = "SELECT * FROM users WHERE username = '{$username}'";
    $select_user_query = mysqli_query($conn, $query);

    if(!$select_user_query){
        die("QUERY FAILED " . mysqli_error($conn));
    }
    if(mysqli_num_rows($select_user_query) <1 ){
        redirect($locationForWrongUnameOrPwd);
    }
    while($row = mysqli_fetch_array($select_user_query)){
        $db_user_id = $row['user_id'];
        $db_username = $row['username'];
        $db_user_password = $row['user_password'];
        $db_user_firstname = $row['user_firstname'];
        $db_user_lastname = $row['user_lastname'];
        $db_user_role = $row['user_role'];

        if(password_verify($password, $db_user_password)){   
            $_SESSION['user_id'] = $db_user_id;
            $_SESSION['username'] = $db_username;
            $_SESSION['firstname'] = $db_user_firstname;
            $_SESSION['lastname'] = $db_user_lastname;
            $_SESSION['user_role'] = $db_user_role;
    
            header("Location: " .$location);
        } else {
            header("Location: " .$locationForWrongUnameOrPwd);
        }
    }
}

//Provjera da li je nešto method
function ifItIsMethod($method=null){
    if($_SERVER['REQUEST_METHOD'] == strtoupper($method)){
        return true;
    }
    return false;
}

//provjera da li je logovan
function ifIsLogedIn(){
    if(isset($_SESSION['user_role'])){
        return true;
    }
        return false;
}

function chachIfisUserLogedInAndRedirect($redirectLocation){
    if(ifIsLogedIn()){
        redirect($redirectLocation);
    }
}






// ne radi mi ovo ovdje
function printPost($post_id){
    global $conn;
    $result = query("SELECT posts.post_id, posts.post_title, posts.post_author, posts.post_user, posts.post_date, posts.post_image, posts.post_content, posts.post_tags, posts.post_status, posts.post_views_count, categories.cat_id, categories.cat_title, users.user_firstname, users.user_lastname FROM posts LEFT JOIN categories on posts.category_id = categories.cat_id LEFT JOIN users on posts.post_user = users.username WHERE posts.post_id = {$post_id}");
    //$result = "SELECT posts.post_title, posts.post_author, posts.post_user, posts.post_date, posts.post_image, posts.post_content, posts.post_tags, posts.post_status, posts.post_views_count, categories.cat_id, categories.cat_title FROM posts LEFT JOIN categories on posts.category_id = categories.cat_id WHERE posts.post_id = {$post_id}";
    // $result = mysqli_query($conn, $query);
    // $result = mysqli_query($result1);
    confirmQuery($result);
    $row = mysqli_fetch_assoc($result);
    return $row;
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