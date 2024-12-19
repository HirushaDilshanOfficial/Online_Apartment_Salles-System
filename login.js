function validateLoginForm() {
    // Get email and password field values
    var email = document.forms["loginForm"]["email"].value;
    var password = document.forms["loginForm"]["psw"].value;

    //patterns for email , password
    var emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    var passwordPattern = /^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/;

    // Check if email is empty or invalid
    if (email == "") {
        alert("Email must be filled out");
        return false;
    } else if (!emailPattern.test(email)) {
        alert("Please enter a valid email address");
        return false;
    }

    // Check if password is empty
    if (password == "") {
        alert("Password must be filled out");
        return false;
    }
    
    // Check if password meets length requirement (at least 8 characters)
    if (password.length < 8) {
        alert("Password must contain at least 8 characters, including uppercase, lowercase, a digit, and a special character (@$!%*?&).");
        return false;
    }

    // If validation passes, allow form submission
    return true;
}

// Adding event listener to validate the form on submission
document.getElementById("loginForm").onsubmit = function() {
    return validateLoginForm();
};