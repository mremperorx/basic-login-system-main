<?php

$conn=mysqli_connect("localhost", "root", "") or die(mysqli_error());
mysqli_select_db($conn, "dots");

$sql_insert="INSERT INTO dots(latitude, longitude) VALUES (45.433839984252174, 26.809148815321244)";

$retval = mysqli_query($conn, $sql_insert);
if(! $retval )
{
  die('Could not insert data: ' . mysqli_error());
}
echo "Data inserted successfully\n";

?>