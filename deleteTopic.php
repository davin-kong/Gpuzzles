<?php $page_title = 'GPuzzles > Delete Topic'; ?>
<?php include('header.php'); 
    $page="puzzle_list.php";
    /*verifyLogin($page);*/

?>
<div class="container">
<style>#title {text-align: center; color: darkgoldenrod;}</style>

<?php



include_once 'db_configuration.php';


if (isset($_GET['name'])){

    $name = $_GET['name'];
    
    $sql = "SELECT * FROM gpuzzles
            WHERE name = '$name'";


    if (!$result = $db->query($sql)) {
        die ('There was an error running query[' . $connection->error . ']');
    }//end if
}//end if

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo '<form action="deleteTheTopic.php" method="POST">
    <br>
     <h2 id="title">Delete Topic</h2><br>
    <h3>Delete Question: '.$row["name"].' </h3> <br>
    
    <div class="form-group col-md-4">
      <label for="id">Id</label>
      <input type="text" class="form-control" name="id" value="'.$row["id"].'"  maxlength="5" readonly>
    </div>
    
    <div class="form-group col-md-8">
      <label for="name">Topic</label>
      <input type="text" class="form-control" name="name" value="'.$row["name"].'"  maxlength="255" readonly>
    </div>

    <div class="form-group col-md-4">
      <label for="cadence">Image Path</label>
      <input type="text" class="form-control" name="puzzle_image" value="'.$row["puzzle_image"].'"  maxlength="255" readonly>
    </div>
           
    <br>
    <div class="text-left">
        <button type="submit" name="submit" class="btn btn-primary btn-md align-items-center">Confirm Delete topic</button>
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


