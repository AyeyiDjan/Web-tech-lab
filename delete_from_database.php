<?php
  ob_start();
  include "dbconnect.php"; // Using database connection file here without displaying its contents
  ob_end_clean();

  if(isset($_POST['delete'])){//Delete record from database when delete button is clicked
    $search = $_POST['del'];
    $del=mysqli_query($db,"DELETE FROM `practical_lab_table` WHERE `Search_term`='$search' ");//delete query
    if ($del) {
        header("location:form.php"); // redirects to form page
        exit;   
      echo "Record deleted successfully";
        } 
    else {
      echo "Error deleting record: " . mysqli_error($conn);
    }
    }
mysqli_close($db); // Close connection
?>

