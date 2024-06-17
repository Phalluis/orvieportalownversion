<?php 
	//kailangan rework yung pag add ng membership time
	include('connection.php');
	if (isset(
		$_POST['submit'])) {
		//assigns all of that shit
		$strMemLN       = $_POST['strMemLN'];
		$strMemFN       = $_POST['strMemFN'];
		$intMemBirth    = $_POST['intMemBirth'];
		$intMemAge      = $_POST['intMemAge'];
		$strMemGender   = $_POST['strMemGender'];
		$intMemConNum   = $_POST['intMemConNum'];
		$strMemConEmail = $_POST['strMemConEmail'];
		$strMemAddress  = $_POST['strMemAddress'];
		$intMemStart	= $_POST['intMemStart'];
		$intMemEnd		= $_POST['intMemEnd'];
		$intBranchID_fk = $_POST['intBranchID_fk'];

		//makes a query
		$query = mysqli_query($conn, "INSERT INTO membershiptable
			(strMemLN, strMemFN, intMemBirth, intMemAge, strMemGender, intMemConNum, strMemConEmail, strMemAddress, intMemStart, intMemEnd, intBranchID_fk) VALUES
			('$strMemLN', '$strMemFN', '$intMemBirth', '$intMemAge', '$strMemGender', '$intMemConNum', '$strMemConEmail','$strMemAddress', '$intMemStart', '$intMemEnd', '$intBranchID_fk')");
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
	<title>Add Membership</title>
</head>
<body>
	<form method="POST">
		<label>Member Lastname</label>
		<input type="text" name="strMemLN" required><br>

		<label>Member Firstname</label>
		<input type="text" name="strMemFN" required><br>

		<label>Member Date of Birth</label>
		<input type="date" name="intMemBirth" required><br>

		<label>Member Age</label>
		<input type="number" name="intMemAge" required><br>

		<label>Member Gender</label>
		<select name="strMemGender" required>
			<option>--Select Gender--</option>
			<option>Male</option>
			<option>Female</option>
		</select><br>

		<label>Member Contact Number</label>
		<input type="number" name="intMemConNum" required><br>

		<label>Member Email</label>
		<input type="Email" name="strMemConEmail" required><br>

		<label>Member Address</label>
		<input type="text" name="strMemAddress" required><br>

		<label>Member Date Started</label>
		<input type="date" name="intMemStart" required><br>

		<label>Member Date End</label>
		<input type="date" name="intMemEnd" required><br>

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
	<?php 
		if (isset(
		$_POST['submit'])) {
		echo "<script type = 'text/javascript'> document.location = 'Membership_view.php'</script>";
		}
	?>
</body>
</html>