<?php
include('connection.php');

if (isset($_GET['memberid'])) {
    $id = $_GET['memberid'];
    
    //Fetch the current membership end date
    $query = mysqli_query($conn, "SELECT intMemEnd FROM membershiptable WHERE intMemID='$id'");
    if (mysqli_num_rows($query) > 0) {
        $row = mysqli_fetch_assoc($query);
        $currentEndDate = $row['intMemEnd'];

        // Get the current date
        $currentDate = date('Y-m-d');
        
        //Check if the membership has expired
        if ($currentEndDate < $currentDate) {
            //Extend the end date by one month
            $newEndDate = date('Y-m-d', strtotime($currentDate . ' + 1 month'));
            
            // Update the end date in the database
            $updateQuery = mysqli_query($conn, "UPDATE membershiptable SET intMemEnd='$newEndDate' WHERE intMemID='$id'");
            
            if ($updateQuery) {
                echo "<script>alert('Membership Extended');</script>";
                echo "<script type='text/javascript'> document.location = 'Membership_view.php'</script>";
            } else {
                echo "<script>alert('Membership Extension Failed');</script>";
                echo "<script type='text/javascript'> document.location = 'Membership_view.php'</script>";
            }
        } else {
            echo "<script>alert('Membership is still valid');</script>";
            echo "<script type='text/javascript'> document.location = 'Membership_view.php'</script>";
        }
    } else {
        echo "<script>alert('No Member Found');</script>";
        echo "<script type='text/javascript'> document.location = 'Membership_view.php'</script>";
    }
}
?>
