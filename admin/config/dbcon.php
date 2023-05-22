<?php

$host = "localhost";
$username = "u748224765_root";
//$username = "root";
$password = "z00P!123";
//$password = "";
$database = "u748224765_scottflo";
//$database = "scottflo";

$con = mysqli_connect("$host","$username","$password","$database");

if(!$con)
{
    // header('Location: ../errors/dberror.php');
    echo '<h1>Database Connection Failed</h1>';
    die();
}

?>
