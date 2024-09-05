<?php 
error_reporting(E_ERROR | E_PARSE);
require("includes/connection/config.php");
require("includes/function/admin/adminFunction.php");
if(isset($_GET['id'])){
    $Employeeid=$_GET['id'];
}
$empData=displayEmployee($Employeeid);

foreach($empData as $empData ){
	$employeeId=$empData['empID'];
	$employeeName=$empData['empName'];
	$employeeImg=$empData['empImg'];
	$empPhone=$empData['empPhone'];
	$empEmail=$empData['empEmail'];
	$empAddress=$empData['empAddress'];
	$empGender=$empData['empGender'];
	$empDepartment=$empData['empDepartment'];
	$empDesignation = $empData['empDesignation'];
	$empDOB = $empData['empDateOfBirth'];
	$empDOJ = $empData['empDateOfJoin'];
	$empinternshipStart = $empData['internshipStart'];
	$empinternshipEnd = $empData['internshipEnd'];
	$empmaritalstatus = $empData['maritalstatus'];


}
	// $total_count=countAttandance();
	//  $total_day = totalCurrentDay();
	//  $total_absent = $total_day-$total_count;

    $total_count = employeeCountAttandance($Employeeid);
    $total_day = totalCurrentDay();
	$total_absent = $total_day-$total_count;

    ?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="Responsive Admin &amp; Dashboard Template based on Bootstrap 5">
	<title>Profile </title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" >
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"></script>

		  <!-- <link rel="stylesheet" href="assets/css/attandace_Calender.css"> -->
		  <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.css">
	<?php 
	require('includes/common/common-css.php');
	?>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
<style>
			:root {
	--primary-color: #f90a39;
	--text-color: #1d1d1d;
	--bg-color: #f1f1fb;
	}
			.calendar {
	width: 100%;
	max-width: 600px;
	background: var(--bg-color);
	padding: 30px 20px;
	border-radius: 10px;
	}
	.calendar .header {
	display: flex;
	justify-content: space-between;
	align-items: center;
	margin-bottom: 20px;
	padding-bottom: 20px;
	border-bottom: 2px solid #ccc;
	}
	.calendar .header .month {
	display: flex;
	align-items: center;
	font-size: 25px;
	font-weight: 600;
	color: var(--text-color);
	}
	.calendar .header .btns {
	display: flex;
	gap: 10px;
	}
	.calendar .header .btns .btn {
	width: 50px;
	height: 40px;
	background: var(--primary-color);
	display: flex;
	justify-content: center;
	align-items: center;
	border-radius: 5px;
	color: #fff;
	font-size: 16px;
	cursor: pointer;
	transition: all 0.3s;
	}
	/* .calendar .header .btns .btn:hover {
	background: #db0933;
	transform: scale(1.05);
	} */
	.calendar .weekdays {
	display: flex;
	gap: 10px;
	margin-bottom: 10px;
	}
	.calendar .weekdays .day {
	width: calc(100% / 7 - 10px);
	text-align: center;
	font-size: 16px;
	font-weight: 600;
	}
	.calendar .days {
	display: flex;
	flex-wrap: wrap;
	gap: 10px;
	}
	.calendar .days .day {
	width: calc(100% / 7 - 10px);
	height: 50px;
	background: #fff;
	display: flex;
	justify-content: center;
	align-items: center;
	border-radius: 5px;
	font-size: 16px;
	font-weight: 400;
	color: var(--text-color);
	transition: all 0.3s;
	user-select: none;
	}
	/* .calendar .days .day:not(.next):not(.prev):hover {
	color: #fff;
	background: var(--primary-color);
	transform: scale(1.05);
	} */
	.calendar .days .day.next,
	.calendar .days .day.prev {
	color: #ccc;
	}
	.calendar .days .day.today {
	color: #fff;
	background: var(--primary-color);
	}
	.credits a {
	position: absolute;
	bottom: 10px;
	left: 50%;
	transform: translateX(-50%);
	font-size: 14px;
	color: #aaa;
	}
	.credits span {
	color: var(--primary-color);
	}
</style>
	
</head>

<body>
	<div class="wrapper">
    <nav id="sidebar" class="sidebar js-sidebar">
				<?php
					require('includes/common/common-slider.php');
				?>
			</nav>
	
		<div class="main">
			<!-- navbar -->
				<nav class="navbar navbar-expand navbar-light navbar-bg">
                    <a class="sidebar-toggle js-sidebar-toggle">
                        <i class="hamburger align-self-center"></i>
                    </a>

                    <div class="navbar-collapse collapse">
                        <ul class="navbar-nav navbar-align">
                            
                            <li class="nav-item dropdown">
                                <a class="nav-icon dropdown-toggle d-inline-block d-sm-none" href="#" data-bs-toggle="dropdown">
                    <i class="align-middle" data-feather="settings"></i>
                </a>

                                <a class="nav-link dropdown-toggle d-none d-sm-inline-block" href="#" data-bs-toggle="dropdown">
                    <img src="assets/img/employeeImg/avatar.jpg" class="avatar img-fluid rounded me-1" alt="Charles Hall" /> <span class="text-dark"><?php echo $_SESSION['empName'] ?></span>
                </a>
                                <div class="dropdown-menu dropdown-menu-end">
                                    <a class="dropdown-item" href="logout.php">Log out</a>
                                </div>
                            </li>
                        </ul>
                    </div>
				</nav><br>
			<!--end navbar -->

		<!-- Index dashbord -->

			<main class="container-fluid m-4">
					<div class="container-fluid p-0">

						<h1 class="h3 mt-1 mb-3"><strong><?php echo date("F", strtotime('m'));?></strong> Overview</h1>

						<div class="row ">
							<div class="col-xl-12 col-md-12 col-xxl-12 d-flex">
								<div class="w-100">
									<div class="row">
										<div class="col-sm-2 col-md-3">
											<div class="card">
												<div class="card-body">
													<div class="row">
														<div class="col mt-0">
															<h5 class="card-title">Total Present</h5>
														</div>

														<div class="col-auto">
															<div class="stat text-primary">
															<i class="text-lg fa-solid fa-person-circle-check "></i>
															</div>
														</div>
													</div>
													<h1 class="mt-1 mb-3 text-success"><?php echo $total_count. "/" .$total_day;?></h1>
													
												</div>
											</div>
										</div>
										<div class="col-sm-2 col-md-3">
											<div class="card ">
												<div class="card-body">
													<div class="row">
														<div class="col mt-0">
															<h5 class="card-title">Total Absents</h5>
														</div>

														<div class="col-auto">
															<div class="stat text-primary">
																<i class="align-middle" data-feather="users"></i>
															</div>
														</div>
													</div>
													<h1 class="mt-1 mb-3 text-danger"><?php echo $total_absent. "/" .$total_day;?></h1>
												</div>
											</div>
										</div>
										<div class="col-sm-2 col-md-3">
											<div class="card">
												<div class="card-body">
													<div class="row">
														<div class="col mt-0">
															<h5 class="card-title">Leave Request</h5>
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
					</div>
				
		<!-- index end -->

			
			
				<div class="container-fluid p-0">

					<div class="mb-3">
						<h1 class="h3 d-inline align-middle">Profile</h1>
						
					</div>
					<div class="row">
						<div class="col-md-4 col-xl-2">
							<div class="card mb-3">
								<div class="card-header">
									<h5 class="card-title mb-0">Profile Details</h5>
								</div>
								<div class="card-body text-center">
									<img src="assets/img/employeeImg/<?php echo $employeeImg; ?>" alt="Christina Mason" class="img-fluid rounded-circle mb-2" width="128" height="128" />
									<h5 class="card-title mb-0"><?php echo $employeeName; ?></h5>
									<div class="text-muted mb-2"><?php echo $empDesignation; ?></div>
								</div>
								<hr class="my-0" />
								<div class="card-body">
									<h5 class="h6 card-title" id="tokenSkill">Skills</h5>
								<?php	$res = EmployeedisplaySkill($Employeeid);
								foreach($res as $row){
									?>
									<div class="badge bg-primary me-1 my-1"><?php echo $row['skills_name'];?></div>
									<?php
								}
								?>
									
								</div>
								<hr class="my-0" />
								<div class="card-body">
									<h5 class="h6 card-title">About</h5>
									<ul class="list-unstyled mb-0">
										<li class="mb-1"><span data-feather="home" class="feather-sm me-1"></span> Lives in <span class='text-primary'><?php echo $empAddress; ?></span></li>

										<li class="mb-1"><i class="fa-solid fa-envelope"></i> Email: <span class='text-primary'><?php echo $empEmail; ?></span></li>

										<li class="mb-1"><i class="fa-solid fa-phone"></i> Phone: <span class='text-primary'><?php echo $empPhone; ?></span></li>

										<li class="mb-1"><i class="fa-solid fa-person-half-dress"></i> Gender: <span class='text-primary'><?php if($empGender=='M') {
											echo"Male";
										}else{
											echo"Female";
										} ?></span></li>

										<li class="mb-1"><i class="fa-solid fa-calendar-days"></i> Date Of Birth: <span class='text-primary'><?php echo date('d-M-y',strtotime($empDOB)); ?></span></li>

										<li class="mb-1"><i class="fa-solid fa-calendar-days"></i> Date Of Join: <span class='text-primary'><?php echo date('d-M-y',strtotime($empDOJ)); ?></span></li>

										<li class="mb-1"><i class="fa-solid fa-briefcase"></i> Duration of internship: <br> <span class='text-primary'><?php echo date('d/M/y',strtotime($empinternshipStart)); ?> <b> - </b><?php echo date('d/M/y',strtotime($empinternshipEnd)); ?></span></li>
										
										<li class="mb-1"><span data-feather="map-pin" class="feather-sm me-1"></span> Marital Status: <span class="text-primary"><?php echo $empmaritalstatus; ?></span></li>
										
									</ul>
								</div>
								<hr class="my-0" />
								
							</div>
						</div>
						<!-- activities -->
						<div class="col-md-4 col-xl-5">
							<div class="card">
								<div class="card-header">
									<div class="row">
										<div class="col-md-10">
											<h5 class="card-title mt-3">Activities for <?php echo date("F", strtotime('m'));?> </h5>
										</div>
										
									</div>			
								</div>
							</div>
								<?php 
										$defaultTime = defaultTime();
										foreach ($defaultTime as $dt) {
											# code...
											$dtArrive = $dt['defaultArrival'];
											$dtDepart = $dt['defaultDepart'];
										}
											$attandanceData=displayEmployeeAttandance($Employeeid);
											
											foreach ($attandanceData as $Data) {
												# code...
												$arive = $Data['arivalTime'];
												 $depart = $Data['departTime'];
												 echo $data['total_count'];
												
													?>
							
							
								<div class="card p-3 mb-2 bg-white text-dark rounded">
										<div class="activities">
											 On <b >
											 <?php 
													echo date('D, d-M-y',strtotime($Data['date']));
												?> 
											 </b> 
												, he is arrived at <?php if ($dtArrive <= $arive) {
														echo '<b class="text-danger">' . date('h:i A', strtotime($arive)) . '</b>';
														
													} else {
														echo '<b >' . date('h:i A', strtotime($arive)) . '</b>';
													}
												?> 
												<?php 
													if($depart== NULL ){
														echo"";
													}else{
														?>
													and checked out at
													<?php if ($dtArrive <= $depart) {
														echo '<b >' . date('h:i A', strtotime($depart)) . '</b>';
														
													} else {
														echo '<b class="text-success">' . date('h:i A', strtotime($depart)) . '</b>';
													}
												?> 
														<?php
													}
												?>
											</div>
										</div>
									<?php  }?>
												
					
						</div>

						<!-- calender -->
						<div class="col-md-4 col-xl-4">
							<div class="calendar">
								<div class="header">
									<div class="month"><?php echo date('F Y'); ?></div>
								</div>
								<div class="weekdays">
									<?php 
									$days = ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat']; 
									foreach ($days as $day) : ?>
										<div class="day"><?php echo $day; ?></div>
									<?php endforeach; ?>
								</div>
								<div class="days">
									<?php
									// Fetch attendance data
									$empID = $_SESSION['dbemailId'];
									$month = date('m');
									$query = $conn->prepare("SELECT `date` FROM `attandance` WHERE `relatedEmpId`= ? AND MONTH(date)=?");
									$query->bind_param('ii', $empID, $month);
									if($query->execute()){
										$result = $query->get_result();
										$attendanceDates = [];
										while ($row = $result->fetch_assoc()) {
											$attendanceDates[] = date('j', strtotime($row['date'])); // Store attended days
										}
										$totalDays = cal_days_in_month(CAL_GREGORIAN, date('m'), date('Y'));
										$currentDay= date('d');
										for ($day = 1; $day <= $currentDay; $day++) {
											$cssClass = in_array($day, $attendanceDates) ? 'success' : 'danger'; // Check if day is attended
											echo "<div class='day bg-$cssClass'>$day</div>"; // Apply CSS class if attended
										}
									} else {
										die($conn->error);
									}
									?>
								</div>
							</div>
						</div>


						<!-- end -->
					</div>
				</div>
			</main>
			

			<footer class="footer">
			<?php 
				require('includes/common/common-footer.php');
			?> 
			</footer>
		</div>
	</div>

	<?php 
    require('includes/common/common-js.php');
    ?> 

<script>

	// $(function() {

	// var start = moment().subtract(29, 'days');
	// var end = moment();

	// function cb(start, end) {
	// 		$('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
	// 	}

	// 	$('#reportrange').daterangepicker({
	// 		startDate: start,
	// 		endDate: end,
	// 		defaultDate: new Date(),
	// 		ranges: {
	// 		'Today': [moment(), moment()],
	// 		'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
			
	// 		}
	// 	}, cb);

	// 	cb(start, end);

	// });
</script>
</body>

</html>

