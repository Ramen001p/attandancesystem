<?php 
error_reporting(E_ERROR | E_PARSE);
require("includes/connection/config.php");
require("includes/function/attandaceSystem.php");
// require("includes/function/admin/adminFunction.php");
$total_employee=employeeCount();
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	
	<title>Dashboard</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" >
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"></script>

		  <!-- <link rel="stylesheet" href="assets/css/attandace_Calender.css"> -->
		  <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.css">
		 
	<?php
	require('includes/common/common-css.php');
	require('includes/common/common-dataTable-cdn.php');
	?>
<style>
	 .main-panel {
     display:block;
     background:white;
     padding:20px;
     height: 100%;
     position:absolute;
     width: 700px;
     top: 139px;
     bottom: 110px;
 }

 th {
     text-align:left;
	 wrap:nowrap;
 }
 td {
     border-spacing:0;
     white-space:nowrap;
     overflow: hidden;
     text-overflow: ellipsis;
     -ms-text-overflow:ellipsis;

 }

</style>      
		  
</head>

<body>
	<!-- <center>
		<h1>Admin</h1>
	</center> -->
	<div class="wrapper">
		<!--  sidebar -->
			<nav id="sidebar" class="sidebar js-sidebar">
				<?php
					require('includes/common/common-slider.php');
				?>
			</nav>
		<!--end sidebar -->

		<div class="main">
			<!-- navbar -->
				<nav class="navbar navbar-expand navbar-light navbar-bg">
					<?php
						require('includes/common/common-navbar.php');
					?>
				</nav>
			<!--end navbar -->

			<!-- Index dashbord -->

				<main class="content">
					<div class="container-fluid p-0">

						<h1 class="h3 mb-3"><strong>Analytics</strong> Dashboard</h1>

						<div class="row ">
							<div class="col-xl-12 col-md-12 col-xxl-12 d-flex">
								<div class="w-100">
									<div class="row">
										<div class="col-sm-2 col-md-3">
											<div class="card">
												<div class="card-body">
													<div class="row">
														<div class="col mt-0">
															<h5 class="card-title">Total Employee</h5>
														</div>

														<div class="col-auto">
															<div class="stat text-primary">
																<i class="align-middle" data-feather="truck"></i>
															</div>
														</div>
													</div>
													<h1 class="mt-1 mb-3"><?php echo $total_employee ;?></h1>
													
												</div>
											</div>
										</div>
										<div class="col-sm-2 col-md-3">
											<div class="card">
												<div class="card-body">
													<div class="row">
														<div class="col mt-0">
															<h5 class="card-title">Leave Requests</h5>
														</div>

														<div class="col-auto">
															<div class="stat text-primary">
																<i class="align-middle" data-feather="users"></i>
															</div>
														</div>
													</div>
													<h1 class="mt-1 mb-3"><?php echo countLeaves();?></h1>
													
												</div>
											</div>
										</div>
										<div class="col-sm-2 col-md-3">
											<div class="card">
												<div class="card-body">
													<div class="row">
														<div class="col mt-0">
															<h5 class="card-title">Earnings</h5>
														</div>

														<div class="col-auto">
															<div class="stat text-primary">
																<i class="align-middle" data-feather="dollar-sign"></i>
															</div>
														</div>
													</div>
													<h1 class="mt-1 mb-3">$21.300</h1>
													
												</div>
											</div>
										</div>
										<div class="col-sm-2 col-md-3">
											<div class="card">
												<div class="card-body">
													<div class="row">
														<div class="col mt-0">
															<h5 class="card-title">Orders</h5>
														</div>

														<div class="col-auto">
															<div class="stat text-primary">
																<i class="align-middle" data-feather="shopping-cart"></i>
															</div>
														</div>
													</div>
													<h1 class="mt-1 mb-3">64</h1>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>

						</div>
						
						<div class="row">
							<div class="col-12 col-lg-12 col-xxl-12 d-flex">
								<div class="card flex-fill p-4">
									<div class="card-header">
										<h5 class="card-title mb-0">Latest Projects</h5>
									</div>
									<table id="dtExample" class="display cell-border hover " style="width:50%;">
										<thead>
                                            <th class="text-center">Id</th>
                                            <th class="text-center">Name</th>
                                            <th class="text-center">Designation</th>
                                            <th class="text-center">Phone</th>
                                            <th class="text-center">Email date</th>
                                            <th class="text-center">Address</th>
                                            <th class="text-center">Gender</th>
                                            <th class="text-center">Blood Group</th>
                                            <th class="text-center">Department</th>
                                            <th class="text-center">Date Of Birth</th>
                                            <th class="text-center">Date Of Join</th>
                                            <th class="text-center">Internship Start</th>
                                            <th class="text-center">Internship End</th>
                                            <th class="text-center">Martial Status</th>
                                            <th class="text-center">Actions</th>


										</thead>
									</table>
								</div>
							</div>
						</div>

					</div>
				</main>
			<!--end Index dashbord -->


			<!-- footer -->
				<footer class="footer">
				<?php
						require('includes/common/common-footer.php');
					?>
				</footer>
			<!--end footer -->
		</div>
	</div>

	<?php 
    require('includes/common/common-js.php');
    ?> 
	<script src="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.js"></script>
	<!-- <script src="assets/js/attandance_Calender.js"></script> -->



	<script>
//daterangepicker
	$(function() {

	var start = moment().subtract(29, 'days');
	var end = moment();

	function cb(start, end) {
		$('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
	}

	$('#reportrange').daterangepicker({
		startDate: start,
		endDate: end,
		defaultDate: new Date(),
		ranges: {
		'Today': [moment(), moment()],
		'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
		
		}
	}, cb);

	cb(start, end);

	});
//end
//data table
	$(document).ready( function () {
		$('#dtExample').DataTable({
            "processing" : true,
        "serverSide" : true,
        "ajax" : "fetchData.php"
        });
	} );


//End 
//  time picker
	$('#arive_time').timepicker({
		timeFormat: 'h:mm p',
		interval: 1,
		minTime: '10',
		maxTime: '7:30pm',
		defaultTime: new Date(),
		startTime: '10:00',
		dynamic: false,
		dropdown: true,
		scrollbar: true
	});
	$('#depart_time').timepicker({
		timeFormat: 'h:mm p',
		interval: 1,
		minTime: '10',
		maxTime: '7:30 PM',
		defaultTime: '7:30 PM',
		startTime: '10:00',
		dynamic: false,
		dropdown: true,
		scrollbar: true
	});
//end 



//monthly Chart
		document.addEventListener("DOMContentLoaded", function() {
			// Bar chart
			new Chart(document.getElementById("chartjs-dashboard-bar"), {
				type: "bar",
				data: {
					labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
					datasets: [{
						label: "This year",
						backgroundColor: window.theme.primary,
						borderColor: window.theme.primary,
						hoverBackgroundColor: window.theme.primary,
						hoverBorderColor: window.theme.primary,
						data: [54, 67, 41, 55, 62, 45, 55, 73, 60, 76, 48, 79],
						barPercentage: .75,
						categoryPercentage: .5
					}]
				},
				options: {
					maintainAspectRatio: false,
					legend: {
						display: false
					},
					scales: {
						yAxes: [{
							gridLines: {
								display: false
							},
							stacked: false,
							ticks: {
								stepSize: 20
							}
						}],
						xAxes: [{
							stacked: false,
							gridLines: {
								color: "transparent"
							}
						}]
					}
				}
			});
		});
//End


	</script>


</body>

</html>
