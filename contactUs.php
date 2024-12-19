<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Urban Haven Contact Us</title>
    <link rel="stylesheet" type="text/css" href="css/contactUs.css">
    <link rel="stylesheet" href="css/footer.css">
</head>
<body>
    <?php include 'header.php'; ?>
    

    <section class="contact-section">
        <div class="contact-header">
            <h1>GET IN TOUCH</h1>
        </div>
        
        <div class="contact-info">
            <div class="contact-item">
                <h3>FAX</h3>
                <p>(011)-673-820</p>
            </div>
            <div class="contact-item">
                <h3>PHONE</h3>
                <p>+94 118 040 265</p>
                <p>+94 118 717 402</p>
            </div>
            <div class="contact-item">
                <h3>EMAIL</h3>
                <p>info@urbanhaven.lk</p>
            </div>
        </div>

        <div class="form-container">
            <h2>Contact Us</h2>
            <p>Our well-trained professional sales team is waiting to address your every question at your earliest convenience.</p><br>

            <form class="inquire-form" method="POST" action="submit_contact.php">
    <fieldset>
        <legend>INQUIRE</legend>
        <div class="form-group">
            <label for="NIC">NIC</label>
            <input type="text" id="NIC" name="NIC" placeholder="NIC" required>
        </div>

        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" id="name" name="name" placeholder="Name" required>
        </div>

        <div class="form-group">
            <label for="phone">Phone Number</label>
            <input type="text" id="phone" name="phone" placeholder="Phone Number" required>
        </div>
        <div class="form-group">
            <label for="email">Email Address</label>
            <input type="email" id="email" name="email" placeholder="Email Address" required>
        </div>
        <div class="form-group">
            <label for="location">Your Preferred Location</label>
            <select id="location" name="location" required>
                <option value="">Select location</option>
                <option value="Western Province">Western Province</option>
                <option value="Northern Province">Northern Province</option>
                <option value="Southern Province">Southern Province</option>
                <option value="Central Province">Central Province</option>
                <option value="Eastern Province">Eastern Province</option>
                <option value="North Western Province">North Western Province</option>
                <option value="North Central Province">North Central Province</option>
                <option value="Uva Province">Uva Province</option>
                <option value="Sabaragamuwa Province">Sabaragamuwa Province</option>
            </select>
        </div>
        <div class="form-group">
            <label for="message">Message</label>
            <textarea id="message" name="message" placeholder="Message" required></textarea>
        </div>
        <button type="submit">SEND NOW</button>
    </fieldset>
</form>

        </div>
    </section>
    <script src="js/contactUs.js"></script>

    <?php include 'footer.php'; ?>

</body>
</html>
