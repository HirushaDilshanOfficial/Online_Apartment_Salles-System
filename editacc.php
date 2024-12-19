<!DOCTYPE html>
<html>
    <head>
      <title>Edit Account</title>  
      <link rel="stylesheet" href="css/style.css">
      <link rel="stylesheet" href="css/editcss.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    </head>
<body>
    
    <?php include 'header.php';?>

    <form class="account-form">
      <div class="acc-info">
        <h2>Account Information</h2>
  
        <label>User Name :</label>
        <input type="text" name="NIC" id="NIC" placeholder="NIC" required><br><br> 

        <label>User Name :</label>
        <input type="text" name="firstname" id="username" placeholder="User name" required><br><br>
  
        <label>First Name :</label>
        <input type="text" name="firstname" id="firstname" placeholder="First name" required><br><br>
  
        <label>Last Name :</label>
        <input type="text" name="lastname" id="lastname" placeholder="Last name" required><br><br>
  
        <label>Email :</label>
        <input type="email" id="myEmail" name="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" required><br><br>
  
        <label>Mobile Number :</label>
        <input type="tel" name="mobilenumber" id="mobilenumber" pattern="[0-9]{10}" required><br><br>
  
        <input type="submit" class="submit"> <input type="reset" class="reset"><br>
  
      </div>
      </form>
  
        <script src="js/editacc.js"></script>
    
    <!-- Footer start -->

    <?php include 'footer.php';?>

</body>

</html>