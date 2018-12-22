<!DOCTYPE HTML>
<html>

<?php 
$rootPath = "http://localhost/codemax_assignment";
error_reporting(0);
session_start();
?>

<head>
    <title>CodeMax Car Inventory</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" integrity="sha384-gfdkjb5BdAXd+lj+gudLWI+BXq4IuLW5IT+brZEZsLFm++aCMlF1V92rMkPaX4PP" crossorigin="anonymous">
	<link rel="stylesheet" href="<?php echo $rootPath."/style.css"; ?>">
	
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
	<script src="<?php echo $rootPath."/custom.js"; ?>"></script>
</head>

<body>
	<div class="header">
		<nav class="navbar navbar-expand-sm bg-primary navbar-dark">
			<a class="navbar-brand" href="home.php">
				CodeMax
			</a>
			
			<?php if(isset($_SESSION['user_id'])) { ?>
			<ul class="navbar-nav">
				<li class="nav-item">
					<a class="nav-link" href="<?php echo $rootPath."/products/home.php"; ?>">Products</a>
				</li>
				<?php if($_SESSION['user_role'] == 1) { ?>
				<li class="nav-item">
					<a class="nav-link" href="<?php echo $rootPath."/users/users.php"; ?>">Users</a>
				</li>
				<?php } ?>
				<li class="nav-item">
					<a class="nav-link" href="<?php echo $rootPath."/logout.php"; ?>">Sign out</a>
				</li>
			</ul>
			<?php } ?>
		</nav>
	</div>
	<div class="container main">