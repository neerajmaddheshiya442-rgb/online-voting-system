<?php 
session_start();
include("db.php");

// login check
if(!isset($_SESSION['user_id'])){
    header("Location: index.php");
    exit();
}

$user_id = $_SESSION['user_id'];

if(isset($_POST['candidate'])){

    $candidate_id = (int) $_POST['candidate'];

    // check if user already voted
    $check = mysqli_query($conn, "SELECT has_voted FROM users WHERE id=$user_id");
    $row = mysqli_fetch_assoc($check);

    if($row['has_voted'] == 1){
        echo "<script>
            alert('You already voted!');
            window.location.href='vote.php';
        </script>";
        exit();
    }

    // give vote
    mysqli_query($conn, "UPDATE users SET votes = votes + 1 WHERE id=$candidate_id");

    // mark voted
    mysqli_query($conn, "UPDATE users SET has_voted = 1 WHERE id=$user_id");

    echo "<script>
        alert('Vote Successful!');
        window.location.href='vote.php';
    </script>";
}

/* fetch candidates */
$sql = "SELECT * FROM users WHERE role='candidate'";
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Vote Page</title>
    <link rel="stylesheet" href="style.css"> <!-- 🔥 CSS FIX -->
</head>
<body>

<div class="container">

    <h2>Vote Here</h2>

    <form method="POST">

        <div class="candidate-box">

        <?php while($row = mysqli_fetch_assoc($result)){ ?>

            <button type="submit" name="candidate" value="<?php echo $row['id']; ?>">
                <?php echo $row['name']; ?>
            </button>
            <br><br>

        <?php } ?>

        </div>

    </form>

</div>

<div class="nav-btn">
    <a href="index.php">Home</a>

    
</div>

<div class ="container"
 <p style="margin-top:15px;">
    Want to see results? 
    <a href="result.php">View Result</a>
</div>
</body>
</html>