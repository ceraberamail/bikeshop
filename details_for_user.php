
 <?php
 
include('db_connect.php');

if(isset($_POST['delete'])){

    $id_to_delete = mysqli_real_escape_string($conn, $_POST['id_to_delete']);

    $sql = "DELETE FROM bikes WHERE id = $id_to_delete";

    if(mysqli_query($conn, $sql)){
        // success
        header('Location: shop.php');
    }
    else{
        echo 'query error:' . mysqli_error($conn);
    }
}


 // check Get request param
 if(isset($_GET['id'])){

    $id = mysqli_real_escape_string($conn, $_GET['id']);

    // make sql select any record where id = $id
    $sql = "SELECT * FROM bikes WHERE id = $id";

    // get the query result
    $result = mysqli_query($conn, $sql);

    // fetch result in array format
    $bike = mysqli_fetch_assoc($result);

    mysqli_free_result($result);
    mysqli_close($conn);

    
 }

 
 
 
 ?>


<!DOCTYPE html>
<html>


<div class="container center">
<?php  include('templates/header.php'); ?>
<form>
<h5><?php echo htmlspecialchars($bike['name']);?>'s details:</h5>
<?php echo htmlspecialchars($bike['description']);?>

</div>




<?php  include('templates/footer.php'); ?>




 </html>
 