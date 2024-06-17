<?php
	include('connection.php');
	if (isset($_GET['deleteid'])) {
		$id = $_GET['deleteid'];
		$query = mysqli_query($conn, "DELETE FROM branchtable WHERE intBranchID = '$id' ");
		if($query) {
			echo "<script>alert('Deleted')</script>";
			echo "<script type= 'text/javascript'> document.location = 'Branch_view.php'</script>";
		}else{
			echo "<script>alert('Error')</script>";
		}
	}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Add Branch</title>
</head>
<body>
	<form method="POST">
		<label for="strBranchname">Branch Name</label>
		<input type="text" name="strBranchname" required><br>
		<label for="strBranchAddress">Branch Address</label>
		<input type="text" name="strBranchAddress" required><br>

		<input type="submit" name="submit">
	</form>
</body>
</html>