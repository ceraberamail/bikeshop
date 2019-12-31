<?php

$errors = array('price'=>'', 'brand' => '', 'name' => '', 'color'=>'', 'description'=>'');
$price=$brand=$name=$color=$description='';
$signed_in = false;

if(isset($_POST['submit'])){
    echo htmlspecialchars($_POST['price']);
    echo htmlspecialchars($_POST['brand']);
    echo htmlspecialchars($_POST['name']);
    echo htmlspecialchars($_POST['color']);
    echo htmlspecialchars($_POST['description']);

    // check price
    if(empty($_POST['price'])){
        $errors['price'] = 'A price is required!';
       // $price = '';
    } else {
        $signed_in = true;
        $price = $_POST['price'];
        if(!filter_var($price, FILTER_VALIDATE_INT)){
            $errors['price'] = 'Price must be a valid price (INT)!';
        }

    }

    // check brand
    if(empty($_POST['brand'])){
        $errors['brand'] = 'Brand is required!';
       // $price = '';
    } else {
        $signed_in = true;
        $price = $_POST['brand'];
        if(!preg_match('/^[0-9a-zA-Z\s]+$/', $brand)){
            $errors['brand'] = 'Brand must be a valid brand!';
        }

    }

// check name
if(empty($_POST['name'])){
    $errors['name'] = 'Name is required!';
   
} else {
    $signed_in = true;
    $price = $_POST['name'];
    if(!preg_match('/^[0-9a-zA-Z\s]+$/', $name)){
        $errors['name'] = 'Name must be a valid name!';
    }

}

// check color
if(empty($_POST['color'])){
    $errors['color'] = 'Color is required!';
   
} else {
    $signed_in = true;
    $price = $_POST['color'];
    if(!preg_match('/^[a-zA-Z\s]+$/', $color)){
        $errors['color'] = 'Color must be a valid color!';
    }

}


if($signed_in)
{
    echo 'signed in';
}
// check description
if(empty($_POST['description'])){             // ha üres a description
    $errors['description'] = 'A description is required';
    //$description = '';
} else {
    $description = $_POST['description'];
    if(!preg_match('/^[0-9a-zA-Z\s]+$/',$description)){
        $errors['description'] = 'description is not valBrand CSAK BETŰK ÉS SZÁMOK LEHETNEK!!!';
    }

}
 
if(array_filter($errors)){
    //echo 'there errors in the forms';
}
else //echo 'IT IS OK';
header('Location: index.php');   // ha nincs hiba vissza az index oldalra redirect
} // ent the POST check             // késöbb ha nem lesz hiba akkor mehet az adat az adatbázisba

?>

<!DOCTYPE html>
<html>

<?php  include('templates/header.php'); ?>

<section class="container grey-text">
    <h4 class="center">Add a Bike</h4>
    <form action="add.php" class="white" method="POST">
        <label for="price">Price</label> 
        <input type="text" name="price" value = <?php echo htmlspecialchars($price)?>>
        <div class="red-text"><?php echo $errors['price']; ?></div> 
        <label for="brand">Brand</label>
        <input type="text" name="brand">
        <label for="name">Name</label>
        <input type="text" name="name">
        <label for="color">Color</label>
        <input type="text" name="color">
        <label for="description">Description</label>    
        <input type="text" name="description" value= <?php echo htmlspecialchars($description)?>>
        <div class="red-text"><?php echo $errors['description']; ?></div> 
        <div class="center">
            <input type="submit" name="submit" value="submit"class="btn brand z-depth-0">

        </div>
    </form>

</section> 

<?php  include('templates/footer.php'); ?>

</body>
 </html>
 