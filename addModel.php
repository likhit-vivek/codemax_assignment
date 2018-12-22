<?php 
include('header.php'); 
require 'manufacturer.php';

$manufacturerObj 	= new Manufacturer();
$manufacturers 		= $manufacturerObj->getManufacturers();

?>

<div class="text-center row align-items-center vertical-align-container">
	<div class="col"></div>
	<div class="col-lg-6 col-xl-5">
		<h3 class="text-center form-heading">Add a new model</h3>
		<div class="alert alert-success d-none row">Model added successfully!</div>
		<div class="alert alert-danger d-none row"></div>
		<form id="add-form" method="POST" action="model.php">
			<input type="hidden" class="form-control" name="functionName" value="addModel">
			<div class="form-group row">
				<input type="text" class="form-control col mr-sm-2" id="name" placeholder="Enter model name" name="name">
				<select class="form-control col" id="manufacturer" name="manufacturer">
					<option value="" selected disabled hidden>Choose a manufacturer</option>
					<?php while($row = $manufacturers->fetch_array(MYSQLI_ASSOC)) { ?>
						<option value="<?php echo $row['id']; ?>"><?php echo $row['name']; ?></option>
					<?php } ?>
				</select>
			</div>
			<div class="form-group row">
				<input type="text" class="form-control col mr-sm-2" id="color" placeholder="Enter color" name="color">
				<input type="text" class="form-control col" id="year" placeholder="Enter year of manufacture" name="year">
			</div>
			<div class="form-group row">
				<input type="text" class="form-control" id="regNum" placeholder="Enter registration number" name="regNum">
			</div>
			<div class="form-group row">
				<textarea class="form-control" rows="5" id="note" name="note" maxlength="250" placeholder="Enter a note (Max 250 characters)"></textarea>
			</div>
			<div class="row">
				<button type="submit" class="btn btn-primary col-12">Submit</button>
			</div>
		</form>
	</div>
	<div class="col"></div>
</div>

<?php include('footer.php'); ?>