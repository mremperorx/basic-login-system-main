<?php

$conn=mysqli_connect("localhost", "root", "") or die(mysqli_error());
mysqli_select_db($conn, "dots");

$sql_read = "SELECT * FROM dots";

$result = mysqli_query($conn, $sql_read);
if(! $result )
{
  die('Could not read data: ' . mysqli_error());
}
echo"
<table border = '1' >
<tr>
<th>ID</th>
<th>latitude</th>
<th>longitune</th>
</tr>";

while($row = mysqli_fetch_array($result)) {
	$id = $row['ID'];
	$lat = $row['latitude'];
	$long = $row['longitude'];
	$descr = $row['description'];

	echo "<tr>";
	echo "<td>" . $row['ID'] . "</td>";
	echo "<td>" . $row['latitude'] . "</td>";
	echo "<td>" . $row['longitude'] . "</td>";
	echo "<td>" . $row['description']. "</td>";
	echo "</tr>";
	
}
echo "</table>";
?>