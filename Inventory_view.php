<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="w3.css">
	<title>Inventory List</title>
</head>
<body>
	<!-- Sidebar -->
	<div class="w3-sidebar w3-light-grey w3-bar-block" style="width:15%">
  		<h3 class="w3-bar-item">Home</h3>
  		<a class="w3-bar-item w3-button" href="Branch_view.php">Branch</a>
  		<a class="w3-bar-item w3-button" href="Employee_view.php">Employee</a>
  		<a class="w3-bar-item w3-button" href="Equipment_view.php">Equipment</a>
  		<a class="w3-bar-item w3-button" href="Inventory_view.php">Inventory</a>
  		<a class="w3-bar-item w3-button" href="Membership_view.php">Membership</a>
	</div>
	<!--end sidedbar-->

	<div style="margin-left:15%">
		<div class="w3-container w3-teal">
  			<h1>Inventory</h1>
		</div>
		<a class="w3-button w3-green" href="Inventory_insert.php">Add New Inventory</a>
	<table class="w3-table-all">
		<thead>
			<tr>
				<th>Equipment Code</th>
				<th>Branch Code</th>
				<th>Quantity</th>
			</tr>
		</thead>
		<tbody>
			<?php
				include('connection.php');
				$fetch = mysqli_query($conn, "SELECT * FROM inventorytable");
				$row = mysqli_num_rows($fetch);
				if ($row > 0) {
					while ($r = mysqli_fetch_array($fetch)) {
			?>
			<tr>
				<th><?php echo $r['intEquipID_fk'];   ?></th>
				<th><?php echo $r['intBranchID_fk'];  ?></th>
				<th><?php echo $r['intInvQuantity'];  ?></th>

				<td>
					<a href = "Inventory_update.php?updateid=<?php echo $r['intInvID'] ?>">Edit</a>
					<a href = "Inventory_delete.php?deleteid=<?php echo $r['intInvID'] ?>">Delete</a>
				</td>
			<?php			
					}
				}
			?>
			</tr>
		</tbody>
	</table>
	</div>
</body>
</html>