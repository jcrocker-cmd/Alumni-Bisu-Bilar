
// Get the form element
var form = document.getElementById("alumni_id_form");


// Get the input elements
var input1 = document.getElementById("a_no");
var input2 = document.getElementById("id_no");
var input3 = document.getElementById("name");
var input4 = document.getElementById("address");
var input5  = document.getElementById("bday");
var input6  = document.getElementById("course");
var input7  = document.getElementById("addphotoBtn");


// Get the error message elements
var error_a_no = document.getElementById("error_a_no");
var error_id_no = document.getElementById("error_id_no");
var error_name = document.getElementById("error_name");
var error_add = document.getElementById("error_add");
var error_bday = document.getElementById("error_bday");
var error_course = document.getElementById("error_course");


var error_sig = document.getElementById("error_sig");
var image = document.getElementById("change-img-add");


// Add a submit event listener to the form
form.addEventListener("submit", function(event) {
  event.preventDefault(); // prevent the form from submitting

  // Reset the error messages
input1.addEventListener("keyup", function() {
  error_a_no.innerHTML = ""; // reset the error message
    input1.style.borderColor = "";
});

input2.addEventListener("keyup", function() {
    error_id_no.innerHTML = ""; // reset the error message
    input2.style.borderColor = "";
});

input3.addEventListener("keyup", function() {
    error_name.innerHTML = ""; // reset the error message
    input3.style.borderColor = "";
});
input4.addEventListener("keyup", function() {
    error_add.innerHTML = ""; // reset the error message
    input4.style.borderColor = "";
});

input5.addEventListener("keyup", function() {
    error_bday.innerHTML = ""; // reset the error message
    input5.style.borderColor = "";
});

input6.addEventListener("keyup", function() {
  error_course.innerHTML = ""; // reset the error message
  input6.style.borderColor = "";
});

input7.addEventListener("change", function() {
    error_sig.innerHTML = ""; // reset the error message
    image.style.borderColor = "";
});

 // validate the input fields
 if (input1.value === "") {
    error_a_no.innerHTML = "<span style='margin-bottom: 0px; margin-top: 5px;' >Alumni ID is required.</span>";
    input1.style.borderColor = "red";
  }
  if (input2.value === "") {
    error_id_no.innerHTML = "<span style='margin-bottom: 0px; margin-top: 5px;' >ID No. field is required.</span>";
    input2.style.borderColor = "red";
  }
  if(input3.value === ""){
    error_name.innerHTML = "<span style='margin-bottom: 0px; margin-top: 5px;' >Name field is required.</span>";
    input3.style.borderColor = "red";
  }
  if(input4.value === ""){
    error_add.innerHTML = "<span style='margin-bottom: 0px; margin-top: 5px;' >Address field is required.</span>";
    input4.style.borderColor = "red";
  }

  if(input5.value === ""){
    error_bday.innerHTML = "<span style='margin-bottom: 0px; margin-top: 5px;' >Birthday field is required..</span>";
    input5.style.borderColor = "red";
  }

  if(input6.value === ""){
    error_course.innerHTML = "<span style='margin-bottom: 0px; margin-top: 5px;' >Course field is required.</span>";
    input6.style.borderColor = "red";
  }

  if(input7.value === ""){
    error_sig.innerHTML = "<span style='margin-bottom: 0px; margin-top: 5px;' >(Please Upload your Signature)</span>";
    image.style.borderColor = "red";
  }

  
  const submit_btn = document.getElementById("submit_alumni_id");
  submit_btn.onclick = function(){
    if (error_a_no.innerHTML === "" && error_id_no.innerHTML === "" && error_name.innerHTML === "" && error_add.innerHTML === "" && error_bday.innerHTML === "" && error_course.innerHTML === "" && error_sig.innerHTML === "" ) {
        // this.innerHTML = "<div class='loader'></div>";
        form.submit();
        submit_btn.style.backgroundColor = "#89e5ba";
    }
  }
});
