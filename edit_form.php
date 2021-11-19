

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
</head>
<body>
    <form method="POST" >
        <label for="update">Change record from :</label>

        <input type="text" id="update" name="update" value="<?php echo $_POST['ed'];  ?>" disabled>

        <label for="update1">to :</label>

        <input type="text" id="update1" name="update1" >
      
  <br><br>
        <input type="submit" name="Update" value="Update">
    </form>
</body>
</html>


<?php
    ob_start();
    include "dbconnect.php"; // Using database connection file here without displaying its contents
    ob_end_clean();

    if(isset($_POST['Update'])){//Update record from database when update button is clicked
        $old = $_POST['update'];
        $new =$_POST['update1'];
        $upd=mysqli_query($db,"UPDATE `practical_lab_table` SET `Search_term`='$new' WHERE `Search_term`='$old' ");//update query
    if ($upd) {
        echo "Record updated successfully";
        header("location:form.php"); // redirects to form page
        exit;    
        }
    else {
      echo "Error updating record: " . mysqli_error($conn);
    }
    }
mysqli_close($db); // Close connection
?>

