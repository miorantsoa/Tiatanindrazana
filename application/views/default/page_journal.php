<!doctype html>
<!--[if lt IE 7 ]> <html lang="en" class="ie6"> <![endif]-->
<!--[if IE 7 ]>    <html lang="en" class="ie7"> <![endif]-->
<!--[if IE 8 ]>    <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9 ]>    <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->
<head>
    <meta name="viewport" content="width = 1050, user-scalable = no" />
    <title><?= $titre?></title>
    <style>
        .zoom:after {
            content:'';
            display:block;
            width:33px;
            height:33px;
            position:absolute;
            top:0;
            right:0;
            background:url('<?= base_url('assets/default/images/icon.png')?>');
        }

        .zoom img {
            display: block;
        }

        .zoom img::selection { background-color: transparent; }
    </style>
    <script type="text/javascript" src="<?= base_url('assets/default/js/jquery-1.8.3.min.js')?>"></script>
    <script type="text/javascript" src="<?= base_url('assets/default/js/modernizr.2.5.3.min.js')?>"></script>
    <script type="text/javascript" src="<?= base_url('assets/default/js/zoom.js')?>"></script>
    <script type="text/javascript" src="<?= base_url('assets/default/js/jquery.zoom.min.js')?>"></script>
    <script>
        $(document).ready(function(){
            $('.el').zoom();
            $('#ex2').zoom({ on:'grab' });
            $('#ex3').zoom({ on:'click' });
            $('#ex4').zoom({ on:'toggle' });
        });
    </script>
</head>
<body>

<button></button>
<div class="flipbook-viewport">
    <div class="container">
        <div ignore="1" class="next-button"></div>
            <div class="flipbook">
                <?php foreach ($detail as $feuille):?>
                    <div style="background-image:url(<?= base_url($feuille->cheminmedia)?>)" class='zoom el'></div>
                <?php endforeach;?>
            </div>
        <div ignore="1" class="previous-button"></div>
    </div>
</div>
<script type="text/javascript">
        function loadApp() {

            // Create the flipbook

            $('.flipbook').turn({
                // Width

                width:922,

                // Height

                height:600,

                // Elevation

                elevation: 50,

                // Enable gradients

                gradients: true,

                // Auto center this flipbook

                autoCenter: false

            });
            $('.flipbook-viewport').zoom({
                flipbook: $('.flipbook')
            });

            //Binds the single tap event to the zoom function
            $('.flipbook-viewport').bind('zoom.tap', zoomTo);
            $(window).resize(function() {
                resizeViewport();
            }).bind('orientationchange', function() {
                resizeViewport();
            });

            //Must be called initially to setup the size
            resizeViewport();
        }
        function zoomTo(event) {
            setTimeout(function() {
                if ($('.flipbook-viewport').data().regionClicked) {
                    $('.flipbook-viewport').data().regionClicked = false;
                } else {
                    if ($('.flipbook-viewport').zoom('value')==1) {
                        $('.flipbook-viewport').zoom('zoomIn', event);
                    } else {
                        $('.flipbook-viewport').zoom('zoomOut');
                    }
                }
            }, 1);
        }

        function resizeViewport() {
            var width = $(window).width(),
                height = $(window).height(),
                options = $('.flipbook').turn('options');

            $('.flipbook-viewport').css({
                width: width,
                height: height
            }).zoom('resize');
        }
        // Load the HTML4 version if there's not CSS transform

        yepnope({
            test : Modernizr.csstransforms,
            yep: ['<?= base_url('assets/default/js/turn.js')?>'],
            nope: ['<?= base_url('assets/default/js/turn.html4.min.js')?>'],
            both: ['<?= base_url('assets/default/js/zoom.js')?>', '<?= base_url('assets/default/css/basic.css')?>'],
            complete: loadApp
        });
    </script>
</body>
</html>
