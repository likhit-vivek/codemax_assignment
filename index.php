<?php 
require 'manufacturer.php';
require 'model.php';
include('header.php'); 

$manufacturerObj 	= new Manufacturer();
$result 			= $manufacturerObj->getManufacturers();
$manufacturers 		= [];

while($row = $result->fetch_array(MYSQLI_ASSOC)) 
{
	$manufacturers[$row['id']] = $row['name'];
}

$modelObj 			= new Model();
$models				= $modelObj->getModelsByGroup();

if($models->num_rows > 0) {
	$counter = 0;
?>
<div class="row align-items-center vertical-align-container text-center">
	<table class="table table-responsive-md table-hover">
		<thead>
			<tr class="d-flex">
				<th id="main-head" class="col-lg-12"><h2>Inventory</h2></th>
			</tr>
			<tr class="d-flex">
				<th class="col-lg-2">Serial No</th>
				<th class="col-lg-3">Manufacturer</th>
				<th class="col-lg-3">Model</th>
				<th class="col-lg-2">Count</th>
				<th class="col-lg-2">Actions</th>
			</tr>
		</thead>
		<tbody>
			<?php while($row = $models->fetch_array(MYSQLI_ASSOC)) { $counter++;?>
			<tr class="d-flex">
				<td class="col-lg-2"><?php echo $counter; ?></td>
				<td class="col-lg-3"><?php echo $manufacturers[$row['manufacturer']]; ?></td>
				<td class="col-lg-3"><?php echo $row['name']; ?></td>
				<td class="col-lg-2"><?php echo $row['count']; ?></td>
				<td class="col-lg-2">
					<a type="button" class="btn btn-success btn-action" onclick="showModal('<?php echo $row['manufacturer']; ?>', '<?php echo $row['name']; ?>')"><i class="fas fa-eye fa-fw"></i></a>
				</td>
			</tr>
			<?php } ?>
		</tbody>
	</table>
</div>
<?php } ?>

<div class="modal fade" id="myModal">
	<div class="modal-dialog modal-dialog-centered modal-lg">
		<div class="modal-content">

			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
			</div>

			<div class="modal-body">
			</div>
			
			<div class="modal-footer">
			</div>

		</div>
	</div>
</div>

<?php include('footer.php'); ?>