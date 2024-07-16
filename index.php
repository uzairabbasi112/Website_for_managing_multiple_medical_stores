<?php
session_start();
include('includes/config.php');
if(isset($_POST['signin']))
{
	$username=$_POST['username'];
	$password=$_POST['password'];

	$sql ="SELECT * FROM users where Username ='$username' AND `Passwords` ='$password'";
	// die($sql);
	$query= mysqli_query($conn, $sql);
	$count = mysqli_num_rows($query);
	if($count > 0)
	{
		while ($row = mysqli_fetch_assoc($query)) {
		    if($row['UserType'] == 'Admin') {
		    	$_SESSION['UserID']=$row['UserID'];	
		    	$_SESSION['UserType']=$row['UserType'];
				echo "<script type='text/javascript'> document.location = 'admin/index.php'; </script>";
		    }
		    elseif($row['UserType'] == 'Manager') {
		    	$_SESSION['UserID']=$row['UserID'];
		    	$_SESSION['UserType']=$row['UserType'];
			 	echo "<script type='text/javascript'> document.location = 'manager/index.php'; </script>";
		    }
		    elseif($row['UserType'] == 'staff') {
		    	$_SESSION['UserID']=$row['UserID'];
		    	$_SESSION['UserType']=$row['UserType'];
			 	echo "<script type='text/javascript'> document.location = 'staff/index.php'; </script>";
		    }
		}

	} 
	else{
	  echo "<script>alert('Invalid Details');</script>";
	  $_SESSION['username'] = $username;
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
                    <h2>Sign In</h2>
                    <div class="input-box">
                        <span class="icon"><i class='bx bxs-envelope'></i></span>
                        <input type="text" name="username" required>
                        <label >Email</label>
                    </div>
                    <div class="input-box">
                        <span class="icon"><i class='bx bxs-lock-alt' ></i></span>
                        <input type="password" name="password" required>
                        <label>Password</label>
                    </div>
                    <button class="btn"  name="signin" id="signin" type="submit">Login</button>
					<a href="forgot.php" style="margin-top:10px;color:white">Forgot Password</a>
                </form>
            </div>
           
        </div>
    </div>
     <!-- SIGN UP FORM CREATION -->

    <script src="index.js"></script>
</body>

</html>