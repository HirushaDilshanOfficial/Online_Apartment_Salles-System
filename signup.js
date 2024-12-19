   // Function to validate the signup form
function validateSignupForm() {
    // event.preventDefault();
    // Get form values
    var lastName = document.forms["signupForm"]["lastname"].value;
    var firstName = document.forms["signupForm"]["firstname"].value;
    var email = document.forms["signupForm"]["email"].value;
    var password = document.forms["signupForm"]["password"].value;
    var confirmPassword = document.forms["signupForm"]["re-enter-password"].value;
    var username = document.forms["signupForm"]["username"].value;
    var phoneNumber = document.forms["signupForm"]["phonenumber"].value;

    //patterns foremail , password and phone number
    var emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    var passwordPattern = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{5,10}$/;
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

    // Password validation
    if (password == "") {
        alert("Password must be filled out");
        return false;
    } else if (!passwordPattern.test(password)) {
        alert("Password must be 5-10 characters long, contain at least one digit, one lowercase letter, and one uppercase letter.");
        return false;
    }

    // Confirm password validation
    if (confirmPassword == "") {
        alert("Please confirm your password");
        return false;
    } else if (password !== confirmPassword) {
        alert("Passwords do not match");
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

     //show a success message
     alert("Login successful!");
    //  window.location.href = "http://localhost/RBS/Login.html";

    // allow form submission
    return true;
}

// Attach validation to form submission
document.getElementById("signupForm").onsubmit = function() {
    return validateSignupForm();
};