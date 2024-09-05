
<?php 
error_reporting(E_ERROR | E_PARSE);
require("includes/connection/config.php");
require("includes/function/attandaceSystem.php");
if(isset($_SESSION['dbemailId'])){ 
	$total_count=countAttandance();
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
	
	</style>
	
</head>

<body>
	<div class="wrapper">
		<<!--  sidebar -->
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
				</nav><br>
			<!--end navbar -->

		<!-- Index dashbord -->

			<main class="container-fluid">
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
						<div class="col-md-4 col-xl-3">
							<div class="card mb-3">
								<div class="card-header">
									<h5 class="card-title mb-0">Profile Details</h5>
								</div>
								<div class="card-body text-center">
									<img src="assets/img/employeeImg/<?php echo $empImg; ?>" alt="Christina Mason" class="img-fluid rounded-circle mb-2" width="128" height="128" />
									<h5 class="card-title mb-0"><?php echo $empName; ?></h5>
									<div class="text-muted mb-2"><?php echo $Designation; ?></div>
								</div>
								<hr class="my-0" />
								<div class="card-body">
									<h5 class="h6 card-title" id="tokenSkill">Skills</h5>
								<?php	$res = displaySkill($conn);
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
										<li class="mb-1"><span data-feather="home" class="feather-sm me-1"></span> Lives in <span class='text-primary'><?php echo $Address; ?></span></li>

										<li class="mb-1"><i class="fa-solid fa-envelope"></i> Email: <span class='text-primary'><?php echo $Email; ?></span></li>

										<li class="mb-1"><i class="fa-solid fa-phone"></i> Phone: <span class='text-primary'><?php echo $Phone; ?></span></li>

										<li class="mb-1"><i class="fa-solid fa-person-half-dress"></i> Gender: <span class='text-primary'><?php if($Gender=='M') {
											echo"Male";
										}else{
											echo"Female";
										} ?></span></li>

										<li class="mb-1"><i class="fa-solid fa-calendar-days"></i> Date Of Birth: <span class='text-primary'><?php echo date('d-M-y',strtotime($DOB)); ?></span></li>

										<li class="mb-1"><i class="fa-solid fa-calendar-days"></i> Date Of Join: <span class='text-primary'><?php echo date('d-M-y',strtotime($DOJ)); ?></span></li>

										<li class="mb-1"><i class="fa-solid fa-briefcase"></i> Duration of internship: <br> <span class='text-primary'><?php echo date('d/M/y',strtotime($internshipStart)); ?> <b> - </b><?php echo date('d/M/y',strtotime($internshipEnd)); ?></span></li>
										
										<li class="mb-1"><span data-feather="map-pin" class="feather-sm me-1"></span> Marital Status: <span class="text-primary"><?php echo $maritalstatus; ?></span></li>
										
									</ul>
								</div>
								<hr class="my-0" />
								
							</div>
						</div>
						<!-- activities -->
						<div class="col-md-8 col-xl-9">
							<div class="card">
								<div class="card-header">
									<div class="row">
										<div class="col-md-10">
											<h5 class="card-title mt-3">Activities for <?php echo date("F", strtotime('m'));?> </h5>
										</div>
										<div class="col-md-2">
											<button class="btn btn-lg btn-primary m-2"data-toggle="modal" data-target="#exampleModal">Leave Apply</button>
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
											$attandanceData=displayAttandance();
											
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
												, you arrived at <?php if ($dtArrive <= $arive) {
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
					</div>
				</div>
			</main>
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
			<form action="includes/backend/leaveapplyBackend.php" method="POST">
				<div class="modal-body">
				
				
					<div class="form-group">
						<!-- <input id="reportrange" name="leaverange" style="background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #ccc; width: 100%"> -->
						<!-- <div id="reportrange" name="leaverange" style="background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #ccc; width: 100%">
							<i class="fa fa-calendar"></i>&nbsp;
							<span></span> <i class="fa fa-caret-down"></i>
						</div> -->
						<a class="btn btn-sm btn-info" onclick="addInput()" style="font-size:20px;color:white;padding:5px 20px;">+</a>
    					<div id="container"class="form-group"></div>

					</div>
					<div id="container">
						<div class="form-group" >
							<input type="text" id='datePicker' class="form-control">
							<button class="btn btn-sm btn-danger" onclick="removeInput(this)">Clear</button>
						</div>
					</div>
					<div class="form-group">
						<label for="message-text" class="col-form-label">Reason:</label>
						<textarea class="form-control" name="reason" id="message-text"></textarea>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
					<button type="submit" name="leaveApply" class="btn btn-success">Apply</button>
				</div>
			</form>
			</div>
		</div>
	</div>
<!-- modal end -->
			<?php 
			 require('includes/common/common-attandance.php');
			?>
			
			

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


	function addInput() {
            const container = document.getElementById('container');
            const newInputGroup = document.createElement('div');
            newInputGroup.className = 'form-group';

            const newInput = document.createElement('input');
            newInput.type = 'text';
			newInput.id='datePicker';
            newInput.className = 'form-control';

            const removeBtn = document.createElement('button');
            removeBtn.className = 'btn btn-sm btn-danger';
            removeBtn.textContent = 'Clear';
            removeBtn.onclick = function() {
                removeInput(removeBtn);
            };

            newInputGroup.appendChild(newInput);
            newInputGroup.appendChild(removeBtn);

            container.appendChild(newInputGroup);
    };

    function removeInput(btn) {
            const formGroup = btn.parentElement;
            formGroup.remove();
    };
	$( function () {
		$( "#datePicker" ).datepicker({
			dateFormat: 'dd-mm-yy',
			showOtherMonths:true,
			selectOtherMonths:true,
			showButtonPanel:true,
			changeMonth:true,
			changeYear:true,
		});
	});

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
<?php 
}else{
	header('location:pages-sign-in.php');
}
?>

