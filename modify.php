
 
 <?php
 
include('db_connect.php');

echo ('modify.php');

$update = false;

$id_to_modify =0;


if(isset($_POST['modify'])){

    echo('modify');

    $id_to_modify = mysqli_real_escape_string($conn, $_POST['id_to_modify']);

   echo ($id_to_modify);


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

    $update = true;

    $id_to_modify = mysqli_real_escape_string($conn, $_POST['id_to_modify']);

echo ('submit: id_to_modify:'.$id_to_modify);
    $update=true;
    //echo($id_to_modify);
    echo(' submit: $_POST[naem]' . $_POST['name']);
   
    $name2 = mysqli_real_escape_string($conn, $_POST['name']);
    echo (' name2'.$name2);
    
   $sql = "UPDATE bikes SET name='$name2' WHERE id = $id_to_modify";

   if(mysqli_query($conn, $sql)){
    // success
    echo('modify success');
}
else{
    echo 'query error:' . mysqli_error($conn);
}

    //header('Location: shop.php');
}




 

 ?>


<!DOCTYPE html>
<html>

<?php  include('templates/header.php'); ?>


<!-- SUBMIT FORM -->
<form action = "modify.php" method="POST">
    <div class="center">

        <label for="name">Name</label>
        <input type="text" name="name" value= <?php echo htmlspecialchars($name)?>>


        <input type="hidden" name="id_to_modify" value="<?php echo $bike['id']?>">
        <input type="submit" name="submit" value="Submit" class="btn brand z-depth-0">
        
        </div>

        
</form>

<?php  include('templates/footer.php'); ?>




 </html>
 