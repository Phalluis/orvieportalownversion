<?php 
	//palagyan rin ng validation
	include('connection.php');
	if (isset($_POST['submit'])) {
		$strEquipName = $_POST['strEquipName'];
		$strEquipDesc = $_POST['strEquipDesc'];

		$query = mysqli_query($conn, "INSERT INTO equipmenttable
			(strEquipName, strEquipDesc) VALUES 
			('$strEquipName','$strEquipDesc')");
		if($query) {
			echo "<script>alert('Successfully Added')</script>";
			echo "<script type = 'text/javascript'> document.location = 'Equipment_view.php'</script>";
		}else{
			echo "<script>alert('Failed to Add due to an error ')</script>";
			echo "<script type = 'text/javascript'> document.location = 'Equipment_view.php'</script>";
		}
	}

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Add Equipment</title>
</head>
<body>
	<form method="POST">
		<label>Equipment Name</label>
		<input type="text" name="strEquipName" required><br>

		<label>Equipment Description</label>
		<input type="text" name="strEquipDesc" required><br>

		<input type="submit" name="submit">

		<a href="Employee_view.php">Go Back</a>
	</form>
</body>
</html>