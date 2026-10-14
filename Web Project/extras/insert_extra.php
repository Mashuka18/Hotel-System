<!-- Name: Mariia Vanaga  -->
<!-- Student ID: C00313153 -->
<!-- Month: March 2026-->
<!-- Screen name: Hotel Operations - Add Guest Extra --> 
<!-- Purpose: Handle and store extra charges for a guest.-->
<?php
// Include the database connection
include '../db.inc.php';
/* Check if the form was submitted using the POST method. 
This ensures that the page processes data only when the form is submitted.*/
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    // Sanitize and convert form inputs to proper data types
    $GuestStayID = intval($_POST['GuestStayID']); // Convert 'GuestStayID' to an integer (to prevent non-numeric input).
    $StaffID = intval($_POST['StaffID']);// Convert 'StaffID' to an integer.
    $ExtraDescription = mysqli_real_escape_string($con, $_POST['ExtraDescription']); // Escape special characters in 'ExtraDescription' to prevent SQL injection.
    $ExtraCost = floatval($_POST['ExtraCost']);// Convert 'ExtraCost' to a float (for monetary values).
    $ExtraQuantity = intval($_POST['ExtraQuantity']);// Convert 'ExtraQuantity' to an integer (for numeric quantity values).
    $ExtraArea = mysqli_real_escape_string($con, $_POST['ExtraArea']);// Escape special characters in 'ExtraArea' to prevent SQL injection.

    $ExtraDate = date("Y-m-d");// Get the current date in 'YYYY-MM-DD' format.
    $ExtraTime = date("H:i:s");// Get the current time in 'HH:MM:SS' format.

    // Insert into Extra table
    $sql = "INSERT INTO Extra
            (GuestStayID, StaffID, ExtraDescription, ExtraCost, ExtraQuantity, ExtraDate, ExtraArea, ExtraTime)
            VALUES
            ('$GuestStayID', '$StaffID', '$ExtraDescription', '$ExtraCost', '$ExtraQuantity', '$ExtraDate', '$ExtraArea', '$ExtraTime')";

    // Execute the query
    if (mysqli_query($con, $sql)) {
        // If insertion successful, redirect to success page
        header("Location: extras_success.php");
        exit; // Stop executing the rest of the script
    } else {
        // If insertion fails, display error message and link to go back
        echo "<h2>Error adding extra:</h2> " . mysqli_error($con);
        echo "<br><a href='extras.php'>Go Back</a>";
    }

} else {
	// If user tries to access this page without submitting form, redirect to extras page
    header("Location: extras.php");
    exit;
}

mysqli_close($con);
?>