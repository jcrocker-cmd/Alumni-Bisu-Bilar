
// Get the form element
var form = document.getElementById("alumni_mem_form");


// Get the input elements
var input1 = document.getElementById("name");
var input2 = document.getElementById("address");
var input3 = document.getElementById("bday");
var input4 = document.getElementById("con_num");
var input5  = document.getElementById("fb");
var input6  = document.getElementById("addphotoBtn");
var input7  = document.getElementById("ref");

var radio1 = document.getElementById("opt1");
var radio2 = document.getElementById("opt2");


// Get the error message elements
var error_name = document.getElementById("error_name");
var error_add = document.getElementById("error_add");
var error_bday = document.getElementById("error_bday");
var error_num = document.getElementById("error_num");
var error_fb = document.getElementById("error_fb");
var error_radio = document.getElementById("errorradio");
var error_ref = document.getElementById("error_ref");


var error_sig = document.getElementById("error_sig");
var image = document.getElementById("change-img-add");


// Add a submit event listener to the form
form.addEventListener("submit", function(event) {
  event.preventDefault(); // prevent the form from submitting

  // Reset the error messages
  input1.addEventListener("keyup", function() {
    error_name.innerHTML = ""; // reset the error message
    input1.style.borderColor = "";
});

input2.addEventListener("keyup", function() {
  error_add.innerHTML = ""; // reset the error message
    input2.style.borderColor = "";
});

input3.addEventListener("change", function() {
  error_bday.innerHTML = ""; // reset the error message
    input3.style.borderColor = "";
});
input4.addEventListener("keyup", function() {
  error_num.innerHTML = ""; // reset the error message
    input4.style.borderColor = "";
});

input5.addEventListener("keyup", function() {
  error_fb.innerHTML = ""; // reset the error message
    input5.style.borderColor = "";
});

input6.addEventListener("change", function() {
    error_sig.innerHTML = ""; // reset the error message
    image.style.borderColor = "";
    if (!validateImageSize(input6)) {
      error_sig.innerHTML = "<span class='err-text' >(Image size should be less than 1MB.)</span>";
      image.style.borderColor = "red";
    }
    if (!validateImageType(input6)) {
      error_sig.innerHTML = "<span class='err-text' >(Only image files are allowed.)</span>";
      image.style.borderColor = "red";
    }
});

input7.addEventListener("keyup", function() {
  error_ref.innerHTML = ""; // reset the error message
  input7.style.borderColor = "";
});

radio1.addEventListener("click", function(){
  error_radio.innerHTML = "";
});
radio2.addEventListener("click", function(){
  error_radio.innerHTML = "";
});


 // validate the input fields
 if (input1.value === "") {
    error_name.innerHTML = "<span style='margin-bottom: 0px; margin-top: 5px;' >Name field is required.</span>";
    input1.style.borderColor = "red";
  }
  if (input2.value === "") {
    error_add.innerHTML = "<span style='margin-bottom: 0px; margin-top: 5px;' >Address field is required.</span>";
    input2.style.borderColor = "red";
  }
  if(input3.value === ""){
    error_bday.innerHTML = "<span style='margin-bottom: 0px; margin-top: 5px;' >Birthday field is required.</span>";
    input3.style.borderColor = "red";
  }
  if(input4.value === ""){
    error_num.innerHTML = "<span style='margin-bottom: 0px; margin-top: 5px;' >Number field is required.</span>";
    input4.style.borderColor = "red";
  }

  if(input5.value === ""){
    error_fb.innerHTML = "<span style='margin-bottom: 0px; margin-top: 5px;' >Facebook URL field is required.</span>";
    input5.style.borderColor = "red";
  }

  if(input6.value === ""){
    error_sig.innerHTML = "<span style='margin-bottom: 0px; margin-top: 5px;' >(Please Upload your Signature)</span>";
    image.style.borderColor = "red";
  } else {
    if (!validateImageSize(input6)) {
      error_sig.innerHTML = "<span class='err-text' >(Image size should be less than 1MB.)</span>";
      image.style.borderColor = "red";
    }
    if (!validateImageType(input6)) {
      error_sig.innerHTML = "<span class='err-text' >(Only image files are allowed.)</span>";
      image.style.borderColor = "red";
    }
  }

  if (!radio1.checked && !radio2.checked) {
    error_radio.innerHTML = "<span class='err-text'>You must select one option to continue.</span>";
  }

  if(input7.value === ""){
  error_ref.innerHTML = "<span style='margin-bottom: 0px; margin-top: 5px;' >Please enter reference.</span>";
  input7.style.borderColor = "red";
  }


  // Function to validate image size
  function validateImageSize(input) {
    if (input.files && input.files[0]) { // check if input has files and at least one file is selected
        const fileSize = input.files[0].size / 1024 / 1024; // get the file size in MB
        if (fileSize > 1) { // check if file size is greater than 1MB
            return false; // return false if file size is greater than 1MB
        }
    }
    return true; // return true if file size is less than or equal to 1MB or input doesn't have files
  }

  // Function to validate image type
  function validateImageType(input) {
      if (input.files && input.files[0]) { // check if input has files and at least one file is selected
          const allowedTypes = ["image/jpeg", "image/png", "image/gif"]; // allowed image types
          const fileType = input.files[0].type; // get the file type
          if (!allowedTypes.includes(fileType)) { // check if file type is not in the allowed image types
              return false; // return false if file type is not allowed
          }
      }
      return true; // return true if file type is allowed or input doesn't have files
  }

  
  const submit_btn = document.getElementById("submit_membership");
  submit_btn.onclick = function(){
    if (error_name.innerHTML === "" && error_add.innerHTML === "" && error_bday.innerHTML === "" && error_num.innerHTML === "" && error_fb.innerHTML === "" && error_sig.innerHTML === "" && error_radio.innerHTML === "" && error_ref.innerHTML === "" ) {
        // this.innerHTML = "<div class='loader'></div>";
        form.submit();
        submit_btn.style.backgroundColor = "#89e5ba";
    }
  }
});
