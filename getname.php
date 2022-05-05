<?php
require("connection.php");
$str = $_REQUEST["q"];
//header("location:login.php");
$sql = "SELECT * FROM `users`";
$result = mysqli_query($conn,$sql);
$row = mysqli_fetch_assoc($result);
if(mysqli_num_rows($result) == 0){
    echo "something";
}else{
    echo $row['Mis'];
}
?>