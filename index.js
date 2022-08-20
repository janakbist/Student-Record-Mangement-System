function showFun() {

    //Get Form Fields Values
    var fullname = document.getElementById('fullname').value;
    var faculty = document.getElementById('faculty').value;
    var email = document.getElementById('email').value;
    var mobilenumber = document.getElementById('mobilenumber').value;

    //Get Error Feild id
    var fullnameError = document.getElementById('nameError');
    var facultyError = document.getElementById('facultyError');
    var emailError = document.getElementById('emailError');
    var mobilenumberError = document.getElementById('mobileNumberError');

    //Validate Form Field Values           
    if(fullname==""){
        event.preventDefault();
        fullnameError.style.color="red";
        fullnameError.innerHTML(fullnameError.innerHTML= "Please Enter your Name");
    }else if(faculty=="") {
        event.preventDefault();
        facultyError.style.color="red";
        facultyError.innerHTML(facultyError.innerHTML= "faculty cannot be empty");
    }else if(email=="") {
        event.preventDefault();
        emailError.style.color="red";
        emailError.innerHTML(emailError.innerHTML= "Email cannot be empty");
    }else if(mobilenumber.length == 0) {
        event.preventDefault();
        mobilenumberError.style.color = "red"
        mobilenumberError.innerHTML(mobilenumberError.innerHTML= "Mobile Number Cannot be empty");
    }else if(mobilenumber.length  <= 7 || mobilenumber.length  >= 11) {
        event.preventDefault();
        mobilenumberError.style.color="red";
        mobilenumberError.innerHTML(mobilenumberError.innerHTML= "Mobile Number must be between 8-10 digits");
    }
    // else {
    //     //Display Information after submission
    // document.writeln("Your Name is : "+fullname+"</br>");
    // document.writeln("Your Faculty is : "+faculty+"</br>");
    // document.writeln("Your Email is : "+email+"</br>");
    // document.writeln("Your Mobile Number is : "+mobilenumber+"</br>");
    // }

}