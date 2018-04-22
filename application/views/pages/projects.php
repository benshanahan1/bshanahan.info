            <div class="container">

                <?php
                    // load projects.xml and parse it
                    $url = "xml/projects.xml";
                    $contents = file_get_contents($url);
                    $contents = new SimpleXMLElement($contents);

                    foreach ($contents->category as $category) {
                ?>
                <div class="page-header">
                    <h2 style="font-weight:bold;"><?php echo $category["label"]; ?></h2>
                </div>
                <?php
                        foreach ($category->project as $project) {
                            $slug           = $project["slug"];
                            $slug_content   = $slug . "_content";
                            $title          = $project->title;
                            $thumbnail      = $project->thumbnail;
                            $brief          = $project->brief;
                            $description    = $project->description;
                            $link           = $project->link;
                ?>
                <div id="<?php echo $slug; ?>" class="page-content">
                    <div class="panel panel-default">
                        <div class="panel-heading" style="height: 50px;" onclick="toggle('#<?php echo $slug_content; ?>')">

                            <span class="col-md-1 hidden-xs hidden-sm" style="float: right;"><a href="?q=<?php echo $slug; ?>" title="Link me"><img src="images/icon/hyperlink.png" height="30px" width="30px" /></a></span>
                            
                            <span class="project-title"><?php echo $title ?></span>
                            
                            <span class="project-short-description hidden-xs hidden-sm">
                                <?php echo $brief; ?>
                            </span>
                            
                        </div>
                        <div id="<?php echo $slug_content; ?>" class="panel-body" style="display:none;">
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

                            <?php if ($link != "none") { ?>
                            <p style="text-align:center;">
                                <a href="<?php echo $link; ?>" target="_blank">[ view project ]</a>
                            </p>
                            <?php } ?>
                        </div>
                    </div>
                </div>
                <?php
                        }
                    }
                ?>

            </div>