<?php




include "db_connect.php";


$page = isset($_GET['p']) ? $_GET['p'] : 'home';

echo ($page);

$conn = mysqli_connect('localhost','user','user','bikeshop');

if (file_exists("$page.php")) {
    include "$page.php";
} else {
    echo 'ups... 404';
}

mysqli_close($conn);

