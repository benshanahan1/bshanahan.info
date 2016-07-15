            <div class="container">

                <h2>Artwork and Photography</h2>
                <p>Below you can find some of the artwork and photography that I have created / taken over the past several years.</p>

                <div class="alert alert-info alert-dismissible fade in" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden=true>&times;</span>
                    </button>
                    Click on any gallery name to read more about it and view its gallery.
                </div>

                <?php
                    // load artwork.xml and parse it
                    $url = "xml/artwork.xml";
                    $contents = file_get_contents($url);
                    $contents = new SimpleXMLElement($contents);

                    foreach ($contents->category as $category) {
                ?>
                <div class="page-header">
                    <h3 style="font-weight:bold;"><?php echo $category["label"]; ?></h3>
                </div>
                <?php
                        foreach ($category->artwork as $artwork) {
                            $slug = $artwork["slug"];
                            $title = $artwork->title;
                            $thumbnail = $artwork->thumbnail;
                            $description = $artwork->description;
                            $link = $artwork->link;
                ?>
                <div class="page-content">
                    <div class="panel panel-default">
                        <div class="panel-heading" style="background:#ccc;" onclick="toggle('#<?php echo $slug; ?>')">
                            <span><?php echo $title ?></span>
                        </div>
                        <div id="<?php echo $slug; ?>" class="panel-body"> <!--style="display:none;">-->
                            <?php if($thumbnail != "none") { ?>
                            <div class="col-md-3 hidden-xs hidden-sm">
                                <img class="center-block img-thumbnail" src="<? echo $thumbnail; ?>" width="200px" height="200px">
                            </div>
                            <div class="col-md-9">
                            <?php } ?>
                                <p><?php echo $description; ?></p>
                            <?php if($thumbnail != "none") { ?>
                            </div>
                            <?php } ?>

                            <?php
                                if ($link != "none") {
                            ?>
                            <p style="text-align:center;">
                                <a href="<?php echo $link; ?>">[ view gallery ]</a>
                            </p>
                            <?php
                                }
                            ?>
                        </div>
                    </div>
                </div>
                <?php
                        }
                    }
                ?>

            </div>
