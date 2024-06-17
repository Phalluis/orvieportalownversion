<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Employee View</title>
</head>
<body>
	<table>
		<thead>
			<tr>
				<th>Employee Lastname</th>
				<th>Employee Firstname</th>
				<th>Position</th>
				<th>Branch</th>
				<th>Address</th>
				<th>Gender</th>
				<th>Birth</th>
				<th>Age</th>
				<th>Contact Number</th>
				<th>Email</th>
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
						<td><?php echo $r['strBranchname_fk']?></td>
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
</body>
</html>