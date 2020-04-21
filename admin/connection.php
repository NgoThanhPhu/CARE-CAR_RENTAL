<?php
$server_username ="root";
$server_password ="";
$server_host = "localhost";
$database = 'project rent car';
// Kết nối với dữ liệu
$conn = mysqli_connect($server_host,$server_username,$server_password,$database) or die("Unable to connect");

//Check connection
if($conn === false) {
    die("ERROR: Fail to connect...".mysqli_connect_error());
}
?>