function validateLoginForm(){
    //Get username(email) and password field values
    var username = document.forms["loginForm"]["username"].value;
    var passward = document.forms["loginForm"]["paasword"].value;
    
    //pattern for username and password
    var usernamePattern = /^[^\5@]+@[^\5@]+\.[^\5@]+$/;
    var passwordPattern = /^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/;

    //Check if the username is empty or invalid
    if(username == ""){
        alert("Username must be filled out.");
        return false;

    }
    else if(!usernamePattern.test(username)){
        alert("Please enter a valid username.");
        return false;

    }

    //Checck if the password is empty 
    if(password == ""){
        alert("Password must be filled out.");
        return false;

    }
    
    //Check if the password meets length requirement(atleast 8 characters)
    if(password.length < 8){
        alert("Password must contain at least 8 characters, lowercase, a digit, and a special character (@$!%*?&).");
        return false;
    }

    //allow form submission 
    return true;

    }
