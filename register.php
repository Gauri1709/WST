<?php
    require("connection.php");
    if(isset($_POST['submit'])){       
        $name = $_POST['name'];
        $mis = $_POST['mis'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $email = $_POST['email'];
         
        $query = "SELECT * from `users` where `username`='$username'";
        $result = mysqli_query($conn,$query);
        $row = mysqli_fetch_assoc($result);
        $row_cnt = mysqli_num_rows($result);
        if($row_cnt>0){
            echo "<script>alert('Username already in use');</script>";
            exit();
        }
        $query = "SELECT * from `users` where `email`='$email'";
        $result = mysqli_query($conn,$query);
        $row = mysqli_fetch_assoc($result);
        $row_cnt = mysqli_num_rows($result);
        if($row_cnt>0){
            echo "<script>window.alert('Email already in use');</script>";
            exit();
        }
        $query = "INSERT INTO `users` (Name,username,password,Mis,email) VALUES ('$name','$username','$password','$mis','$email')";
        $result = mysqli_query($conn,$query);
        if($result){
            header("location: login.php");
        }
        else{
            die(mysqli_error($conn));
        }

    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script type="text/javascript" src="validation.js"></script>
    <link rel="stylesheet" href="style.css"></link>
    <title>Register</title>
</head>
<body>
    <div>
        <form name="form" onsubmit="return validateForm()" method="POST">
            <div>
                <label>Name</label>
                <input type="text" placeholder="Name" name="name">
            </div>
            <div>
                <label>MIS</label>
                <input type="text" placeholder="MIS" name="mis">
            </div>
            <div>
                <label>Username</label>
                <input type="text" placeholder="Username" name="username">
            </div>
            <div>
                <label>Password</label>
                <input type="password" placeholder="password" name="password">
            </div>
            <div>
                <label>Email</label>
                <input type="text" placeholder="Email" name="email">
            </div>
            <div>
            <button type = "submit" name = "submit">Register</button>
</div>
        </form>
</div>
</body>
</html>


