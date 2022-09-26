<?php
   session_start();
   if ( isset( $_SESSION['username'] ) ) {
    
} 

else {
   header('Location: login.php');
}
?>

<!DOCTYPE html>
<html>

   <head>
   <style><?php include 'assets/css/home.css'; ?>
<?php include 'assets/css/bootstrap.min.css'; ?></style>
      <title>Home</title>
        <?php

            $conn=mysqli_connect("localhost", "root", "") or die(mysqli_error());
            mysqli_select_db($conn, "dots");

            $sql_read = "SELECT * FROM dots";

            $result = mysqli_query($conn, $sql_read);

            if(! $result )
            {
                die('Could not read data: ' . mysqli_error());
            }
        ?>   

        <br>
        <br>
        <br>


    </head>
   
    <body>
    
  <header id="header" class="fixed-top d-flex align-items-center">
    <div class="container d-flex align-items-center">

      <h1 class="logo me-auto"><a href="home.php">HOME</a></h1>

      
    </div>
  </header>
        <style>
            
            #map {
                height: 600px;
                width: 100%;
            }
        </style>

        Correct username and password. <br>
        <?php 
        
       echo "Wellcome, '{$_SESSION['username']}'"; 
       ?>
        <div id="map"></div>

        <?php
            
            $result = mysqli_query($conn, $sql_read);
            if(! $result )
            {
              die('Could not read data: ' . mysqli_error());
            }
            echo 
                "<table border=1>
                <th>ID</th> 
                <th>Latitudine</th>
                <th>Longitudine</th>
                <th>Description</th>";

            while($row = mysqli_fetch_array($result)){
                echo "<tr>";
                echo "<td>" . $id = $row['ID']            . "</td>";
                echo "<td>" . $lati = $row['latitude']   . "</td>";
                echo "<td>" . $lng = $row['longitude'] . "</td>";
                echo "<td>" . $descr = $row['description'] . "</td>";
                echo "</tr>";
            }
            echo"</table><br> <br> <br>";
            while($row = mysqli_fetch_array($result)) {
                $id = $row['ID'];
                $latitudine = $row['latitude'];
                $longitudine = $row['longitude'];
                $descr = $row['description'];
            }
            
        ?>
        <script>
            function initMap() {
                var uluru = {
                    lat: 45,
                    lng: 25
                };
                var map = new google.maps.Map(document.getElementById('map'), {
                    zoom: 6,
                    center: uluru
                });

    			<?php
                $result = mysqli_query($conn, $sql_read);
                if(! $result )
                {
                  die('Could not read data: ' . mysqli_error());
                }
                while($row = mysqli_fetch_array($result)) {
                
                    $id = $row['ID']         ;
                    $lat = $row['latitude']  ;
                    $long = $row['longitude'];
                    $descr = $row['description'];
                    for ($i = 1 ; $i <= $id ; $i++){
                        echo "var marker$i = new google.maps.Marker({position:{lat:$lat,lng:$long},label: '$descr', map: map});";
                    };

                }
    			?>
            }
        </script>

        <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCIcFOsOvJrhdPJxW7uAg3HxhsYtXLk9Zo&callback=initMap">
        </script>

        <a href="logout.php"><img src="assets\css\img\buton_logout.png"  width="150px" height="50px"  alt="LOGOUT"></a>
    </body>
</html>