<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">    
  </head>
  <body>
    <!-- Form for adding data into database
    -->
    <form method="POST" action="add_to_database.php">
            <label for="pname">Enter search term:</label>
            <input type="text" id="add" name="add" >
            <input type="submit" name="submit" value="Add">
    </form>
    <br></br>
     <!-- Form for searching for data in database
    -->
    <form method="POST" >
                  <label for="pname">Search database for:</label>
            <input type="text" id="search" name="search" >
            <input type="submit" name="Search" value="Search">
    </form>
    <br></br>
    
    <br></br>

   <?php
      ob_start();
      include "dbconnect.php"; // Using database connection file here
      ob_end_clean();
      if(isset($_POST['Search'])){
        $search = $_POST['search'];
        $records = mysqli_query($db,"SELECT * FROM `practical_lab_table` WHERE (`Search_term`='$search') "); // fetch data from database
        while($data = mysqli_fetch_array($records)){//While loop to print out data in a table form
  ?>
    <table border="1">
      <thr>
        <td>Search Term</td>
        <td>Edit</td>
        <td>Delete</td>
      </tr>
      <tr>
        <td><?php echo $data['Search_term']; ?></td>   
        <td><form method="POST" action="edit_form.php">
              <input type="submit" name="edit"  value="Edit">
              <input type="hidden" name="ed"  value="<?php echo $_POST['search'];  ?>">
            </form>
        </td>
        <td>
          <form method="POST" action="delete_from_database.php">
            <input type="submit" name="delete"  value="Delete">
            <input type="hidden" name="del"  value="<?php echo $_POST['search'];  ?>">
          </form>
        </td>
      </tr> 
  <?php
  }
  }
  ?>
    </table>
  </body>
</html>