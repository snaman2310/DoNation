<?php
$login = false;
$showError = false;
if($_SERVER["REQUEST_METHOD"] == "POST"){
    include 'dbconnect.php';
    $contact = $_POST["email"];
    $password = $_POST["password"]; 
    
     
    $sql = "Select * from users where email='$email'";
    $result = mysqli_query($conn, $sql);
    $num = mysqli_num_rows($result);
    if ($num == 1){
        while($row = mysqli_fetch_assoc($result)){
            if (password_verify($password,$row['password']))
            $login = true;
        }
        session_start();
        $_SESSION['loggedin'] = true;
        $_SESSION['email'] = $email;
        header("location: welcome.php"); //header is redirect krne ka koi page pr krne ka function

    } 
    else{
        $showError = "Invalid Credentials";
    }
}
    
?>





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register with us</title>
    <link rel="stylesheet" href="./ngolog.css" >
</head>
<body>
    <div class="div1">
        <div class="text"></div>
    </div>
    <div class="div2">
        <div class="login">
            <img src="./Pages/food-tree-high-resolution-logo-transparent.png" >
            <div class="form">
                <div class="email">
                    <h5>E-mail Address</h5>
                    <input type="email" required="required"  class="emailbox" name="email"></div>
                <div class="password">
                    <h5>Password</h5>
                    <input type="password"  class="passwordbox" maxlength="8" minlength="4" required name="password" >
                </div>

                <a href="./ngoredirect.html"><button type="button" class="button"><h4>Log-in</h4></button></a>
                <div class="text1">Not a member no worries, <a href="./donorsignup.html">sign-up</a>
                </div>
            </div>
            
        </div>
    </div>
</body>
</html>