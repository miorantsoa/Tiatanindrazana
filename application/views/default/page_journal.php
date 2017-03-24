<!doctype html>
<!--[if lt IE 7 ]> <html lang="en" class="ie6"> <![endif]-->
<!--[if IE 7 ]>    <html lang="en" class="ie7"> <![endif]-->
<!--[if IE 8 ]>    <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9 ]>    <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->
<head>
    <meta name="viewport" content="width = 1050, user-scalable = no" />
    <script type="text/javascript" src="<?= base_url('assets/default/js/')?>/jquery-1.8.3.min.js"></script>
    <script type="text/javascript" src="<?= base_url('assets/default/js/')?>/modernizr.2.5.3.min.js"></script>
    <script type="text/javascript" src="<?= base_url('assets/default/js/')?>/turn.js"></script>
    <script type="text/javascript" src="<?= base_url('assets/default/js/')?>/hash.js"></script>
</head>
<body>
    <div id="flipbook">
        <div class="hard"><img src="<?= base_url('assets/default/images/pages/1.jpg') ?>" alt=""> </div>
        <div class="hard"></div>
        <div><img src="<?= base_url('assets/default/images/pages/1.jpg') ?>" alt=""></div>
        <div><img src="<?= base_url('assets/default/images/pages/1.jpg') ?>" alt=""></div>
        <div><img src="<?= base_url('assets/default/images/pages/1.jpg') ?>" alt=""></div>
        <div><img src="<?= base_url('assets/default/images/pages/1.jpg') ?>" alt=""></div>
        <div class="hard"></div>
        <div class="hard"></div>
    </div>
    <script type="text/javascript">
        $("#flipbook").turn({
            autoCenter: true
        });
    </script>
</body>
</html>
