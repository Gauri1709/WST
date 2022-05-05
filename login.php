
<?php

    require("connection.php");
    if(isset($_POST['sign'])){
        $user = $_POST['name'];
        $pass = $_POST['password'];
        echo $user;
        echo $pass;
        $query = "SELECT * FROM `users` WHERE `username`='$user' AND `password`='$pass'";
        $result = mysqli_query($conn,$query);
        $row = mysqli_fetch_assoc($result);
        $row_cnt = mysqli_num_rows($result);
        if($row_cnt==1){
            $name = $row['name'];
            $username = $row['username'];
            session_start();
            $_SESSION['adminuser'] = $username;
            $_SESSION['adminname'] = $name;
            header("location: pannal.php");
        }
        else{
            echo "<script>window.alert('incorrect username and password');</script>";
        }
    }
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form</title>
</head>
<body>
    <div>
        <form method="POST">
            <div>
                <input type="text" placeholder="username" name="name">
            </div>
            <div>
                <input type="password" placeholder="password" name="password">
            </div>
            
            <button type="submit" name="sign">Sign in</button>
        </form>
    </div>
</body>
</html>

