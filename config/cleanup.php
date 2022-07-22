<?php
$page = $_GET['page'];//set page from url

// Password protect this content
require_once('protect.php');

$dir = "../data";
function rmdir_recursive($dir) {
    foreach(scandir($dir) as $file) {
        if ('.' === $file || '..' === $file) continue;
        if (is_dir("$dir/$file")) rmdir_recursive("$dir/$file");
        else unlink("$dir/$file");
    }
    rmdir($dir);
}

rmdir_recursive($dir);

mkdir($dir);

header("location:" .$page);
exit();
?>
