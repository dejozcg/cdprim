
/*

Nugget Name: Onyx - DropzoneJS example with everything you will need, translations, custom preview and a powerful PHP code to handle upload/delete file
Nugget URI: http://www.onyxdev.net/
Author: Obada Qawwas
Author URI: http://www.onyxdev.net/
Version: 1.0

*/


/************************************************************

	Main Scripts

*************************************************************/
// Show an element

 
!function ($) {

	"use strict";

	// Global Onyx object
	var Onyx = Onyx || {};


	Onyx = {

	    /**
		 * Fire all functions
		 */
		init: function() {
			var self = this,
				obj;

			for (obj in self) {
				if ( self.hasOwnProperty(obj)) {
					var _method =  self[obj];
					if ( _method.selector !== undefined && _method.init !== undefined ) {
						if ( $(_method.selector).length > 0 ) {
							_method.init();
						}
					}
				}
			}
		},


		/**
		 * Files upload
		 */
		userFilesDropzone: {
			selector: 'form.dropzone',
			init: function() {
				var base = this,
					container = $(base.selector);

				base.initFileUploader(base, 'form.dropzone');
			},
			initFileUploader: function(base, target) {
				var previewNode = document.querySelector("#onyx-dropzone-template"), // Dropzone template holder
					warningsHolder = $("#warnings"); // Warning messages' holder

				previewNode.id = "";

				var previewTemplate = previewNode.parentNode.innerHTML;
				previewNode.parentNode.removeChild(previewNode);

				var onyxDropzone = new Dropzone(target, {
					url: ($(target).attr("action")) ? $(target).attr("action") : "../../upload2.php", // Check that our form has an action attr and if not, set one here
	                maxFiles: 15,
					maxFilesize: 20,
					acceptedFiles: "image/*,application/pdf,.doc,.docx,.xls,.xlsx,.csv,.tsv,.ppt,.pptx,.pages,.odt,.rtf",
					previewTemplate: previewTemplate,
					previewsContainer: "#previews",
					clickable: true,
					autoProcessQueue : false,
					createImageThumbnails: true, 
					uploadMultiple: true,
					parallelUploads: 100, // use it with uploadMultiple
					/**
					 * The text used before any files are dropped.
					 */
					dictDefaultMessage: "Drop files here to upload.", // Default: Drop files here to upload

					/**
					 * The text that replaces the default message text it the browser is not supported.
					 */
					dictFallbackMessage: "Your browser does not support drag'n'drop file uploads.", // Default: Your browser does not support drag'n'drop file uploads.

					/**
					 * If the filesize is too big.
					 * `{{filesize}}` and `{{maxFilesize}}` will be replaced with the respective configuration values.
					 */
					dictFileTooBig: "File is too big ({{filesize}}MiB). Max filesize: {{maxFilesize}}MiB.", // Default: File is too big ({{filesize}}MiB). Max filesize: {{maxFilesize}}MiB.

					/**
					 * If the file doesn't match the file type.
					 */
					dictInvalidFileType: "You can't upload files of this type.", // Default: You can't upload files of this type.

					/**
					 * If the server response was invalid.
					 * `{{statusCode}}` will be replaced with the servers status code.
					 */
					dictResponseError: "Server responded with {{statusCode}} code.", // Default: Server responded with {{statusCode}} code.

					/**
					 * If `addRemoveLinks` is true, the text to be used for the cancel upload link.
					 */
					dictCancelUpload: "Cancel upload.", // Default: Cancel upload

					/**
					 * The text that is displayed if an upload was manually canceled
					 */
					dictUploadCanceled: "Upload canceled.", // Default: Upload canceled.

					/**
					 * If `addRemoveLinks` is true, the text to be used for confirmation when cancelling upload.
					 */
					dictCancelUploadConfirmation: "Are you sure you want to cancel this upload?", // Default: Are you sure you want to cancel this upload?

					/**
					 * If `addRemoveLinks` is true, the text to be used to remove a file.
					 */
					dictRemoveFile: "Remove file", // Default: Remove file

					/**
					 * If this is not null, then the user will be prompted before removing a file.
					 */
					dictRemoveFileConfirmation: null, // Default: null

					/**
					 * Displayed if `maxFiles` is st and exceeded.
					 * The string `{{maxFiles}}` will be replaced by the configuration value.
					 */
					dictMaxFilesExceeded: "You can not upload any more files.", // Default: You can not upload any more files.

					/**
					 * Allows you to translate the different units. Starting with `tb` for terabytes and going down to
					 * `b` for bytes.
					 */
					dictFileSizeUnits: {tb: "TB", gb: "GB", mb: "MB", kb: "KB", b: "b"},

				});

				Dropzone.autoDiscover = false;
				var submitDropzone = document.getElementById("submit-dropzone");
				submitDropzone.addEventListener("click", function(e) {
					// Make sure that the form isn't actually being sent.
					e.preventDefault();
					e.stopPropagation();
				
					if (onyxDropzone.files != "") {
						// console.log(myDropzone.files);
						//onyxDropzone.enqueueFiles(onyxDropzone.getFilesWithStatus(Dropzone.ADDED));
						onyxDropzone.processQueue();
					} else {
					// if no file submit the form    
						//document.getElementById("dropzone-form").submit();
						SendPrijava();
					}
				
				});
				onyxDropzone.on("addedfile", function(file) { 
					$('.preview-container').css('visibility', 'visible');
					file.previewElement.classList.add('type-' + base.fileType(file.name)); // Add type class for this element's preview
				});

				onyxDropzone.on("totaluploadprogress", function (progress) {

					var progr = document.querySelector(".progress .determinate");

					if (progr === undefined || progr === null) return;

					progr.style.width = progress + "%";
				});

				onyxDropzone.on('dragenter', function () {
					$(target).addClass("hover");
				});

				onyxDropzone.on('dragleave', function () {
					$(target).removeClass("hover");			
				});

				onyxDropzone.on('drop', function () {
					$(target).removeClass("hover");	
				});

				onyxDropzone.on('addedfile', function () {

					// Remove no files notice
					$(".no-files-uploaded").slideUp("easeInExpo");

				});

				onyxDropzone.on('removedfile', function (file) {

					$.ajax({
						type: "POST",
						url: ($(target).attr("action")) ? $(target).attr("action") : "../../file-upload.php",
						data: {
							target_file: file.upload_ticket,
							delete_file: 1
						}
					});

					// Show no files notice
					if ( base.dropzoneCount() == 0 ) {
						$(".no-files-uploaded").slideDown("easeInExpo");
						$(".uploaded-files-count").html(base.dropzoneCount());
					}

				});
				// onyxDropzone.on("successmultiple", function(file, response) {
				// 	// get response from successful ajax request
				// 	console.log('nakon uspjesnog requesta',JSON.stringify(response));
				// 	// submit the form after images upload
				// 	// (if u want yo submit rest of the inputs in the form)
				// 	document.getElementById("fajlovi").value = JSON.stringify(response);
				// 	document.getElementById("dropzone-form").submit();
				// });
				onyxDropzone.on("success", function(file, response) {
					console.log('nakon  requesta',JSON.stringify(response));
				//	let parsedResponse = JSON.parse(response);
				//	file.upload_ticket = parsedResponse.file_link;
					document.getElementById("fajlovi").value = JSON.stringify(response);
					//document.getElementById("dropzone-form").submit();
					SendPrijava();
					// Make it wait a little bit to take the new element
					setTimeout(function(){
						$(".uploaded-files-count").html(base.dropzoneCount());
						console.log('Files count: ' + base.dropzoneCount());
					}, 350);


					// Something to happen when file is uploaded, like showing a message
					// if ( typeof parsedResponse.info !== 'undefined' ) {
					// 	console.log(parsedResponse.info);
					// 	warningsHolder.children('span').html(parsedResponse.info);
					// 	warningsHolder.slideDown("easeInExpo");
					// }
				});
			},
			dropzoneCount: function() {
				var filesCount = $("#previews > .dz-success.dz-complete").length;
				return filesCount;
			},
			fileType: function(fileName) {
				var fileType = (/[.]/.exec(fileName)) ? /[^.]+$/.exec(fileName) : undefined;
				return fileType[0];
			}
		}
	}
	
	$(document).ready(function() {
		Onyx.init(); 
		document.getElementById('animation').style.display = 'none'; 
		document.getElementById('name_warning').style.display = 'none'; 
		document.getElementById('email_warning').style.display = 'none'; 
		document.getElementById('opis_warning').style.display = 'none'; 
		var name = document.getElementById('name');
		name.addEventListener('change', function(e) { 
			if(name && name.value){
				name_warning.style.display = 'none';
				if (name.classList.contains('is-invalid')) {
					name.classList.remove('is-invalid'); 
				}  
			}
		});
		var email = document.getElementById('email');
		email.addEventListener('change', function(e) { 
			if(email && email.value){
				email_warning.style.display = 'none';
				if (email.classList.contains('is-invalid')) {
					email.classList.remove('is-invalid'); 
				}  
			}
		});
		var opis = document.getElementById('opis');
		opis.addEventListener('change', function(e) { 
			if(opis && opis.value){
				opis_warning.style.display = 'none';
				if (opis.classList.contains('is-invalid')) {
					opis.classList.remove('is-invalid'); 
				}  
			}
		});
	});

}(jQuery);
function CheckForm(){
	var invalid = false;
	var name = document.getElementById('name');
    var name_warning = document.getElementById('name_warning');
	var email = document.getElementById('email');
	var email_warning = document.getElementById('email_warning');
    var opis = document.getElementById('opis');
	var opis_warning = document.getElementById('opis_warning');
	if(!(name && name.value)){
		name_warning.style.display = 'block'; 
		if (!name.classList.contains('is-invalid')) {
			name.classList.add('is-invalid'); 
		} 
		invalid = true;
	} else {
		name_warning.style.display = 'none';
		if (name.classList.contains('is-invalid')) {
			name.classList.remove('is-invalid'); 
		}  
	}
	if(!(email && email.value)){
		email_warning.style.display = 'block'; 
		if (!email.classList.contains('is-invalid')) {
			email.classList.add('is-invalid'); 
		} 
		invalid = true;
	} else {
		email_warning.style.display = 'none';
		if (email.classList.contains('is-invalid')) {
			email.classList.remove('is-invalid'); 
		}  
	}
	if(!(opis && opis.value)){
		opis_warning.style.display = 'block'; 
		if (!opis.classList.contains('is-invalid')) {
			opis.classList.add('is-invalid'); 
		} 
		invalid = true;
	} else {
		opis_warning.style.display = 'none';
		if (opis.classList.contains('is-invalid')) {
			opis.classList.remove('is-invalid'); 
		}  
	}
	return invalid;
}
function SendPrijava(){
    var form = $('#dropzone-form')[0];
    var data = new FormData(form); 
	console.log(data);
	if(CheckForm()){
		return
	}
    $.ajax({
                type: 'POST',
                url: 'validator.php',
                data,
                processData: false,
                contentType: false,
                dataType: 'json',
                success: function(d){
                    // $('button[type=submit], input[type=submit]').prop('disabled',false);
                    console.log(d);
                    if(d.success){
						$('#message').html(d.message); 
						document.getElementById('input_form').style.display = 'none'; 
						document.getElementById('animation').style.display = 'block'; 
                    }else{
                        $('#message').html(d.message);
                       
                    }
                     
				}
	});
}


