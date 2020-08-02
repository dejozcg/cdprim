// disable autodiscover
Dropzone.autoDiscover = false;
var previewNode = document.querySelector("#template");
previewNode.id = "";
var previewTemplate = previewNode.parentNode.innerHTML;
previewNode.parentNode.removeChild(previewNode);
var myDropzone = new Dropzone(document.body, { 
    url: "upload2.php",
    method: "POST",
    paramName: "file",
    autoProcessQueue : false,
    acceptedFiles: "image/*",
    maxFiles: 5,
    maxFilesize: 0.3, // MB
    uploadMultiple: true,
    parallelUploads: 100, // use it with uploadMultiple
    createImageThumbnails: true,
    thumbnailWidth: 120,
    thumbnailHeight: 120,
    addRemoveLinks: true,
    timeout: 180000,
    dictRemoveFileConfirmation: "Are you Sure?", // ask before removing file
    // Language Strings
    dictFileTooBig: "File is to big ({{filesize}}mb). Max allowed file size is {{maxFilesize}}mb",
    dictInvalidFileType: "Invalid File Type",
    dictCancelUpload: "Cancel",
    dictRemoveFile: "Remove",
    dictMaxFilesExceeded: "Only {{maxFiles}} files are allowed",
    dictDefaultMessage: "Drop files here to upload",
    previewTemplate: previewTemplate,
    autoQueue: false, // Make sure the files aren't queued until manually added
    previewsContainer: "#previews", // Define the container to display the previews
    clickable: ".fileinput-button" // Define the element that should be used as click trigger to select files.
});

myDropzone.on("addedfile", function(file) {
    console.log('addedfile',file);
    file.previewElement.querySelector(".start").onclick = function() { myDropzone.enqueueFile(file); };
});
// Update the total progress bar
myDropzone.on("totaluploadprogress", function(progress) {
    document.querySelector("#total-progress .progress-bar").style.width = progress + "%";
  });
myDropzone.on("removedfile", function(file) {
     console.log('removedfile',file);
});

// Add mmore data to send along with the file as POST data. (optional)
myDropzone.on("sending", function(file, xhr, formData) {
    document.querySelector("#total-progress").style.opacity = "1";
    // And disable the start button
    file.previewElement.querySelector(".start").setAttribute("disabled", "disabled");
    console.log('xhr',xhr);
    console.log('formData',formData);
    var obj = {};
 
	for (var key of formData.keys()) {
		obj[key] = formData.get(key);
	}
    
    console.log('formData',obj);
    formData.append("dropzone", "1"); // $_POST["dropzone"]
   
});

myDropzone.on("error", function(file, response) {
    console.log('greska',response);
});

// on success
myDropzone.on("successmultiple", function(file, response) {
    // get response from successful ajax request
    console.log('nakon uspjesnog requesta',JSON.stringify(response));
    // submit the form after images upload
    // (if u want yo submit rest of the inputs in the form)
    document.getElementById("fajlovi").value = JSON.stringify(response);
    document.getElementById("dropzone-form").submit();
});

myDropzone.on("queuecomplete", function(progress) {
    document.querySelector("#total-progress").style.opacity = "0";
  });
 
// button trigger for processingQueue
var submitDropzone = document.getElementById("submit-dropzone");
submitDropzone.addEventListener("click", function(e) {
    // Make sure that the form isn't actually being sent.
    e.preventDefault();
    e.stopPropagation();

    if (myDropzone.files != "") {
        // console.log(myDropzone.files);
        myDropzone.enqueueFiles(myDropzone.getFilesWithStatus(Dropzone.ADDED));
        myDropzone.processQueue();
    } else {
	// if no file submit the form    
        document.getElementById("dropzone-form").submit();
    }

});


// Setup the buttons for all transfers
// The "add files" button doesn't need to be setup because the config
// `clickable` has already been specified.
document.querySelector("#actions .start").onclick = function() {
    console.log("START!!!")
    //myDropzone.enqueueFiles(myDropzone.getFilesWithStatus(Dropzone.ADDED));
  };
  document.querySelector("#actions .cancel").onclick = function() {
    myDropzone.removeAllFiles(true);
  };

