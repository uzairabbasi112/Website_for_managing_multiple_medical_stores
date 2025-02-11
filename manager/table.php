<?php 
include('../includes/header.php')?>
<?php
include('../includes/session.php');
include('../includes/config.php');

if (isset($_GET['delete'])) {
	$delete = $_GET['delete'];
	$sql = "DELETE FROM users where UserID = ".$delete;
	$result = mysqli_query($conn, $sql);
	if ($result) {
		echo "<script>alert('Staff deleted Successfully');</script>";
     	echo "<script type='text/javascript'> document.location = 'members.php'; </script>";
		
	}
}
?>

<body>
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

                <li class="list ">
                    <a href="purchase.php">
                        <span class="icon">
                            <ion-icon name="cart-outline"></ion-icon>
                        </span>
                        <span class="text">Sales</span>
                        <span class="circle"></span>
                    </a>
                </li>
    
                <li class="list">
                    <a href="stock_entry.php">
                        <span class="icon">
                            <ion-icon name="bag-remove-outline"></ion-icon>
                        </span>
                        <span class="text">Stock</span>
                        <span class="circle"></span>
                    </a>
                </li>
                <li class="list">
                    <a href="purchase.php">
                        <span class="icon">
                            <ion-icon name="person-add-outline"></ion-icon>
                        </span>
                        <span class="text">Add</span>
                        <span class="circle"></span>
                    </a>
                </li>
                <li class="list active">
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


			<div class="title pb-20">
				<h2 class="h3 mb-0">Administrative Breakdown</h2>
			</div>
			<div class="row pb-10">
				<div class="col-xl-3 col-lg-3 col-md-6 mb-20">
					<div class="card-box height-100-p widget-style3">

						<?php
						$sql = "SELECT UserID from users";
						$query = mysqli_query($conn,$sql);
						$empcount=mysqli_num_rows($query);
						if(mysqli_num_rows($query) > 0)
						?>

						<div class="d-flex flex-wrap">
							<div class="widget-data">
								<div class="weight-700 font-24 text-dark"><?php echo($empcount);?></div>
								<div class="font-14 text-secondary weight-500">Total Employees</div>
							</div>
							<div class="widget-icon">
								<div class="icon" data-color="#00eccf"></div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-xl-3 col-lg-3 col-md-6 mb-20">
					<div class="card-box height-100-p widget-style3">

						<?php 
						 $query_reg_staff = mysqli_query($conn,"select * from users where UserType = 'staff' ")or die(mysqli_error());
						 $count_reg_staff = mysqli_num_rows($query_reg_staff);
						 ?>

						<div class="d-flex flex-wrap">
							<div class="widget-data">
								<div class="weight-700 font-24 text-dark"><?php echo htmlentities($count_reg_staff); ?></div>
								<div class="font-14 text-secondary weight-500">Staffs</div>
							</div>
							<div class="widget-icon">
								<div class="icon" data-color="#09cc06"></span></div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-xl-3 col-lg-3 col-md-6 mb-20">
					<div class="card-box height-100-p widget-style3">

						<?php 
						 $query_reg_hod = mysqli_query($conn,"select * from users where UserType = 'Manager' ")or die(mysqli_error());
						 $count_reg_hod = mysqli_num_rows($query_reg_hod);
						 ?>

						<div class="d-flex flex-wrap">
							<div class="widget-data">
								<div class="weight-700 font-24 text-dark"><?php echo($count_reg_hod); ?></div>
								<div class="font-14 text-secondary weight-500">Department Heads</div>
							</div>
							<div class="widget-icon">
								<div class="icon"></div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-xl-3 col-lg-3 col-md-6 mb-20">
					<div class="card-box height-100-p widget-style3">

						<?php 
						 $query_reg_admin = mysqli_query($conn,"select * from users where UserType = 'Admin' ")or die(mysqli_error());
						 $count_reg_admin = mysqli_num_rows($query_reg_admin);
						 ?>

						<div class="d-flex flex-wrap">
							<div class="widget-data">
								<div class="weight-700 font-24 text-dark"><?php echo($count_reg_admin); ?></div>
								<div class="font-14 text-secondary weight-500">Administrators</div>
							</div>
							<div class="widget-icon">
								<div class="icon" data-color="#ff5b5b"></div>
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="card-box mb-30">
				<div class="pd-20">
						<h2 class="text-blue h4">ALL Members</h2>
					</div>
				<div class="pb-20">
					<table class="data-table table stripe hover nowrap">
						<thead>
							<tr>
								<th class="table-plus">FULL NAME</th>
								<th>SHOP</th>
								<th>FUNCTIONING</th>
								<th>NUMBER</th>
								<th>ADDRESS</th>
								<th class="datatable-nosort">ACTION</th>
							</tr>
						</thead>
						<tbody>
							<tr>

								 <?php
								$sql = "select * from users ORDER BY UserID";
								$teacher_query = mysqli_query($conn,$sql) or die(mysqli_error());		                         while ($row = mysqli_fetch_array($teacher_query)) {
		                         $id = $row['UserID'];
		                         $shopid = $row['shop_ID'];
                                 $sql1 = "select * from shops where ShopID = $shopid";
                                 $query1 = mysqli_query($conn,$sql1);
                                 $row1 = mysqli_fetch_assoc($query1);
		                             ?>

								<td class="table-plus">
									<div class="name-avatar d-flex align-items-center">
										<div class="avatar mr-2 flex-shrink-0">
											<img src="<?php echo (!empty($row['location'])) ? '../images/'.$row['location'] : '../images/NO-IMAGE-AVAILABLE.jpg'; ?>" class="border-radius-100 shadow" width="40" height="40" alt="">
										</div>
										<div class="txt">
											<div class="weight-600"><?php echo $row['Username'] ; ?></div>
										</div>
									</div>
								</td>
								<td><?php echo $row1['ShopName']; ?></td>
	                            <td><?php echo $row['UserType']; ?></td>
								<td><?php echo $row['Number']; ?></td>
								<td><?php echo $row['Address']; ?></td>
								<td>
									<div class="dropdown">
										<a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
										<span class="glyphicon glyphicon-option-horizontal" style="font-size: 15px;font-weight:800"></span>
										</a>
										<div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
											<a class="dropdown-item" href="edit.php?edit=<?php echo $row['UserID'];?>"><span class="glyphicon glyphicon-edit"></span> Edit</a>
											<a class="dropdown-item" href="members.php?delete=<?php echo $row['UserID'] ?>"><span class="glyphicon glyphicon-remove-sign"></span> Delete</a>
										</div>
									</div>
								</td>
							</tr>
							<?php } ?>  
						</tbody>
					</table>
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