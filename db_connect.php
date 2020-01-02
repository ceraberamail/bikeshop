 <?php

// database connection

$conn = mysqli_connect('localhost','user','user','bikeshop');

// check

if(!$conn){
echo 'connection error: ' .mysqli_connect_error();
}

?> 