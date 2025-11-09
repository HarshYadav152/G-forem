<?php
$showError = "false";
$showAlert = false;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include "_dbconnect.php";

    $username = $_POST['susername'];
    $password = $_POST['signupPass'];
    $profession = $_POST['profession'];

    // check existing username
    $chackSQL = "SELECT * FROM `users` WHERE username = '$username'";

    $result = mysqli_query($conn, $chackSQL);
    $numRows = mysqli_num_rows($result);

    if ($numRows > 0) {
        $showError = "Username already exists.";
    } 
    else {
        $passHash = password_hash($password, PASSWORD_ARGON2ID);
        $sql = "INSERT INTO `users` (`username`, `password`, `profession`, `createdAt`) VALUES ('$username', '$passHash', '$profession', current_timestamp())";

        $result = mysqli_query($conn, $sql);
        if ($result) {
            $showAlert = true;
            header("Location: /forumsapplication/index.php?signupSuccess=true"); // redirect it to home page
            exit();
        }
    }
    header("Location: /forumsapplication/index.php?signupSuccess=false&error=$showError");
}
