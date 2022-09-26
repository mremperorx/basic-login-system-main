<?php

$conn=mysqli_connect("localhost", "root", "") or die(mysqli_error());
mysqli_select_db($conn, "db_users");

$sql_create = "CREATE TABLE users
(
username varchar(20),
password varchar(25),
UNIQUE (username)
)
";

$retval = mysqli_query($conn, $sql_create);
if(! $retval )
{
  die('Could not create table: ' . mysqli_error());
}
echo "Table created successfully\n";

?>
