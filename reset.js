function checkPassword() {
    var newPassword = document.getElementById("psw").value;
    var confirmPassword = document.getElementById("repsw").value;

    //At least one number, one lowercase letter, one uppercase letter, and between 5-10 characters
    var passwordPattern = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{5,10}$/;

    if (!newPassword.match(passwordPattern)) {
      alert("Password must be 5-10 characters long, contain at least one digit, one lowercase letter, and one uppercase letter.");
      return false;
    }

    if (newPassword != confirmPassword) {
      alert("Password mismatch. Please enter matching passwords.");
      return false;
    }

    alert("Success!");
    return true;
  }