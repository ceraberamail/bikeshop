
 
 <?php
 
include('db_connect.php');

//echo ('modify.php');

$update = false;

//$id_to_modify =0;

$supername;
$superbrand;
$supercolor;
$superprice;
$duperdescription;



if(isset($_POST['modify'])){

    //echo('modify');

    $id_to_modify = mysqli_real_escape_string($conn, $_POST['id_to_modify']);

  // echo ($id_to_modify);


    $sql = "SELECT * FROM bikes WHERE id = $id_to_modify";

    // get the query result
    $result = mysqli_query($conn, $sql);

    // fetch result in array format
    $bike = mysqli_fetch_assoc($result);

    //echo (' Bike name: ' . $bike['name']);
    $supername = $name = $bike['name'];
    $superbrand = $brand = $bike['brand'];
    $supercolor = $color = $bike['color'];
    $superprice = $price = $bike['price'];
    $superdescription = $description = $bike['description'];

   

    if(mysqli_query($conn, $sql)){
        // success
        //echo('modify success');
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
    $superbrand = mysqli_real_escape_string($conn, $_POST['brand']);
    $supercolor = mysqli_real_escape_string($conn, $_POST['color']);
    $superprice = mysqli_real_escape_string($conn, $_POST['price']);
    $superdescription = mysqli_real_escape_string($conn, $_POST['description']);
    //echo ('submit: id_to_modify:'.$id_to_modify);
    $update=true;
    //echo($id_to_modify);
    //echo(' submit: $_POST[naem]' . $_POST['name']);
   
    $supername = $name2 = mysqli_real_escape_string($conn, $_POST['name']);
    //echo (' name2'.$name2);

    
    
   $sql = "UPDATE bikes SET name ='$name2' WHERE id = $id_to_modify";
   $sql = "UPDATE bikes SET brand ='$superbrand' WHERE id = $id_to_modify";
   $sql = "UPDATE bikes SET color='$supercolor' WHERE id = $id_to_modify";
   $sql = "UPDATE bikes SET price = '$superprice' WHERE id = $id_to_modify";
   $sql = "UPDATE bikes SET description = '$superdescription' WHERE id = $id_to_modify";


   if(mysqli_query($conn, $sql)){
    // success
    //echo('modify success');
}
else{
    echo 'query error:' . mysqli_error($conn);
}

    header('Location: shop.php');
}




 

 ?>


<!DOCTYPE html>
<html>

<?php  include('templates/header.php'); ?>


<!-- SUBMIT FORM -->
<form action = "modify.php" method="POST">
    <div class="center">

        <label for="name">Name</label>
        <input type="text" name="name" value= <?php echo htmlspecialchars($supername)?>>
        
        <label for="brand">Brand</label>
        <input type="text" name="brand" value= <?php echo htmlspecialchars($superbrand)?>>
        
        <label for="color">Color</label>
        <input type="text" name="color" value= <?php echo htmlspecialchars($supercolor)?>>

        <label for="price">Price</label>
        <input type="text" name="price" value= <?php echo htmlspecialchars($superprice)?>>
        
        <label for="description">Description</label>
        <input type="text" name="description" value= <?php echo ($superdescription)?>>

        <input type="hidden" name="id_to_modify" value="<?php echo $bike['id']?>">
        <input type="submit" name="submit" value="Submit" class="btn brand z-depth-0">
        
        </div>

        
</form>

<?php  include('templates/footer.php'); ?>




 </html>
 