<!-- Name: Mariia Vanaga  -->
<!-- Student ID: C00313153 -->
<!-- Month: March 2026-->
<!-- Screen name: Room Added Successfully -->
<!-- Purpose: Displays a confirmation message after successfully adding a room and provides a button to return to the dashboard.-->
<!DOCTYPE html>
<!-- Declares that this document uses HTML5 -->

<html>
<head>
    <!-- Head section contains metadata, title, links to CSS/JS -->

    <!-- Page title shown in the browser tab -->
    <title>Room Added Successfully</title>
</head>
<body>
    <!-- Body section contains all visible content on the page -->

    <!-- Main content container -->
    <!-- Inline styling is used to:
         1. Center all text horizontally
         2. Add padding around content for spacing -->
    <main class="content" style="text-align:center; padding:60px;">

        <!-- Primary success message -->
        <!-- 
            Styled in green to indicate success.
            margin-top pushes the message down for better visual alignment.
            font-weight:900 makes the text bold and prominent.
        -->
        <h1 style="color:green; margin-top: 250px; font-weight:900;">
            ✔ Room Successfully Added
        </h1>

        <!-- Secondary confirmation message -->
        <!-- Also styled in green and bold to reinforce success -->
        <h2 style="color:green; font-weight:900;">
            The room record has been saved to the system.
        </h2>

        <br>
        <!-- Line break to add spacing between message and button -->

        <!-- Navigation button -->
        <!-- Styled using inline CSS on the <a> tag to look like a button -->
        <!--
            display:inline-block -> allows padding and width to work
            padding -> adds space inside the button
            background -> button color
            color -> text color
            text-decoration:none -> removes underline
            border-radius -> rounded corners
            font-weight -> makes text semi-bold
        -->
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