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

