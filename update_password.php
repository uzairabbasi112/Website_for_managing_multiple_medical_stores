<?php
session_start();
include('includes/config.php');
$username=$_SESSION['username'];
if(isset($_POST['signin']))
{
	$pass1=$_POST['new_password'];
	$pass2=$_POST['new_password1'];

	$sql ="UPDATE users set Passwords = '$pass1' where Username = '$username'";
	$query= mysqli_query($conn, $sql);
	if($pass1 == $pass2)
	{
		echo "<script type='text/javascript'> document.location = 'index.php'; </script>";
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
        
        <div class="login-section">
            <div class="form-box login">
                <form name="signin" method="post">
                    <h2>Update Password</h2>
                    <div class="input-box">
                        <span class="icon"><i class='bx bxs-envelope'></i></span>
                        <input type="text" name="new_password" required>
                        <label >New Password</label>
                    </div>
                    <div class="input-box">
                        <span class="icon"><i class='bx bxs-lock-alt' ></i></span>
                        <input type="password" name="new_password1" required>
                        <label>Confirm Password</label>
                    </div>
                    <button class="btn"  name="signin" id="signin" type="submit">Login</button>
					<a href="update_password.php"></a>
                </form>
            </div>
           
        </div>
    </div>
     <!-- SIGN UP FORM CREATION -->

    <script src="index.js"></script>
</body>

</html>