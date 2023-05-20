<?php

$host = "localhost";
$username = "root";
$password = "";
$database = "scottflo";

$con = mysqli_connect("$host","$username","$password","$database");

if(!$con)
{
    // header('Location: ../errors/dberror.php');
    echo '<h1>Database Connection Failed</h1>';
    die();
}

?>
