<?php
session_start();
include('includes/config.php');
$username=$_SESSION['username'];
if(isset($_POST['signin']))
{
	$question=$_POST['question'];
	$answer=$_POST['answer'];

	$sql ="SELECT * FROM users where Username ='$username' AND `Answer` ='$answer'";
	// die($sql);
	$query= mysqli_query($conn, $sql);
	$count = mysqli_num_rows($query);
	if($count > 0)
	{
        echo "<script type='text/javascript'> document.location = 'update_password.php'; </script>";
    }
	else{
	  echo "<script>alert('Invalid Details');</script>";
	}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Hash Techie Official</title>
    <link rel="stylesheet" href="ssss.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>
    <!-- LOGIN FORM CREATION -->
    <div class="background"></div>
    <div class="container">
        <?php
        $sql = "select * from users where Username = '$username'";
        $query = mysqli_query($conn,$sql);
        $row = mysqli_fetch_assoc($query);
        ?>
        
        <div class="login-section">
            <div class="form-box login">
                <form name="signin" method="post">
                    <h2>Sign In</h2>
                    <div class="input-box">
                        <span class="icon"><i class='bx bxs-envelope'></i></span>
                        <input type="text" name="question" value="<?php echo $row['Question']?>" required>
                        <label >Question</label>
                    </div>
                    <div class="input-box">
                        <span class="icon"><i class='bx bxs-lock-alt' ></i></span>
                        <input type="password" name="answer" required>
                        <label>Answer</label>
                    </div>
                    <button class="btn"  name="signin" id="signin" type="submit">Login</button>
                </form>
            </div>
           
        </div>
    </div>
     <!-- SIGN UP FORM CREATION -->

    <script src="index.js"></script>
</body>

</html>