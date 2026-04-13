<?php
include("db.php");

if(isset($_POST['register'])){

    $name = $_POST['name'];
    $email = $_POST['email'];
    $age = $_POST['age'];
    $address = $_POST['address'];
    $mobile = $_POST['mobile'];
    $password = $_POST['password'];
    $role = $_POST['role'];

    // NOTE: ensure your table has these columns OR ignore extra fields
    $sql = "INSERT INTO users (name, email, age, address, mobile, password, role) 
        VALUES ('$name', '$email', '$age', '$address', '$mobile', '$password', '$role')";
        

    if(mysqli_query($conn, $sql)){
        echo "<script>alert('Registration Successful');</script>";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Register</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">
    <h2>Registration</h2>

    <!-- FORM START -->
    <form method="POST">

        <input type="text" name="name" placeholder="Enter Name" required>

        <input type="number" name="age" placeholder="Enter Age" required>

        <input type="text" name="address" placeholder="Enter Address" required>

        <input type="tel" name="mobile" placeholder="Enter Mobile" required>

        <input type="email" name="email" placeholder="Enter Email" required>

        <input type="password" name="password" placeholder="Enter Password" required>

        <select name="role" required>
            <option value="">Select Role</option>
            <option value="user">User</option>
            <option value="candidate">Candidate</option>
        </select>

        <button type="submit" name="register">Register</button>

    </form>
    <!-- FORM END -->

    <p id="showId"></p>

    <div class="nav-btn">
        <a href="index.php">Home</a>
    </div>
</div>

</body>
</html>