
var fname_out = document.getElementById('out_fname');
var phone_out = document.getElementById('out_mobile');
var email_out = document.getElementById('out_email');
var pass_out = document.getElementById('out_pass1');
var pass1_out = document.getElementById('out_pass2');


var outfname = document.form1.name;
var outemail = document.form1.email;
var outphone = document.form1.mob_no;
var outpass1 = document.form1.pw;
var outpass2 = document.form1.cpw;
//first name validation
function fnamecheck() {
    if (outfname.value.match(/^[A-Za-z]+$/)) {
        fname_out.innerHTML = "";
    } else {
        fname_out.innerHTML = "Please Enter a valid Name";
        document.form1.fna.focus();
    }
}


//email validation
function mailcheck() {
    if (outemail.value.match(/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/)) {
        email_out.innerHTML = "";
    } else {
        email_out.innerHTML = "Please enter Valid email";
        document.form1.email.focus();
    }
}
//phone number validation
function mobilecheck() {
    if (outphone.value.match(/^\(?([0-9]{3})\)?[-. ]?([0-9]{3})[-. ]?([0-9]{4})$/)) {
        phone_out.innerHTML = "";
    } else {
        phone_out.innerHTML = "Please enter Valid Mobile no:";
        document.form1.mob_no.focus();
    }
}
//password validation
function pass1check() {
    if (outpass1.value.match(/^[A-Za-z]\w{7,14}$/)) {
        pass_out.innerHTML = "";
    } else {
        pass_out.innerHTML = "6 to 20 characters which contain at least one numeric digit and  letter";
        document.form1.pw.focus();
    }
}
//confirm password
function pass2check() {
    if (outpass2.value == outpass1.value) {
        pass1_out.innerHTML = "";
    } else {
        pass1_out.innerHTML = "Password doesn't Match";
        document.form1.cpw.focus();
    }
}