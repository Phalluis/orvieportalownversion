<?php
include('connection.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_GET['updateid'])) {
        $id = $_GET['updateid'];
        $strBranchname = mysqli_real_escape_string($conn, $_POST['strBranchname']);
        $strBranchAddress = mysqli_real_escape_string($conn, $_POST['strBranchAddress']);

        $sql = "UPDATE branchtable SET strBranchname = '$strBranchname', strBranchAddress = '$strBranchAddress' WHERE intBranchID = '$id'";
        if (mysqli_query($conn, $sql)) {
            echo "<script>alert('Pasok na pasok for the second time');</script>";
            echo "<script>document.location = 'Branch_view.php';</script>";
        } else {
            echo "<script>alert('Hindi Pasok');</script>";
            echo "<script>document.location = 'Branch_view.php';</script>";
        }
    } else {
        echo "<script>alert('Walang branch ID');</script>";
        echo "<script>document.location = 'Branch_view.php';</script>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Branch Update</title>
</head>
<body>
    <form method="POST">
        <?php
        if (isset($_GET['updateid'])) {
            $id = $_GET['updateid'];
            $query = mysqli_query($conn, "SELECT * FROM branchtable WHERE intBranchID = '$id'");
            if ($row = mysqli_fetch_array($query)) {
        ?>
        <label for="strBranchname">Branch Name</label>
        <input type="text" value="<?php echo htmlspecialchars($row['strBranchname']); ?>" name="strBranchname" required><br>

        <label for="strBranchAddress">Branch Address</label>
        <input type="text" value="<?php echo htmlspecialchars($row['strBranchAddress']); ?>" name="strBranchAddress" required><br>

        <input type="submit" value="Update">
        <?php
            } else {
                echo "<p>No branch found with ID: $id</p>";
            }
        } else {
            echo "<p>No branch ID provided.</p>";
        }
        ?>
    </form>
</body>
</html>
