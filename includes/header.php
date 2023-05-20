<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <title>PHP Blog Website</title> -->

    <title><?php if(isset($page_title)) { echo "$page_title"; } else { echo "PHP Blog Website"; } ?></title>

    <meta name="description" content="<?php if(isset($meta_description)) { echo "$meta_description"; } ?>" />
    <meta name="keywords" content="<?php if(isset($meta_keywords)) { echo "$meta_keywords"; } ?>" />
    <meta name="author" content="Scott Florence Jr." />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <link rel="shortcut icon" type="image/png" href="assets/images/bar.png">
    <link rel="stylesheet" href="<?= base_url('assets/css/bootstrap5.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/custom.css') ?>">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Alegreya+Sans&display=swap" rel="stylesheet">
    <style>
body {
    font-size: 18px;
    line-height: 1.6;
}
</style>
</head>
<body>
