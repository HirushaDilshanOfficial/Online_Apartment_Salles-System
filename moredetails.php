<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Property Details - Urban Heaven</title>
    <link rel="stylesheet" href="css/moredetails.css">
    <link rel="stylesheet" href="css/footer.css">
    
</head>
<body>
    
    <?php include 'admin_header.php'; ?>
    <main>
        <section class="property-details">
            <div class="property-grid">
                <?php include 'backend_moredetails.php'; ?>
            </div>
        </section>

        <section class="reservation-form">
            <h2>Reserve a Visit</h2>
            <form action="backend_moredetails.php" method="POST" onsubmit="return validateForm();">
                <input type="text" name="id" id="id" placeholder="ID" >
                <input type="text" name="name" id="name" placeholder="Name" >
                <input type="tel" name="contact_no" id="contact_no" placeholder="Contact no" >
                <input type="text" name="email" id="email" placeholder="Email" >
                <input type="date" id="date" name="date" >
                <button type="submit" name="btn-reservation" class="btn btn-primary">Submit</button>
            </form>
        </section>
    </main>

    <script src="js/moredetails.js"></script>

    <?php include 'admin_footer.php'; ?> 

</body>
</html>