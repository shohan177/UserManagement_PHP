<?php require_once "app/db.php" ?>
<?php require_once "app/function.php" ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>

	<link rel="stylesheet" href="asset/css/responsive.css">
	<link rel="stylesheet" href="asset/css/bootstrap.min.css">
	<link rel="stylesheet" href="asset/css/style.css">
</head>
<body>


	<?php
		
		
		if(isset($_POST['save'])){
		$name = $_POST['name'];
		$email = $_POST['email'];
		$phone = $_POST['phone'];
		$Address = $_POST['add'];

	

		if(empty($name)||empty($email)||empty($phone)||empty($Address)){
			$mess= '<p class="alert alert-danger alert-dismissible fade show">Data fild is empty <button type="button" class="close" data-dismiss="alert" aria-label="Close">
				    <span aria-hidden="true">&times;</span>
				  </button></p>';
		}elseif(filter_var($email, FILTER_VALIDATE_EMAIL)== false) {
			$mess= '<p class="alert alert-warning alert-dismissible fade show">Evalid email<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				    <span aria-hidden="true">&times;</span>
				  </button></p>';
		} else{


			$data = fileUp($_FILES['photo'], "photos/");
			$photo_name_str = $data['file_name'];

			if ($data['status'] == 'yes') {

				$sql = "INSERT INTO user_info (Name,Email,Phone,Adress,photo_str) VALUES ('$name','$email','$phone','$Address','$photo_name_str')" ;
				$connection -> query($sql); 
			

				$mess= '<p class="alert alert-success alert-dismissible fade show">Data is stable<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				    <span aria-hidden="true">&times;</span>
				    </button></p>';
			}else{
				$mess= '<p class="alert alert-warning alert-dismissible fade show">Image formet error<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				    <span aria-hidden="true">&times;</span>
				    </button></p>';
			};
		};
	};

	 ?>
	 <?php
	 if (isset($name)) {
		
			
				echo $mess; 
			
		
	};
	?>

	
	<div class="card shadow">
		<a href="all.php">show all user</a>
	<div class="card-body">
		<div class="card-head">
			<h2>Registaion</h2>
		</div>
		<form  action="" method="POST" enctype="multipart/form-data">
		<div class = "form-group">
			<label>Name:</label>
			<input type="text" class="form-control" name="name" value="<?php old('name');?>" placeholder="User Name">
		</div>

		<div class = "form-group">
			<label>Email:</label>
			<input type="text" class="form-control" name="email" value="<?php old('email');?>" placeholder="User Email">
		</div>

	
		<div class = "form-group">
			<label>Phone:</label>
			<input type="text" class="form-control" name="phone" value="<?php old('phone');?>"  placeholder="User Phone Number">
		</div>

		<div class = "form-group">
			<label>Adress:</label>
			<input type="text" class="form-control" name="add" value="<?php old('add');?>" placeholder="User adress">
		</div>

		<div class = "form-group">
			
			<input type="file" name="photo">
		</div>
		<div class = "form-group">
			
			<input type="submit" class="form-control bg-success" name="save" value="Save" >
		</div>


		</form>
		
	</div>
</div>
	<script src="asset/js/jquery-3.4.1.min.js"></script>
	<script src="asset/js/popper.min.js"></script>
	<script src="asset/js/bootstrap.min.js"></script>
	<script src="asset/js/script.js"></script>
</body>
</html>