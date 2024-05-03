<?php


function checkString($inputString) {
    $hasUppercase = preg_match('/[A-Z]/', $inputString);
    $hasLowercase = preg_match('/[a-z]/', $inputString);
    $hasSpecialSymbols = preg_match('/[^A-Za-z0-9]/', $inputString);

    if ($hasLowercase==1 && $hasSpecialSymbols==1 && $hasUppercase==1){
        return TRUE;
    }
}


$showAlert = false;
$showError = false;
if($_SERVER["REQUEST_METHOD"] == "POST"){
    include 'dbconnect.php';
    $contact = $_POST["contact"];
    $password = $_POST["password"];
    $cpassword = $_POST["cpassword"];
    $name = $_POST["orgname"];
    $email = $_POST["email"];
    $city = $_POST["city"];

    $hash = password_hash($password,PASSWORD_DEFAULT);
    $exists=false;
    if(($password == $cpassword) && $exists==false){
        if(checkString($password) == true){
            $sql = "INSERT INTO `information` ( `contact`, `password`,`name`,`email`,`address`,`city`) VALUES ('$contact', '$hash','$name','$email','$address','$city')";
            $result = mysqli_query($conn, $sql);
            if ($result){
                $showAlert = true;
            }
        }
        else{
            echo "Inpur Strong Password containing Uppercase lowercase and special symbol";
        }    
    }
    else{
        $showError = "Passwords do not match";
    }
}
    
?>





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Partner with us</title>
    <link rel="stylesheet" href="./ngosignup.css" >
</head>
<body>
    <div class="div1">
        <div class="text"></div>
    </div>

    <div class="div2">
        <div class="signup">
            <img src="xyz.jpg" >
            <div class="form">
                <div class="name">
                    <h5>Organization's Name</h5>
                    <input type="name" required="required"  class="namebox" name ="orgname">
                </div>
                <div class="email">
                    <h5>E-mail Address</h5>
                    <input type="email" required="required"  class="emailbox" name= "email">
                </div>
                <div class="contact">
                    <h5>Contact No</h5>
                    <input type="tel" required="required"  class="contactbox" pattern="[0-9]{5}-[0-9]{5}" minlength="10" maxlength="10" name="contact">
                </div>
                <div class="city">
                    <h5>City</h5>
                    <select name="city" class="citybox" name ="city">
                        <option value="choose">Choose city</option>
                        <option value="agra">Agra</option>
                        <option value="gwalior">Gwalior</option>
                      </select>
                      
                </div>
                <div class="certificate" name = "certificate">
                    <h5>Goverment Certificate of NGO</h5>
                    <div class="mine">
                    <input type="file" id="certificateFile" name="certificateFile" class="inputbox" accept=".pdf, .png, .jpg, .jpeg">
                    <button type="submit" class="submit">Submit</button>
                    </div>
        
                </div>
                <div class="password" name = "password">
                    <h5>Password</h5>
                    <input type="password" required="required"  class="passwordbox" minlength="6" maxlength="8">
                </div>
            </div>
            <a href="./ngoredirect.html"><button type="button" class="button"><h4>Log-in</h4></button></a>
            <div class="text1">Already member with us, that's cool <a href="./ngolog.html">log-in</a>
            </div>
        </div>
    </div>
</body>
</html>