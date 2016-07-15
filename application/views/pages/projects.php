            <div class="container">

                <h2>Projects</h2>
                <p>Listed here are a number of projects that I have finished or am currently still working on. If something catches your eye and you would like to hear more about it, please don't hesitate to <a href="about-me" target="_blank">contact me</a>!</p>
                <p>Looking for my <a href="documents/ShanahanBenjaminResume.pdf" target="_blank">resume</a> instead?</p>

                <div class="alert alert-info alert-dismissible fade in" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden=true>&times;</span>
                    </button>
                    Click on any project name to read more about it.
                </div>

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
                        <div class="panel-heading" style="background:#ccc;" onclick="toggle('#<?php echo $slug_content; ?>')">
                            <span><?php echo $title ?></span>
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