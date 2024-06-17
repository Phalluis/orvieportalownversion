<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Equipment</title>
</head>
<body>
	<table>
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
</body>
</html>