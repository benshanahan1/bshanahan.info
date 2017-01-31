            <div class="container">

                <h2>Projects</h2>
                <p>Listed here are a number of projects that I have finished or am currently still working on. Click on any project to read more. If something catches your eye and you would like to learn more about it, please don't hesitate to <a href="about-me" target="_blank">contact me</a>!</p>

                <?php
                    // load projects.xml and parse it
                    $url = "xml/projects.xml";
                    $contents = file_get_contents($url);
                    $contents = new SimpleXMLElement($contents);

                    foreach ($contents->category as $category) {
                ?>
                <div class="page-header">
                    <h3 style="font-weight:bold;"><?php echo $category["label"]; ?></h3>
                </div>
                <?php
                        foreach ($category->project as $project) {
                            $slug = $project["slug"];
                            $slug_content = $slug . "_content";
                            $title = $project->title;
                            $thumbnail = $project->thumbnail;
                            $description = $project->description;
                            $link = $project->link;
                ?>
                <div id="<?php echo $slug; ?>" class="page-content">
                    <div class="panel panel-default">
                        <div class="panel-heading panel-style" style="height:50px;" onclick="toggle('#<?php echo $slug_content; ?>')">
                            <span style="float:left;"><?php echo $title ?></span>
                            <span class="col-md-1 hidden-xs hidden-sm" style="float:right;"><a href="?q=<?php echo $slug; ?>" title="Link me"><img src="images/icon/hyperlink.png" height="30px" width="30px" /></a></span>
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