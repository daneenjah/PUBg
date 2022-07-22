<?php
$page = $_GET['page'];//set page from url

//password protect this content
require_once('protect.php');

//function to scan and delete everything in the data directory
$dir = "../data";
function rmdir_recursive($dir) {
    foreach(scandir($dir) as $file) {
        if ('.' === $file || '..' === $file) continue;
        if (is_dir("$dir/$file")) rmdir_recursive("$dir/$file");
        else unlink("$dir/$file");
    }
    //remove the data directory
    rmdir($dir);
}

//call the function
rmdir_recursive($dir);

//remake the directory
mkdir($dir);

//send us back to the previous page
header("location:" .$page);
exit();
?>
