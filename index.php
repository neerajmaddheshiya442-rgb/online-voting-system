<?php
session_start();
include("db.php");

if(isset($_POST['login'])){

    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users 
            WHERE email='$email' AND password='$password'";

    $result = mysqli_query($conn, $sql);

    if(mysqli_num_rows($result) > 0){

        $row = mysqli_fetch_assoc($result);

        $_SESSION['user_id'] = $row['id'];

        echo "<script>
            alert('Login Successful');
            window.location.href='vote.php';
        </script>";

    } else {
        echo "<script>alert('Invalid Email or Password');</script>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login Page</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">

    <h2>Login</h2>

    <form method="POST">

        <input type="email" name="email" placeholder="Enter Email" required>

        <input type="password" name="password" placeholder="Enter Password" required>

        <button type="submit" name="login">Login</button>

    </form>

    <p>Don't have account? <a href="register.php">Register here</a></p>

   
</p>

</div>

</body>
</html>