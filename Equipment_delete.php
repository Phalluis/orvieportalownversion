<?php
	include('connection.php');
	if (isset($_GET['deleteid'])) {
		$id = $_GET['deleteid'];
		$query = mysqli_query($conn, "DELETE FROM equipmenttable WHERE intEquipID = '$id' ");
		if($query) {
			echo "<script>alert('Successfully Deleted')</script>";
			echo "<script type = 'text/javascript'> document.location = 'Equipment_view.php'</script>";
		}else{
			echo "<script>alert('Failed to delete due to an error ')</script>";
			echo "<script type = 'text/javascript'> document.location = 'Equipment_view.php'</script>";
		}
	}
?>