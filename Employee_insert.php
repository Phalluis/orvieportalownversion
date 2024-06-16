<?php
	//oks na rin pwede rin lagyan ng validation para walang duplicate
	include('connection.php');
	if (isset($_POST['submit'])) {
		$strEmpLN       = $_POST['strEmpLN'];
		$strEmpFN       = $_POST['strEmpFN'];
		$strEmpPosition = $_POST['strEmpPosition'];
		$strEmpAddress  = $_POST['strEmpAddress'];
		$strEmpGender   = $_POST['strEmpGender'];
		$intEmpBirth    = $_POST['intEmpBirth'];
		$intEmpAge      = $_POST['intEmpAge'];
		$intEmpConNum   = $_POST['intEmpConNum'];
		$strEmpConEmail = $_POST['strEmpConEmail'];
		$intBranchID_fk = $_POST['intBranchID_fk'];

		$query = mysqli_query($conn, "INSERT INTO employeetable
			(strEmpLN, strEmpFN, strEmpPosition, strEmpAddress, strEmpGender, intEmpBirth, intEmpAge, intEmpConNum, strEmpConEmail, intBranchID_fk) VALUES 
			('$strEmpLN', '$strEmpFN', '$strEmpPosition', '$strEmpAddress', '$strEmpGender', '$intEmpBirth', '$intEmpAge', '$intEmpConNum', '$strEmpConEmail', '$intBranchID_fk')");
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
	<title>Add Employee</title>
</head>
<body>
	<form method="POST">
		<label>Employee Lastname</label>
		<input type="text" name="strEmpLN" required><br>

		<label>Employee Firstname</label>
		<input type="text" name="strEmpFN" required><br>

		<label>Employee Position</label>
		<input type="text" name="strEmpPosition" required><br>

		<label>Employee Address</label>
		<input type="text" name="strEmpAddress" required><br>

		<label>Employee Gender</label>
		<select name="strEmpGender" required>
			<option>--Select Gender</option>
			<option>Male</option>
			<option>Female</option>
		</select><br>

		<label>Employee Date of Birth</label>
		<input type="Date" name="intEmpBirth" required><br>

		<label>Employee Age</label>
		<input type="Number" name="intEmpAge" required><br>

		<label>Employee Contact Number</label>
		<input type="Number" name="intEmpConNum" required><br>

		<label>Employee Email</label>
		<input type="Email" name="strEmpConEmail" required><br>

		<label>Employee Branch</label>
		<select name = "intBranchID_fk" required>
			<?php
				$intBranchID_fk = mysqli_query($conn, "select * from branchtable");
				while($c = mysqli_fetch_array($intBranchID_fk)){
			?>
				<option value="<?php echo $c['intBranchID']?>"><?php echo $c['strBranchname']?></option>
			<?php } ?>
		</select><br>

		<input type="submit" name="submit">
	</form>
</body>
</html>