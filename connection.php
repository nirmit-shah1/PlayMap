
	<html>
<body>
<?php


	$con=mysqli_connect("localhost","root","","playmap");

if (mysqli_connect_errno())
  {
echo "failed to connect".mysqli_connect_error();
}

if(mysqli_ping($con))
{

}

else
{

echo "error".mysqli_error($con);
}


?>
</body>
</html>