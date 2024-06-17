<?php
//oks na to pwede mo pa lagay ng validation nich para wala ring duplication sa dbms
include('connection.php');

if (isset($_POST['submit'])) {
    $intMemID = $_POST['intMemID'];
    //Titignan neto pag nageexist yung member
    $checkQuery = mysqli_query($conn, "SELECT intMemEnd FROM membershiptable WHERE intMemID='$intMemID'");

    if (mysqli_num_rows($checkQuery) > 0) {
        $row = mysqli_fetch_assoc($checkQuery);
        $currentEndDate = $row['intMemEnd'];
        
        //dito sya mag extend
        $newEndDate = date('Y-m-d', strtotime($currentEndDate . ' + 1 month'));
        //uupdate neto yung end date sa database para maging extended
        $updateQuery = mysqli_query($conn, "UPDATE membershiptable SET intMemEnd='$newEndDate' WHERE intMemID='$intMemID'");
        
        if ($updateQuery) {
            echo "<script>alert('Membership Extended);</script>";
        } else {
            echo "<script>alert('Membership Extension Failed');</script>";
        }
    } else {
        echo "<script>alert('Nigga walang Member');</script>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Extend Membership</title>
</head>
<body>
    <form method="POST">
        <label for="intMemID">Member ID</label>
        <input type="text" name="intMemID" required><br>
        <input type="submit" name="submit" value="Extend Membership">
    </form>
</body>
</html>
