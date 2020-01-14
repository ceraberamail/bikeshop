

<?php

// database connection

$conn = mysqli_connect('localhost','root','root','bikeshop');

// check

if(!$conn){
echo 'connection error: ' .mysqli_connect_error();
}

?> 