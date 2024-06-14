<?php
    session_start();

    if (!isset($_SESSION['username'])) {
        header("Location: index.html");
        exit();
    }

    include('connection.php');

    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['user']) && isset($_POST['pass'])) {
        $user = mysqli_real_escape_string($con, $_POST['user']);
        $pass = mysqli_real_escape_string($con, $_POST['pass']);

        $check_query = "SELECT * FROM login WHERE username = '$user'";
        $check_result = mysqli_query($con, $check_query);

        if (mysqli_num_rows($check_result) > 0) {
            echo "Username already exists. Please choose a different username.";
        } else {
            $insert_query = "INSERT INTO login (username, password) VALUES ('$user', '$pass')";
            if (mysqli_query($con, $insert_query)) {
                echo "New user added successfully.<br>";
            } else {
                echo "Error: " . mysqli_error($con);
            }
        }

        mysqli_free_result($check_result);
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