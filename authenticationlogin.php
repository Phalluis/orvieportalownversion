<?php
    session_start(); //starts session

    include('connection.php');

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_POST['user']) && isset($_POST['pass'])) {
            $username = $_POST['user'];
            $password = $_POST['pass'];

            //prevents sql injection
            $stmt = $con->prepare("SELECT * FROM login WHERE username = ? AND password = ?");
            $stmt->bind_param("ss", $username, $password);
            $stmt->execute();
            $result = $stmt->get_result();
            $count = $result->num_rows;

            if ($count == 1) {
                //stores the username into $_SESSION['username'] which is a universal variable until the session is closed
                $_SESSION['username'] = $username;
                header("Location: welcome.php");
                exit();
            } else {
                echo "<h1>Login failed. Invalid username or password.</h1>";
            }

            $stmt->close();
        } else {
            echo "<h1>Username and Password are required.</h1>";
        }
        $con->close();
    }
?>