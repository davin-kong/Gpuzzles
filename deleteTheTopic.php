<?php

include_once 'db_configuration.php';

if (isset($_POST['name'])){

    $name = mysqli_real_escape_string($db, $_POST['name']);
   
 
    $sql = "SELECT * FROM `questions` where name= '$name' ";



    if (!$result = $db->query($sql)) {
        die ('There was an error running query[' . $connection->error . ']');
    }//end if

  
  if ($result->num_rows > 0) {
    echo '<script language="javascript">';
    echo 'alert("Can not delete this name because it associated with one or more questions");';
    echo ' history.go(-2); </script>';

    }
    else {
        $sql = "DELETE FROM topics
        WHERE name = '$name'";
            $sql2 ="SELECT * From topics where name = '$name'";
            $GLOBALS['name'] = mysqli_query($db, $sql2);
            
        
        
mysqli_query($db, $sql);
header('location: topics_list.php?topicDeleted=Success');

    }
 
}//end if
?>

