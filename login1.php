<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "iterators";
// Create connection
$conn = new mysqli($servername, $username, $password,$dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
 


$UserID=$_POST['UserID'];

$Password=$_POST['Password'];



$s= " select * from login where UserID = '$UserID'and Password='$Password'" ;

$result = mysqli_query($conn, $s);

$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
$active = $row['active'];
$num = mysqli_num_rows($result);


if ($num == 1){
	header("location: index.php");

}else
{
	echo "SORRY!!!!    USERID DOES NOT EXISTS!!!!!!!!";
}
$conn->close();
?>