<div class="row-fluid">
    <div id="main" class="span8 single single-post image-preloader">
        <div class="row-fluid">
            <div class="breadcrumb clearfix">
                <span class="base">Ato no misy anao</span>
                <p><a href="<?= base_url('accueil/info_utile')?>">Ilaiko</a>&nbsp;&nbsp;&rarr;&nbsp;&nbsp;<a href="<?= base_url('accueil/detail_info_utile/'.$info_utile->idbeinfo)?>" title="Vaovao rehetra ao amin'ny sokajy <?= $info_utile->libelle?>"><?= $info_utile->libelle ?></a>&nbsp;&nbsp;&rarr;&nbsp;&nbsp;<?= substr($info_utile->titre,0,50)." ..."?></p>
            </div> <!-- End Breadcrumb -->
            <figure class="head-section">
                <img src="<?php echo ($info_utile->lienphoto)? base_url($info_utile->lienphoto) : base_url('assets/default/images/content/full/4.jpg"')?>" alt="Image" />
                <div class="head-section-content">
                    <h1><?= $info_utile->titre?></h1>
                    <p class="meta">Modif. le <?= $info_utile->dernieremaj?>&nbsp;&nbsp;|&nbsp;&nbsp;<a href="blog_posts.html" title="Vaovao rehetra ao amin'ny sokajy <?= $info_utile->libelle?>"><?= $info_utile->libelle ?></a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href="#comments" title="View all comments">8 comments</a><a name="fb_share" type="box_count" share_url="http://www.example.com/page.html"></a></p>
                </div>
            </figure>

            <div class="content">
                <p><span class="dropcaps dropcaps-circle dropcaps-green"><?= strtoupper(substr($info_utile->contenue,0,1)) ?></span> <?= substr($info_utile->contenue,1)?></p>
                <?= $info_utile->contenue?>
            </div> <!-- End Content -->

            <div class="sep-border no-margin-bottom"></div> <!-- Separator -->

            <div class="related-posts">
                <h3>Mitovy sokajy</h3>
                <?php
                $count = 1;
                for($i = 0 ; $i<count($associe);$i++){
                    if($i<4){
                        ?>
                        <!-- One -->
                        <div class="<?= ($count == 1) ? "item span3 no-margin-left" : "item span3"?>">
                            <a href="<?= base_url('accueil/detail_info_utile/'.$associe[$i]->idbeinfo)?>">
                                <figure class="figure-hover">
                                    <img src="<?php echo ($associe[$i]->lienphoto) ? base_url($associe[$i]->lienphoto) : base_url('assets/default/images/content/300/4.jpg')?>" alt="Thumbnail 1" />
                                    <div class="figure-hover-masked">
                                        <p class="icon-plus"></p>
                                    </div>
                                </figure>
                            </a>
                            <p><?= $associe[$i]->titre?></p>
                        </div>
                        <?php
                        $count++;
                    }

                }?>

            </div> <!-- End Related-Posts -->

            <div class="sep-border"></div> <!-- Separator -->

            <div id="comments">

                <div class="comment-lists">
                    <h4>8 Comments To This Article</h4>

                    <ul>
                        <li> <!-- One -->
                            <figure><img src="<?= base_url()?>/assets/default/images/content/avatar/1.jpg" alt="Avatar 1" /></figure>
                            <div class="content">
                                <h5><a href="#">Amah Syner Holland</a></h5>
                                <p class="meta">on Sep 12th, 2012 at 3:05 PM - <strong><a href="#">Reply</a></strong></p>
                                <span class="comment-id">1</span>
                                <p class="text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum semper nulla vitae diam lobortis interdum varius arcu tincidunt. Quisque sed nisi vel lorem blandit pharetra.</p>
                            </div>
                        </li>
                        <li class="children"> <!-- Two -->
                            <figure><img src="<?= base_url()?>/assets/default/images/content/avatar/2.jpg" alt="Avatar 2" /></figure>
                            <div class="content">
                                <h5><a href="#">Mugiwara Kiwolen</a></h5>
                                <p class="meta">on Sep 12th, 2012 at 3:05 PM - <strong><a href="#">Reply</a></strong></p>
                                <span class="comment-id">2</span>
                                <p class="text">Vivamus mollis blandit elit, nec lobortis tellus laoreet id. Integer sodales, lorem eu pellentesque scelerisque, urna orci lobortis mauris, sed facilisis mi est eu enim.</p>
                            </div>

                            <ul>
                                <li class="children"> <!-- Three -->
                                    <figure><img src="<?= base_url()?>/assets/default/images/content/avatar/1.jpg" alt="Avatar 3" /></figure>
                                    <div class="content">
                                        <h5><a href="#">Amah Syner Holland</a></h5>
                                        <p class="meta">on Sep 12th, 2012 at 3:05 PM - <strong><a href="#">Reply</a></strong></p>
                                        <span class="comment-id">3</span>
                                        <p class="text">Aenean felis tellus, consequat nec hendrerit a, ornare quis arcu. Aenean imperdiet sem nec mauris bibendum tristique.</p>
                                    </div>

                                    <ul>
                                        <li> <!-- Four -->
                                            <figure><img src="<?= base_url()?>/assets/default/images/content/avatar/2.jpg" alt="Avatar 4" /></figure>
                                            <div class="content">
                                                <h5><a href="#">Mugiwara Kiwolen</a></h5>
                                                <p class="meta">on Sep 12th, 2012 at 3:05 PM</p>
                                                <span class="comment-id">4</span>
                                                <p class="text">Etiam eros erat, feugiat ac fringilla sed, ultricies sed tellus. Suspendisse nisi sem, rhoncus sit amet malesuada nec, placerat ut magna. Morbi gravida lacus massa, quis tincidunt nisi. Sed porttitor ullamcorper fringilla.</p>
                                            </div>
                                        </li>
                                        <li class="no-padding-bottom"> <!-- Five -->
                                            <figure><img src="<?= base_url()?>/assets/default/images/content/avatar/4.jpg" alt="Avatar 5" /></figure>
                                            <div class="content">
                                                <h5>Rendy Jagerjack</h5>
                                                <p class="meta">on Sep 12th, 2012 at 3:05 PM</p>
                                                <span class="comment-id">5</span>
                                                <p class="text">Etiam metus lectus, facilisis non imperdiet sit amet, fermentum vitae leo. Ut elit ante, euismod vel interdum non, bibendum eu risus. Etiam laoreet, metus id sodales sodales, ligula lectus sagittis ante, quis pretium dui est ut sem. Aenean sed lorem vitae turpis aliquam vehicula in quis dui.</p>
                                            </div>
                                        </li>
                                    </ul>

                                </li>
                                <li class="no-padding-bottom"> <!-- Six -->
                                    <figure><img src="<?= base_url()?>/assets/default/images/content/avatar/3.jpg" alt="Avatar 6" /></figure>
                                    <div class="content">
                                        <h5>John Donn</h5>
                                        <p class="meta">on Sep 12th, 2012 at 3:05 PM - <strong><a href="#">Reply</a></strong></p>
                                        <span class="comment-id">6</span>
                                        <p class="text">Etiam risus ligula, elementum et fringilla eget, porta id neque. Quisque tellus turpis, ultrices a aliquet at, pellentesque a nibh. Ut feugiat interdum dui, non lacinia nulla vestibulum a.</p>
                                    </div>
                                </li>
                            </ul>

                        </li>
                        <li> <!-- Seven -->
                            <figure><img src="<?= base_url()?>/assets/default/images/content/avatar/2.jpg" alt="Avatar 7" /></figure>
                            <div class="content">
                                <h5><a href="#">Mugiwara Kiwolen</a></h5>
                                <p class="meta">on Sep 12th, 2012 at 3:05 PM - <strong><a href="#">Reply</a></strong></p>
                                <span class="comment-id">7</span>
                                <p class="text">Praesent mattis mauris urna. Suspendisse vulputate, urna sit amet laoreet iaculis, magna urna porttitor justo, vel pretium sapien turpis nec turpis.</p>
                            </div>
                        </li>
                        <li> <!-- Eight -->
                            <figure><img src="<?= base_url()?>/assets/default/images/content/avatar/4.jpg" alt="Avatar 8" /></figure>
                            <div class="content">
                                <h5>Rendy Jagerjack</h5>
                                <p class="meta">on Sep 12th, 2012 at 3:05 PM - <strong><a href="#">Reply</a></strong></p>
                                <span class="comment-id">8</span>
                                <p class="text">Pellentesque sed eros sit amet eros congue dictum. Nullam fringilla adipiscing placerat. Mauris feugiat elit et nisi dapibus sodales. Aenean pulvinar odio non sapien tincidunt pellentesque. Donec ac elit ut mi suscipit mattis. In hac habitasse platea dictumst. Fusce nunc lectus, condimentum id interdum quis, ullamcorper posuere nulla.</p>
                            </div>
                        </li>
                    </ul>
                </div> <!-- End Comment-Lists -->

                <div class="form-comment">
                    <h4>Leave a Reply</h4>
                    <p>Your email address will not be published. Required fields are marked <span class="font-required">*</span></p>
                    <form method="post" action="#">
                        <label>Name <span class="font-required">*</span></label>
                        <input type="text" name="name" />
                        <label>Email <span class="font-required">*</span></label>
                        <input type="text" name="email" />
                        <label>Website</label>
                        <input type="text" name="webiste" />
                        <label>Message <span class="font-required">*</span></label>
                        <textarea name="message"></textarea>
                        <input type="submit" name="submit" value="Submit Comment" class="btn btn-blue" />
                    </form>
                </div> <!-- End Form-Comment -->
            </div> <!-- End Comments -->

        </div> <!-- End Row-Fluid -->
    </div> <!-- End Main -->
    <script src="http://static.ak.fbcdn.net/connect.php/js/FB.Share" type="text/javascript"></script>