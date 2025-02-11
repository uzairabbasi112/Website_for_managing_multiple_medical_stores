<?php 
include('../includes/header.php')?>
<?php 
include('../includes/session.php');
?>
	
<?php $get_id = $_GET['edit']; ?>
<?php
	if(isset($_POST['add_staff']))
	{
	
        $fname=$_POST['Username'];
        $password=md5($_POST['password']);  
        $address=$_POST['address']; 
        $user_role=$_POST['user_role']; 
        $phonenumber=$_POST['phonenumber'];      
        $shop=$_POST['shop_name'];  
$sql = "update users set Username='$fname',Address='$address',UserType='$user_role',`Passwords`='$password', Number='$phonenumber',`Image`='NO-IMAGE-AVAILABLE.jpg' where UserID='$get_id'";
// die($sql);
	$result = mysqli_query($conn,$sql);
	$new = "UPDATE users SET device_uid = (SELECT device_uid FROM devices WHERE device.device_dep = users.device_dep );";	
	if ($result) {
     	echo "<script>alert('Record Successfully Updated');</script>";
     	echo "<script type='text/javascript'> document.location = 'managers.php'; </script>";
	} else{
	  die(mysqli_error());
   }
		
}

?>

<body>

	<div class="mobile-menu-overlay"></div>

	<div class="mobile-menu-overlay"></div>

	<div class="main-container" style="justify-content: center;align-self:center">
		<div class="pd-ltr-20 xs-pd-20-10">
			<div class="min-height-200px">
				<div class="page-header">
					<div class="row">
						<div class="col-md-6 col-sm-12">
							<div class="title">
								<h4>Staff Portal</h4>
							</div>
							<nav aria-label="breadcrumb" role="navigation">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
									<li class="breadcrumb-item active" aria-current="page">Staff Edit</li>
								</ol>
							</nav>
						</div>
					</div>
				</div>

				<div class="pd-20 card-box mb-30">
					<div class="clearfix">
						<div class="pull-left">
							<h4 class="text-blue h4">Edit Staff</h4>
							<p class="mb-20"></p>
						</div>
					</div>
					<div class="wizard-content">
						<form method="post" action="">
							<section>
								<?php
									$query = mysqli_query($conn,"select * from users where UserID = '$get_id' ")or die(mysqli_error());
									$row = mysqli_fetch_array($query);
									?>

								<div class="row">
									<div class="col-md-6 col-sm-12">
										<div class="form-group">
											<label >Full Name :</label>
											<input name="Username" type="text" class="form-control wizard-required" required="true" autocomplete="off" value="<?php echo $row['Username']; ?>">
										</div>
									</div>
                                    <div class="col-md-6 col-sm-12">
										<div class="form-group">
											<label>Password :</label>
											<input name="password" type="password" placeholder="**********" class="form-control"  required="true" autocomplete="off" value="<?php echo $row['Passwords']; ?>">
										</div>
									</div>
								</div>
							
								<div class="row">
                                    <div class="col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label>Phone Number :</label>
                                            <input name="phonenumber" type="text" class="form-control" required="true" autocomplete="off"value="<?php echo $row['Number']; ?>">
                                        </div>
									</div>
                                
									<div class="col-md-6 col-sm-12">
										<div class="form-group">
											<label>Address :</label>
											<input name="address" type="text" class="form-control" required="true" autocomplete="off"value="<?php echo $row['Address']; ?>">
										</div>
									</div>
                                </div>
									
								</div class="row">
									<div class="col-md-6 col-sm-12">
										<div class="form-group">
											<label>Shop Name :</label>
											<select name="shop_name" class="custom-select form-control" required="true" autocomplete="off">
												<option value="">Select Shop</option>
												<option value="1">Malik</option>
												<option value="2">Wickey</option>
												<option value="3">Ayub</option>
												<option value="4">Noori</option>
											</select>
										</div>
									</div>
                                    <div class="col-md-6 col-sm-12">
										<div class="form-group">
											<label>User Role :</label>
											<select name="user_role" class="custom-select form-control" required="true" autocomplete="off">
												<option value="">Select Role</option>
												<option value="Admin">Admin</option>
												<option value="Manager">Manager</option>
												<option value="staff">Staff</option>
											</select>
										</div>
									</div>
                                </div>

									<div class="col-md-4 col-sm-12">
										<div class="form-group">
											<label style="font-size:16px;"><b></b></label>
											<div class="modal-footer justify-content-center">
												<button class="btn btn-primary" name="add_staff" id="add_staff" data-toggle="modal">Update&nbsp;Staff</button>
											</div>
										</div>
									</div>
							</section>
						</form>
					</div>
				</div>

			</div>
			<?php include('../includes/footer.php'); ?>
		</div>
	</div>
	<!-- js -->
	<?php include('../includes/scripts.php')?>
</body>
</html>