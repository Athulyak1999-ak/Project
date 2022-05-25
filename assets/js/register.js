function val() {
    if (document.getElementById('na').value.length == 0 || document.getElementById('a2').value.length == 0 || document.getElementById('em').value.lenght == 0 || document.getElementById('user').value.lenght == 0 || document.getElementById('pas').value.lenght == 0 || document.getElementById('cpas').value.lenght == 0 || document.getElementById('mn').value.lenght == 0) {
        alert("Form is empty");
        return false;
    } else {

        var nam = /^[A-Za-z]+$/;
        var name = document.getElementById("na").value;
        if (name == '') {
            alert('Please enter your name');
        } else if (!nam.test(name)) {
            alert('Name field required only alphabet characters');
            document.getElementById('na').focus();
            return false;
        }


        var cn6 = /^\(?([1-9]{1})\)?[-. ]?([0-9]{4})[-. ]?([0-9]{5})$/;
        if (document.getElementById("mn").value.match(cn6)) { } else {
            alert("Invalid Mobile Number");
            document.getElementById('mn').focus();
            return false;
        }



        var eml = /^([a-z A-Z 0-9_\-\.])+\@([a-z A-Z 0-9_\-])+\.([a-z A-Z]{2,4}).$/;
        if (document.getElementById('em').value.match(eml)) { } else {
            alert("Invalid Email id");
            document.getElementById('em').focus();
            return false;
        }

        var unam = /^([a-z A-Z_\-])+$/;
        if (document.getElementById('user').value.match(unam)) { } else {
            alert("Enter alphabet in username");
            document.getElementById('user').focus();
            return false;
        }


        var pwd_expression = /^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-])/;
        if (document.getElementById('pas').value.match(pwd_expression)) { } else {
            alert("Invalid password. Upper case, Lower case, Special character and Numeric letter are required in Password filed");
            document.getElementById('pas').focus();
            return false;
        }
        if (document.getElementById('pas').value == document.getElementById('cpas').value) { } else {
            alert("Password Missmatch");
            document.getElementById('pas').focus();
            return false;
        }

        var allowedExtensions = /(\.jpg|\.jpeg|\.png|\.gif)$/i;
        var image = document.getElementById('im').value;
        if (!allowedExtensions.exec(image)) {
            alert('Invalid file type');
            image = '';
            return false;
        } else if (image.files) {
            var reader = new FileReader();
            reader.onload = function (e) {
                document.getElementById('imagePreview').innerHTML = '<img src="' + e.target.result + '"/>';
            };
            reader.readAsDataURL(image);
        } else {
            alert('Thank You for Registration.');
            // Redirecting to other page or webste code. 
            //window.location = "login.php";
        }
    }
}