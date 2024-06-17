<?php

	include('connection.php');
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		$id = $_GET['updateid'];
		$strBranchname = $_POST['strBranchname'];
		$strBranchAddress = $_POST['strBranchAddress'];

		$sql = mysqli_query($conn, "UPDATE branchtable set strBranchname = '$strBranchname', strBranchAddress = '$strBranchAddress' WHERE intBranchID = '$id' " );
		if($sql) {
			echo "<script>alert('Pasok na pasok for the second time')</script>";
			echo "<script type = 'text/javascript'> document.location = 'Branch_view.php'</script>";
		}else{
			echo "<script>alert('Hindi Pasok')</script>";
			echo "<script type = 'text/javascript'> document.location = 'Branch_view.php'</script>";
		}
	}
	else{
		echo "<script>alert('Nigga walang branch Id')</script>";
		echo "<script type = 'text/javascript'> document.location = 'Branch_view.php'</script>";
	}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Branch Update</title>
</head>
<body>
	<form method="POST">
		<?php
			$id = $_GET['updateid'];
				$query = mysqli_query($conn, "SELECT * FROM branchtable WHERE intBranchID = '$id'");
				while ($row = mysqli_fetch_array($query)) {
		?>
		<label for="strBranchname">Branch Name</label>
		<input type="text" value = "<?php echo $row['strBranchname']?>" name="strBranchname" required><br>

		<label for="strBranchAddress">Branch Address</label>
		<input type="text" value = "<?php echo $row['strBranchAddress']?>" name="strBranchAddress" required><br>

		<?php } // while bracket end ?>

		<input type="submit" name="submit">
	</form>
</body>
</html>