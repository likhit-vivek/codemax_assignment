<?php include('header.php'); ?>

<div class="text-center row align-items-center vertical-align-container">
	<div class="col"></div>
	<div class="col-lg-5 col-xl-4">
		<h3 class="text-center form-heading">Add a new manufacturer</h3>
		<div class="alert alert-success d-none">Manufacturer added successfully!</div>
		<div class="alert alert-danger d-none"></div>
		<form id="add-form" method="POST" action="manufacturer.php">
			<input type="hidden" class="form-control" name="functionName" value="addManufacturer">
			<div class="form-group">
				<input type="text" class="form-control" id="name" placeholder="Enter manufacturer name" name="name">
			</div>
			<button type="submit" class="btn btn-primary col-12">Submit</button>
		</form>
	</div>
	<div class="col"></div>
</div>

<?php include('footer.php'); ?>