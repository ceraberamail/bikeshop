 <?php
 
include('db_connect.php');

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

    print_r($bike['description']);
    

 }
 
 
 ?>


<!DOCTYPE html>
<html>

<?php  include('templates/header.php'); ?>
<h5><?php echo ($bike['name']);?>'s details:</h5>
<?php echo ($bike['description']);?>


<?php  include('templates/footer.php'); ?>




 </html>
 