<?php
    session_start();
    
    if (!isset($_SESSION['username'])) {
        header("Location: index.html");
        exit();
    }

    include('connection.php');

    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['empID'])) {
        $empID = mysqli_real_escape_string($con, $_POST['empID']);

        $sql = "SELECT * FROM login WHERE EmployeeID = '$empID'";
        $result = mysqli_query($con, $sql);

        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            echo "Employee ID found!<br>";
            echo "<br>Employee Name: " . htmlspecialchars($row['username'], ENT_QUOTES, 'UTF-8') . "<br>";
        } else {
            echo "No employee found with ID: " . htmlspecialchars($empID, ENT_QUOTES, 'UTF-8');
        }
        mysqli_free_result($result);
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