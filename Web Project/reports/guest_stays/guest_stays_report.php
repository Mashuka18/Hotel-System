<!-- Name: Mariia Vanaga --> 
<!-- Student ID: C00313153 --> 
<!-- Date: February 2026 --> 
<!-- Screen name: Guest Stays Report --> 
<!-- Purpose: generate and display a guest stays report with options to sort the data by date, guest name, or total cost. --> 

<!DOCTYPE html> <!-- Defines the document as an HTML5 page -->
<html>
<head>
<!-- CSS file that styles the Guest Stays report (table, buttons, card layout) -->
<link rel="stylesheet" type="text/css" href="guest_stays_report.css">
<!-- Main project stylesheet that controls layout, sidebar, background etc -->
<link rel="stylesheet" href="../../index.css">
</head>
  
<body>	
<!-- Include sidebar page -->
  <?php include('../../sidebar.php'); ?>
	
<?php 

/* Include the database connection file.*/
include '../db.inc.php';

/* Set timezone*/
date_default_timezone_set('UTC');

?>
<!-- Hidden form used to send sorting choice back to the server -->
<form action="guest_stays_report.php" method="post" name="reportForm">

<!-- Hidden field that stores which sorting button was clicked -->
<input type="hidden" name="choice">
</form>
<!-- Main content area (defined in index.css) -->
<div class="content">
<!-- Card container that holds the report title, buttons and table -->
<div class="report-card">

<h1>Guest Stays Report</h1>
<p>(Click a button to see the Guest Stays in the desired order)</p>

<!-- Container that holds the sorting buttons -->
<div class="report-buttons">

<!-- Button that sorts the report by reverse checkout date -->
<input type='button' id="dateButton" value='Date Order'
onclick='dateOrder()' title='Reverse checkout date order'>

<!-- Button that sorts the report alphabetically by guest -->
<input type='button' id="guestButton" value='Guest Order'
onclick='guestOrder()' title='Alphabetical guest order'>

<!-- Button that sorts the report by highest total cost -->
<input type='button' id="costButton" value='Cost Order'
onclick='costOrder()' title='Decreasing total cost order'>

</div>
<script>

/* When Date Order button is clicked
   set hidden field value to DATE and submit form */
function dateOrder() {
    document.reportForm.choice.value = "DATE";
    document.reportForm.submit();
}

/* When Guest Order button is clicked
   set hidden field value to GUEST and submit form */
function guestOrder() {
    document.reportForm.choice.value = "GUEST";
    document.reportForm.submit();
}

/* When Cost Order button is clicked
   set hidden field value to COST and submit form */
function costOrder() {
    document.reportForm.choice.value = "COST";
    document.reportForm.submit();
}

</script>

<?php
/* Default sorting option when the page first loads.
   The assignment requires reverse date order by default */
$choice = "DATE";

/* If a button was clicked, retrieve the selected sorting choice */
if (isset($_POST['choice'])) {
    $choice = $_POST['choice'];
}

/* DATE ORDER (DEFAULT)
   Most recent check-out first
   If same date → alphabetical by guest surname*/

if ($choice == "DATE") {
?>

<script>
/* Disable the Date button because it is the current active sort */
document.getElementById("dateButton").disabled = true; 

/* Enable the other buttons */
document.getElementById("guestButton").disabled = false;
document.getElementById("costButton").disabled = false;

</script>
<?php

/* SQL query to retrieve guest stay data */
$sql = "SELECT gs.CheckInDate, gs.CheckOutDate, gs.TotalCost,
        g.GuestFirstName, g.GuestSurname, g.GuestCounty
        FROM GuestStay gs
        JOIN Guest g ON gs.GuestID = g.GuestID
        WHERE g.GuestDeletedFlag = 0
        ORDER BY 
    (gs.CheckOutDate IS NULL) DESC,           -- Put still staying first
    COALESCE(gs.CheckOutDate, '9999-12-31') DESC, -- Treat NULL as a very future date
    g.GuestSurname ASC";

/* Call function to display the results */
produceReport($con, $sql);
}
/* GUEST ORDER
   Sort by guest surname alphabetically
   Then by reverse checkout date */

elseif ($choice == "GUEST") {
?>
	
<script>
/* Disable Guest button because it is active */
document.getElementById("guestButton").disabled = true; 

/* Enable the other two buttons */
document.getElementById("dateButton").disabled = false;
document.getElementById("costButton").disabled = false;

</script>
<?php
/* SQL query sorting by guest surname first */
$sql = "SELECT gs.CheckInDate, gs.CheckOutDate, gs.TotalCost,
        g.GuestFirstName, g.GuestSurname, g.GuestCounty
        FROM GuestStay gs
        JOIN Guest g ON gs.GuestID = g.GuestID
        WHERE g.GuestDeletedFlag = 0
		ORDER BY 
    (gs.CheckOutDate IS NULL) DESC,           -- Put still staying first
    COALESCE(gs.CheckOutDate, '9999-12-31') DESC, -- Treat NULL as a very future date
    g.GuestSurname ASC,                           -- Alphabetical by surname
    g.GuestFirstName ASC                          -- Then by first name";
	//ASC - ascending order = smallest to largest.
	//DESC - descending order = largest to smallest.

produceReport($con, $sql);
}
/* COST ORDER
   Sort by highest total cost first*/
else {
?>
	
<script>
/* Disable Cost button because it is active */
document.getElementById("costButton").disabled = true; 

/* Enable the other two buttons */
document.getElementById("dateButton").disabled = false;
document.getElementById("guestButton").disabled = false;
</script>

<?php
	/* COST ORDER
   Sort by highest total cost first*/
/* SQL query sorting by most expensive stay first */
$sql = "SELECT gs.CheckInDate, gs.CheckOutDate, gs.TotalCost,
        g.GuestFirstName, g.GuestSurname, g.GuestCounty
        FROM GuestStay gs
        JOIN Guest g ON gs.GuestID = g.GuestID
        WHERE g.GuestDeletedFlag = 0
        ORDER BY gs.TotalCost DESC";

produceReport($con, $sql);
}
/*FUNCTION TO DISPLAY REPORT TABLE*/

function produceReport($con, $sql)
{
    /* Execute SQL query */
    $result = mysqli_query($con, $sql);

    /* Create table headers */
    echo "<table border='2'>
          <tr>
              <th>Check-in Date</th>
              <th>Check-out Date</th>
              <th>Guest Name</th>
              <th>County</th>
              <th>Total Cost</th>
          </tr>";

    /* Loop through each record returned from the database */
    while ($row = mysqli_fetch_array($result)) {
        /* Format check-in date to dd/mm/yyyy */
        $checkin = date_create($row['CheckInDate']);
        $checkinF = date_format($checkin, "d/m/Y");

        /* Check if guest has checked out yet */
        if ($row['CheckOutDate'] != NULL) {

            /* Format check-out date */
            $checkout = date_create($row['CheckOutDate']);
            $checkoutF = date_format($checkout, "d/m/Y");

        } else {
            /* If no checkout date = guest is still staying */
            $checkoutF = "Still Staying";
        }

        /* Combine first name and surname into full guest name */
        $guestname = $row['GuestFirstName'] . " " . $row['GuestSurname'];
		
        /* Output the row data into the table */
        echo "<tr>
                <td>".$checkinF."</td>
                <td>".$checkoutF."</td>
                <td>".$guestname."</td>
                <td>".$row['GuestCounty']."</td>
                <td>".$row['TotalCost']."</td>
              </tr>";
    }
    /* Close the table */
    echo "</table>";
}
/* Close the database connection */
mysqli_close($con);

?>

</div>
</div>

</body>
</html>