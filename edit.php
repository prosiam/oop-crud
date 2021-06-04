<?php require_once('vendor/autoload.php') ?>
<?php 
	// class use
	use App\controllers\Student;





	/**
	 * class instance
	 */
	$student = new Student;

	/**
	 * id value get from url
	 */
	if (isset($_GET['id'])) {
		$id=$_GET['id'];
		/**
		 * single student's data
		 */
		$single_data=$student -> singleStudent($id);
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

	<!-- Form data management -->
	<?php
		/**
		 * value receive from student form
		 */
		if (isset($_POST['update'])) {
			$name=$_POST['name'];
			$email=$_POST['email'];
			$cell=$_POST['cell'];
			$old_photo=$_POST['old_photo'];
			/**
			 * photo's file receive from student form 
			 */
			$new_photo=$_FILES['new_photo']['name'];
			
			

			/**
			 * form validation
			 */
			if (empty($name) || empty($email) || empty($cell)) {
				$mess="<p class='alert alert-danger'>All fields are required to fill !<button class='btn btn-primary btn-sm close' data-dismiss='alert'>&times</button></p>";
			}elseif (!filter_var($email,FILTER_VALIDATE_EMAIL)) {
				$mess="<p class='alert alert-danger'>E-mail must be a valid E-mail !<button class='btn btn-primary btn-sm close' data-dismiss='alert'>&times</button></p>";
			}else{
				/**
				 * photo name selection
				 */
				if (!$new_photo) {
					$photo_name=$old_photo;
				}else{
					
					$new_photo_array=$_FILES['new_photo'];
					
					/**
					 * upload photo
					 */
					$photo_name=$student -> upload($new_photo_array,'media/img/students/');
				}

				/**
				 * Data update
				 */
				$mess=$student -> updateStudent($name,$email,$cell,$photo_name,$id);
			}
		}






	 ?>
	
	

	<div class="wrap ">
		<a class="btn btn-primary btn-sm" href="table.php">All students</a>
		<div class="card shadow">
			<div class="card-body">
				<?php 
					if (isset($mess)) {
						echo $mess;
					}
				 ?>
				<h2>Update your information</h2>
				<form action="<?php echo $_SERVER["PHP_SELF"]; ?>?id=<?php echo $id; ?>" method="POST" enctype="multipart/form-data">
					<div class="form-group">
						<label for="">Name</label>
						<input name="name" value="<?php echo $single_data['name']; ?>" class="form-control" type="text">
					</div>
					<div class="form-group">
						<label for="">Email</label>
						<input name="email" value="<?php echo $single_data['email']; ?>" class="form-control" type="text">
					</div>
					<div class="form-group">
						<label for="">Cell</label>
						<input name="cell" value="<?php echo $single_data['cell']; ?>" class="form-control" type="text">
					</div>
					<div class="form-group">
						<img src="media/img/students/<?php echo $single_data['photo']; ?>">
						<input type="text" name="old_photo" value="<?php echo $single_data['photo']; ?>">
					</div>
					<div class="form-group">
						<label for="">photo</label>
						<input name="new_photo" class="form-control" type="file">
					</div>
					<div class="form-group">
						<input name="update" class="btn btn-primary" type="submit" value="Update">
					</div>
				</form>
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