
<?php require_once('vendor/autoload.php') ?>
<?php 
	// class use
	use App\controllers\Student;





	/**
	 * class instance
	 */
	$student = new Student;
	

	/**
	 * get id from url
	 */
	if (isset($_GET['id'])) {
		$id=$_GET['id'];

		/**
		 * Show single student's data
		 */
		$single_data=$student -> singleStudent($id);

	}
	

 ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Single student</title>
	<!-- ALL CSS FILES  -->
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/css/style.css">
	<link rel="stylesheet" href="assets/css/responsive.css">
</head>
<body>
	<?php 
		

	?>
	
	
	

	<div style="width: 450px;" class="wrap-table shadow">
		<a class="btn btn-success btn-sm" href="index.php">Add new student</a>
		<div class="card">
			<div class="card-body">
				<img style="width: 150px;" class="img-thumbnail d-block mx-auto" src="media/img/students/<?php echo $single_data['photo']; ?>" >
				<table class="table">
					<tr>
						<td>Name</td>
						<td><?php echo $single_data['name']; ?></td>
					</tr>
					<tr>
						<td>Email</td>
						<td><?php echo $single_data['email']; ?></td>
					</tr>
					<tr>
						<td>Cell</td>
						<td><?php echo $single_data['cell']; ?></td>
					</tr>
					
				</table>
			</div>
		</div>
	</div>
	







	<!-- JS FILES  -->
	<script src="assets/js/jquery-3.4.1.min.js"></script>
	<script src="assets/js/popper.min.js"></script>
	<script src="assets/js/bootstrap.min.js"></script>
	<script src="assets/js/custom.js"></script>
</body>
</html>
