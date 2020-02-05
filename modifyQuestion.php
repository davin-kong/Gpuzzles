
<?php $page_title = 'Modify Action'; ?>
<?php $page_title = 'GPuzzles > Modify Action'; ?>
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

      if(isset($_GET['modifyQuestion'])){
        if($_GET["modifyQuestion"] == "fileRealFailed"){
            echo '<br><h3 align="center" class="bg-danger">FAILURE - Your image is not real, Please Try Again!</h3>';
        }
      }
      if(isset($_GET['modifyQuestion'])){
        if($_GET["modifyQuestion"] == "answerFailed"){
            echo '<br><h3 align="center" class="bg-danger">FAILURE - Your answer was not one of the choices, Please Try Again!</h3>';
        }
      }
      if(isset($_GET['modifyQuestion'])){
        if($_GET["modifyQuestion"] == "fileTypeFailed"){
            echo '<br><h3 align="center" class="bg-danger">FAILURE - Your image is not a valid image type (jpg,jpeg,png,gif), Please Try Again!</h3>';
        }
      }
      if(isset($_GET['modifyQuestion'])){
        if($_GET["modifyQuestion"] == "fileExistFailed"){
            echo '<br><h3 align="center" class="bg-danger">FAILURE - Your image does not exist, Please Try Again!</h3>';
        }
      }

      echo '<h2 id="title">Modify Action</h2><br>';
      echo '<form action="modifyTheQuestion.php" method="POST" enctype="multipart/form-data">
      <br>
      <h3>'.$row["name"].' - '.$row["creator_name"].'? </h3> <br>
      
      <div>
        <label for="id">Id</label>
        <input type="text" class="form-control" name="id" value="'.$row["id"].'"  maxlength="5" style=width:400px readonly><br>
      </div>
      
      <div>
        <label for="name">name</label>
        <input type="text" class="form-control" name="name" value="'.$row["name"].'"  maxlength="255" style=width:400px required><br>
      </div>
      
      <div>
        <label for="category">creator_name</label>
        <input type="text" class="form-control" name="creator_name" value="'.$row["creator_name"].'"  maxlength="255" style=width:400px required><br>
      </div>
          
      <div>
        <label for="level">author_name</label>
        <input type="text" class="form-control" name="author_name" value="'.$row["author_name"].'"  maxlength="255" style=width:400px required><br>
      </div>
          
      <div>
        <label for="facilitator">book_name</label>
        <input type="text" class="form-control" name="book_name" value="'.$row["book_name"].'"  maxlength="255" style=width:400px required><br>
      </div>
//
     

      <div class="form-group col-md-4">
      <label for="cadence">New Image Path (Not Required)</label>
      <input type="file" name="fileToUpload" id="fileToUpload" maxlength="255">
    </div>
    <input type="hidden" class="form-control" name="oldimage" value="'.$row["puzzle_image"].'" maxlength="255" required>
    <br>
    <div class="text-left">
      

    <div class="form-group col-md-4">
        <label for="cadence">New Image Path (Not Required)</label>
        <input type="file" name="fileToUpload" id="fileToUpload" maxlength="255">
      </div>
      <input type="hidden" class="form-control" name="oldimage" value="'.$row["solution_image"].'" maxlength="255" required>
      <br>
      <div class="text-left">


      <div>
        <label for="optional">notes</label>
        <input type="text" class="form-control" name="notes" value="'.$row["notes"].'"  maxlength="255" style=width:400px required><br>
      </div>

     
          <button type="submit" name="submit" class="btn btn-primary btn-md align-items-center">Modify Action</button>
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


