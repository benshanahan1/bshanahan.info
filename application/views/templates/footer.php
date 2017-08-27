
        </div>

        <!-- Site navigation (show this on xs sizing) -->
        <div class="text-center visible-xs" id="navigation-footer">
            <a class="navlink" href="about-me">about me</a><br>
            <a class="navlink" href="projects">projects</a><br>
            <a class="navlink" href="documents/ShanahanBenjaminCV.pdf" target="_blank">curriculum vitae</a>
        </div>

        <!-- Page footer -->
        <div class="footer">
            <div class="container">
                <div style="padding-top:5px;padding-bottom:5px;">
                    <span class="hidden-xs">
                        Copyright &copy; <?php echo date("Y"); ?> Benjamin Shanahan
                    </span>
                    <span class="visible-xs hidden-sm">
                        Copyright &copy; <?php echo date("Y"); ?> B. Shanahan
                    </span>
                </div>

                <div style="padding-bottom:10px;text-align:center;">
                    <a href="https://soundcloud.com/bshanahan" alt="SoundCloud" class="imagelink" target="_blank">
                        <img src="images/icon/soundcloud.png" width="48px" height="48px">
                    </a>
                    <a href="https://play.spotify.com/user/benshanahan1" alt="Spotify" class="imagelink"  target="_blank">
                        <img src="images/icon/spotify.png" width="48px" height="48px">
                    </a>
                    <a href="https://github.com/benshanahan1" alt="Github" class="imagelink" target="_blank">
                        <img src="images/icon/github.png" width="48px" height="48px">
                    </a>
                </div>
            </div>
        </div>

    </body>

    <!-- Smooth scroll to location on page -->
    <?php
        /* For some reason, isset() does not return 0 when false,
           so we need to be explicit. */
        if (isset($_GET['q'])) {
            $do_scroll = 1;
        } else {
            $do_scroll = 0;
        }
        if ($do_scroll) {
            $q = $_GET['q'];
        } else {
            $q = "";
        }
    ?>
    <script type="text/javascript">
        $(document).ready(function() {
            if (<?php echo $do_scroll ?>) {
                var q = "<?php echo $q; ?>";
                if (q != "") {  // only continue if q is defined
                    var scrollTo = "#" + q;
                    var showMe   = scrollTo + "_content";
                    $(showMe).show('fast');
                    $("html, body").animate({scrollTop: $(scrollTo).offset().top}, 1000);
                }
            }
        });
    </script>

    <!-- Other JavaScript -->
    <!-- <script src="scripts/detectmobilebrowser.js"></script>  -->
    <script src="scripts/scripts.js"></script>

    <!-- Google fonts -->
    <!-- <link href='https://fonts.googleapis.com/css?family=Play|Nunito:300' rel='stylesheet' type='text/css'> -->
    <link href='https://fonts.googleapis.com/css?family=Open+Sans|Crimson+Text' rel='stylesheet' type='text/css'>

    <!-- Google analytics tracking code -->
    <?php include_once("analyticstracking.php"); ?>

</html>