<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
	<title>Employee View</title>
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
  			<h1>Employee</h1>
  		</div>
  		<a class="w3-button w3-green" href="Employee_insert.php">Add new Employee</a>
	<table class="w3-table-all">
		<thead>
			<tr>
				<th>Employee Lastname</th>
				<th>Employee Firstname</th>
				<th>Position</th>
				<th>Branch Code</th>
				<th>Address</th>
				<th>Gender</th>
				<th>Birth</th>
				<th>Age</th>
				<th>Contact Number</th>
				<th>Email</th>
				<th>Modify</th>
			</tr>
		</thead>
		<tbody>
			<?php
				include('connection.php');
				$fetch = mysqli_query($conn, "SELECT * FROM employeetable");
				$row = mysqli_num_rows($fetch);
				if ($row > 0) {
					while ($r = mysqli_fetch_array($fetch)) {
			?>
					<tr>
						<td><?php echo $r['strEmpLN'];  ?></td>
						<td><?php echo $r['strEmpFN'];  ?></td>
						<td><?php echo $r['strEmpPosition'];  ?></td>
						<td><?php echo $r['intBranchID_fk']?></td>
						<td><?php echo $r['strEmpAddress'];  ?></td>
						<td><?php echo $r['strEmpGender'];  ?></td>
						<td><?php echo $r['intEmpBirth'];  ?></td>
						<td><?php echo $r['intEmpAge'];  ?></td>
						<td><?php echo $r['intEmpConNum'];  ?></td>
						<td><?php echo $r['strEmpConEmail'];  ?></td>

						<td>
							<a href = "Employee_update.php?updateid=<?php echo $r['intEmpID'] ?>">Edit</a>
							<a href = "Employee_delete.php?deleteid=<?php echo $r['intEmpID'] ?>">Delete</a>
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