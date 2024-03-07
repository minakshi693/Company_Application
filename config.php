<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "membership";
$conn = mysqli_connect($servername,$username,$password,$dbname);
if($conn){
   // echo "connected successfully";
}
else{
    echo "connection Failed";
}
?>