<?php

//file system - part 1

//$quotes = readfile('readme.txt');
//echo $quotes; 

$file = 'readme.txt';

if(file_exists($file)){

    //read file
    echo readfile($file) . '<br />';

    //get current user
    $current_user = get_current_user();

    //copy file dosen't work
    copy($file, 'quotes.txt');
    
    echo("file path: ");
    echo realpath($file). '<br />';

    echo('filesize: ');
    echo filesize($file). '<br />';

    echo('current user:');
    echo($current_user);

    // permission denied
    //rename($file, 'test.txt');

$handle = fopen($file, 'a+');

fwrite($handle, "\nEverithyng popular is wrong!");
    
 fclose($handle);

} else{
    echo 'file does not exists'. '<br />';
}


?>