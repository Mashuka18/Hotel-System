<!-- Name: Mariia Vanaga  -->
<!-- Student ID: C00313153 -->
<!-- Month: March 2026-->
<!-- Screen name: Room Already Exists --> 
<!-- Purpose: Informs the user that the room they are trying to add already exists in the system.-->
<!DOCTYPE html>
<!-- Declares the document type as HTML5 -->
<html>
<head>
    <!-- Head section contains meta info, title, and links to styles/scripts -->
    
    <!-- Page title displayed in browser tab -->
    <title>Room Already Exists</title>
</head>
<body>
    <!-- Body section contains all visible content on the page -->

    <!-- Main content container with inline styling for center alignment and padding -->
    <main class="content" style="text-align:center; padding:60px;">

        <!-- Primary warning message for the user -->
        <!-- Styled in red with extra top margin and bold font -->
        <h1 style="color:red; margin-top: 250px; font-weight:900;">
            X Room Already Exists
        </h1>

        <!-- Secondary explanation message, also styled in red and bold -->
        <h2 style="color:red; font-weight:900;">
            A room with the same number already exists in the system.
        </h2>

        <!-- Additional guidance to the user in normal text size -->
        <p style="font-size:18px;">
            Please choose a different room number.
        </p>

        <br>
        <!-- Line break to add spacing between text and button -->

        <!-- Navigation button styled as a link to return to the Add Room page -->
        <a href="add_room.html.php" 
           style="
                display:inline-block;   /* Make link behave like a button */
                padding:12px 20px;     /* Add space inside button */
                background:#d62a2a;    /* Red background color */
                color:white;           /* White text color */
                text-decoration:none;  /* Remove underline from link */
                border-radius:8px;     /* Rounded corners */
                font-weight:600;       /* Semi-bold text */
           ">
            Return to Add Room
        </a>

    </main>
</body>
</html>