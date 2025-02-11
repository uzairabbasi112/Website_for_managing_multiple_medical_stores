<?php 
include('../includes/header.php')?>
<?php 
include('../includes/session.php');
?>
<body>

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
                        <span class="circle" ></span>
                    </a>
                </li>

                <li class="list active">
                    <a href="sales.php">
                        <span class="icon">
                            <ion-icon name="cart-outline"></ion-icon>
                        </span>
                        <span class="text">Sales</span>
                        <span class="circle" style="transform: translateY(-32px) scale(1)"></span>
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
                <li class="list">
                    <a href="add.php">
                        <span class="icon">
                            <ion-icon name="person-add-outline"></ion-icon>
                        </span>
                        <span class="text">Add</span>
                        <span class="circle"></span>
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
		<div class="pd-ltr-20">
			<div class="title pb-20">
				<h2 class="h3 mb-0">Sales Information</h2>
			</div>
			<div class="row pb-10">
				<div class="col-xl-3 col-lg-3 col-md-6 mb-20">
					<div class="card-box height-100-p widget-style3">

						<?php
						$sql = "SELECT * from shops  where ShopID = 1";
						$query =mysqli_query($conn,$sql);
						
						$results= mysqli_fetch_assoc($query);
						$empcount=mysqli_num_rows($query);
						?>

						<div class="d-flex flex-wrap">
							<div class="widget-data" style="border: 2px solid  yellow;">
							<div class="weight-700 font-24 text-dark"style="text-align:center" >SHOP 1 </div>
								<div class="font-14 text-secondary weight-500"><?php echo $results['Location'] ?></div>
							</div>
							<div class="widget-icon">
							</div>
						</div>
					</div>
				</div>
				<div class="col-xl-3 col-lg-3 col-md-6 mb-20">
					<div class="card-box height-100-p widget-style3">

						<?php
						$status=1;
						$sql = "SELECT * from shops  where ShopID = 2";
						$query =mysqli_query($conn,$sql);
						
						$results= mysqli_fetch_assoc($query);
						$leavecount=mysqli_num_rows($query);
						?>        

						<div class="d-flex flex-wrap">
							<div class="widget-data" style="border: 2px solid  greenyellow;" >
							<div class="weight-700 font-24 text-dark"style="text-align:center" >SHOP 2 </div>
								<div class="font-14 text-secondary weight-500"><?php echo $results['Location'] ?></div>
							</div>
							<div class="widget-icon">
							</div>
						</div>
					</div>
				</div>
				<div class="col-xl-3 col-lg-3 col-md-6 mb-20">
					<div class="card-box height-100-p widget-style3">

						<?php
						$status=0;
						$sql = "SELECT * from shops where ShopID = 3";
						$query =mysqli_query($conn,$sql);
						
						$results= mysqli_fetch_assoc($query);
						$leavecount=mysqli_num_rows($query);
						?>        

						<div class="d-flex flex-wrap">
							<div class="widget-data"  style="border: 2px solid  cyan;">
							<div class="weight-700 font-24 text-dark"style="text-align:center" >SHOP 3 </div>
								<div class="font-14 text-secondary weight-500"><?php echo $results['Location'] ?></div>
							</div>
							<div class="widget-icon">
							</div>
							
						</div>
					</div>
				</div>
				<div class="col-xl-3 col-lg-3 col-md-6 mb-20">
					<div class="card-box height-100-p widget-style3">

						<?php
						$status=2;
						$sql = "SELECT * from shops where ShopID = 4";
						$query =mysqli_query($conn,$sql);
						
						$results= mysqli_fetch_assoc($query);
						$leavecount=mysqli_num_rows($query);
						?>  

						<div class="d-flex flex-wrap">
							<div class="widget-data"  style="border: 2px solid  aquamarine;">
							<div class="weight-700 font-24 text-dark"style="text-align:center" >SHOP 4 </div>
								<div class="font-14 text-secondary weight-500"><?php echo $results['Location'] ?></div>
							</div>
							<div class="widget-icon">
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="row">
            <div class="col-lg-3 col-md-6 mb-20">
					<div class="card-box height-100-p pd-20 min-height-200px"  style="border: 2px solid  yellow;" >
						<div class="d-flex justify-content-between">
							<div class="h5 mb-0">Sales by Medicines</div>
						</div>
						<div>
							<?php $sql = "select * from sales join medicine on sales.MedicineID = medicine.MedicineID  where sales.ShopID = 1";

							$query = mysqli_query($conn,$sql) or die(mysqli_error());
							while ($row = mysqli_fetch_array($query)) {
								?>
								<ul style="padding-left: 0px;">
								<li class="d-flex align-items-center justify-content-between" style="display: grid;grid-template-columns: 30% 40% 30%;border:1px solid black;padding:5px;margin:10px;border-radius:20px;">
								    <div class="font-14 weight-600"><?php echo $row['MedicineName'] ; ?></div>
									<div></div>
									<div class="font-15 weight-700"><?php echo $row['TotalAmount']; ?></div>
				
							</li>
							<?php }
							?>
							</ul>
						</div>
					</div>
				</div>
				<div class="col-lg-3 col-md-6 mb-20">
					<div class="card-box height-100-p pd-20 min-height-200px"  style="border: 2px solid  greenyellow;" >
						<div class="d-flex justify-content-between">
							<div class="h5 mb-0">Sales by Medicines</div>
						</div>
						<div>
							<?php 
							$sql = "select * from sales join medicine on sales.MedicineID = medicine.MedicineID  where sales.ShopID = 2";
							$query = mysqli_query($conn,$sql) or die(mysqli_error());
							while ($row = mysqli_fetch_array($query)) {
								?>
								<ul style="padding-left: 0px;">
								<li class="d-flex align-items-center justify-content-between" style="display: grid;grid-template-columns: 30% 40% 30%;border:1px solid black;padding:5px;margin:10px;border-radius:20px;">
								
                                    <div class="font-14 weight-600"><?php echo $row['MedicineName'] ; ?></div>
									<div></div>
									<div class="font-15 weight-700"><?php echo $row['TotalAmount']; ?></div>
				
							</li>
							<?php }
							?>
							</ul>
						</div>
					</div>
				</div>

                <div class="col-lg-3 col-md-6 mb-20">
					<div class="card-box height-100-p pd-20 min-height-200px"  style="border: 2px solid  cyan;">
						<div class="d-flex justify-content-between">
							<div class="h5 mb-0">Sales by Medicines</div>
						</div>
						<div>
							<?php 

                            $sql = "select * from sales join medicine on sales.MedicineID = medicine.MedicineID  where sales.ShopID = 3";
							$query = mysqli_query($conn,$sql) or die(mysqli_error());
							while ($row = mysqli_fetch_array($query)) {
								?>
								<ul style="padding-left: 0px;">
								<li class="d-flex align-items-center justify-content-between" style="display: grid;grid-template-columns: 30% 40% 30%;border:1px solid black;padding:5px;margin:10px;border-radius:20px;">
								
                                <div class="font-14 weight-600"><?php echo $row['MedicineName'] ; ?></div>
									<div></div>
									<div class="font-15 weight-700"><?php echo $row['TotalAmount']; ?></div>
				
							</li>
							<?php }
							?>
							</ul>
						</div>
					</div>
				</div>


                <div class="col-lg-3 col-md-6 mb-20">
					<div class="card-box height-100-p pd-20 min-height-200px"  style="border: 2px solid  aquamarine;">
						<div class="d-flex justify-content-between">
							<div class="h5 mb-0">Sales by Medicines</div>
						</div>
						<div>
							<?php 

							$sql = "select * from sales join medicine on sales.MedicineID = medicine.MedicineID  where sales.ShopID = 4";
							$query = mysqli_query($conn,$sql) or die(mysqli_error());
							while ($row = mysqli_fetch_array($query)) {
								?>
								<ul style="padding-left: 0px;">
								<li class="d-flex align-items-center justify-content-between" style="display: grid;grid-template-columns: 30% 40% 30%;border:1px solid black;padding:5px;margin:10px;border-radius:20px;">
								
									<div class="font-14 weight-600"><?php echo $row['MedicineName'] ; ?></div>
									<div></div>
									<div class="font-15 weight-700"><?php echo $row['TotalAmount']; ?></div>
				
							</li>
							<?php }
							?>
							</ul>
						</div>
					</div>
				</div>
			</div>
			<?php include('../includes/footer.php'); ?>
		</div>
	</div>
	<!-- js -->

	<?php include('../includes/scripts.php')?>
	<script src="script.js"></script>

</body>
</html>