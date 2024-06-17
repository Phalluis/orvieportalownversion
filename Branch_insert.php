<?php
//oks na to pwede mo pa lagay ng validation nich para wala ring duplication sa dbms
	include('connection.php');
	if (isset($_POST['submit'])) {
		$strBranchname = $_POST['strBranchname'];
		$strBranchAddress = $_POST['strBranchAddress'];

		$query = mysqli_query($conn, "INSERT INTO branchtable(strBranchname, strBranchAddress) Values ('$strBranchname', '$strBranchAddress')");
		if($query) {
			echo "<script>alert('Pasok')</script>";
			echo "<script type = 'text/javascript'> document.location = 'Branch_view.php'</script>";
		}else{
			echo "<script>alert('Hindi Pasok')</script>";
			echo "<script type = 'text/javascript'> document.location = 'Branch_view.php'</script>";
		}
	}
?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Add Branch</title>
</head>
<body>
	<form method="POST">
		<label for="strBranchname">Branch Name</label>
		<input type="text" name="strBranchname" required><br>
		<label for="strBranchAddress">Branch Address</label>
		<input type="text" name="strBranchAddress" required><br>

		<input type="submit" name="submit">
	</form>
</body>
</html>