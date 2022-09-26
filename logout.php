<!DOCTYPE html>
<html>
    <head>

    </head>

    <body>
        <div>
      
        <a href="login.php">Back to login page</a>
        </div> 

        <?php
            // Always start this first
            session_start();

            // Destroying the session clears the $_SESSION variable, thus "logging" the user
            // out. This also happens automatically when the browser is closed
            session_destroy();
        ?>

        You were correctly logged out
    </body>
</html>
