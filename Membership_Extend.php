<?php
	include('connection.php');
	if (isset($_GET['memberid'])) {
        //stores the global variable $_GET['memberid'] into $id
		$id = $_GET['memberid'];
        //creates a quesry
		$query = mysqli_query($conn, "SELECT intMemEnd FROM membershiptable WHERE intMemID=$id");
        //if the query returns a result of more than 0 then it found a match
        if (mysqli_num_rows($query) > 0) {
            //stores the row in $row
            $row = mysqli_fetch_assoc($query);
            //stores the column intMemEnd in $currentEndDate
            $currentEndDate = $row['intMemEnd'];
        
            //stores the new enddate in $newEndDate
            $newEndDate = date('Y-m-d', strtotime($currentEndDate . ' + 1 month'));
            
            //dito sya mag extend
            $updateQuery = mysqli_query($conn, "UPDATE membershiptable SET intMemEnd='$newEndDate' WHERE intMemID=$id");
            
            if ($updateQuery) {
                //if successful ang $updateQuery
                echo "<script>alert('Extended')</script>";
			    echo "<script type= 'text/javascript'> document.location = 'Membership_view.php'</script>";
            } else {
                //if hinde
                echo "<script>alert('Membership Extension Failed');</script>";
                echo "<script type='text/javascript'> document.location = 'Membership_view.php'</script>";
            }
        } else {
            //if wala syang match s $query
            echo "<script>alert('Nigga walang Member');</script>";
            echo "<script type='text/javascript'> document.location = 'Membership_view.php'</script>";
        }
	}
?>