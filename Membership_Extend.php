<?php
	include('connection.php');
	if (isset($_GET['memberid'])) {
		$id = $_GET['memberid'];
		$query = mysqli_query($conn, "SELECT intMemEnd FROM membershiptable WHERE intMemID=$id");
        if (mysqli_num_rows($query) > 0) {
            $row = mysqli_fetch_assoc($query);
            $currentEndDate = $row['intMemEnd'];
        
            //dito sya mag extend
            $newEndDate = date('Y-m-d', strtotime($currentEndDate . ' + 1 month'));
            //uupdate neto yung end date sa database para maging extended
            $updateQuery = mysqli_query($conn, "UPDATE membershiptable SET intMemEnd='$newEndDate' WHERE intMemID=$id");
            
            if ($updateQuery) {
                echo "<script>alert('Extended')</script>";
			    echo "<script type= 'text/javascript'> document.location = 'Membership_view.php'</script>";
            } else {
                echo "<script>alert('Membership Extension Failed');</script>";
                echo "<script type='text/javascript'> document.location = 'Membership_view.php'</script>";
            }
        } else {
            echo "<script>alert('Nigga walang Member');</script>";
            echo "<script type='text/javascript'> document.location = 'Membership_view.php'</script>";
        }
	}
?>