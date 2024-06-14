<?php
    session_start();

    if (!isset($_SESSION['username'])) {
        header("Location: index.html");
        exit();
    }

    include('connection.php');

    $sql = "SELECT * FROM login WHERE EmployeeID >= 1";
    $result = mysqli_query($con, $sql);

    if (mysqli_num_rows($result) > 0) {
        echo "Current Employees: " . mysqli_num_rows($result) . "<br><br>";

        while ($row = mysqli_fetch_assoc($result)) {
            echo "Employee ID: " . htmlspecialchars($row['EmployeeID'], ENT_QUOTES, 'UTF-8') . "<br>";
            echo "Employee Name: " . htmlspecialchars($row['username'], ENT_QUOTES, 'UTF-8') . "<br><br>";
        }
    } else {
        echo "No employees found.";
    }

    mysqli_free_result($result);
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
