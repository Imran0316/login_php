<?php
include("dbconnection.php");
session_start();
if(isset($_SESSION["username"])){
    header("location:dashboard.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="post">
        <label for="name">User name</label> <br>
        <input type="text" name="name" require> <br>

        <label for="password">Password</label> <br>
        <input type="text" name="password" require id="showpass"> <br>
        <input type="checkbox" name="check" onclick="show_pass()">
        <label for="check">show password</label>

        <input type="submit" value="submit" name="submit">

    </form>
</body>
</html>
<?php
if(isset($_POST["submit"])){
    $username = $_POST["name"];
    $password = $_POST["password"];
    $sql = "SELECT * FROM login_dt WHERE username = '$username' and password = '$password'";
    $run=mysqli_query($connection,$sql);
    $row=mysqli_num_rows($run);
    if($row==1){
       $_SESSION["username"] = $username;
       $_SESSION["last_time"]=time();
       header("location:dashboard.php");
    }else{
        echo "<script>alert'password or username is inccorect'</script>";
    }
}
?>
<script>
    function show_pass(){
        let pass = document.getElementById('showpass');
        if(pass.type == 'password'){
            pass.type = 'text';
        }else{
            pass.type = 'password';
        }
    }
</script>