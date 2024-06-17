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
				<th>Memberships</th>
				<th>Modify</th>
			</tr>
            <a href = "Membership_insert.php">Add Membership</a>
		</thead>
		<tbody>
			<?php
				include('connection.php');	
				$fetch = mysqli_query($conn, "SELECT * FROM membershiptable");
				$row = mysqli_num_rows($fetch);
				if ($row > 0) {
					while ($r = mysqli_fetch_array($fetch)) {
			?>
					<tr>
						<td><?php echo $r['strMemFN']; ?> <?php echo $r['strMemLN']; ?></td>
						<td><?php echo $r['intMemStart']; ?> <?php echo $r['intMemEnd']; ?></td>
						<td>
							<a href = "Membership_Extend.php?memberid=<?php echo $r['intMemID'] ?>">Extend</a>
							<a href = "Membership_Renew.php?memberid=<?php echo $r['intMemID'] ?>">Renew</a>
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
