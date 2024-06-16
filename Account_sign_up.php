<?php
//kulang pa validation na para walang duplicate account sa dbms
	include('connection.php');
	if (isset($_POST['submit'])) {
		$strAcntUser    = $_POST['strAcntUser'];
		$strAcntPass    = $_POST['strAcntPass'];
		$strAcntLN      = $_POST['strAcntLN'];
		$strAcntFN      = $_POST['strAcntFN'];
		$intBranchID_fk = $_POST['intBranchID_fk'];
		$strSecQuestion = $_POST['strSecQuestion'];
		$strSecAnwser   = $_POST['strSecAnwser'];

		$query = mysqli_query($conn, "INSERT INTO accounttable 
			(strAcntUser, strAcntPass, strAcntLN, strAcntFN, intBranchID_fk, strSecQuestion, strSecAnwser) Values 
			('$strAcntUser', '$strAcntPass', '$strAcntLN', '$strAcntFN', '$intBranchID_fk', '$strSecQuestion', '$strSecAnwser')");
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
	<title>Account Profile</title>
</head>
<body>
	<form method="POST">
		<label>Username</label>
		<input type="text" name="strAcntUser" required><br>

		<label>Password</label>
		<input type="password" name="strAcntPass" required><br>

		<label>Last Name</label>
		<input type="text" name="strAcntLN" required><br>

		<label>First name</label>
		<input type="text" name="strAcntFN" required><br>

		<label>Security Question</label>
		<input type="text" name="strSecQuestion" required><br>

		<label>Anwser</label>
		<input type="text" name="strSecAnwser" required><br>

		<label>Branch Name</label>
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