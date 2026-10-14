<!-- Name: Mariia Vanaga  -->
<!-- Student ID: C00313153 -->
<!-- Month: March 2026-->
<!-- Screen name: add_amend_delete.js --> 
<!-- Purpose: Shows a confirmation message before submitting the form.-->
// When the form is submitted
document.getElementById("MyForm").onsubmit = function() {
    // Show confirmation dialog
    return confirm("Are you sure you want to add this room?");
};
