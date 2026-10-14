<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Orders Report</title>
    <link rel="stylesheet" type="text/css" href="orders_report.css">
    <link rel="stylesheet" href="../../index.css">
</head>

<body>
<!-- Include sidebar page -->
  <?php include('../../sidebar.php'); ?>

<?php
// Database connection
include '../../db.inc.php';
date_default_timezone_set('UTC');
?>

<!-- Hidden form for sorting choice -->
<form action="orders_report.php" method="post" name="reportForm">
    <input type="hidden" name="choice">
</form>

<div class="content">
    <div class="report-card">
        <h1>Orders Report</h1>
        <p>(Click a button to sort the orders in the desired order)</p>

        <!-- Sorting buttons -->
        <div class="report-buttons">
            <input type='button' id="dateButton" value='Date Order' onclick='dateOrder()' title='Reverse date of order'>
            <input type='button' id="supplierButton" value='Supplier Order' onclick='supplierOrder()' title='Alphabetical supplier order'>
            <input type='button' id="costButton" value='Cost Order' onclick='costOrder()' title='Decreasing total cost order'>
        </div>

        <script>
            function dateOrder() { document.reportForm.choice.value = "DATE"; document.reportForm.submit(); }
            function supplierOrder() { document.reportForm.choice.value = "SUPPLIER"; document.reportForm.submit(); }
            function costOrder() { document.reportForm.choice.value = "COST"; document.reportForm.submit(); }
        </script>

<?php
// Default sort: Date
$choice = "DATE";
if (isset($_POST['choice'])) {
    $choice = $_POST['choice'];
}

// SQL and button handling
if ($choice == "DATE") {
    echo "<script>
            document.getElementById('dateButton').disabled = true;
            document.getElementById('supplierButton').disabled = false;
            document.getElementById('costButton').disabled = false;
          </script>";

    // Most recent orders first
    $sql = "SELECT o.OrderID, 
                   CONCAT(s.SupplierFirstName, ' ', s.SupplierSurname) AS SupplierName, 
                   o.OrderDate, 
                   o.OrderTotalCost
            FROM `Order` o
            JOIN Supplier s ON o.SupplierID = s.SupplierID
            ORDER BY o.OrderDate DESC";

} elseif ($choice == "SUPPLIER") {
    echo "<script>
            document.getElementById('supplierButton').disabled = true;
            document.getElementById('dateButton').disabled = false;
            document.getElementById('costButton').disabled = false;
          </script>";

    // Alphabetical by supplier surname then first name
    $sql = "SELECT o.OrderID, 
                   CONCAT(s.SupplierFirstName, ' ', s.SupplierSurname) AS SupplierName, 
                   o.OrderDate, 
                   o.OrderTotalCost
            FROM `Order` o
            JOIN Supplier s ON o.SupplierID = s.SupplierID
            ORDER BY s.SupplierSurname ASC, s.SupplierFirstName ASC, o.OrderDate DESC";

} else { // COST
    echo "<script>
            document.getElementById('costButton').disabled = true;
            document.getElementById('dateButton').disabled = false;
            document.getElementById('supplierButton').disabled = false;
          </script>";

    // Highest total cost first
    $sql = "SELECT o.OrderID, 
                   CONCAT(s.SupplierFirstName, ' ', s.SupplierSurname) AS SupplierName, 
                   o.OrderDate, 
                   o.OrderTotalCost
            FROM `Order` o
            JOIN Supplier s ON o.SupplierID = s.SupplierID
            ORDER BY o.OrderTotalCost DESC";
}

// Function to display the table
function produceReport($con, $sql) {
    $result = mysqli_query($con, $sql);

    echo "<table border='2'>
            <tr>
                <th>Order ID</th>
                <th>Supplier Name</th>
                <th>Order Date</th>
                <th>Total Cost</th>
            </tr>";

    while ($row = mysqli_fetch_array($result)) {
        $orderDate = date_create($row['OrderDate']);
        $orderDateF = date_format($orderDate, "d/m/Y");
        $totalCost = number_format($row['OrderTotalCost'], 2);

        echo "<tr>
                <td>".$row['OrderID']."</td>
                <td>".$row['SupplierName']."</td>
                <td>".$orderDateF."</td>
                <td>".$totalCost."</td>
              </tr>";
    }

    echo "</table>";
}

// Display report
produceReport($con, $sql);

// Close database connection
mysqli_close($con);
?>

    </div> <!-- report-card -->
</div> <!-- content -->
</body>
</html>