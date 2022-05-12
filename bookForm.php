<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Schedule Appointment</title>
	<!-- Mobile Specific Metas -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<!-- Font-->
	<link rel="stylesheet" type="text/css" href="assest/css/opensans-font.css">
	<link rel="stylesheet" type="text/css" href="assest/fonts/material-design-iconic-font/css/material-design-iconic-font.min.css">
	<!-- datepicker -->
	<link rel="stylesheet" type="text/css" href="assest/css/jquery-ui.min.css">
	<!-- Main Style Css -->
    <link rel="stylesheet" href="assest/css/BAForm.css"/>
</head>
<body>
		<div class="wizard-v6-content">
			<div class="wizard-form">
		        <form class="form-register" id="form-register" action="#" method="post">
		        	<div id="form-total">
		        		<!-- SECTION 1 -->
			            <h2>
			            	<p class="step-icon"><span>1</span></p>
			            	<span class="step-text">Personal Info</span>
			            </h2>
			            <section>
			                <div class="inner">
			                	<div class="form-heading">
			                		<h3>Personal Info</h3>
			                		<span>1/4</span>
			                	</div>
								<div class="form-row">
									<div class="form-holder">
										<label class="form-row-inner">
											<input type="text" class="form-control" id="first_name" name="first_name" required>
											<span class="label">First Name</span>
										</label>
									</div>
									
								</div>
								<div class="form-row">
									<div class="form-holder">
										<label class="form-row-inner">
											<input type="text" class="form-control" id="phone" name="phone" required>
											<span class="label">Phone Number</span>
										</label>
									</div>
									<div class="form-holder">
										<label class="form-row-inner">
											<input type="text" name="your_email_1" id="your_email_1" class="form-control"  required>
											<span class="label">E-Mail</span>
										</label>
									</div>
								</div>
							
								<div class="form-row">
									<div class="form-holder form-holder-2">
										<label class="form-row-inner">
											<input type="text" class="form-control" id="address" name="address" required>
											<span class="label">Address </span>
										</label>
									</div>
								</div>
							</div>
			            </section>

						<!-- SECTION 2 -->
			            <h2>
			            	<p class="step-icon"><span>2</span></p>
			            	<span class="step-text">Vehicle Info</span>
			            </h2>
			            <section>
			                <div class="inner">
			                	<div class="form-heading">
			                		<h3>Vehicle Info</h3>
			                		<span>2/4</span>
			                	</div>

								<div class="form-row">
									<div class="form-holder ">
										<label class="form-row-inner">
											<input type="text" class="form-control" id="brand_name" name="brand_name" required>
											<span class="label">Brand Name</span>
										</label>
									</div>
									<div class="form-holder ">
										<label class="form-row-inner">
											<input type="text" class="form-control" id="model_name" name="model_name" required>
											<span class="label">Model Name</span>
										</label>
									</div>
									</div>
		                		
								<div class="form-row">
									<div class="form-holder form-holder-2">
										<label for="room" class="special-label-1">Vehicle Type </label>
										<select name="room" id="room" class="form-control">
											<option value="Sedan" selected>Sedan</option>
											<option value="Suv">Suv</option>
											<option value="Van">Van</option>
											<option value="Crossover">Crossover</option>
											<option value="Other">Other</option>
										</select>
										<span class="select-btn">
											<i class="zmdi zmdi-chevron-down"></i>
										</span>
									</div>
								</div>
								<div class="form-row">
									<div class="form-holder ">
										<label class="form-row-inner">
											<input type="text" class="form-control" id="rtonumber" name="rtonumber" required>
											<span class="label">RTO Number</span>
										</label>
									</div>
									<div class="form-holder ">
										<label class="form-row-inner">
											<input type="text" class="form-control" id="chessisnumber" name="chessisnumber" required>
											<span class="label">Chessis Number</span>
										</label>
									</div>
									</div>
								<div class="form-row">
									<div class="form-holder">
										<label for="day" class="special-label-1">Vehicle Color</label>
										<input type="color" name="day" class="day" id="color" >
									</div>
								</div>
							</div>
			            </section>
						<!-- SECTION 3 -->
			            <h2>
			            	<p class="step-icon"><span>3</span></p>
			            	<span class="step-text">Booking</span>
			            </h2>
			            <section>
			                <div class="inner">
			                	<div class="form-heading">
			                		<h3>Booking Info</h3>
			                		<span>3/4</span>
			                	</div>
		                		<div class="form-images">
		                			<img src="images/wizard_v6.jpg" alt="wizard_v6">
		                		</div>
								
								<div class="form-row">
									<div class="form-holder">
										<label for="day" class="special-label-1">Appointment Day</label>
										<input type="date" name="day" class="day" id="Apday" placeholder="15 / 08 / 2018">
									</div>
									<div class="form-holder">
										<label for="time" class="special-label-1">Appointment Time </label>
										<select name="time" id="time" class="form-control">
											<option value="8:00am - 10.00am" selected>8:00am - 10.00am</option>
											<option value="9:00am - 21:00pm">9:00am - 21:00pm</option>
											<option value="10:00am - 22:00pm">10:00am - 22:00pm</option>
											<option value="12:00am - 24:00pm">12:00am - 24:00pm</option>
										</select>
										<span class="select-btn">
											<i class="zmdi zmdi-chevron-down"></i>
										</span>
									</div>
								</div>
							</div>
			            </section>
			            <!-- SECTION 4 -->
			            <h2>
			            	<p class="step-icon"><span>4</span></p>
			            	<span class="step-text">Confirm</span>
			            </h2>
			            <section>
			                <div class="inner">
			                	<div class="form-heading">
			                		<h3>Comfirm Details</h3>
			                		<span>4/4</span>
			                	</div>
								<div class="table-responsive">
									<table class="table">
										<tbody>
											<tr class="space-row">
												<th>Name:</th>
												<td id="first_name"></td>
											</tr>
											<tr class="space-row">
												<th>Vehicle:</th>
												<td id="rtonumber"></td>
											</tr>
											<tr class="space-row">
												<th>Date:</th>
												<td id="Apday"></td>
											</tr>
											<tr class="space-row">
												<th>Time:</th>
												<td id="time"></td>
											</tr>
											
										</tbody>
									</table>
								</div>
							</div>
			            </section>
		        	</div>
		        </form>
			</div>
		</div>
	<script src="assest/js/jquery-3.3.1.min.js"></script>
	<script src="assest/js/jquery.steps.js"></script>
	<script src="assest/js/jquery-ui.min.js"></script>
	<script src="assest/js/main.js"></script>
</body>
</html>