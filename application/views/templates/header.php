<!DOCTYPE html>
<html>
    
    <head>

        <!-- jQuery hosted by Google -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
        <!-- <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/themes/smoothness/jquery-ui.css"> -->
        <!-- <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script> -->

        <!-- Twitter Bootstrap 3.3.5 -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
        <link href="styles/styles.css" rel="stylesheet">

        <title><?php echo $title; ?></title>

        <!-- Meta tags -->
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta charset="utf-8">
        <meta name="Author" content="Benjamin Shanahan">
        <meta name="Description" content="Benjamin Shanahan online portfolio website; <?php echo $title; ?> page.">
        
        <!-- Humans.txt -->
        <link rel="author" href="humans.txt" />

        <!-- Favicon -->
        <link rel="shortcut icon" href="images/favicon.png" type="image/png">

    </head>

    <?php
        // Load PHP helper functions.
        require_once("functions.php");
    ?>

    <body>
        
        <!-- Page header -->
        <span class="hidden-xs"><br></span>
        <img src="images/header.png" class="img-responsive center-block" alt="Benjamin Shanahan">

        <!-- Site navigation -->
        <div class="row text-center" id="navigation">
            <a class="navlink" href="about-me">about me</a>
            <span class="hidden-xs">//</span><span class="visible-xs"><br></span>
            <a class="navlink" href="projects">projects</a>
            <span class="hidden-xs">//</span><span class="visible-xs"><br></span>
            <a class="navlink" href="code">code</a>
            <span class="hidden-xs">//</span><span class="visible-xs"><br></span>
            <a class="navlink" href="artwork">artwork</a>
            <span class="hidden-xs">//</span><span class="visible-xs"><br></span>
            <a class="navlink" href="http://www.soundcloud.com/bshanahan/" target="_blank">music</a>
        </div>

        <hr>

        <!-- Site content -->
        <div class="container">
