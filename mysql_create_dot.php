<?php

$conn=mysqli_connect("localhost", "root", "") or die(mysqli_error());
mysqli_select_db($conn, "dots");

$sql_create = "CREATE TABLE dots
(
ID int NOT NULL AUTO_INCREMENT,
PRIMARY KEY(ID),
latitude varchar(20),
longitude varchar(20),
description varchar(20)
)
";

$retval = mysqli_query($conn, $sql_create);
if(! $retval )
{
  die('Could not create table: ' . mysqli_error());
}
echo "Table created successfully\n";


?>
