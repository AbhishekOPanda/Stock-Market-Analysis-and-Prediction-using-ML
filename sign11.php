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

$FirstName=$_POST['FirstName'];
$Email=$_POST['Email'];
$UserID=$_POST['UserID'];
$PhoneNumber=$_POST['PhoneNumber'];
$AdharNumber=$_POST['AdharNumber'];
$Password=$_POST['Password'];
#$RepeatPassword=$_POST['RepeatPassword'];

$s= " select * from login where UserID = '$UserID'";

$result = mysqli_query($conn, $s);

$num = mysqli_num_rows($result);

if ($num == 1){
	echo"UserID already taken!!!!   Signup with different UserID ";

}else{

$sql="INSERT INTO login (Name,Email,UserID,PhoneNumber,AadharNumber,Password)
 VALUES('$FirstName','$Email','$UserID','$PhoneNumber','$AdharNumber','$Password')";
if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
    echo "Please go back and login";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}}
$conn->close();
?>