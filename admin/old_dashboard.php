<?php 
error_reporting(E_ERROR | E_PARSE);
require("includes/connection/config.php");
require("includes/function/attandaceSystem.php");
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
?>
 <script src="includes/js/jquery.js"></script> 
          <script src="includes/media/js/jquery.dataTables.min.js"></script> 
		  <link href="includes/media/css/jquery.dataTables.min.css" rel="stylesheet">
          <link rel="stylesheet" href="https://cdn.datatables.net/2.0.3/css/dataTables.dataTables.css">
         
</head>

<body>
	<center>
		<h1>Admin</h1>
	</center>
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
															<h5 class="card-title">Sales</h5>
														</div>

														<div class="col-auto">
															<div class="stat text-primary">
																<i class="align-middle" data-feather="truck"></i>
															</div>
														</div>
													</div>
													<h1 class="mt-1 mb-3">2.382</h1>
													<div class="mb-0">
														<span class="text-danger"> <i class="mdi mdi-arrow-bottom-right"></i> -3.65% </span>
														<span class="text-muted">Since last week</span>
													</div>
												</div>
											</div>
										</div>
										<div class="col-sm-2 col-md-3">
											<div class="card">
												<div class="card-body">
													<div class="row">
														<div class="col mt-0">
															<h5 class="card-title">Visitors</h5>
														</div>

														<div class="col-auto">
															<div class="stat text-primary">
																<i class="align-middle" data-feather="users"></i>
															</div>
														</div>
													</div>
													<h1 class="mt-1 mb-3">14.212</h1>
													<div class="mb-0">
														<span class="text-success"> <i class="mdi mdi-arrow-bottom-right"></i> 5.25% </span>
														<span class="text-muted">Since last week</span>
													</div>
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
													<div class="mb-0">
														<span class="text-success"> <i class="mdi mdi-arrow-bottom-right"></i> 6.65% </span>
														<span class="text-muted">Since last week</span>
													</div>
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
													<div class="mb-0">
														<span class="text-danger"> <i class="mdi mdi-arrow-bottom-right"></i> -2.25% </span>
														<span class="text-muted">Since last week</span>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>


							
						</div>
						<?php 
                               
						$count = attandanceCheck($conn);
						if($count == 1){
							?>
							<div class="row">
												<div class="col-md-6 bg-white " style="height: 440px;">
												
                                                <div class="row" style="display:flex; justify-content:space-between">
                                                    <div class="col-md-3">
                                                        <h5 class="card-title m-3"> <b> <?php echo $res;?> Your attandance</b> </h5>
                                                    </div>
                                                    <div class="col-md-3 ">
                                                        <button class="btn btn-lg btn-danger m-2"data-toggle="modal" data-target="#exampleModal">Leave Apply</button>
                                                    </div>
                                                </div>
                                            <form action="includes/backend/attandanceBackend.php" method="post">
													<div class="row d-flex flex-direction-row justify-content-center mt-6">
													
                                                <div class="col-md-4">
                                                    <label class="form-label">Departure Time</label>
                                                    <input class="form-control form-control-lg w-75" type="text" id="depart_time" name="depart_time" required />
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12 mt-3">
                                                        <button type="submit" name="departure" class="btn btn-lg btn-primary" style="margin: 5px 250px; padding: 5px 60px">Present</button>
                                                    </div>
                                                </div>
										    </div>
									</div>
							</form>
							<?php
						}else{
							?>
							<form action="includes/backend/attandanceBackend.php" method="post">
											<div class="row">
												<div class="col-md-6 bg-white " style="height: 440px;">
												<h5 class="card-title m-3"> <b>Aparture attandance</b> </h5>
													<div class="row d-flex flex-direction-row justify-content-center mt-6">
														<div class="col-md-4">
															<label class="form-label">Arival Time</label>
												<input class="form-control form-control-lg w-75" type="text" id="arive_time" name="arive_time" required />
											</div>
											
											<div class="row">
												<div class="col-md-12 mt-3">
													<button type="submit" name="aparture" class="btn btn-lg btn-primary" style="margin: 5px 250px; padding: 5px 60px">Present</button>
												</div>
											</div>
										</div>
									</div>
							</form>
								<?php
						}
						?>
							
								<div class="col-md-5">
									<div class="card flex-fill w-100">
											<div class="card-header">

												<h5 class="card-title mb-0">Monthly Sales</h5>
											</div>
											<div class="card-body d-flex w-100">
												<div class="align-self-center chart chart-lg">
													<canvas id="chartjs-dashboard-bar"></canvas>
												</div>
											</div>
										</div>
									</div>
								</div>
					

						<div class="row">
							<div class="col-12 col-lg-12 col-xxl-12 d-flex">
								<div class="card flex-fill">
									<div class="card-header">

										<h5 class="card-title mb-0">Latest Projects</h5>
									</div>
									<table id="dtExample" class="display table table-hover  ">
										<thead>
                                            <th>Id</th>
                                            <th>Name</th>
                                            <th>Designation</th>
                                            <th>Phone</th>
                                            <th>Email date</th>
                                            <th>Address</th>
                                            <th>Gender</th>
                                            <th>Blood Group</th>
                                            <th>Department</th>
                                            <th>Img</th>
                                            <th>Date Of Birth</th>
                                            <th>Date Of Join</th>
                                            <th>Internship Start</th>
                                            <th>Internship End</th>
                                            <th>Martial Status</th>
										</thead>
										<!-- <tbody>
											<tr>
												<td>Project Apollo</td>
												<td class="d-none d-xl-table-cell">01/01/2023</td>
												<td class="d-none d-xl-table-cell">31/06/2023</td>
												<td><span class="badge bg-success">Done</span></td>
												<td class="d-none d-md-table-cell">Vanessa Tucker</td>
											</tr>
											<tr>
												<td>Project Fireball</td>
												<td class="d-none d-xl-table-cell">01/01/2023</td>
												<td class="d-none d-xl-table-cell">31/06/2023</td>
												<td><span class="badge bg-danger">Cancelled</span></td>
												<td class="d-none d-md-table-cell">William Harris</td>
											</tr>
											<tr>
												<td>Project Hades</td>
												<td class="d-none d-xl-table-cell">01/01/2023</td>
												<td class="d-none d-xl-table-cell">31/06/2023</td>
												<td><span class="badge bg-success">Done</span></td>
												<td class="d-none d-md-table-cell">Sharon Lessman</td>
											</tr>
											<tr>
												<td>Project Nitro</td>
												<td class="d-none d-xl-table-cell">01/01/2023</td>
												<td class="d-none d-xl-table-cell">31/06/2023</td>
												<td><span class="badge bg-warning">In progress</span></td>
												<td class="d-none d-md-table-cell">Vanessa Tucker</td>
											</tr>
											<tr>
												<td>Project Phoenix</td>
												<td class="d-none d-xl-table-cell">01/01/2023</td>
												<td class="d-none d-xl-table-cell">31/06/2023</td>
												<td><span class="badge bg-success">Done</span></td>
												<td class="d-none d-md-table-cell">William Harris</td>
											</tr>
											<tr>
												<td>Project X</td>
												<td class="d-none d-xl-table-cell">01/01/2023</td>
												<td class="d-none d-xl-table-cell">31/06/2023</td>
												<td><span class="badge bg-success">Done</span></td>
												<td class="d-none d-md-table-cell">Sharon Lessman</td>
											</tr>
											<tr>
												<td>Project Romeo</td>
												<td class="d-none d-xl-table-cell">01/01/2023</td>
												<td class="d-none d-xl-table-cell">31/06/2023</td>
												<td><span class="badge bg-success">Done</span></td>
												<td class="d-none d-md-table-cell">Christina Mason</td>
											</tr>
											<tr>
												<td>Project Wombat</td>
												<td class="d-none d-xl-table-cell">01/01/2023</td>
												<td class="d-none d-xl-table-cell">31/06/2023</td>
												<td><span class="badge bg-warning">In progress</span></td>
												<td class="d-none d-md-table-cell">William Harris</td>
											</tr>
										</tbody> -->
									</table>
								</div>
							</div>
						</div>

					</div>
				</main>
			<!--end Index dashbord -->

<!-- Modal -->
	<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
		<div class="modal-header">
			<h5 class="modal-title" id="exampleModalLabel">Apply For Leave</h5>
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
			<span aria-hidden="true">&times;</span>
			</button>
		</div>
		<div class="modal-body">
			<form>
            
			<div class="form-group">
                <div id="reportrange" style="background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #ccc; width: 100%">
                    <i class="fa fa-calendar"></i>&nbsp;
                    <span></span> <i class="fa fa-caret-down"></i>
                </div>
			</div>
			<div class="form-group">
				<label for="message-text" class="col-form-label">Reason:</label>
				<textarea class="form-control" name="reason" id="message-text"></textarea>
			</div>
			</form>
		</div>
		<div class="modal-footer">
			<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
			<button type="button" class="btn btn-success">Apply</button>
		</div>
		</div>
	</div>
	</div>
<!-- modal end -->

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
