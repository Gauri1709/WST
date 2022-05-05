<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Display Users</title>
</head>
<body>
<div class="topnav">
  <a href="login.php">Form</a>
  <a href="login.php">Details</a>
  <form method="POST">
  <button name = "logout">Logout</button>
  <button onclick="change_name(document.getElementById('name').innerHTML)">Change</button>
</form>
</div>

</body>
</html>

<?php
    require("connection.php");
    session_start();
    $name = $_SESSION["adminuser"];
    echo $name;
    if(!isset($name)){
        header("location: login.php");
    }
    $query = "SELECT * FROM `users`";
    $result = mysqli_query($conn,$query);
    if($result){
    while($row = mysqli_fetch_assoc($result)){
        $name = $row['Name'];
        $mis = $row['Mis'];
        $email = $row['email'];
        echo '<div id="name">'.$name.'</div>
              <div>'.$mis.'</div>
              <div>'.$email.'</div>';
    }
}

?>
<?php
    if(isset($_POST['logout'])){
        session_destroy();
        header("location: login.php");
    }
?>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script>
    function change_name(str){
        console.log("jsns");
        /*$.ajax({
            url:'getname.php',
            type: 'post',
            dataType: 'json',
            data: "str="+str,
            success: function(result){
                var mis = result;
                console.log(mis);
                document.getElementById("name").innerHTML=mis;
            }
        })*/
        //console.log(str);
        if(str.length == 0){
            document.getElementById("name").innerHTML="";
            return;
        }
        else{
            //console.log(str);
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onload = function(){
                if(this.readyState==4 && this.status==200){
                console.log(this.responseText);
                document.getElementById("name").innerHTML=this.responseText;}
            };
            xmlhttp.open("GET","getname.php?q="+str,true);
            xmlhttp.send();
        }

    }

</script>