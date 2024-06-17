<?php
//oks na to pwede mo pa lagay ng validation nich para wala ring duplication sa dbms
	include('connection.php');
	if (isset($_POST['submit'])) {
		$strBranchname = $_POST['strBranchname'];
		$strBranchAddress = $_POST['strBranchAddress'];

		$query = mysqli_query($conn, "INSERT INTO branchtable(strBranchname, strBranchAddress) Values ('$strBranchname', '$strBranchAddress')");
		if($query) {
			echo "<script>alert('Successfully Added')</script>";
			echo "<script type = 'text/javascript'> document.location = 'Branch_view.php'</script>";
		}else{
			echo "<script>alert('Failed to Add due to an error ')</script>";
			echo "<script type = 'text/javascript'> document.location = 'Branch_view.php'</script>";
		}
	}
?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
	<title>Add Branch</title>
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

	<div style="margin-left:15%">
		<div class="w3-container w3-teal">
  			<h1>Add Branch</h1>
		</div>
	<form class="w3-container w3-card-4 w3-light-grey" method="POST">
		<label for="strBranchname">Branch Name</label>
		<input class="w3-input w3-border" type="text" name="strBranchname" required><br>
		<label for="strBranchAddress">Branch Address</label>
		<input class="w3-input w3-border" type="text" name="strBranchAddress" required><br>

		<input type="submit" class="w3-button w3-green" name="submit">

		<a class="w3-button w3-green" href="Branch_view.php">Go Back</a>
	</form>
	</div>
</body>
</html>