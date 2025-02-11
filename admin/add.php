<?php 
include('../includes/header.php')?>
<?php 
include('../includes/session.php');
?>

<?php
	if(isset($_POST['add_staff']))
	{
	
	$fname=$_POST['Username'];
	$password=($_POST['password']);  
	$address=$_POST['address']; 
	$user_role=$_POST['user_role']; 
	$phonenumber=$_POST['phonenumber'];      
	$shop=$_POST['shop_name'];      
	$question=$_POST['question'];      
	$answer=$_POST['answer'];      
?>
	<?php
        mysqli_query($conn,"INSERT INTO users(Username,Passwords,`Address`,UserType,`Number`,`Image`,shop_ID,Question,Answer) VALUES('$fname','$password','$address','$user_role','$phonenumber', 'NO-IMAGE-AVAILABLE.jpg',$shop,'$question','$answer')") or die(mysqli_error()); ?>
		<script>alert('Staff Records Successfully  Added');</script>;
		<script>
		window.location = "members.php"; 
		</script>
		<?php   
}

?>

<body>
	<div class="mobile-menu-overlay"></div>

	<div class="mobile-menu-overlay"></div>
	<div class="container" style="margin-left: 30%;margin-bottom:20px">
        <div class="navigation">
            <ul>
                <li class="list">
                    <a href="index.php">
                        <span class="icon">
                            <ion-icon name="home-outline"></ion-icon>
                        </span>
                        <span class="text">Home</span>
                        <span class="circle"></span>
                    </a>
                </li>

                <li class="list">
                    <a href="sales.php">
                        <span class="icon">
                            <ion-icon name="cart-outline"></ion-icon>
                        </span>
                        <span class="text">Sales</span>
                        <span class="circle"></span>
                    </a>
                </li>
    
                <li class="list">
                    <a href="stock.php">
                        <span class="icon">
                            <ion-icon name="bag-remove-outline"></ion-icon>
                        </span>
                        <span class="text">Stock</span>
                        <span class="circle"></span>
                    </a>
                </li>
                <li class="list active">
                    <a href="add.php">
                        <span class="icon">
                            <ion-icon name="person-add-outline"></ion-icon>
                        </span>
                        <span class="text">Add</span>
                        <span class="circle" style="transform: translateY(-32px) scale(1)"></span>
                    </a>
                </li>
                <li class="list">
                    <a href="members.php">
                        <span class="icon">
                            <ion-icon name="people-outline"></ion-icon>
                        </span>
                        <span class="text">Manage</span>
                        <span class="circle"></span>
                    </a>
                </li>
                <li class="list">
                    <a href="../includes/logout.php">
                        <span class="icon">
                            <ion-icon name="log-out-outline"></ion-icon>                        </span>
                        <span class="text">Logout</span>
                        <span class="circle"></span>
                    </a>
                </li>
                <div class="indicator"></div>
            </ul>
        </div>
    </div>
    

    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

	<div class="main-container" style="margin-top: 0px;padding-top:0px;margin-left:-10%">
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
									<li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
									<li class="breadcrumb-item active" aria-current="page">Staff Module</li>
								</ol>
							</nav>
						</div>
					</div>
				</div>

				<div class="pd-20 card-box mb-30">
					<div class="clearfix">
						<div class="pull-left">
							<h4 class="text-blue h4">Staff Form</h4>
							<p class="mb-20"></p>
						</div>
					</div>
					<div class="wizard-content">
						<form method="post" action="">
							<section>
								<div class="row">
									<div class="col-md-6 col-sm-12">
										<div class="form-group">
											<label >User Name :</label>
											<input name="Username" type="text" class="form-control wizard-required" required="true" autocomplete="off">
										</div>
									</div>
									<div class="col-md-6 col-sm-12">
										<div class="form-group">
											<label>Password :</label>
											<input name="password" type="password" placeholder="**********" class="form-control" required="true" autocomplete="off">
										</div>
									</div>
                                </div>
								<div class="row">
									<div class="col-md-6 col-sm-12">
										<div class="form-group">
											<label>Phone Number :</label>
											<input name="phonenumber" type="text" class="form-control" required="true" autocomplete="off">
										</div>
									</div>
									<div class="col-md-6 col-sm-12">
										<div class="form-group">
											<label>Address :</label>
											<input name="address" type="text" class="form-control" required="true" autocomplete="off">
										</div>
									</div>
								</div>

								<div class="row">
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
                                </div>
								<div class="row">
									<?php
									$sql = "SELECT * FROM users";
									$query = mysqli_query($conn, $sql);
									
									?>
									<div class="col-md-6 col-sm-12">
										<div class="form-group">
											<label>Question:</label>
											<select name="question" class="custom-select form-control" required autocomplete="off">
												<option value="">Select a question</option> <!-- Add a default option with an empty value -->
												<?php while ($row = mysqli_fetch_assoc($query)) { ?>
													<option value="<?php echo $row['Question']; ?>"><?php echo $row['Question']; ?></option>
												<?php } ?>
											</select>
										</div>
									</div>

									<div class="col-md-6 col-sm-12">
										<div class="form-group">
											<label>Answer :</label>
											<input name="answer" type="text" class="form-control" required="true" autocomplete="off">
										</div>
									</div>
								</div>
                                <div class="row"></div>
									<div class="col-md-4 col-sm-12">
										<div class="form-group">
											<label style="font-size:16px;"><b></b></label>
											<div class="modal-footer justify-content-center">
												<button class="btn btn-primary" name="add_staff" id="add_staff" data-toggle="modal">Add&nbsp;Staff</button>
											</div>
										</div>
									</div>
							</section>
						</form>
					</div>
				</div>

			</div>
		</div>
	</div>
	<!-- js -->
	<?php include('../includes/scripts.php')?>
	<script src="script.js"></script>

</body>
</html>