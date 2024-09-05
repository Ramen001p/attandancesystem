<?php 
error_reporting(E_ERROR | E_PARSE);
require("includes/connection/config.php");
require("includes/function/attandaceSystem.php");
// require("includes/function/admin/adminFunction.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LeaveRequests</title>
    <?php
	require('includes/common/common-css.php');
    require('includes/common/common-dataTable-cdn.php');
	?>
    <script src="includes/js/jquery.js"></script> 
        <script src="includes/datatable/media/js/jquery.dataTables.min.js"></script> 
		<link href="includes/datatable/media/css/jquery.dataTables.min.css" rel="stylesheet">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
		<link rel="stylesheet" href="https://cdn.datatables.net/2.0.3/css/dataTables.dataTables.css">
</head>
<body>
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

            <div class="row">
							<div class="col-12 col-lg-12 col-xxl-12 d-flex">
								<div class="card flex-fill p-4">
									<div class="card-header">
										<h5 class="card-title mb-0">Leave Requests</h5>
									</div>
									<table id="dtexample" class="display wrap cell-border hover ">
										<thead>
                                            <th class="text-center">Name</th>
                                            <th class="text-center">Phone</th>
                                            <th class="text-center">Email</th>
                                            <th class="text-center">Start Date</th>
                                            <th class="text-center">End Date</th>
                                            <th class="text-center">Reason</th>
                                            <th class="text-center">Actions</th>

										</thead>
									</table>
								</div>
							</div>
						</div>
        </div>
    </div>

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
    <script>
        $(document).ready(function () {
            $('#dtexample').dataTable({
                "processing":true,
                "serverSide":true,
                "ajax":"leaveDataDisplay.php"
                
            });
        });
    </script>
</body>
</html>