<?php

/* PHP helper functions. */

// Return HTML code for image gallery using specified directory of images.
// Note: include trailing slash when passing in image directory to function.
function create_gallery($dir) {
    echo '<div class="row">';

    $num_files = glob($dir . "*.{JPG,jpg,gif,png,bmp}", GLOB_BRACE);
    $folder = opendir($dir);
    if ($num_files > 0) {
        while(false !== ($file = readdir($folder))) {
            $fullpath = $dir . $file;
            $fullpath_thumb = $dir . 'thumbnails/' . $file;
            $extension = strtolower(pathinfo($file, PATHINFO_EXTENSION));
            if($extension == 'jpg' || $extension == 'png' || $extension == 'gif' || $extension == 'bmp') {
                // insert thumbnail image as link which when clicked opens lightbox to full size version
                echo '<div class="hidden-xs col-sm-6 col-md-4 col-lg-3">';
                echo '<a class="thumbnail" rel="lightbox[group]" href="' . $fullpath . '">';
                echo '<img src="' . $fullpath_thumb . '" class="img-responsive group1"></a></div>';

                // disable lightbox on mobile
                echo '<div class="text-center col-xs-12 hidden-sm hidden-md hidden-lg hidden-xl">';
                echo '<a class="thumbnail" href="' . $fullpath . '">';
                echo '<img src="' . $fullpath_thumb . '" class="img-responsive"></a></div>';
            }
        }
    } else {
        return "<div><em>ERROR:</em> <span style='font-style:italic;'>No files found in specified folder, gallery not generated.</span></div>";
    }
    closedir($folder);

    echo '</div>';
}