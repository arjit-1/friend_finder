<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<?php
$con=mysqli_connect("localhost","root","","social_network");
if(!mysqli_connect_errno($con))
{
	echo "Connected! <br/>";
}

	$fn=$_POST['Email'];
	$ln=$_POST['firstname'];
	$e=$_POST['lastname'];
	$n=$_POST['password'];
	
$sql="INSERT INTO users VALUES('$fn','$ln','$e','$n')";
$c=mysqli_query($con,$sql);
if($c)
	echo"record added </br>";
else
	echo "not added";
echo mysql_error();

?>
<body>

</body>
</html>
