<?php
include('connection.php');
$account = null;
$updateSuccess = false;

//Check if the form is submitted to search for the account
if (isset($_POST['search'])) {
    $intAcntID = $_POST['intAcntID'];
    $query = mysqli_query($conn, "SELECT * FROM `accounttable` WHERE intAcntID = $intAcntID");

    if ($query) {
        $account = mysqli_fetch_assoc($query);
        if (!$account) {
            echo "<script>alert('No account found with ID: $intAcntID');</script>";
        }
    } else {
        echo "<script>alert('Query failed');</script>";
    }
}

//Check if the form is submitted to update the account
if (isset($_POST['update'])) {
    $intAcntID = $_POST['intAcntID'];
    $strAcntPass = $_POST['strAcntPass'];
    $strAcntLN = $_POST['strAcntLN'];
    $strAcntFN = $_POST['strAcntFN'];
    $intBranchID_fk = $_POST['intBranchID_fk'];
    $strAcntUser = $_POST['strAcntUser'];

    $updateQuery = "
        UPDATE `accounttable` 
        SET 
            strAcntPass='$strAcntPass',
            strAcntLN='$strAcntLN',
            strAcntFN='$strAcntFN',
            intBranchID_fk='$intBranchID_fk',
            strAcntUser='$strAcntUser'
        WHERE intAcntID=$intAcntID";

    $updateResult = mysqli_query($conn, $updateQuery);

    if ($updateResult) {
        $updateSuccess = true;
        $query = mysqli_query($conn, "SELECT * FROM `accounttable` WHERE intAcntID = $intAcntID");
        $account = mysqli_fetch_assoc($query);
    } else {
        echo "<script>alert('Failed to update account');</script>";
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
        <label>Enter User Account ID</label>
        <input type="text" name="intAcntID" required>
        <input type="submit" name="search" value="Search">
    </form>

    <?php if ($account): ?>
        <h2>Edit Account</h2>
        <form method="POST">
            <input type="hidden" name="intAcntID" value="<?php echo $account['intAcntID']; ?>">
            <label>Account Password</label>
            <input type="text" name="strAcntPass" value="<?php echo $account['strAcntPass']; ?>" required><br>
            <label>Last Name</label>
            <input type="text" name="strAcntLN" value="<?php echo $account['strAcntLN']; ?>" required><br>
            <label>First Name</label>
            <input type="text" name="strAcntFN" value="<?php echo $account['strAcntFN']; ?>" required><br>
            <label>Branch ID</label>
            <input type="text" name="intBranchID_fk" value="<?php echo $account['intBranchID_fk']; ?>" required><br>
            <label>Username</label>
            <input type="text" name="strAcntUser" value="<?php echo $account['strAcntUser']; ?>" required><br>
            <input type="submit" name="update" value="Update">
        </form>
        <?php if ($updateSuccess): ?>
            <p>Account updated successfully!</p>
        <?php endif; ?>
    <?php endif; ?>
</body>
</html>
