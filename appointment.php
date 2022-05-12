<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<title>Schedule Appointment</title>
	<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" />
	<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet" />
	<link href="../shivam/css/book-apmnt-form.css" rel="stylesheet" />
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>


</head>

<body>
	<?php require "top.php";
	?>


	<!-- MultiStep Form -->
	<div class="container-fluid" id="grad1">
		<div class="row justify-content-center mt-0">
			<div class="col-11 col-sm-9 col-md-7 col-lg-6 text-center p-0 mt-3 mb-2">
				<div class="card px-0 pt-4 pb-0 mt-3 mb-3">
					<h2><strong>Book Appointment </strong></h2>
					<p>Fill all form field to go to next step</p>
					<div class="row">
						<div class="col-md-12 mx-0">
							<form id="msform" action="add-appoiment" method="post">
								<!-- progressbar -->
								<ul id="progressbar">
									<li class="active" id="account">
										<strong>Personal</strong>
									</li>
									<li id="personal"><strong>Vehicle</strong></li>
									<li id="payment"><strong>Booking</strong></li>
									<li id="confirm"><strong>Confirm</strong></li>
								</ul>
								<!-- fieldsets -->
								<fieldset>
									<div class="form-card">
										<h2 class="fs-title">Personal Information</h2>
										<span class="label">UserName </span>
										<input type="text" name="uname" id="uname" class="form-control" required />
										<span class="label">Email Id </span>
										<input type="email" name="email" class="form-control" required />
										<span class="label">Phone Number</span>
										<input type="number" class="form-control" name="number" required />
										<span class="label">Address </span>
										<input type="text" class="form-control" id="address" name="address" required>
									</div>
									<input type="button" name="next" class="next action-button" value="Next Step" />
								</fieldset>
								<fieldset>
									<div class="form-card">
										<h2 class="fs-title">Vehicle Info</h2>
										<span>Brand Name</span>
										<input type="text" class="form-control" id="brand_name" name="brand_name" required>
										<span>Model Name</span>
										<input type="text" class="form-control" id="model_name" name="model_name" required>
										<span>Model Year</span>
										<input type="text" class="form-control" id="model_year" name="model_year" required>
										<label>Vehicle Type </label>
										<select name="car_type" id="car-type" class="form-control">
											<option value="Sedan" selected>Sedan</option>
											<option value="Suv">Suv</option>
											<option value="Van">Van</option>
											<option value="Crossover">Crossover</option>
											<option value="Other">Other</option>
										</select>
										<span>
											<i class="zmdi zmdi-chevron-down"></i>
										</span>
										<label>
											<span>RTO Number</span>
											<input type="text" class="form-control" id="rtonumber" name="rtonumber" required>
										</label>
										<br>
										<label>
											<span>Chessis Number</span>
											<input type="text" class="form-control" id="chessisnumber" name="chessisnumber" required>
										</label>
										<br>
										<label for="day" class="special-label-1">Vehicle Color</label>
										<input type="color" name="day" id="color">
									</div>
									<input type="button" name="previous" class="previous action-button-previous" value="Previous" />
									<input type="button" name="next" class="next action-button" value="Next Step" />
								</fieldset>
								<fieldset>
									<div class="form-card">
										<h2 class="fs-title">Appointment details</h2>
										<label>Date</label>
										<input type="date" name="day" id="Apday" min="<?php echo date("Y-m-d"); ?>">

										<label>Time</label>
										<input type="time" name="day" id="Apday" placeholder="15 / 08 / 2018">

									</div>
									<input type="button" name="previous" class="previous action-button-previous" value="Previous" />
									<input type="button" name="make_appmnt" class="next action-button" value="Confirm" />
								</fieldset>
								<fieldset>
									<div class="form-card">
										<h2 class="fs-title text-center">Success !</h2>
										<br /><br />
										<div class="row justify-content-center">
											<div class="col-3">
												<img src="https://img.icons8.com/color/96/000000/ok--v2.png" class="fit-image" />
											</div>
										</div>
										<br /><br />
										<div class="row justify-content-center">
											<div class="col-7 text-center">
												<h5>Your Appointment has been booked</h5>
												<button name="ok"  >Cancel</button>
											</div>
										</div>
									</div>
								</fieldset>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<script type="text/javascript" src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>
	<script type="text/javascript" src=""></script>
	<script type="text/javascript" src=""></script>
	<script type="text/Javascript">
		$(document).ready(function(){

      var current_fs, next_fs, previous_fs; //fieldsets
      var opacity;

      $(".next").click(function(){

      current_fs = $(this).parent();
      next_fs = $(this).parent().next();

      
	  //Add Class Activ	  
      $("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");

      //show the next fieldset
      next_fs.show();
		name = document.getElementById("uname").val();
	  alert(name);
      //hide the current fieldset with style
      current_fs.animate({opacity: 0}, {
      step: function(now) {
      // for making fielset appear animation
      opacity = 1 - now;

      current_fs.css({
      'display': 'none',
      'position': 'relative'
      });
      next_fs.css({'opacity': opacity});
      },
      duration: 600
      });
      });

      $(".previous").click(function(){

      current_fs = $(this).parent();
      previous_fs = $(this).parent().prev();

      //Remove class active
      $("#progressbar li").eq($("fieldset").index(current_fs)).removeClass("active");

      //show the previous fieldset
      previous_fs.show();

      //hide the current fieldset with style
      current_fs.animate({opacity: 0}, {
      step: function(now) {
      // for making fielset appear animation
      opacity = 1 - now;

      current_fs.css({
      'display': 'none',
      'position': 'relative'
      });
      previous_fs.css({'opacity': opacity});
      },
      duration: 600
      });
      });

      $('.radio-group .radio').click(function(){
      $(this).parent().find('.radio').removeClass('selected');
      $(this).addClass('selected');
      });

      });



	  $("#make_appmnt").click(function()
	  {
		  alert("yash");
	  });
	  
    </script>

















	<?php require "foter.php" ?>

</body>





</hmml>