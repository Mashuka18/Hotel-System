<!-- Name:  Illia Karban, Mariia Vanaga Student, Maryna Sobol --> 
<!-- Student ID:  C00315274, C00313153, C00312784 --> 
<!-- Month: March 2026 --> 
<!-- Screen name: Hotel Operations - Change Password --> 
<!-- Purpose: Allow logged-in users to change their password.--> 
<?php
// Include database connection
include '../db.inc.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Hotel Operations - Change Password</title>
	
	<!-- CSS styling -->
	<link rel="stylesheet" href="../index.css">
	<link rel="stylesheet" href="change_pass.css">
</head>
<body>

<!-- Include sidebar page -->
  <?php include('../sidebar.php'); ?>

<!-- Main content -->
<div class="content">

<?php 

// PROTECT PAGE: only allow logged-in users
if (!isset($_SESSION['user'])) {
    header("Location: ../login_screen.php");
    exit;
}

// Check if the password change form has been submitted
if (isset($_POST['oldPass'], $_POST['newPass'], $_POST['confirmPass'])) {
    
    $old = $_POST['oldPass'];
    $new = $_POST['newPass'];
    $confirm = $_POST['confirmPass'];
    $user = $_SESSION['user'];

    // Check old password in database
    $sql = "SELECT * FROM Staff WHERE StaffLoginName = '$user' AND StaffPassword = '$old'";
    $result = mysqli_query($con, $sql);

    if (!$result) {
        echo "Error in Select query: ".mysqli_error($con);
    } else {
		//// if Old password incorrect
        if (mysqli_num_rows($result) == 0) {
            buildPage($old, $new, $confirm,
                "<div class='errorstyle'>Old password incorrect!</div>");
        } 
        // Old password correct
        else {

            // Check empty new password
            if (empty($new) || empty($confirm)) {
                buildPage($old, $new, $confirm,
                    "<div class='errorstyle'>New password fields cannot be empty!</div>");
            }

            // Check new password mismatch
            else if ($new != $confirm) {
                buildPage($old, $new, $confirm,
                    "<div class='errorstyle'>New passwords do not match - Please try again.</div>");
            }

            // Check if new password same as old
            else if ($new == $old) {
                buildPage($old, $new, $confirm,
                    "<div class='errorstyle'>New password cannot be the same as the old password!</div>");
            }

            //Everything ok, update password
            else {
                $sqlUpdate = "UPDATE Staff 
                              SET StaffPassword = '$new', StaffDateOfLastUpdate = NOW()
                              WHERE StaffLoginName = '$user'";

                if (!mysqli_query($con, $sqlUpdate)) {
                    echo "Error in Update query: ".mysqli_error($con);
                } else {
                    buildPage("", "", "",
                        "<div class='successstyle'>Password updated successfully!</div>");
                }
            }
        }
    }
} else {
    // Initial page load
    buildPage("", "", "");
}

// Function to build the form + message
function buildPage($o, $n, $c, $message = "") 
{
    echo "<div class='form-wrapper'>";

    // FORM
    echo "<div class='form-card'>
    <form action='change_pass.php' method='post'>
    
    <h1>Hotel Management System</h1>
    <h3>Change Password</h3>

    <label for='oldPass'>Old Password</label>
    <input type='password' name='oldPass' value='$o' required>

    <label for='newPass'>New Password</label>
    <input type='password' name='newPass' value='$n' required>

    <label for='confirmPass'>Confirm New Password</label>
    <input type='password' name='confirmPass' value='$c' required>

    <input type='submit' value='Update Password'>
    </form>
    </div>";

    // MESSAGE like Old password incorrect! or Password updated successfully!  
    if ($message != "") {
        echo "<div class='message-box'>$message</div>";
    }

    echo "</div>"; // end wrapper
}

// Close DB connection
mysqli_close($con);
?>
</div>
</body>
</html>