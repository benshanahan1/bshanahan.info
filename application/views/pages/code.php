            <div class="container">

                <h2>Open-Source Code Repository</h2>
                <p>Click on any project name to read more about it.</p>
                <p>Listed on here is code that I have written over the years in a variety of languages. It's all open-source, so if you're having trouble finding something or a particular program doesn't have the code version available, just shoot me an <a href="about-me" target="_blank">email</a> and I'll get back to you as soon as possible.</p>
                <p>You can also follow me on <a href="https://github.com/benshanahan1" target="_blank">GitHub</a>:</p>
                <p><iframe src="https://ghbtns.com/github-btn.html?user=benshanahan1&type=follow&count=true&size=large" frameborder="0" scrolling="0" width="280px" height="30px"></iframe></p>
                <p>Looking for my <a href="documents/ShanahanBenjaminResume.pdf" target="_blank">resume</a> instead?</p>
                
                <!-- <div class="alert alert-info alert-dismissible fade in" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden=true>&times;</span>
                    </button>
                    Click on any description to download the corresponding code.
                </div> -->

                <?php
                    // load code.xml and parse it
                    $url = "xml/code.xml";
                    $contents = file_get_contents($url);
                    $contents = new SimpleXMLElement($contents);

                    foreach ($contents->category as $category) {
                ?>
                <div class="page-header">
                    <h3 style="font-weight:bold;"><?php echo $category["label"]; ?></h3>
                </div>
                <?php
                        foreach ($category->code as $code) {
                            $slug = $code["slug"];
                            $title = $code->title;
                            $description = $code->description;
                            $link = $code->link;
                            $download_id = "download_".$slug;
                ?>
                <div class="page-content">
                    <div class="panel panel-default">
                        <div id="<?php echo $slug; ?>" class="panel-body" style="background:#ccc;" onclick="toggle('#<?php echo $download_id;?>')">
                            <?php echo $description; ?>
                        </div>
                        <div id="<?php echo $download_id; ?>" class="panel-footer" style="display:none;">
                            <div style="text-align:center;">
                                <kbd>[ <a href="<?php echo $link; ?>" style="color:#fff;" target="_blank">download <?php echo $title; ?></a> ]</kbd><br>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
                        }
                    }
                ?>

            </div>