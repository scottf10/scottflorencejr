<?php
session_start();
include('admin/config/dbcon.php');

function base_url($slug){
    echo 'http://scottflorencejr.com/'.$slug;
    //echo 'http://localhost/scottflo/php-blog/'.$slug;
}
?>
