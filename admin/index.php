<?php 
include('../includes/header.php')?>
<?php 
include('../includes/session.php');
?>

<body>
<!-- <div class="mobile-menu-overlay"></div> -->
	<?php include('../includes/beautiful_navbar.php')?>

	<div class="main-container" style="margin-top: 0px;padding-top:0px;margin-left:-10%">
		<div class="pd-ltr-10">
			<div class="card-box pd-20 height-100-p mb-30">
				<div class="row align-items-center">
					<div class="col-md-4 user-icon">
						<img src="../images/banner-img.png" alt="">
					</div>
					<div class="col-md-8">
						<?php
						$query = mysqli_query($conn,"select * from users where UserID = '$session_id'")or die(mysqli_error());
						$row = mysqli_fetch_array($query);
						?>
						<h4 class="font-20 weight-500 mb-10 text-capitalize">
							Welcome TO OUR<div class="weight-600 font-30 text-blue"><?php echo $row['Username']; ?>,</div>
						</h4>
						<p class="font-18 max-width-600">Experience the Future of Pharmacy: Effortless, Secure, and Online...</p>
					</div>
				</div>
			</div>
			<div class="title pb-20">
				<h2 class="h3 mb-0">Data Information</h2>
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
							<div class="widget-data" style="background-color: yellow;">
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
							<div class="widget-data" style="background-color:greenyellow;">
							<div class="weight-700 font-24 text-dark"style="text-align:center" >SHOP 22 </div>
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
							<div class="widget-data" style="background-color:cyan;">
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
							<div class="widget-data" style="background-color:aquamarine;">
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
				<div class="col-lg-4 col-md-6 mb-20" >
					<div class="card-box height-100-p pd-20 min-height-200px"   style="border: 2px solid  yellow;">
						<div class="d-flex justify-content-between pb-10">
							<div class="h5 mb-0">Managers</div>
							
						</div>
						<div class="user-list">
							<ul>
								<?php
								$sql = "select * from users where UserType = 'Manager' ORDER BY UserID desc limit 4;";
		                         $query = mysqli_query($conn,$sql) or die(mysqli_error());
		                         while ($row = mysqli_fetch_array($query)) {
		                         $id = $row['Username'];
								 $shop_id = $row['shop_ID'];
								 $sql1 = "SELECT * from shops where ShopID = $shop_id";
								 $query1 = mysqli_query($conn,$sql1);
								 $row1 = mysqli_fetch_assoc($query1);
		                             ?>

								<li class="d-flex align-items-center justify-content-between">
									<div class="name-avatar d-flex align-items-center pr-2">
										<div class="avatar mr-2 flex-shrink-0">
											<img src="<?php echo (!empty($row['location'])) ? '../images/'.$row['location'] : '../images/NO-IMAGE-AVAILABLE.jpg'; ?>" class="border-radius-100 box-shadow" width="50" height="50" alt="">
										</div>
										<div class="txt">
											<div class="font-14 weight-600"><?php echo $row['Username']; ?></div>
											<div class="font-12 weight-500" data-color="#b2b1b6"><?php echo $row1['Location']; ?></div>
										</div>
									</div>
									<div class="font-12 weight-500" data-color="#17a2b8"><?php echo $row['Number']; ?></div>
								</li>
								<?php }?>
							</ul>
						</div>
					</div>
				</div>
				<div class="col-lg-4 col-md-6 mb-20">
					<div class="card-box height-100-p pd-20 min-height-200px"   style="border: 2px solid  aquamarine;">
						<div class="d-flex justify-content-between">
							<div class="h5 mb-0">Profit</div>
						</div>
						<div>
							<?php
							// Query to retrieve the sum of TotalAmount for each shop
							$sql = "SELECT shops.ShopName, SUM(sales.TotalAmount) AS total_sum
									FROM sales
									JOIN shops ON sales.ShopID = shops.ShopID
									GROUP BY shops.ShopName";

							// Execute the query
							$query = mysqli_query($conn, $sql) or die(mysqli_error($conn));

							while ($row = mysqli_fetch_array($query)) {
							?>
								<ul style="padding-left: 0px;">
									<li class="d-flex align-items-center justify-content-between" style="display: grid;grid-template-columns: 30% 40% 30%;border:1px solid black;padding:5px;margin:10px;border-radius:20px;">
										<div class="font-14 weight-600"><?php echo $row['ShopName']; ?></div>
										<div></div>
										<div class="font-12 weight-500" data-color="#b2b1b6"><?php echo $row['total_sum']; ?></div>
									</li>
								</ul>
							<?php
							}
							?>
						</div>

					</div>
				</div>
				<div class="col-lg-4 col-md-6 mb-20">
					<div class="card-box min-height-200px" style="border: 2px solid  cyan;">
						<div class="d-flex justify-content-between">
							<div class="h5 mb-0 mt-3">Staff</div>
							
						</div>

						<div class="user-list">
							<ul>
								<?php
		                         $query = mysqli_query($conn,"select * from users where UserType = 'staff' ORDER BY UserID desc limit 4") or die(mysqli_error());
		                         while ($row = mysqli_fetch_array($query)) {
		                         $id = $row['UserID'];
		                         $shop = $row['shop_ID'];
								 $sql2 = "select * from shops where ShopID = $shop; ";
								$query2 = mysqli_query($conn,$sql2);
								$row2 = mysqli_fetch_assoc($query2);
		                             ?>

								
								<li class="d-flex align-items-center justify-content-between">
									<div class="name-avatar d-flex align-items-center pr-2">
										<div class="avatar mr-2 flex-shrink-0">
											<img src="<?php echo (!empty($row['location'])) ? '../images/'.$row['location'] : '../images/NO-IMAGE-AVAILABLE.jpg'; ?>" class="border-radius-100 box-shadow" width="50" height="50" alt="">
										</div>
										<div class="txt">
											
											<div class="font-14 weight-600"><?php echo $row['Username'] ; ?></div>
											<div class="font-12 weight-500" data-color="#b2b1b6"><?php echo $row2['Location']; ?></div>
										</div>
									</div>
									<div class="font-12 weight-500" data-color="#17a2b8"><?php echo $row2['ShopName']; ?></div>
								</li>
								<?php }?>
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