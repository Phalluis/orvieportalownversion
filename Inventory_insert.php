<?php
	include('connection.php');
	if (isset($_POST['submit'])) {
		$intEquipID_fk = $_POST['intEquipID_fk'];
		$intBranchID_fk = $_POST['intBranchID_fk'];
		$intEquipQuantity = $_POST['intEquipQuantity'];

		$query = mysqli_query($conn, "INSERT INTO inventorytable(intEquipID_fk, intBranchID_fk, intEquipQuantity) VALUES 
			('$intEquipID_fk', '$intBranchID_fk', '$intEquipQuantity')");
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
	<title>Add Inventory</title>
</head>
<body>
	<form method="POST">
		<label>Equipment Name</label>
		<select name = "intEquipID_fk" required>
			<?php
				$intEquipID_fk = mysqli_query($conn, "select * from equipmenttable");
				while($ce = mysqli_fetch_array($intEquipID_fk)){
			?>
				<option value="<?php echo $ce['intEquipID']?>"><?php echo $ce['strEquipName']?></option>
			<?php } ?>
		</select><br>

		<label>Branch</label>
		<select name = "intBranchID_fk" required>
			<?php
				$intBranchID_fk = mysqli_query($conn, "select * from branchtable");
				while($c = mysqli_fetch_array($intBranchID_fk)){
			?>
				<option value="<?php echo $c['intBranchID']?>"><?php echo $c['strBranchname']?></option>
			<?php } ?>
		</select><br>

		<label>Equipment Quantity</label>
		<input type="Number" name="intEquipQuantity">

		<input type="submit" name="submit">
	</form>
</body>
</html>