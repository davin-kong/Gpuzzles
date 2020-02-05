
<?php $page_title = 'GPuzzles > Delete Action'; ?>
<?php 
    require 'bin/functions.php';
    require 'db_configuration.php';
    include('header.php'); 
    $page="puzzle_list.php";
    verifyLogin($page);

?>
<div class="container">
<style>#title {text-align: center; color: darkgoldenrod;}</style>
<?php
include_once 'db_configuration.php';

if (isset($_GET['id'])){

    $id = $_GET['id'];
    
    $sql = "SELECT * FROM gpuzzles
            WHERE id = '$id'";

    if (!$result = $db->query($sql)) {
        die ('There was an error running query[' . $connection->error . ']');
    }//end if
}//end if

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo '<form action="deleteTheQuestion.php" method="POST">
    <br>
    <h3 id="title">Delete Action</h3><br>
    <h2>'.$row["name"].' - '.$row["creator_name"].' </h2> <br>
    
    <div class="form-group col-md-4">
      <label for="id">Id</label>
      <input type="text" class="form-control" name="id" value="'.$row["id"].'"  maxlength="5" readonly>
    </div>
    
    <div class="form-group col-md-8">
      <label for="name">name</label>
      <input type="text" class="form-control" name="name" value="'.$row["name"].'"  maxlength="255" readonly>
    </div>
    
    <div class="form-group col-md-4">
      <label for="category">creator_name</label>
      <input type="text" class="form-control" name="creator_name" value="'.$row["creator_name"].'"  maxlength="255" readonly>
    </div>
        
    <div class="form-group col-md-4">
      <label for="level">author_name</label>
      <input type="text" class="form-control" name="author_name" value="'.$row["author_name"].'"  maxlength="255" readonly>
    </div>
        
    <div class="form-group col-md-4">
      <label for="facilitator">book_name</label>
      <input type="text" class="form-control" name="book_name" value="'.$row["book_name"].'"  maxlength="255" readonly>
    </div>

    <div class="form-group col-md-4">
      <label for="cadence">puzzle_image</label>
      <input type="text" class="form-control" name="puzzle_image" value="'.$row["puzzle_image"].'"  maxlength="255" readonly>
    </div>

    <div class="form-group col-md-4">
      <label for="cadence">solution_image</label>
      <input type="text" class="form-control" name="solution_image" value="'.$row["solution_image"].'"  maxlength="255" readonly>
    </div>
    
    <div class="form-group col-md-6">
      <label for="optional">notes</label>
      <input type="text" class="form-control" name="notes" value="'.$row["notes"].'"  maxlength="255" readonly>
    </div>

           
    <br>
    <div class="text-left">
        <button type="submit" name="submit" class="btn btn-primary btn-md align-items-center">Confirm Delete Action</button>
    </div>
    <br> <br>
    
    </form>';

    }//end while
}//end if
else {
    echo "0 results";
}//end else

?>

</div>


