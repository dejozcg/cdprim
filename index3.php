<?php
//index.php
 
include "db.php";
include "funkcije.php";
// require_once('db.php');
// require_once('funkcije.php'); 
 
?>
<!DOCTYPE html>
<html>
 <head>
  <title>How to Upload a File using Dropzone.js with PHP</title>
  <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">

  <!-- Optional theme -->
  <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap-theme.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>        
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/dropzone.css" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/dropzone.js"></script>
  <script>
    Dropzone.autoDiscover = false;
  </script>

  <style>
    html, body {
      height: 100%;
    }
    #actions {
      margin: 2em 0;
    }


    /* Mimic table appearance */
    div.table {
      display: table;
    }
    div.table .file-row {
      display: table-row;
    }
    div.table .file-row > div {
      display: table-cell;
      vertical-align: top;
      border-top: 1px solid #ddd;
      padding: 8px;
    }
    div.table .file-row:nth-child(odd) {
      background: #f9f9f9;
    }



    /* The total progress gets shown by event listeners */
    #total-progress {
      opacity: 0;
      transition: opacity 0.3s linear;
    }

    /* Hide the progress bar when finished */
    #previews .file-row.dz-success .progress {
      opacity: 0;
      transition: opacity 0.3s linear;
    }

    /* Hide the delete button initially */
    #previews .file-row .delete {
      display: none;
    }

    /* Hide the start and cancel buttons and show the delete button */

    #previews .file-row.dz-success .start,
    #previews .file-row.dz-success .cancel {
      display: none;
    }
    #previews .file-row.dz-success .delete {
      display: block;
    }


  </style>
 </head>
 <body>
  <div class="container">
 
   
 <!-- HTML heavily inspired by http://blueimp.github.io/jQuery-File-Upload/ -->
  <div class="table table-striped" class="files" id="previews">

<div id="template" class="file-row">
  <!-- This is used as the file preview template -->
  <div>
      <span class="preview"><img data-dz-thumbnail /></span>
  </div>
  <div>
      <p class="name" data-dz-name></p>
      <strong class="error text-danger" data-dz-errormessage></strong>
  </div>
  <div>
      <p class="size" data-dz-size></p>
      <div class="progress progress-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0">
        <div class="progress-bar progress-bar-success" style="width:0%;" data-dz-uploadprogress></div>
      </div>
  </div>
  <div>
    <button class="btn btn-primary start">
        <i class="glyphicon glyphicon-upload"></i>
        <span>Start</span>
    </button>
    <button data-dz-remove class="btn btn-warning cancel">
        <i class="glyphicon glyphicon-ban-circle"></i>
        <span>Cancel</span>
    </button>
    <button data-dz-remove class="btn btn-danger delete">
      <i class="glyphicon glyphicon-trash"></i>
      <span>Delete</span>
    </button>
  </div>
</div>

 
    
   <form  id="dropzone-form" action="validator.php" method="POST" enctype="multipart/form-data">
        <div class="banner">
          <h1>Baner ili slika od DIZAJNERKE</h1>
        </div>
        <br>
        <?php findAllCategories(); ?>
        <!-- Kategorija: <input type="text" name="kategorija" class="form-group" id="" required>
        <span class="error-kategorija error">Missing Name</span> -->
        <br>
        opstina: 
        <br>
        <select id="" name="opstina">
            <option value="1">Podgorica</option>
            <option value="4">Niksic</option>
            <option value="2">Budva</option>
            <option value="3">Bar</option>
        </select>
        <span class="error-opstina error">Missing Email</span>
        <br>
        opis nepravilnosti: 
        <br>
        <textarea id="" name="opis" rows="4" cols="50" required></textarea>
        <span class="error-opis error">Missing Email</span>
        <br>


  

        <br>
        Name: <input type="text" name="name" class="form-group" id="">
        <span class="error-name error">Missing Name</span>
        <br>
        Email: <input type="email" name="email" class="form-group" id="">
        <span class="error-email error">Missing Email</span>
        <br>
        <input type="hidden" id="fajlovi" name="fajlovi">
         <!-- <button type="submit"  id="submit-all">Submit</button> -->
        
        <div id="message"></div>
        <!-- <div id="dropzone" class="dropzone"></div> -->
        <input id="submit-dropzone" class="uk-button uk-button-primary" type="submit" name="submitDropzone" value="Submit" />
        <div id="actions" class="row"> 
      <div class="col-lg-7">
        <!-- The fileinput-button span is used to style the file input field as button -->
        <span class="btn btn-success fileinput-button dz-clickable">
            <i class="glyphicon glyphicon-plus"></i>
            <span>Add files...</span>
        </span>
        <!-- <button type="submit" class="btn btn-primary start">
            <i class="glyphicon glyphicon-upload"></i>
            <span>Start upload</span>
        </button>
        <button type="reset" class="btn btn-warning cancel">
            <i class="glyphicon glyphicon-ban-circle"></i>
            <span>Cancel upload</span>
        </button> -->
      </div>

      <div class="col-lg-5">
        <!-- The global file processing state -->
        <span class="fileupload-process">
          <div id="total-progress" class="progress progress-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0">
            <div class="progress-bar progress-bar-success" style="width:0%;" data-dz-uploadprogress=""></div>
          </div>
        </span>
      </div>
      
     
  
  </div>
   </form>

   
 </body>
</html>
<link rel="stylesheet" href="./css/dropzone.min.css"> 
<script src="./js/dropzone.min.js"></script>
<script src="my-dropzone.js"></script>
<!-- <script type="text/javascript">
		Dropzone.options.gallery = {
		 
			addRemoveLinks: true,
		 
		};
	</script>
    <script>
       
    $(document).ready(function(){
        $('form').submit(function(e){
            e.preventDefault();
            $('button[type=submit], input[type=submit]').prop('disabled',true);
            $('.error').hide();
            $('#message').html('Sending....');
            // var data = $('#myForm').serialize();
            
            var form = $('#myForm')[0];
            var data = new FormData(form);
            
            console.log(data);
            $.ajax({
                type: 'POST',
                url: 'validator.php',
                data,
                processData: false,
                contentType: false,
                dataType: 'json',
                success: function(d){
                    $('button[type=submit], input[type=submit]').prop('disabled',false);
                    console.log(d);
                    if(d.success){
                        $('#message').html(d.message);
                    }else{
                        $('#message').html(d.message);
                        // if(d.errors.name){
                        //     $('.error-name').show();
                        //     $('.error-name').html(d.errors.name);
                        // }
                        // if(d.errors.email){
                        //     $('.error-email').show();
                        //     $('.error-email').html(d.errors.email);
                        // }
                    }
                    // if(!d.success){
                        // Object.entries(d).forEach(function(value, key){
                        //     console.log(value, key)
                        // });
                        //console.log(d.errors)
                    // }
                }
            })
        })
    })
   </script> -->