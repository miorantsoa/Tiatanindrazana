<!DOCTYPE html>
<head>
    <!-- Your Basic Site Informations -->
    <title><?= "Titre"?></title>
    <meta http-equiv="content-type" content="text/html;charset=utf-8" />
    <meta name="description" content="Enews is a news or magazine site template that built with very cool responsive template with clean design, fast load, seo friendly, beauty color and a slew of features." />
    <meta name="keywords" content="Site Template, News, Magazine, Portofolio, HTML, CSS, jQuery, Newsletter, PHP Contact, Subscription, Responsive, Marketing, Clean, SEO" />
    <meta name="author" content="Dots Theme" />

    <!-- Mobile Specific Meta -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <!-- Stylesheets -->
    <link rel="stylesheet" href="<?= base_url('assets/default/css/bootstrap.min.css')?>">
    <link rel="stylesheet" href="<<?= base_url('assets/default/css/bootstrap-responsive.min.css')?>">
    <link rel="stylesheet" href="<?= base_url('assets/default/css/flexslider.css')?>">
    <link rel="stylesheet" href="<?= base_url('assets/default/css/prettyPhoto.css')?>">
    <link rel="stylesheet" href="<?= base_url()?>/assets/default/css/style.css">
    <link rel="stylesheet" href="<?= base_url()?>/assets/default/css/color.css">
    <link href='https://fonts.googleapis.com/css?family=Oswald' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Bitter' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>

    <noscript><link rel="stylesheet" href="<?= base_url()?>/assets/default/css/no-js.css"></noscript> <!-- If JavaScript Disabled -->

    <!--[if lt IE 9]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <!-- Favicons -->
    <link rel="shortcut icon" href="<?= base_url()?>/assets/default/images/favicon.ico">
    <link rel="apple-touch-icon" href="<?= base_url()?>/assets/default/images/apple-touch-icon.png">
    <link rel="apple-touch-icon" sizes="72x72" href="<?= base_url()?>/assets/default/images/apple-touch-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="114x114" href="<?= base_url()?>/assets/default/images/apple-touch-icon-114x114.png">

    <!-- JavaScript -->
    <script type="text/javascript" src="<?= base_url()?>/assets/default/js/jquery-1.8.3.min.js"></script>
    <script type='text/javascript' src='<?= base_url()?>/assets/default/js/bootstrap.min.js'></script>
    <script type='text/javascript' src='<?= base_url()?>/assets/default/js/jquery.easing.js'></script>
    <script type='text/javascript' src='<?= base_url()?>/assets/default/js/jquery.flexslider-min.js'></script>
    <script type='text/javascript' src='<?= base_url()?>/assets/default/js/jflickrfeed.min.js'></script>
    <script type='text/javascript' src='<?= base_url()?>/assets/default/js/jquery.fitvids.min.js'></script>
    <script type='text/javascript' src='<?= base_url()?>/assets/default/js/jquery.lazyload.mini.js'></script>
    <script type='text/javascript' src='<?= base_url()?>/assets/default/js/jquery.prettyPhoto.js'></script>
    <script type='text/javascript' src='<?= base_url()?>/assets/default/js/jquery.placeholder.min.js'></script>
    <script type='text/javascript' src='<?= base_url()?>/assets/default/js/jquery.jticker.js'></script>
    <script type='text/javascript' src='<?= base_url()?>/assets/default/js/jquery.mobilemenu.js'></script>
    <script type='text/javascript' src='<?= base_url()?>/assets/default/js/jquery.isotope.min.js'></script>
    <script type='text/javascript' src='<?= base_url()?>/assets/default/js/jquery.hoverdir.js'></script>
    <script type='text/javascript' src='<?= base_url()?>/assets/default/js/modernizr.custom.js'></script>
    <script type="text/javascript" src="<?= base_url()?>/assets/default/js/main.js"></script>

</head>
<body>

<div id="top-navigation">
    <div class="container">

        <!-- Navigation -->
        <ul class="nav-menu pull-left">
            <li class="active"><a href="<?= base_url("accueilcontroller")?>">Fandraisana</a></li>
            <li><a href="#">Features</a>
                <div class="nav-sub-menu">
                    <ul class="container">
                        <li><a href="features_typography.html">Typography</a></li>
                        <li><a href="features_columns.html">Columns</a></li>
                        <li><a href="features_shortcodes.html">Shortcodes</a></li>
                        <li><a href="features_pricing.html">Pricing Table</a></li>
                        <li><a href="features_sitemap.html">Sitemap</a></li>
                    </ul>
                </div>
            </li>
            <li><a href="#">Blog</a>
                <div class="nav-sub-menu">
                    <ul class="container">
                        <li><a href="blog_posts.html">Archives</a></li>
                        <li><a href="blog_photos.html">Photos</a></li>
                        <li><a href="blog_videos.html">Videos</a></li>
                        <li><a href="blog_musics.html">Musics</a></li>
                        <li><a href="blog_reviews.html">Reviews</a></li>
                    </ul>
                </div>
            </li>
            <li><a href="#">Portofolio</a>
                <div class="nav-sub-menu">
                    <ul class="container">
                        <li><a href="portofolio.html">1 Column</a></li>
                        <li><a href="portofolio_2.html">2 Columns</a></li>
                        <li><a href="portofolio_3.html">3 Columns</a></li>
                        <li><a href="portofolio_4.html">4 Columns</a></li>
                        <li><a href="single_portofolio.html">Single Portofolio</a></li>
                        <li><a href="single_portofolio_2.html">Single Portofolio 2</a></li>
                    </ul>
                </div>
            </li>
            <li><a href="#">Pages</a>
                <div class="nav-sub-menu">
                    <ul class="container">
                        <li><a href="author.html">Author</a></li>
                        <li><a href="404.html">404 Page</a></li>
                        <li><a href="search.html">Search</a></li>
                        <li><a href="index.html">Homepage 1</a></li>
                        <li><a href="index_2.html">Homepage 2</a></li>
                        <li><a href="index_3.html">Homepage 3</a></li>
                        <li><a href="index_4.html">Homepage 4</a></li>
                    </ul>
                </div>
            </li>
            <li><a href="contact.html">Hitafa</a></li>
        </ul>

        <!-- Search Form -->
        <form name="form-search" method="post" action="search.html" class="form-search pull-right">
            <input type="text" name="search" placeholder="Search...." class="input-icon input-icon-search" />
        </form>

        <!-- Social Media -->
        <ul class="social pull-right">
            <li><a href="#" data-placement="bottom" data-original-title="Find us on LinkedIn"><img src="<?= base_url()?>/assets/default/images/social/infocus/linkedin-logo.png" alt="LinkedIn"></a></li>
            <li><a href="#" data-placement="bottom" data-original-title="Find us on Flickr"><img src="<?= base_url()?>/assets/default/images/social/infocus/flickr.png" alt="Flickr"></a></li>
            <li><a href="#" data-placement="bottom" data-original-title="Like us on Facebook"><img src="<?= base_url()?>/assets/default/images/social/infocus/facebook-logo.png" alt="Facebook"></a></li>
            <li><a href="#" data-placement="bottom" data-original-title="Follow on DeviantArt"><img src="<?= base_url()?>/assets/default/images/social/infocus/deviantart.png" alt="DeviantArt"></a></li>
            <li><a href="#" data-placement="bottom" data-original-title="Follow on Twitter"><img src="<?= base_url()?>/assets/default/images/social/infocus/twitter.png" alt="Twitter"></a></li>
            <li><a href="#" data-placement="bottom" data-original-title="Follow on Stumbleupon"><img src="<?= base_url()?>/assets/default/images/social/infocus/stumbleupon.png" alt="Stumbleupon"></a></li>
            <li><a href="#" data-placement="bottom" data-original-title="Call us via Skype"><img src="<?= base_url()?>/assets/default/images/social/infocus/skype.png" alt="Skype"></a></li>
        </ul>

    </div> <!-- End Container -->
</div> <!-- End Top-Navigation -->

<div class="container">
    <header id="header" class="clearfix">

        <!-- Logo -->
        <div class="logo">
            <a href="<?= base_url("accueilcontroller")?>"><img src="<?= base_url()?>/assets/default/images/banniere.jpg" alt="Tia Tanindrazana" /></a>
        </div>

        <!-- Ads
        <div class="ads pull-right">
            <img src="<?= base_url()?>/assets/default/images/ads/480x80.png" alt="Ads" />
        </div> -->

    </header> <!-- End Header -->

    <nav id="main-navigation" class="clearfix">
        <ul>
            <li><a href="blog_posts.html">Business</a></li>
            <li><a href="blog_posts.html">Technology <i class="arrow-main-nav"></i></a>
                <ul>
                    <li><a href="blog_posts.html">Smartphone</a></li>
                    <li><a href="blog_posts.html">Tablet</a></li>
                    <li><a href="blog_posts.html">Internet</a></li>
                    <li><a href="blog_posts.html">Software</a></li>
                    <li><a href="blog_posts.html">Hardware</a></li>
                    <li><a href="blog_posts.html">Laptop</a></li>
                    <li><a href="blog_posts.html">Hot News <i class="arrow-main-nav"></i></a>
                        <ul>
                            <li><a href="blog_posts.html">Windows 8</a></li>
                            <li><a href="blog_posts.html">Apple iPhone 5</a></li>
                            <li><a href="blog_posts.html">Microsoft Surface</a></li>
                            <li><a href="blog_posts.html">Nokia Lumia 920</a></li>
                        </ul>
                    </li>
                </ul>
            </li>
            <li><a href="blog_posts.html">Education</a></li>
            <li><a href="blog_posts.html">Entertainment</a></li>
            <li><a href="blog_photos.html">Photo <i class="arrow-main-nav"></i></a>
                <ul>
                    <li><a href="single_photo.html">Single Photo</a></li>
                </ul>
            </li>
            <li><a href="blog_videos.html">Video <i class="arrow-main-nav"></i></a>
                <ul>
                    <li><a href="single_video.html">Single Video</a></li>
                </ul>
            </li>
            <li><a href="blog_musics.html">Music <i class="arrow-main-nav"></i></a>
                <ul>
                    <li><a href="single_music.html">Single Music</a></li>
                </ul>
            </li>
            <li><a href="blog_reviews.html">Review <i class="arrow-main-nav"></i></a>
                <ul>
                    <li><a href="single_review.html">Single Review</a></li>
                </ul>
            </li>
        </ul>
    </nav> <!-- End Main-Navigation -->