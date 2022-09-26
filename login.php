<?php
   session_id("mainID");
   session_start();
   error_reporting(0);
   
   ?>
<!DOCTYPE html>
<html>

   <head>
   <meta charset="UTF-8">
  <title>Login</title>
  
   </head>
	
   <body>
   <style><?php include 'assets/css/style.css'; ?></style>

      <h2>Login form</h2> 
         
      <?php

         $conn=mysqli_connect("localhost", "root", "") or die(mysqli_error());
         mysqli_select_db($conn, "db_users");
         
         $ggg =  $_POST['username'];

         $sql_read = "SELECT * FROM users where username='$ggg' LIMIT 1";

         //echo  $sql_read;

         $result = mysqli_query($conn, $sql_read);

         if(!$result){
           die('Could not read data: ' . mysqli_error());
         }
         
         while ($row = mysqli_fetch_array($result)){
            $username = $row['username'];
            $password = $row['password'];
         };

         

            
         if (isset($_POST['login']) && !empty($_POST['username']) && !empty($_POST['password'])) {
            if ($_POST['username'] == $username && $_POST['password'] == $password) {
				         $_SESSION['valid'] = true;
                     $_SESSION['timeout'] = time();
                     $_SESSION['username'] = $username;
                     header('Location: home.php');
               }
            }

            else {
               echo 'Wrong username or password';
            }
      ?>

    <div class="login-page">
  <div class="form">
    <form class="register-form" action="register.php" method = "post"> 
      <input type="text" name="usernamer" placeholder="name"/>
      <input type="password" name="passwordr" required placeholder="password"/>
      <button type = "submit"    name = "register"     > Register </button>
      <p class="message">Already registered? <a href="#">Sign In</a></p>
    </form>
      
    <form class="login-form" action="" method = "post">
      <input type="text" name="username" placeholder="name"/>
      <input type="password" name="password" required placeholder="password"/>
      <button type = "submit"    name = "login"            > Login </button>
      <p class="message">Not registered? <a href="#">Create an account</a></p>
      
    </form>
  </div>
</div>
<!-- partial -->
  <script src='//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script><script  src="assets/js/script.js"></script>

</body>
</html>