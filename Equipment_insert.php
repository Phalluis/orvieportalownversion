<?php 
	//palagyan rin ng validation
	//ayaw ko, ikaw na whahaha
	include('connection.php');
	if (isset($_POST['submit'])) {
		$strEquipName = $_POST['strEquipName'];
		$strEquipDesc = $_POST['strEquipDesc'];

		$query = mysqli_query($conn, "INSERT INTO equipmenttable
			(strEquipName, strEquipDesc) VALUES 
			('$strEquipName','$strEquipDesc')");
		if($query) {
			echo "<script>alert('Pasok')</script>";
		}else{
			echo "<script>alert('Hindi Pasok')</script>";
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
	</form>
</body>
</html>