<?php
    session_start();

    if (!isset($_SESSION['username'])) {
        header("Location: index.html");
        exit();
    }

    include('connection.php');

    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['empID'])) {
        $empID = mysqli_real_escape_string($con, $_POST['empID']);

        $sql = "DELETE FROM login WHERE EmployeeID = '$empID'";
        $result = mysqli_query($con, $sql);

        if ($result) {
            $rowsAffected = mysqli_affected_rows($con);
            if ($rowsAffected > 0) {
                echo "Employee Record with ID $empID deleted successfully.<br>";
            } else {
                echo "No employee found with ID: " . htmlspecialchars($empID, ENT_QUOTES, 'UTF-8');
            }
        } else {
            echo "Error deleting employee record: " . mysqli_error($con);
        }
    }

    mysqli_close($con);
?>
<html>
    <body>
        <br><input type="button" onclick="goback()" value="GoBack" />
        <script>
            function goback(){
                location.href = "welcome.php";
            }
        </script>
    </body>
</html>