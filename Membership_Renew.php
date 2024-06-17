<?php
include('connection.php');

if (isset($_GET['memberid'])) {
    $id = $_GET['memberid'];
    
    //hahanapin nya yung $id 
    $query = mysqli_query($conn, "SELECT intMemEnd FROM membershiptable WHERE intMemID='$id'");
    if (mysqli_num_rows($query) > 0) {
        //aasign nya yung found na query sa $row
        $row = mysqli_fetch_assoc($query);
        //assign nya yung column na intMemEnd sa $currentEndDate
        $currentEndDate = $row['intMemEnd'];

        //gets the current date
        $currentDate = date('Y-m-d');
        
        //chechek if tapos na ang membership
        if ($currentEndDate < $currentDate) {
            //aadjust nya yung $currentdate nang isang buwan at ilalagay sa $newEndDate with matching date syntax na nabasa ko sa documentation, i dont fully how it works
            $newEndDate = date('Y-m-d', strtotime($currentDate . ' + 1 month'));
            
            //query para maupdate yung datebase with extension
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
