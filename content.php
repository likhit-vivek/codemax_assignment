<?php
require 'manufacturer.php';
require 'model.php';

$manufacturer 	= $_GET['manf'];
$model 			= $_GET['model'];

$manufacturerObj 	= new Manufacturer();
$result 			= $manufacturerObj->getManufacturers();
$manufacturers 		= [];

while($row = $result->fetch_array(MYSQLI_ASSOC)) 
{
	$manufacturers[$row['id']] = $row['name'];
}

$modelObj 		= new Model();
$result 		= $modelObj->getModelsByName($manufacturer, $model);

if($result->num_rows > 0) {
?>
<table class="table table-responsive-md table-hover text-center">
	<thead>
		<tr>
			<th>ID No</th>
			<th>Manufacturer</th>
			<th>Model</th>
			<th>Color</th>
			<th>Year of Manufacture</th>
			<th>Reg Number</th>
			<th>Note</th>
			<th>Action</th>
		</tr>
	</thead>
	<tbody>
		<?php while($row = $result->fetch_array(MYSQLI_ASSOC)) { ?>
		<tr id="<?php echo $row['id']; ?>">
			<td><?php echo $row['id']; ?></td>
			<td><?php echo $manufacturers[$row['manufacturer']]; ?></td>
			<td><?php echo $row['name']; ?></td>
			<td><?php echo $row['color']; ?></td>
			<td><?php echo $row['mfdyear']; ?></td>
			<td><?php echo $row['regnum']; ?></td>
			<td><?php echo $row['note']; ?></td>
			<td><?php echo $row['sold'] ? "Sold out" : "Sell"; ?></td>
		</tr>
		<?php } ?>
	</tbody>
</table>
<?php } ?>