<?php
session_start(); // Start the session

// Check if the user is logged in
if (!isset($_SESSION['username'])) {
    // Redirect to login page if not logged in
    header("Location: index.html");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Welcome Page</title>
</head>
<body>
    <h1>Login successful</h1>
    <h2>Hello, <?php echo htmlspecialchars($_SESSION['username'], ENT_QUOTES, 'UTF-8'); ?></h2>

    <?php
        if(array_key_exists('button1', $_POST)) { 
            button1(); 
        } 
        else if(array_key_exists('button2', $_POST)) { 
            button2(); 
        } 
        else if(array_key_exists('button3', $_POST)){
            button3();
        }
        else if(array_key_exists('button4', $_POST)){
            button4();
        }
        else if(array_key_exists('button5', $_POST)){
            button5();
        }
        else if(array_key_exists('button6', $_POST)){
            button6();
        }
        function button1() {
            echo '<form method="post" action="addemployees.php">
                    <div> 
                        <p>  
                            Add Employee<br><br>
                            <label> UserName: </label>  
                            <input type="text" id="user" name="user" required />  
                            <label> Password: </label>  
                            <input type="text" id="pass" name="pass" required />  
                        </p>
                        <input type = "submit" id = "btn" value = "Submit?" />  
                    </div>
                    </form><br>';
        }
        function button2() { 
            echo '<form method="post" action="searchemployees.php">
                    <div> 
                        <p>  
                            Search Employees<br><br>
                            <label> EmployeeID: </label>  
                            <input type="text" id="empID" name="empID" required />  
                        </p>
                        <input type = "submit" id = "btn" value = "Submit?" />  
                    </div>
                    </form><br>';
        }
        function button3() { 
            echo '<form method="post" action="listemployees.php">
                    <div> 
                        <p>  
                            List Employees <br>
                        </p>
                        <input type = "submit" id = "btn" value = "Submit?" />  
                    </div>
                    </form><br>'; 
        }
        function button4() { 
            echo '<form method="post" action="deleteemployees.php">
                    <div> 
                        <p>  
                            Delete Records<br><br>
                            <label> EmployeeID: </label>  
                            <input type="text" id="empID" name="empID" required />  
                        </p>
                        <input type = "submit" id = "btn" value = "Submit?" />  
                    </div>
                    </form><br>'; 
        } 
        function button5() {
            echo '<form method="post" action="filteremployees.php">
                    <div> 
                        <p>  
                            Filter Employees<br><br>
                            <label> EmployeeID: </label>  
                            <input type="text" id="empID" name="empID" required />  
                        </p>
                        <input type = "submit" id = "btn" value = "Submit?" />  
                    </div>
                    </form><br>';
        }
        function button6() {
            echo '<form method="post" action="addequipment.php">
                    <div> 
                        <p>  
                            Add Equipment<br><br>
                            <label> Equipment: </label>  
                            <input type="text" id="empID" name="empID" required />  
                        </p>
                        <input type = "submit" id = "btn" value = "Submit?" />  
                    </div>
                    </form><br>';
        }
    ?> 
    <form method="post"> 
        <input type="submit" name="button1" class="button" value="Add Employees" /> 
        <input type="submit" name="button2" class="button" value="Search for Employees" />
        <input type="submit" name="button3" class="button" value="Employee List" /> 
        <input type="submit" name="button4" class="button" value="Delete Records" />
        <input type="submit" name="button5" class="button" value="Filter Employees"> 
        <input type="submit" name="button6" class="button" value="Add Equipment"> 
    </form><br>

    <input type="button" onclick="logout()" value="Log Out">

    <script>
        function logout() {
            location.href = "logout.php";
        }
    </script>
</body>
</html>