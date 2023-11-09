function clearRequiredFields() 
{
    var required = document.getElementsByClassName("r-ele");
    for (i = 0; i < required.length; i++) {
        required[i].innerHTML = "";
    }
}
function validateRegister() {
    clearRequiredFields();
    var required = document.getElementsByClassName("r-ele");
    var inpt = document.getElementsByClassName("f-ele");
    var span = document.getElementsByClassName("s-ele");
    var name = document.getElementById("f-name").value;
    var email = document.getElementById("f-email").value;
    var contact = document.getElementById("f-contact").value;
    var pass = document.getElementById("f-pass").value;
    var result = true;
    if (name == "") {
        required[0].innerHTML = "This field cannot be empty.";
        required[0].style.color = "#F70000";
        inpt[0].style.border = "0.25vh solid #F70000";
        span[0].style.color = "#F70000";
        result = false;
    }
    if (email == "") {
        required[1].innerHTML = "This field cannot be empty.";
        required[1].style.color = "#F70000";
        inpt[1].style.border = "0.25vh solid #F70000";
        span[1].style.color = "#F70000";
        result = false;
    } 
    if (contact == "") {
        required[2].innerHTML = "This field cannot be empty.";
        required[2].style.color = "#F70000";
        inpt[2].style.border = "0.25vh solid #F70000";
        span[2].style.color = "#F70000";
        result = false;
    } 
    else if (contact.length != 10) {
        required[2].innerHTML = "Enter a valid contact number.";
        required[2].style.color = "#F70000";
        inpt[2].style.border = "0.25vh solid #F70000";
        span[2].style.color = "#F70000";
        result = false;
    } 
    if (pass == "") {
        required[3].innerHTML = "This field cannot be empty.";
        required[3].style.color = "#F70000";
        inpt[3].style.border = "0.25vh solid #F70000";
        span[3].style.color = "#F70000";
        result = false;
    }
    return result;
}
function styleRegister() {
    var required = document.getElementsByClassName("r-ele");
    var inpt = document.getElementsByClassName("f-ele");
    var span = document.getElementsByClassName("s-ele");
    var name = document.getElementById("f-name").value;
    var email = document.getElementById("f-email").value;
    var contact = document.getElementById("f-contact").value;
    var pass = document.getElementById("f-pass").value;
    if (name != "") {
        required[0].innerHTML = "";
        required[0].style.color = "#FFFFFF";
        inpt[0].style.border = "0.25vh solid #FFFFFF";
        span[0].style.color = "#FFFFFF";
    }
    if (email != "") {
        required[1].innerHTML = "";
        required[1].style.color = "#FFFFFF";
        inpt[1].style.border = "0.25vh solid #FFFFFF";
        span[1].style.color = "#FFFFFF";
    } 
    if (contact != "") {
        required[2].innerHTML = "";
        required[2].style.color = "#FFFFFF";
        inpt[2].style.border = "0.25vh solid #FFFFFF";
        span[2].style.color = "#FFFFFF";
    } 
    if (pass != "") {
        required[3].innerHTML = "";
        required[3].style.color = "#FFFFFF";
        inpt[3].style.border = "0.25vh solid #FFFFFF";
        span[3].style.color = "#FFFFFF";
    }
}

