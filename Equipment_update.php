<?php
	include('connection.php');
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		$id = $_GET['updateid'];
		$strEquipName = $_POST['strEquipName'];
		$strEquipDesc = $_POST['strEquipDesc'];

		$query = mysqli_query($conn, "UPDATE equipmenttable SET strEquipName = '$strEquipName', strEquipDesc = '$strEquipDesc' WHERE intEquipID = '$id'");
		if($query) {
			echo "<script>alert('Successfully Updated')</script>";
			echo "<script type = 'text/javascript'> document.location = 'Equipment_view.php'</script>";
		}else{
			echo "<script>alert('Failed to update due to an error ')</script>";
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
		<?php
			$id = $_GET['updateid'];
				$query = mysqli_query($conn, "SELECT * FROM equipmenttable WHERE  intEquipID = '$id'");
				while ($row = mysqli_fetch_array($query)) {
		?>

		<label>Equipment Name</label>
		<input type="text" value = "<?php echo $row['strEquipName']?>" name="strEquipName" required><br>

		<label>Equipment Description</label>
		<input type="text" value = "<?php echo $row['strEquipDesc']?>"name="strEquipDesc" required><br>

		<?php } // while bracket end ?>

		<input type="submit" name="submit">

		<a href="Equipment_view.php">Go Back</a>
	</form>
</body>
</html>