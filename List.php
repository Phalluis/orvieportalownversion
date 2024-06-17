<?php
include('connection.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['listEmployees'])) {
        //List Employees
        $query = mysqli_query($conn, "SELECT * FROM employeetable");
        if ($query) {
            echo "<h2>Employees:</h2><ul>";
            while ($row = mysqli_fetch_assoc($query)) {
                echo "<li>ID: " . $row['intEmpID'] . ", Name: " . $row['strEmpFN'] . " " . $row['strEmpLN'] ."</li>";
            }
            echo "</ul>";
        } else {
            echo "<script>alert('Failed to retrieve employees');</script>";
        }
    } elseif (isset($_POST['listMembers'])) {
        //List Members
        $query = mysqli_query($conn, "SELECT * FROM membershiptable");
        if ($query) {
            echo "<h2>Members:</h2><ul>";
            while ($row = mysqli_fetch_assoc($query)) {
                echo "<li>ID: " . $row['intMemID'] . ", Name: " . $row['strMemLN'] . " " . $row['strMemFN'] . "</li>";
            }
            echo "</ul>";
        } else {
            echo "<script>alert('Failed to retrieve members');</script>";
        }
    } elseif (isset($_POST['listAccounts'])) {
        //List Accounts
        $query = mysqli_query($conn, "SELECT * FROM accounttable");
        if ($query) {
            echo "<h2>Accounts:</h2><ul>";
            while ($row = mysqli_fetch_assoc($query)) {
                echo "<li>ID: " . $row['intAcntID'] . ", User: " . $row['strAcntUser'] . "</li>";
            }
            echo "</ul>";
        } else {
            echo "<script>alert('Failed to retrieve accounts');</script>";
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>List Data</title>
</head>
<body>
    <form method="POST">
        <input type="submit" name="listEmployees" value="List Employees"><br>
        <input type="submit" name="listMembers" value="List Members"><br>
        <input type="submit" name="listAccounts" value="List Accounts"><br>
    </form>
</body>
</html>