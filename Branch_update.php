<?php

	include('connection.php');
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		$id = $_GET['updateid'];
		$strBranchname = $_POST['strBranchname'];
		$strBranchAddress = $_POST['strBranchAddress'];

		$sql = mysqli_query($conn, "UPDATE branchtable set strBranchname = '$strBranchname', strBranchAddress = '$strBranchAddress' WHERE intBranchID = '$id' " );
		if($sql) {
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
	<title>Branch Update</title>
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

	<div style="margin-left:15%"><!--margin para hindi matago ng sidebar yung maincontent-->
		<div class="w3-container w3-teal">
  			<h1>Branch Update</h1>
		</div>

	<form class="w3-container w3-card-4 w3-light-grey" method="POST">
		<?php
			$id = $_GET['updateid'];
				$query = mysqli_query($conn, "SELECT * FROM branchtable WHERE  intBranchID = '$id'");
				while ($row = mysqli_fetch_array($query)) {
		?>
		<label for="strBranchname">Branch Name</label>
		<input class="w3-input w3-border" type="text" value = "<?php echo $row['strBranchname']?>" name="strBranchname" required>

		<label for="strBranchAddress">Branch Address</label>
		<input class="w3-input w3-border" type="text" value = "<?php echo $row['strBranchAddress']?>" name="strBranchAddress" required><br>

		<?php } // while bracket end ?>

		<input type="submit" class="w3-button w3-green" name="submit">

		<a class="w3-button w3-green" href="Branch_view.php">Go Back</a>
	</form>
	</div>
</body>
</html>