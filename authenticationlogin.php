<?php
    session_start(); // Start the session

    include('connection.php');

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_POST['user']) && isset($_POST['pass'])) {
            $username = $_POST['user'];
            $password = $_POST['pass'];

            // Using prepared statements to prevent SQL injection
            $stmt = $con->prepare("SELECT * FROM login WHERE username = ? AND password = ?");
            $stmt->bind_param("ss", $username, $password);
            $stmt->execute();
            $result = $stmt->get_result();
            $count = $result->num_rows;

            if ($count == 1) {
                // Store user data in session variables
                $_SESSION['username'] = $username;
                header("Location: welcome.php"); // Redirect to welcome page
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