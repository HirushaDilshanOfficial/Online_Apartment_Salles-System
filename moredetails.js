function validateForm() {
    var id = document.getElementById('id').value;
    var name = document.getElementById('name').value;
    var contactNo = document.getElementById('contact_no').value;
    var email = document.getElementById('email').value;
    var date = document.getElementById('date').value;

    if (id === "" || name === "" || contactNo === "" || email === "" || date === "") {
        alert("Please fill out all fields.");
        return false; 
    }

    //check contact _no valid
    var contactPattern = /^[0-9]+$/; 
    if (!contactPattern.test(contactNo)) {
        alert("Contact number must contain only digits.");
        return false; 
    }

    // Check  email is valid
    var emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/; 
    if (!emailPattern.test(email)) {
        alert("Please enter a valid email address.");
        return false; 
    }

    return true; 
}
