 <?php
 
include('db_connect.php');

echo ('modify.php');



if(isset($_POST['modify'])){

    echo('modify');

    $id_to_modify = mysqli_real_escape_string($conn, $_POST['id_to_modify']);

    $sql = "SELECT * FROM bikes WHERE id = $id_to_modify";

    // get the query result
    $result = mysqli_query($conn, $sql);

    // fetch result in array format
    $bike = mysqli_fetch_assoc($result);

    echo (' Bike name: ' . $bike['name']);
    $name = $bike['name'];

    if(mysqli_query($conn, $sql)){
        // success
        echo('modify success');
    }
    else{
        echo 'query error:' . mysqli_error($conn);
    }


    

    //mysqli_free_result($result);
    //mysqli_close($conn); 
}


if(isset($_POST['submit'])){

    $id_to_modify = mysqli_real_escape_string($conn, $_POST['id']);
   
    echo('submit');
    echo htmlspecialchars($_POST['name']);
    echo('submit');
    $name2 = mysqli_real_escape_string($conn, $_POST['name']);
    echo ($name2);
    
    $sql = "UPDATE bikes SET name = $name2 WHERE id = $id_to_modify";
    }

 

 ?>


<!DOCTYPE html>
<html>

<form action="modify.php" class="white" method="POST">
<div class="container center">
<?php  include('templates/header.php'); ?>

<h5><?php echo htmlspecialchars($bike['name']);?>'s details:</h5>
<?php echo htmlspecialchars($bike['description']);?>
<label for="name">Name</label>
        <input type="text" name="name" value= <?php echo htmlspecialchars($bike['name'])?>>
        <div class="center">
            <input type="submit" name="submit" value="submit"class="btn brand z-depth-0">

        </div>
</form>
</div>






<?php  include('templates/footer.php'); ?>




 </html>
 