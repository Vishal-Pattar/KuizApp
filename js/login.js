function clearRequiredFields() 
{
    var required = document.getElementsByClassName("r-ele");
    for (i = 0; i < required.length; i++) {
        required[i].innerHTML = "";
    }
}
function validateLogin() {
    clearRequiredFields();
    var required = document.getElementsByClassName("r-ele");
    var inpt = document.getElementsByClassName("f-ele");
    var span = document.getElementsByClassName("s-ele");
    var email = document.getElementById("f-email").value;
    var pass = document.getElementById("f-pass").value;
    var result = true;
    if (email == "") {
        required[0].innerHTML = "This field cannot be empty.";
        required[0].style.color = "#F70000";
        inpt[0].style.border = "0.25vh solid #F70000";
        span[0].style.color = "#F70000";
        result = false;
    } 
    if (pass == "") {
        required[1].innerHTML = "This field cannot be empty.";
        required[1].style.color = "#F70000";
        inpt[1].style.border = "0.25vh solid #F70000";
        span[1].style.color = "#F70000";
        result = false;
    }
    if(pass != "") {
        if (pass.match(/[a-z]/g) && pass.match(/[A-Z]/g) && pass.match(/[0-9]/g) && pass.match(/[^a-zA-Z\d]/g) && pass.length >= 8)
        {

        }  
        else
        {
            required[1].innerHTML = "Must contain atleast 1 uppercase, 1 lowercase and 1 numeric characters. Minimum 8 characters";
            required[1].style.color = "#F70000";
            inpt[1].style.border = "0.25vh solid #F70000";
            span[1].style.color = "#F70000";
            result = true;
        }
    }
    return result;
}
function styleLogin() {
    var required = document.getElementsByClassName("r-ele");
    var inpt = document.getElementsByClassName("f-ele");
    var span = document.getElementsByClassName("s-ele");
    var email = document.getElementById("f-email").value;
    var pass = document.getElementById("f-pass").value;
    if (email != "") {
        required[0].innerHTML = "";
        required[0].style.color = "#FFFFFF";
        inpt[0].style.border = "0.25vh solid #FFFFFF";
        span[0].style.color = "#FFFFFF";
    } 
    if (pass != "") {
        required[1].innerHTML = "";
        required[1].style.color = "#FFFFFF";
        inpt[1].style.border = "0.25vh solid #FFFFFF";
        span[1].style.color = "#FFFFFF";
    }
}

