<?php 
include('../includes/header.php')?>
<?php 
include('../includes/session.php');
?>
	<?php

			$sql = "SELECT * FROM users WHERE UserID = $session_id";
			$query = mysqli_query($conn, $sql);
			$row = mysqli_fetch_assoc($query);
			$shopID = $row["shop_ID"];
			$sql1 = "select * from shops where ShopID = $shopID";
			$query1 = mysqli_query($conn,$sql1);
			$row = mysqli_fetch_assoc($query1);
			$shopname = $row['ShopName'];
			$curr = date("Y-m-d");
	if(isset($_POST['add_staff']))
	{
        $MedID=$_POST['new_med'];
        $manif=$_POST['manuf'];
        $price=$_POST['price'];

$sql = "INSERT INTO `medicine`(  `MedicineName`, `Manufacturer`, `Price`,`Status`,`Quantity`,`Total`) VALUES ('$MedID','$manif',$price,0,0,0)";
	$result = mysqli_query($conn,$sql);
	if ($result) {
     	echo "<script>alert('Record Successfully Updated');</script>";
     	echo "<script type='text/javascript'> document.location = 'stock_check.php'; </script>";
	} else{
	  die(mysqli_error());
   }
		
}

?>

<body>

<div class="mobile-menu-overlay"></div>


<div class="container" style="margin-left: 30%;margin-bottom:20px">
	<div class="navigation">
		<ul>
			<li class="list ">
				<a href="index.php">
					<span class="icon">
						<ion-icon name="home-outline"></ion-icon>
					</span>
					<span class="text">Home</span>
					<span class="circle"></span>
				</a>

			<li class="list  ">
				<a href="purchase.php">
					<span class="icon">
						<ion-icon name="cart-outline"></ion-icon>
					</span>
					<span class="text">Sales</span>
					<span class="circle" ></span>
				</a>
			</li>
			<li class="list">
				<a href="stock_entry.php">
					<span class="icon">
						<ion-icon name="bag-remove-outline"></ion-icon>
					</span>
					<span class="text">Stock</span>
					<span class="circle" ></span>
				</a>
			</li>
			<li class="list">
			<a href="stock_check.php">
                        <span class="icon">
                            <ion-icon name="person-add-outline"></ion-icon>
                        </span>
                        <span class="text">Stock Check</span>
                        <span class="circle"></span>
                    </a>
			</li>
			<li class="list active">
				<a href="enter_medicine.php">
					<span class="icon">
                    <i class="bi bi-prescription2"></i>
                	</span>
					<span class="text">Enter Medicine</span>
					<span class="circle" style="transform: translateY(-32px) scale(1)"></span>
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


	<div class="main-container" style="margin-left: -17%;margin-top:-10%">
		<div class="pd-ltr-20 xs-pd-20-10">
			<div class="min-height-200px">
				<div class="page-header">
					<div class="row">
						<div class="col-md-6 col-sm-12">
							<div class="title">
								<h4>Stock Entry</h4>
							</div>
							<nav aria-label="breadcrumb" role="navigation">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
									<li class="breadcrumb-item active" aria-current="page">Stock Edit</li>
								</ol>
							</nav>
						</div>
					</div>
				</div>

				<div class="pd-20 card-box mb-30">
					<div class="clearfix">
						<div class="pull-left">
							<h4 class="text-blue h4">Enter New Medicine</h4>
							<p class="mb-20"></p>
						</div>
					</div>
					<div class="wizard-content">
						<form method="post" action="">
							<section>
								
									
								<div class="row">
									<div class="col-md-6 col-sm-12">
										<div class="form-group">
											<label >Shop Name:</label>
											<input name="shopname" disabled type="text" class="form-control wizard-required" required="true" autocomplete="off" value="<?php echo $shopname; ?>">
										</div>
									</div>
                                    <div class="col-md-6 col-sm-12">
										<div class="form-group">
											<label>New Medicine :</label>
											<input name="new_med" type="text" class="form-control wizard-required" required="true" autocomplete="off" >
										</div>
									</div>
								</div>
							
								<div class="row">
                                    <div class="col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label>Manufacturer:</label>
                                            <input name="manuf" type="text" class="form-control" required="true" autocomplete="off"?>
                                        </div>
									</div>
									<div class="col-md-6 col-sm-12">
										<div class="form-group">
											<label>Price :</label>
											<input name="price" type="text" class="form-control" required="true" autocomplete="off"?>
										</div>
									</div>
                                
									
                                </div>
									
									<div class="col-md-4 col-sm-12">
										<div class="form-group">
											<label style="font-size:16px;"><b></b></label>
											<div class="modal-footer justify-content-center">
												<button class="btn btn-primary" name="add_staff" id="add_staff" data-toggle="modal">Add&nbsp;Medicine</button>
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