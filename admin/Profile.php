<?php require "sidebar.php";
require "../lockscreen/connection.php";
$admin = $_SESSION['admin_login'];
$sql = "SELECT *  FROM user JOIN administrator on user.user_id =  administrator.Useruser_id 
WHERE user.user_email='$admin'";

$res = mysqli_query($con, $sql);
if (mysqli_num_rows($res) > 0) {
	$row = mysqli_fetch_assoc($res);
}
?>
<main class="h-full pb-16 overflow-y-auto">
	<div class="container px-6 mx-auto grid">

		<main class="h-full pb-16 overflow-y-auto">
			<div class="container px-6 mx-auto grid">
				<h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
					Personal Details
				</h2>
				<div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">

					<h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
						Full Name &nbsp; : &nbsp;&nbsp; <?php echo $row['user_name']; ?>
					</h2>

					<h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
						Email &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; :&nbsp;&nbsp;&nbsp;
						<?php echo $row['user_email']; ?>
					</h2>

					<h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
						Phone &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;&nbsp;&nbsp;
						<?php echo $row['user_phone']; ?>
					</h2>
					<h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
						Address&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;&nbsp;&nbsp;
						<?php echo $row['user_add']; ?>
					</h2>
				</div>
			</div>
			<div>
			<a href="update-profile.php?id=<?php echo $row['admin_id']; ?>">
					<button class="px-5 py-3 font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
						Update
					</button></a>
			</div>
		</main>
	</div>

</main>





<!--

<div class="h-full pb-16 overflow-y-auto">
<div class="card h-100">
	<div class="card-body">
		<div class="row gutters">
			<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
				<h6 class="mb-2 text-primary">Personal Details</h6>
			</div>
			<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
				<div class="form-group">
					<label for="fullName">Full Name</label>
					<input type="text" class="form-control" id="fullName" placeholder="Enter full name">
				</div>
			</div>
			<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
				<div class="form-group">
					<label for="eMail">Email</label>
					<input type="email" class="form-control" id="eMail" placeholder="Enter email ID">
				</div>
			</div>
			<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
				<div class="form-group">
					<label for="phone">Phone</label>
					<input type="text" class="form-control" id="phone" placeholder="Enter phone number">
				</div>
			</div>
			<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
				<div class="form-group">
					<label for="website">Website URL</label>
					<input type="url" class="form-control" id="website" placeholder="Website url">
				</div>
			</div>
		</div>
		<div class="row gutters">
			<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
				<h6 class="mt-3 mb-2 text-primary">Address</h6>
			</div>
			<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
				<div class="form-group">
					<label for="Street">Street</label>
					<input type="name" class="form-control" id="Street" placeholder="Enter Street">
				</div>
			</div>
			<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
				<div class="form-group">
					<label for="ciTy">City</label>
					<input type="name" class="form-control" id="ciTy" placeholder="Enter City">
				</div>
			</div>
			<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
				<div class="form-group">
					<label for="sTate">State</label>
					<input type="text" class="form-control" id="sTate" placeholder="Enter State">
				</div>
			</div>
			<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
				<div class="form-group">
					<label for="zIp">Zip Code</label>
					<input type="text" class="form-control" id="zIp" placeholder="Zip Code">
				</div>
			</div>
		</div>
		<div class="row gutters">
			<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
				<div class="text-right">
					<button type="button" id="submit" name="submit" class="btn btn-secondary">Cancel</button>
					<button type="button" id="submit" name="submit" class="btn btn-primary">Update</button>
				</div>
			</div>
		</div>
	</div>
</div>
</div>
</div>
</div>
-->


