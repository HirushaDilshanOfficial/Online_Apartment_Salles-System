document.querySelector('form').addEventListener('submit', function(event) {
    var NIC = document.getElementById('NIC').value;
    var name = document.getElementById('name').value;
    var phone = document.getElementById('phone').value;
    var email = document.getElementById('email').value;
    var message = document.getElementById('message').value;

    if (!NIC || !name || !phone || !email || !message) {
        alert('Please fill out all fields.');
        event.preventDefault(); // Prevent form submission
    }
});
