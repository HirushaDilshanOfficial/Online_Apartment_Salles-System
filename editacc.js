
function validateForm() {
   
    var firstname = document.getElementById('firstname').value;
    var lastname = document.getElementById('lastname').value;
    var email = document.getElementById('myEmail').value;
    var mobilenumber = document.getElementById('mobilenumber').value;
    
    var emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    var phonePattern = /^[0-9]{10}$/;

// First name validation
if (firstName == "") {
    alert("First name must be filled out");
    return false;
}

// Last name validation
if (lastName == "") {
    alert("Last name must be filled out");
    return false;
}

// Email validation
if (email == "") {
    alert("Email must be filled out");
    return false;
} else if (!emailPattern.test(email)) {
    alert("Please enter a valid email address");
    return false;
}

// Username validation
if (username == "") {
    alert("Username must be filled out");
    return false;
}

// Phone number validation
if (phoneNumber == "") {
    alert("Phone number must be filled out");
    return false;
} else if (!phonePattern.test(phoneNumber)) {
    alert("Please enter a valid 10-digit phone number");
    return false;
}

// If all validations pass
return true;
}





