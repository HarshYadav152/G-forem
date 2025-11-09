<?php

$showStatus = "false";
$showAlert = false;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include "_dbconnect.php";
    $username = $_POST['lusername'];
    $password = $_POST['loginPass'];

    // remove any <> from our comment and replate it with &lt; and &gt;
    $reUsername = str_replace("<","&lt;",$username);
    $reUsername2 = str_replace(">","&gt;",$reUsername);

    $checkSQL = "SELECT * FROM `users` WHERE `username` = '$username'";
    $result = mysqli_query($conn,$checkSQL);

    $rows = mysqli_num_rows($result);
    if($rows<0){
        $showStatus = "Username is not exist, Please create your account first.";
    }else{
        $dbResult = mysqli_fetch_assoc($result);
        $hashedPass = $dbResult['password'];
        $verifyPass = password_verify($password,$hashedPass);
        if($verifyPass){
            session_start();
            $_SESSION['loggedin'] = true;
            $_SESSION['username'] = $reUsername2;
            $showStatus = "Loggedin successfully, Welcome ".$reUsername2;
            header("Location: /forumsapplication/index.php?loginStatus=true&status=$showStatus");
            exit();
        }else{
            $showStatus = "Unable to login, Wrong Credentials.";
            header("Location: /forumsapplication/index.php?loginStatus=false&status=$showStatus");
        }
    }
}

?>