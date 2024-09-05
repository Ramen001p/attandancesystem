
<?php 
$empData=displayEmp();

foreach($empData as $empData ){
	$empId=$empData['empID'];
	$empName=$empData['empName'];
	$empImg=$empData['empImg'];
	$Phone=$empData['empPhone'];
	$Email=$empData['empEmail'];
	$Address=$empData['empAddress'];
	$Gender=$empData['empGender'];
	$Department=$empData['empDepartment'];
	$Designation = $empData['empDesignation'];
	$DOB = $empData['empDateOfBirth'];
	$DOJ = $empData['empDateOfJoin'];
	$internshipStart = $empData['internshipStart'];
	$internshipEnd = $empData['internshipEnd'];
	$maritalstatus = $empData['maritalstatus'];
	$admin=$empData['admin'];


}
?>


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
                <img src="assets/img/employeeImg/avatar.jpg" class="avatar img-fluid rounded me-1" alt="Charles Hall" /> <span class="text-dark"><?php echo $empName  ?></span>
              </a>
							<div class="dropdown-menu dropdown-menu-end">
								<a class="dropdown-item" href="logout.php">Log out</a>
							</div>
						</li>
					</ul>
				</div>