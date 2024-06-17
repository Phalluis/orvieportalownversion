<?php
	include('connection.php');
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		$id = $_GET['updateid'];
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

		$sql = mysqli_query($conn, "UPDATE  employeetable set
			strEmpLN = '$strEmpLN', strEmpFN = '$strEmpFN', strEmpPosition = '$strEmpPosition', strEmpAddress = '$strEmpAddress', strEmpGender = '$strEmpGender', intEmpBirth = '$intEmpbirth', intEmpAge = '$intEmpAge', intEmpConNum = '$intEmpConNum', strEmpConEmail = '$strEmpConEmail', intBranchID_fk = '$intBranchID_fk' WHERE intEmpID =  '$id'");
		if($sql) {
			echo "<script>alert('Pasok na pasok for the second time')</script>";
			echo "<script type = 'text/javascript'> document.location = 'Employee_view.php'</script>";
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

		<?php
			$id = $_GET['updateid'];
				$query = mysqli_query($conn, "SELECT * FROM employeetable WHERE  intEmpID = '$id'");
				while ($row = mysqli_fetch_array($query)) {
		?>

		<label>Employee Lastname</label>
		<input type="text" value = "<?php echo $row['strEmpLN']?>" name="strEmpLN" required><br>

		<label>Employee Firstname</label>
		<input type="text" value = "<?php echo $row['strEmpFN']?>" name="strEmpFN" required><br>

		<label>Employee Position</label>
		<input type="text" value = "<?php echo $row['strEmpPosition']?>" name="strEmpPosition" required><br>

		<label>Employee Address</label>
		<input type="text" value = "<?php echo $row['strEmpAddress']?>" name="strEmpAddress" required><br>

		<label>Employee Gender</label>
		<select value = "<?php echo $row['strEmpGender']?>" name="strEmpGender" required>
			<option>--Select Gender</option>
			<option>Male</option>
			<option>Female</option>
		</select><br>

		<label>Employee Date of Birth</label>
		<input type="Date" value = "<?php echo $row['intEmpBirth']?>" name="intEmpBirth" required><br>

		<label>Employee Age</label>
		<input type="Number" value = "<?php echo $row['intEmpAge']?>" name="intEmpAge" required><br>

		<label>Employee Contact Number</label>
		<input type="Number" value = "<?php echo $row['intEmpConNum']?>" name="intEmpConNum" required><br>

		<label>Employee Email</label>
		<input type="Email" value = "<?php echo $row['strEmpConEmail']?>" name="strEmpConEmail" required><br>

		<label>Employee Branch</label>
		<select value = "<?php echo $row['intBranchID_fk']?>" name = "intBranchID_fk" required>
			<?php
				$intBranchID_fk = mysqli_query($conn, "select * from branchtable");
				while($c = mysqli_fetch_array($intBranchID_fk)){
			?>
				<option value="<?php echo $c['intBranchID']?>"><?php echo $c['strBranchname']?></option>
			<?php } ?>
		</select><br>

		<?php } // while bracket end ?>

		<input type="submit" name="submit">
	</form>
</body>
</html>