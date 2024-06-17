<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="w3.css">
	<title>Equipment</title>
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
  			<h1>Equipment</h1>
		</div>
	<a class="w3-button w3-green" href="Equipment_insert.php">Add New Equipment</a>
	<table class="w3-table-all">
		<thead>
			<tr>
				<th>Equipment Name</th>
				<th>Equipment Description</th>
			</tr>
		</thead>
		<tbody>
			<?php
				include('connection.php');
				$fetch = mysqli_query($conn, "SELECT * FROM equipmenttable");
				$row = mysqli_num_rows($fetch);
				if ($row > 0) {
					while ($r = mysqli_fetch_array($fetch)) {
			?>
			<tr>
				<td><?php echo $r['strEquipName'];  ?></td>
				<td><?php echo $r['strEquipDesc'];  ?></td>

				<td>
					<a href = "Equipment_update.php?updateid=<?php echo $r['intEquipID'] ?>">Edit</a>
					<a href = "Equipment_delete.php?deleteid=<?php echo $r['intEquipID'] ?>">Delete</a>
				</td>
			</tr>
			<?php			
					}
				}
			?>
		</tbody>
	</table>	
	</div>
</body>
</html>