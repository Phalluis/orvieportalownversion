<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
	<title>Branch List</title>
</head>
<body>
	<table>
		<thead>
			<tr>
				<th>Branch Name</th>
				<th>Branch Address</th>
				<th>Modify</th>
			</tr>
		</thead>
		<tbody>
			<?php
				include('connection.php');	
				$fetch = mysqli_query($conn, "SELECT * FROM branchtable");
				$row = mysqli_num_rows($fetch);
				if ($row > 0) {
					while ($r = mysqli_fetch_array($fetch)) {
			?>
					<tr>
						<td><?php echo $r['strBranchname']; ?></td>
						<td><?php echo $r['strBranchAddress']; ?></td>
						<td>
							<a href = "Branch_update.php?updateid=<?php echo $r['intBranchID'] ?>">Edit</a>
							<a href = "Branch_delete.php?deleteid=<?php echo $r['intBranchID'] ?>">Delete</a>
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
