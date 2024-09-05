<?php 
session_start();

?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="Responsive Admin &amp; Dashboard Template based on Bootstrap 5">
	<title>Sign In </title>
	<?php 
	require('includes/common/common-css.php');
	?>
</head>

<body>


	<main class="d-flex w-100">
		<div class="container d-flex flex-column">
			<div class="row vh-100">
				<div class="col-sm-10 col-md-8 col-lg-6 col-xl-5 mx-auto d-table h-100">
					<div class="d-table-cell align-middle">

						<div class="text-center mt-4">
							<h1 class="h2">Welcome To WYD Creative</h1>
							<p class="lead">
								Sign in to your account to continue
							</p>
						</div>

						<div class="card">
							<div class="card-body">
								<div class="m-sm-3">
								<form id="myForm" action="includes/backend/loginBackend.php" method="POST" 
								class="needs-validation" novalidate>
										<div class="mb-3">
											<label class="form-label">Email</label>
											<input class="form-control form-control-lg" type="email" id="email" name="email" placeholder="Enter your email" required />
											<div class="valid-feedback">Looks good!</div>
											<div class="invalid-feedback">Please enter a valid email address.</div>
										</div>
										<?php 
											if(isset($_SESSION['error'])) {
												$message = $_SESSION['error'];
												unset($_SESSION['error']);
												echo $message;
										}?>
										
										<div class="d-grid gap-2 mt-3">
											<button type="submit" class="btn btn-lg btn-primary" onclick="submitForm(event)">Sign in</button>
										</div>
									</form>
								</div>
							</div>
						</div>
						<div class="text-center mb-3">
							Don't have an account? <a href="pages-sign-up.php">Sign up</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</main>

	<script src="js/app.js"></script>
	<script>
	function submitForm(event) 
	{
		event.preventDefault();
		document.getElementById('myForm').classList.add('was-validated');

		if (document.getElementById('myForm').checkValidity()) {
			document.getElementById('myForm').submit();
		} 
  	}
</script>

</body>

</html>