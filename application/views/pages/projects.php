            <div class="container">

                <h2>Projects</h2>
                <p>Here are a number of the projects that I have finished or am currently working on. If something catches your eye and you would like to hear more about it, please don't hesitate to <a href="about" target="_blank">contact me</a>!</p>

                <div class="alert alert-warning alert-dismissible fade in" role="alert">
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
                            $title = $project->title;
                            $description = $project->description;
                            $link = $project->link;
                ?>
                <div class="page-content">
                    <div class="panel panel-default">
                        <div class="panel-heading" style="background:#ccc;" onclick="toggle('#<?php echo $slug; ?>')">
                            <span><?php echo $title ?></span>
                        </div>
                        <div id="<?php echo $slug; ?>" class="panel-body" style="display:none;">
                            <p><?php echo $description; ?></p>
                            <?php
                                if ($link != "none") {
                            ?>
                            <p style="text-align:center;">
                                <a href="<?php echo $link; ?>" target="_blank">[ view project ]</a>
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