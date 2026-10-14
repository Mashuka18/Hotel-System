<?php
session_start(); // Starts a session 

include 'db.inc.php'; // Connection to the database

// link to CSS file
echo '<link rel="stylesheet" href="login_screen.css" type="text/css">'; 


// Checks if the form was submitted (i.e., user entered login name and password)
if (isset($_POST['loginName']) && isset($_POST['passWord'])) {

    // Get number of attempts from session, or set to 1 if not set yet
    $attempts = isset($_SESSION['attempts']) ? $_SESSION['attempts'] : 1;

    // Get user input and protect against SQL injection
    $loginName = mysqli_real_escape_string($con, $_POST['loginName']);
    $passWord = mysqli_real_escape_string($con, $_POST['passWord']);

    // SQL query to check if login details match a staff member
    // Also checks that the staff member is not deleted
    $sql = "SELECT * FROM Staff 
            WHERE StaffLoginName = '$loginName' 
            AND StaffPassword = '$passWord'
            AND StaffDeletedFlag = 0";

    // Run the SQL query
    $result = mysqli_query($con, $sql);

    // If query fails, show error
    if (!$result) {
        echo "Error in query: " . mysqli_error($con);
    } else {
        // If no matching user found → login failed
        if (mysqli_num_rows($result) == 0) {
			
            $attempts++; // Increase attempt count

            // Allow only 3 login attempts
            if ($attempts <= 3) {
                $_SESSION['attempts'] = $attempts; // Save updated attempts
				
                buildPage($attempts); // Show login form again
				
                echo "<div class='errorstyle'>
                No staff record found with this login name and password.
				Please try again.
                </div>";
            } else {
                // If user exceeds 3 attempts
                echo "<div class='errorstyle'>
                Sorry - You have used all 3 attempts<br>
                Shutting down ....
                </div>";
            }
        } else {
            // Login successful
			
            $row = mysqli_fetch_assoc($result); // Get user data from database

            // Store login info in session
            $_SESSION['user'] = $loginName; // Save username
			$_SESSION['staffID'] = $row['StaffID']; // Save staff ID
            $_SESSION['loggedIn'] = true;   // Mark user as logged in

            // Reset attempts after successful login
            $_SESSION['attempts'] = 0;

            // Redirect user to dashboard
            header("Location: index.php");
            exit; // Stop script after redirect
        }
    }
} else {
    // If page is opened for the first time (no form submitted)

    $attempts = 1; // Set attempt number to 1
    $_SESSION['attempts'] = $attempts; // Store in session

    buildPage($attempts); // Show login form
}

// Function to display the login form
function buildPage($att) {
    echo "<body>
	<form action='login_screen.php' method='post'>  
    <!-- Form sends data back to this same file -->

    <h1>Hotel Management System</h1>   <!-- Main title -->

    <label for='loginName'>Login Name</label>
    <input type='text' name='loginName' id='loginName' autocomplete='off'/>
    <!-- Text input for username -->

    <br><br>

    <label for='passWord'>Password</label>
    <input type='password' name='passWord' id='passWord'/><br><br>
    <!-- Password input (hidden characters) -->

    <input type='submit' value='Login'> <br><br>
    <!-- Login button -->
    <h3>Attempt Number: $att</h3>     <!-- Shows attempt count -->
    </form>
	</body>";
}

// Close the database connection
mysqli_close($con); 
?>