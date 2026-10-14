<!-- Name: Mariia Vanaga  -->
<!-- Student ID: C00313153 -->
<!-- Month: March 2026-->
<!-- Screen name: Room Updated Successfully -->
<!-- Purpose: Displays a confirmation message after successfully updating a room and provides a button to return to the dashboard.-->
<!DOCTYPE html>
<html>
<head>

    <!-- Page title displayed in browser tab -->
    <title>Room Updated Successfully</title>
    
</head>
<body>

<!--Main content container.
Inline styling is used here to:
- Center all content
- Add spacing around the message-->
<main class="content" style="text-align:center; padding:60px;">

    <!-- Success message.
        Styled in green to indicate successful operation.
        margin-top pushes message down for better visual alignment.-->
    <h1 style="color:green; margin-top: 250px; font-weight:900;">
        ✔ Room Successfully Updated
    </h1>

    <!-- Secondary confirmation message -->
    <h2 style="color:green; font-weight:900;">
        The room record has been saved to the system.
    </h2>

    <br>
<!--Navigation button to return to Dashboard.
Styled as a button using CSS properties inside the anchor tag.
- display:inline-block allows padding to work
- background sets button color
- border-radius creates rounded corners-->
    <a href="../../../index.php" 
       style="
            display:inline-block;
            padding:12px 20px;
            background:#d62a2a;
            color:white;
            text-decoration:none;
            border-radius:8px;
            font-weight:600;
       ">
        Return to Dashboard
    </a>

</main>

</body>
</html>