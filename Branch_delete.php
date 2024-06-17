<?php
	include('connection.php');
	if (isset($_GET['deleteid'])) {
		$id = $_GET['deleteid'];
		$query = mysqli_query($conn, "DELETE FROM branchtable WHERE intBranchID = '$id' ");
		if($query) {
			echo "<script>alert('Deleted')</script>";
			echo "<script type= 'text/javascript'> document.location = 'Branch_view.php'</script>";
		}else{
			echo "<script>alert('Error')</script>";
			echo "<script type = 'text/javascript'> document.location = 'Branch_view.php'</script>";
		}
	}
?>