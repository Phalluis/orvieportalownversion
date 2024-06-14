<html>
    <body>
        <?php
            include('connection.php');
            
            $username = $_POST['user'];
            $password = $_POST['pass'];
            
            // To prevent mysqli injection
            $username = stripcslashes($username);
            $password = stripcslashes($password);
            $username = mysqli_real_escape_string($con, $username);
            $password = mysqli_real_escape_string($con, $password);
            
            // Check if the username already exists in the database
            $check_query = "SELECT * FROM login WHERE username = '$username'";
            $check_result = mysqli_query($con, $check_query);
            $check_count = mysqli_num_rows($check_result);
            
            if ($check_count > 0) {
                echo "<h1>Signup failed. Username already exists.</h1>";
            } else {
                // Insert new user into the database
                $insert_query = "INSERT INTO login (username, password) VALUES ('$username', '$password')";
                if (mysqli_query($con, $insert_query)) {
                    echo "<h1>Signup successful. You can now login with your credentials.</h1>";
                } else {
                    echo "<h1>Signup failed. Please try again later.</h1>";
                }
            }
            mysqli_close($con);
        ?>
        <button type="button" onclick="goback()">Go Back?</button>
        <script>
            function goback() {
            location.href = "index.html";
        }
        </script>
    </body>
</html>
