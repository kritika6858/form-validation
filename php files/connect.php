<?php
$conn=mysqli_connect("localhost","root","","mussu");
if ($conn) {
	echo "<p style=float:right>Connected To DB</p>";
}
else {
	die("Connection Fail");
}
?>