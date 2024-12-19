<!DOCTYPE html>
<html>
    <head>
      <title>Reset Password</title>  
      <link rel="stylesheet" href="css/style.css">
      <link rel="stylesheet" href="css/reset.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    </head>
<body>
    

    <form class="reset-form">
      <div class="reset-password">
          <h2>Change Password</h2>
          <label> Current Password<label>  <input type="text"><br><br>
          <label> New Password<label>  <input type="password" id="psw" name="psw" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{5,10}" required><br><br>
          <label> Confirm Password<label>  <input type="password" id="repsw" name="repsw"pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{5,10}"><br><br>
            <input type="submit" class="submit" onclick="checkPassword()">

          
          
        </div>
    </form>

    <script src="js/reset.js">
       
    </script>
      

</body>

</html>