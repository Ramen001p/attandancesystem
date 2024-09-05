
			<div class="sidebar-content js-simplebar">
						<a class="sidebar-brand" href="index.php">
				<span class="align-middle">Employee</span>
				</a>

						<ul class="sidebar-nav">
							<li class="sidebar-header">
								Pages
								
							</li>

							<!-- <li class="sidebar-item active">
								<a class="sidebar-link" href="dashboard.php">
									<i class="align-middle" data-feather="sliders"></i> <span class="align-middle">Dashboard</span>
								</a>
							</li> -->
							<?php if($_SESSION['admin']=='true'){
								?>
							<li class="sidebar-item" id="dashboard_id">
								<a class="sidebar-link" href="admin_dashboard.php" id="dashboard">
									<i class="align-middle" data-feather="user"></i> <span class="align-middle"> Dashboard</span>
								</a>
							</li>
								<li class="sidebar-item xxxx">
									<a class="sidebar-link" href="adminLeaverequest.php">
									<i class="fa-solid fa-person-through-window" style="color: #ffffff; font-size:15px;"></i> <span class="align-middle" id='leave'> Leave Request</span>
									</a>
								</li>
								<?php
								
								}else{
									?>

								<li class="sidebar-item" id="dashboard_id">
									<a class="sidebar-link" href="home.php" id="dashboard">
										<i class="align-middle" data-feather="user"></i> <span class="align-middle"> Dashboard</span>
									</a>
								</li>
									
								<?php
							}?>
			</div>
<script>
	// $(document).ready(function () {
	// 	$(#dashboard).click(function () { 
	// 		$(#dashboard_id).addClass('active');
	// 	});
	// });
</script>