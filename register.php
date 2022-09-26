<?php        
    include_once 'data_base.php';

    if(isset($_POST['register'])){
            $usernamer = $_POST['usernamer'];
            $passwordr =$_POST['passwordr'];
                $sql_insert="INSERT INTO users(username, password) VALUES ('$usernamer', '$passwordr')";

                if (mysqli_query($conn, $sql_insert)) {
                    echo "New record created successfully !";
                
                 } else {
                    echo "Error: " . $sql . "
            " . mysqli_error($conn);
                 }
                 mysqli_close($conn);
                }  
      ?>
      <a href="login.php">Back to login page</a>

