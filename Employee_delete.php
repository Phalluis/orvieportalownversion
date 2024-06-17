<?php
	include('connection.php');
	if (isset($_GET['deleteid'])) {
		$id = $_GET['deleteid'];
		$query = mysqli_query($conn, "DELETE FROM employeetable WHERE intEmpID = '$id' ");
		if($query) {
			echo "<script>alert('Deleted')</script>";
			echo "<script type= 'text/javascript'> document.location = 'Employee_view.php'</script>";
		}else{
			echo "<script>alert('Error')</script>";
		}
	}
?>