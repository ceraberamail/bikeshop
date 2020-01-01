<?php

include('db_connect.php');

// query

$sql = 'SELECT id, brand, color, name, description, price FROM bikes ';

// make query and get result

$result = mysqli_query($conn, $sql);

// fetch the resulting rows
$bikes = mysqli_fetch_all($result, MYSQLI_ASSOC);

// free result

mysqli_free_result($result);

// close connection

mysqli_close($conn);

//print_r($bikes);

?>

<!DOCTYPE html>
<html>

<?php  include('templates/header.php'); ?>


<h4 class="center grey-text">Bikes</h4>
<div class="container">
    <div class="row">
        <?php  foreach($bikes as $bike){?>

            <div class="col s6 md3">
                <div class="card z-depht-0">
                    <div class="card-cpntent center">
                        <h6><?php echo htmlspecialchars($bike['name'].'('.$bike['id'].')');?></h6>
                        <div> <?php echo htmlspecialchars($bike['brand']);?></div>
                        <div> <?php echo htmlspecialchars($bike['color']);?></div>
                        <div> <?php echo htmlspecialchars($bike['description']);?></div>
                        <div> <?php echo htmlspecialchars($bike['price'].' HUF');?></div>
                    </div>
                    <div class="card-action right-align">
                    <a href="#" class="brand-text">more info</a>
                </div>
            </div>
        </div>
            
        <?php } ?>
    </div>
</div>
<?php  include('templates/footer.php'); ?>

</body>
</html>
 
