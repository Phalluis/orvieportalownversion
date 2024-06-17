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
			echo "<script>alert('Successfully Added')</script>";
			echo "<script type = 'text/javascript'> document.location = 'Employee_view.php'</script>";
		}else{
			echo "<script>alert('Failed to Add due to an error ')</script>";
			echo "<script type = 'text/javascript'> document.location = 'Employee_view.php'</script>";
		}
	}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="w3.css">
	<title>Add Employee</title>
</head>
<body>
	<!-- Sidebar -->
	<div class="w3-sidebar w3-light-grey w3-bar-block" style="width:15%">
  		<h3 class="w3-bar-item">Home</h3>
  		<a class="w3-bar-item w3-button" href="Branch_view.php">Branch</a>
  		<a class="w3-bar-item w3-button" href="Employee_view.php">Employee</a>
  		<a class="w3-bar-item w3-button" href="Equipment_view.php">Equipment</a>
  		<a class="w3-bar-item w3-button" href="Inventory_view.php">Inventory</a>
  		<a class="w3-bar-item w3-button" href="Membership_view.php">Membership</a>
	</div>
	<!--end sidedbar-->
	
	<div style="margin-left:15%">
		<div class="w3-container w3-teal">
  			<h1>Add New Employee</h1>
  		</div>
	<form class="w3-container w3-card-4 w3-light-grey" method="POST">
		<label>Employee Lastname</label>
		<input class="w3-input w3-border" type="text" name="strEmpLN" required><br>

		<label>Employee Firstname</label>
		<input class="w3-input w3-border" type="text" name="strEmpFN" required><br>

		<label>Employee Position</label>
		<input class="w3-input w3-border" type="text" name="strEmpPosition" required><br>

		<label>Employee Address</label>
		<input class="w3-input w3-border" type="text" name="strEmpAddress" required><br>

		<label>Employee Gender</label>
		<select class="w3-select" name="strEmpGender" required>
			<option>--Select Gender</option>
			<option>Male</option>
			<option>Female</option>
		</select><br><br>

		<label>Employee Date of Birth</label><br>
		<input type="Date" name="intEmpBirth" required><br><br>

		<label>Employee Age</label>
		<input class="w3-input w3-border" type="Number" name="intEmpAge" required><br>

		<label>Employee Contact Number</label>
		<input class="w3-input w3-border" type="Number" name="intEmpConNum" required><br>

		<label>Employee Email</label>
		<input class="w3-input w3-border" type="Email" name="strEmpConEmail" required><br>

		<label>Employee Branch</label>
		<select class="w3-select" name = "intBranchID_fk" required>
			<?php
				$intBranchID_fk = mysqli_query($conn, "select * from branchtable");
				while($c = mysqli_fetch_array($intBranchID_fk)){
			?>
				<option value="<?php echo $c['intBranchID']?>"><?php echo $c['strBranchname']?></option>
			<?php } ?>
		</select><br>

		<input type="submit" class="w3-button w3-green" name="submit">

		<a class="w3-button w3-green" href="Employee_view.php">Go Back</a>
	</form>
	</div>
</body>
</html>