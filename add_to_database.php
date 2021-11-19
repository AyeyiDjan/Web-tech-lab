<?php
    ob_start();
    include "dbconnect.php"; // Using database connection file here
    ob_end_clean();

    if(isset($_POST['submit'])){//WHen submit button is clicked, data is added to database   
        $search = $_POST['add'];
        $insert = mysqli_query($db,"INSERT INTO `practical_lab_table`(`Search_term`) VALUES ('$search') ");
        if(!$insert)
            {
                echo mysqli_error($db);//Show error
            }
        else
            {
                echo "Records added successfully.";
            }
        }
    mysqli_close($db); // Close connection
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>add_to_database</title>
</head>
    <body>
        <!-- form to allo user to click button to return to homepage -->
        <form action="form.php" method="POST">
            <input type="submit" value="Return to homepage">
        </form>
    </body>
</html>