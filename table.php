<?php require_once('vendor/autoload.php') ?>
<?php 
	// class use
	use App\controllers\Student;





	/**
	 * class instance
	 */
	$student = new Student;



	/**
	 * Delete student from student table
	 */
	//Get the delete id from the URL
	if (isset($_GET['id'])) {
		$id=$_GET['id'];

		//delete
		$mess=$student -> deleteStudent($id);
	}
	

 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Development Area</title>
	<!-- ALL CSS FILES  -->
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/css/style.css">
	<link rel="stylesheet" href="assets/css/responsive.css">
</head>
<body>
	
	

	<div class="wrap-table ">


		<?php 
			if (isset($mess)) {
				echo $mess;
			}
		?>	
		

		<a class="btn btn-primary btn-sm" href="index.php">Add new students</a>
		<div class="card shadow">
			<div class="card-body">
				<h2>All Data</h2>
				<table class="table table-striped">
					<thead>
						<tr>
							<th>#</th>
							<th>Name</th>
							<th>Email</th>
							<th>Cell</th>
							<th>Photo</th>
							<th>Action</th>
						</tr>
					</thead>
					<?php 
						$i=1;
						/**
						 * get all students information from students table
						 */
						$data=$student -> allStudent();
						
						//data fetching
						while ($fetch_data= $data -> fetch_assoc()):
						
					 ?>


					<tbody>
						<tr>
							<td><?php echo $i;$i++; ?></td>
							<td><?php echo $fetch_data['name']; ?></td>
							<td><?php echo $fetch_data['email']; ?></td>
							<td><?php echo $fetch_data['cell']; ?></td>
							<td><img src="media/img/students/<?php echo $fetch_data['photo']; ?>" alt=""></td>
							<td>
								<a class="btn btn-sm btn-info" href="view.php?id=<?php echo $fetch_data['id']; ?>">View</a>
								<a class="btn btn-sm btn-warning" href="edit.php?id=<?php echo $fetch_data['id']; ?>">Edit</a>
								<a class="btn btn-sm btn-danger" href="?id=<?php echo $fetch_data['id']; ?>">Delete</a>
							</td>
						</tr>
						
						<?php endwhile; ?>

					</tbody>
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