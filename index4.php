<!DOCTYPE html>
<?php
//index.php
 
include "db.php";
include "funkcije.php";
// require_once('db.php');
// require_once('funkcije.php'); 
 
?>
<html lang="en-US">
  <head>

	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

	<!-- Viewport -->
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />

	<title>Onyx Web Development Nuggets - DropzoneJS example with everything you will need, translations, custom preview and a powerful PHP code to handle upload/delete file</title>

    <!-- Favicons -->
 

	<!-- Fonts -->
	<link href="https://fonts.googleapis.com/css?family=Montserrat:300,500,600,700|Open+Sans" rel="stylesheet">
	
	<!-- Libraries/Plugins -->
	<link id="bootstrap-css" href="./css/bootstrap.min.css" rel="stylesheet">
	<link id="dropzone-css" href="./css/dropzone.min.css" rel="stylesheet">

	<!-- Icons Library -->
	<link id="font-awesome-css" href="./css/font-awesome.min.css" rel="stylesheet">

	<!-- Main CSS -->
	<link id="onyx-css" href="style2.css" rel="stylesheet">

</head>
<body>

	<!-- Wrapper -->
	<div class="wrapper">

		<section class="container-fluid inner-page">

			<div class="row">
			<!-- full-dark-bg -->
				<div class="col-xl-6 offset-xl-3 col-lg-6 offset-lg-3 col-md-12">

					<!-- Files section -->
				

				
    
					<form  id="dropzone-form" action="validator.php" method="POST" enctype="multipart/form-data">
						<div class="banner">
							<h1>Baner ili slika od DIZAJNERKE</h1>
						</div>
						<br>
						<?php findAllCategories(); ?>
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
						<input id="submit-dropzone" class="uk-button uk-button-primary" type="submit" name="submitDropzone" value="Submit" />
			 </form>
			 <h4 class="section-sub-title"><span>Upload</span> Your Files</h4>
			 	<form action="upload2.php" class="dropzone files-container">
						<div class="fallback">
							<input name="file" type="file" multiple />
						</div>
					</form>
					<!-- Notes -->
					<span>Only JPG, PNG, PDF, DOC (Word), XLS (Excel), PPT, ODT and RTF files types are supported.</span>
					<span>Maximum file size is 25MB.</span>

					<!-- Uploaded files section -->
					<h4 class="section-sub-title"><span>Uploaded</span> Files (<span class="uploaded-files-count">0</span>)</h4>
					<span class="no-files-uploaded">No files uploaded yet.</span>

					<!-- Preview collection of uploaded documents -->
					<div class="preview-container dz-preview uploaded-files">
						<div id="previews">
							<div id="onyx-dropzone-template">
								<div class="onyx-dropzone-info">
									<div class="thumb-container">
										<img data-dz-thumbnail />
									</div>
									<div class="details">
										<div>
											<span data-dz-name></span> <span data-dz-size></span>
										</div>
										<div class="dz-progress"><span class="dz-upload" data-dz-uploadprogress></span></div>
										<div class="dz-error-message"><span data-dz-errormessage></span></div>
										<div class="actions">
											<a href="#!" data-dz-remove><i class="fa fa-times"></i></a>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>

					<!-- Warnings -->
					<div id="warnings">
						<span>Warnings will go here!</span>
					</div>

				</div>
			</div><!-- /End row -->

		</section>

	</div>
	<!-- /Wrapper -->

	<!-- JQuery -->
	<script src="./js/jquery-1.10.2.min.js"></script>

	<!-- Dropzone JS -->
	<script src="./js/dropzone.min.js"></script>

	<!-- Main JS file -->
	<script src="./js/scripts.js"></script>

</body>
</html>