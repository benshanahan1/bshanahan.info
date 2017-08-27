<!DOCTYPE html>

<!-- 

This site is coded in its entirety by Benjamin Shanahan (ben (at) bshanahan.info).
Please see http://bshanahan.info/humans.txt for more information. 

-->

<html>
    
    <head>

        <!-- jQuery hosted by Google -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>

        <!-- Twitter Bootstrap 3.3.5 -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
        <link href="styles/styles.css" rel="stylesheet">

        <title>Benjamin Shanahan | <?php echo $title; ?></title>

        <!-- Meta tags -->
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta charset="utf-8">
        <meta name="Author" content="Benjamin Shanahan">
        <?php if ($title == "About me") { ?>
        <meta name="Description" content="Hi, I'm Benjamin! I work in the BrainGate lab at Brown University, where I am a computer programmer, currently developing faster and smaller brain-computer interface systems.">
        <?php } else { ?>
        <meta name="Description" content="Benjamin Shanahan online portfolio; <?php echo $title; ?> page.">
        <?php } ?>
        
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

        <!-- Site navigation (hide this on xs sizing) -->
        <div class="row text-center hidden-xs" id="navigation">
            <?php if ($title == "About me") { ?>
                <a class="navlink" href="about-me"><strong>about me</strong></a>  |  
                <a class="navlink" href="projects">projects</a>  |  
            <?php } else { ?>
                <a class="navlink" href="about-me">about me</a>  |  
                <a class="navlink" href="projects"><strong>projects</strong></a>  |  
            <?php } ?>
            <!-- <a class="navlink" href="code">code</a> // -->
            <!-- <a class="navlink" href="artwork">artwork</a> // -->
            <a class="navlink" href="documents/ShanahanBenjaminCV.pdf" target="_blank">curriculum vitae</a>
        </div>

        <hr>

        <!-- Site content -->
        <div class="container">
