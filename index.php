<?php

include "db_connect.php";


$page = 'home';

//echo ($page);

$conn = mysqli_connect('localhost','root','root','bikeshop');

if (file_exists("$page.php")) {
    include "$page.php";
} else {
    echo 'ups... 404';
}

mysqli_close($conn);

?>

