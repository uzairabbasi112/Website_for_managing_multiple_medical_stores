<div class="header">
		<div class="header-left">
			<div class="menu-icon dw dw-menu"></div>
			<div class="search-toggle-icon dw dw-search2" data-toggle="header_search"></div>
			
		</div>
		<div class="header-right">
			<div class="dashboard-setting user-notification">
				<div class="dropdown">
					<a class="dropdown-toggle no-arrow" href="javascript:;" data-toggle="right-sidebar">
					<i class="bi bi-gear-fill"></i>
					</a>
				</div>
			</div>
			
			<div class="user-info-dropdown">
				<div class="dropdown">
					

					<?php 
					$sql = "select * from users where UserID = '$session_id'";
					$query= mysqli_query($conn,$sql)or die(mysqli_error());
								$row = mysqli_fetch_array($query);
						?>

					<a class="dropdown-toggle" href="#" role="button" data-toggle="dropdown">
						<span class="user-icon">
							<img src="<?php echo (!empty($row['photo'])) ? '../uploads/'.$row['photo'] : '../images/NO-IMAGE-AVAILABLE.jpg'; ?>" alt=""  width=100%>
						</span>
						<span class="user-name"><?php echo $row['Username']; ?></span>
					</a>
					<div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
						<!-- <a class="dropdown-item" href="my_profile.php"><i class="bi bi-person-fill"></i> Profile</a> -->
						<a class="dropdown-item" href="../includes/logout.php"><i class="bi bi-box-arrow-right" style="color: black; font-size:20px"  ></i> Log Out</a>
					</div>
				</div>
			</div>
			
		</div>
	</div>
	<style>
		img{
			height: 100%;
		}
	</style>