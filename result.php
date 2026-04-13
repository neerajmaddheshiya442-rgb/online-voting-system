<?php 
session_start();
include("db.php");

// 🔥 STRICT LOGIN CHECK
if(!isset($_SESSION['user_id'])){
    header("Location: index.php");
    exit();
}

// 🔥 VERIFY USER STILL EXISTS IN DATABASE (IMPORTANT SECURITY)
$user_id = $_SESSION['user_id'];

$check = mysqli_query($conn, "SELECT * FROM users WHERE id='$user_id'");
if(mysqli_num_rows($check) == 0){
    session_destroy();
    header("Location: index.php");
    exit();
}

// fetch results
$sql = "SELECT name, votes FROM users WHERE role='candidate'";
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Result Page</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">

    <h2>Election Result</h2>

    <?php while($row = mysqli_fetch_assoc($result)){ ?>
        <p>
            <?php echo $row['name']; ?> 
            = 
            <b><?php echo $row['votes']; ?></b> votes
        </p>
    <?php } ?>

</div>

<div class="nav-btn">
    <a href="index.php">Back to home</a>
</div>

</body>
</html>