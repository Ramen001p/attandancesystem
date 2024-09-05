<?php session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="Responsive Admin &amp; Dashboard Template based on Bootstrap 5">
	<title>Sign Up </title>
	<?php 
	require('includes/common/common-css.php');
	?>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

 

	
</head>

<body>
	<?php 
	?>
	<main class="d-flex w-100">
		<div class="container d-flex flex-column">
			<div class="row vh-100">
				<div class="col-sm-10 col-md-8 col-lg-6 col-xl-5 mx-auto d-table h-100">
					<div class="d-table-cell align-middle">

						<div class="text-center mt-4">
							<h1 class="h2">WYD Creative </h1>
							<p class="lead">
								
								Register your employee account
							</p>
						</div>

						<div class="card">
							<div class="card-body">
								<div class="m-sm-3">
								<form id="myForm" action="includes/backend/insertBackend.php" method="POST" 
								class="needs-validation" novalidate enctype="multipart/form-data">
										
										<div class="mb-3">
											<label class="form-label">Full Name</label>
											<input class="form-control form-control-lg" type="text" id="uname" name="fname" placeholder="Enter your name" required />
											<div class="valid-feedback">Looks good!</div>
											<div class="invalid-feedback">Please enter your full name.</div>
										</div>

										<div class="mb-3">
											<label class="form-label">Email</label>
											<input class="form-control form-control-lg" type="email" id="email" name="email" placeholder="Enter your email" required />
											<div class="valid-feedback">Looks good!</div>
											<div class="invalid-feedback">Please enter a valid email address.</div>
										</div>

										<div class="mb-3">
											<label class="form-label">Phone No.</label>
											<input class="form-control form-control-lg" type="tel" name="phone" placeholder="Enter your phone No." required />
											<div class="valid-feedback">Looks good!</div>
											<div class="invalid-feedback">Please enter your phone number.</div>
										</div>

										<div class="mb-3">
											<label class="form-label">Designation</label>
											<input class="form-control form-control-lg" type="text" name="designation" placeholder="Enter your designation" required />
											<div class="valid-feedback">Looks good!</div>
											<div class="invalid-feedback">Please enter your designation.</div>
										</div>

										<div class="mb-3">
											<label class="form-label">Department</label>
											<input class="form-control form-control-lg" type="text" name="department" placeholder="Enter your Department" required />
											<div class="valid-feedback">Looks good!</div>
											<div class="invalid-feedback">Please enter your department.</div>
										</div>

										<div class="row mb-3 ">
											
												<label class="form-label">Gender</label><br>
											
											<div class="form-check form-check-inline col-md-4">
												<input class="form-check-input" type="radio" id="femaleGender" name="gender" value="f" required />
												<label class="form-check-label" for="femaleGender">Female</label>
											</div>

											<div class="form-check form-check-inline col-md-4">
												<input class="form-check-input" type="radio" id="maleGender" name="gender" value="m" />
												<label class="form-check-label" for="maleGender">Male</label>
											</div>
										</div>

										<div class="row mb-4">
											
												<label class="form-label">Blood Group</label>
											
											<div class="dropdown col-md-8">
												<select class="form-select" 
												name="blood" required>
													<option value="">Select Blood Group</option>
													<option value="A+">A+</option>
													<option value="A-">A-</option>
													<option value="B+">B+</option>
													<option value="B-">B-</option>
													<option value="O+">O+</option>
													<option value="O-">O-</option>
													<option value="AB+">AB+</option>
													<option value="AB-">AB-</option>
												</select>
												<div class="invalid-feedback">Please select your blood group.</div>
											</div>
										</div>

										<div class="mb-3">
											<label class="form-label">Date of birth</label>
											<input class="form-control form-control-lg" type="text" id="dateofbirth" name="dob" required />
											<div class="valid-feedback">Looks good!</div>
											<div class="invalid-feedback">Please enter your date of birth.</div>
										</div>

										<div class="mb-3">
											<label class="form-label">Date of joining</label>
											<input class="form-control form-control-lg" type="text" id="dateofjoin" name="joining_date" max="2024-03-29" required />
											<div class="valid-feedback">Looks good!</div>
											<div class="invalid-feedback">Please enter your date of joining.</div>
										</div>

										<div class="mb-3">
											<label class="form-label">Internship Period</label>
											<input class="form-control form-control-lg" type="text" id="From" name="daterange" required />
											<div class="valid-feedback">Looks good!</div>
											<div class="invalid-feedback">Please enter From date</div>
												
										</div>
											
										<div class="mb-3">
											<label class="form-label">Skills</label>
											<input class="form-control form-control-lg" type="text"  name="skill" id="input-server-prevent-duplicates" placeholder="Enter your skills" required />
											<div class="valid-feedback">Looks good!</div>
											<div class="invalid-feedback">Please enter atleast 1 skill</div>
										</div>

										<div class="mb-3">
											<label class="form-label">Address</label>
											<textarea class="form-control form-control-lg" name="address" id="" cols="30" rows="3" placeholder="Enter your address" required></textarea>
											<div class="valid-feedback">Looks good!</div>
											<div class="invalid-feedback">Please enter your Address</div>
										</div>

										<div class="row mb-3">
												<label class="form-label">Marital Status</label>

											<div class="col-md-9 gap-2">
												<div class="form-check form-check-inline col-md-3 ml-1">
													<input class="form-check-input" type="radio" name="status" id="Unmarried" value="Unmarried" required />
													<label class="form-check-label" for="Unmarried">Unmarried</label>
												</div>

												<div class="form-check form-check-inline col-md-3 ml-1">
													<input class="form-check-input" type="radio" name="status" id="married" value="Married" />
													<label class="form-check-label" for="married">Married</label>
												</div>

												<div class="form-check form-check-inline col-md-3 ml-1">
													<input class="form-check-input" type="radio" name="status" id="Divorced" value="Divorced" />
													<label class="form-check-label" for="Divorced">Divorced</label>
												</div>
											</div>
										</div>

											<div class="mb-3">
												<label class="form-label">Profile Picture</label>
												<div class="row">
													<div class="col-md-12 ">
														<input class="form-  form-control-lg" type="file" id="image-input" name="image" accept="image/.jpeg,.jpg,.png" onchange="previewImage(event);" required/>
													<div class="invalid-feedback">Please fill out this field.</div>
														<div class="user-image" id="preview-div-image" style="position:relative;height: 150px;width: 150px;display:none;">
															<img id="preview-selected-image" style="height:100%;width:100%; margin:0;">
															<span id="rstbtn" style="cursor:pointer;position:absolute;top: 1px;right:1%;color:red;background-color:white;
															padding:5px;"
															>&#x274C;</span>
															
														</div>
													</div>
												</div>
												
											</div>

									
											<div class="d-grid gap-2 mt-3">
												<button type="submit" class="btn btn-lg btn-primary" name="employeeFormsubmit"
												onclick="submitForm(event)">Sign up</button>
											</div>
									</form>
								</div>
							</div>
						</div>
						<div class="text-center mb-3">
							Already have account? <a href="pages-sign-in.php">Log In</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</main>



<?php 
	require('includes/common/common-js.php');

	require('includes/connection/config.php');
	$result = $conn->query("SELECT * FROM skills");
	//$rows=$result->fetch_all(MYSQLI_ASSOC);

	//echo $jsn_encoded =  json_encode($rows) ;

	
?>


<script>

$(document).ready(function() {
        $("#input-server-prevent-duplicates").tokenInput("data.php", {
          theme: "facebook",
          preventDuplicates: true,
		  tokenLimit:10,
        });
      });



$( function () {
    $( "#dateofbirth" ).datepicker({
		dateFormat: 'dd-mm-yy',
        showOtherMonths:true,
        selectOtherMonths:true,
        showButtonPanel:true,
        changeMonth:true,
        changeYear:true,
        minDate: new Date(1990,1,5),
		defaultDate: new Date(2000,0,1),
        maxDate: new Date()
    });
});
$( function () {
    $( "#dateofjoin" ).datepicker({
		dateFormat: 'dd-mm-yy',
        showOtherMonths:true,
        selectOtherMonths:true,
        showButtonPanel:true,
        changeMonth:true,
        changeYear:true,
        minDate: new Date(2000,1,5),
        maxDate: "today"
    });
});

// $(function() {
//       var dateFormat = "dd/mm/yy";
//       var from = $("#From").datepicker({
//         defaultDate: "+1w",
//         changeMonth: true,
//         numberOfMonths: 2,
//         onSelect: function(selectedDate) {
//           var date = $(this).datepicker('getDate');
//           date.setMonth(date.getMonth() + 6);
//           $("#to").datepicker("option", "minDate", date);
//         }
//       });
      
//       var to = $("#to").datepicker({
//         defaultDate: "+1w",
//         changeMonth: true,
//         changeYear: true,
//         numberOfMonths: 1,
//       });

//       function getDate(element) {
//         var date;
//         try {
//           date = $.datepicker.parseDate(dateFormat, element.value);
//         } catch (error) {
//           date = null;
//         }
//         return date;
//       }
// });

$(function() {
  $('input[name="daterange"]').daterangepicker({
    opens: 'center'
  }, function(start, end, label) {
    //console.log("A new date selection was made: " + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD'));
  });
});


	function submitForm(event) {
    event.preventDefault();
    document.getElementById('myForm').classList.add('was-validated');

    if (document.getElementById('myForm').checkValidity()) {
		document.getElementById('myForm').submit();
    } 
  }
		const previewImage = (event) => {
			const imageFiles = event.target.files;
			const imageFilesLength = imageFiles.length;
			if (imageFilesLength > 0) {
				const imageSrc = URL.createObjectURL(imageFiles[0]);
				const imagePreviewElement = document.querySelector(
				"#preview-selected-image"
				);
				const imagedivlement = document.querySelector("#preview-div-image");

				const legend = document.querySelector("#image-input");

				imagePreviewElement.src = imageSrc;
				imagePreviewElement.style.display = "block";
				imagedivlement.style.display = "block";
				legend.style.display = "none";
			}
	};
	document.getElementById("rstbtn").addEventListener("click",function(){
		document.getElementById("image-input").value="";
		document.getElementById("preview-selected-image").src="";
		document.getElementById("preview-div-image").style.display = "none";
		document.getElementById("image-input").style.display = "block";
	});
</script>

	
</body>

</html>