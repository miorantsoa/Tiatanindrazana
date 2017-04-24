</div><!-- end container-->
<div id="footer">
    <div class="container">
        <p class="pull-left">Copyright 2010 - <?= date('Y')?> Tia Tanindrazana</p
    </div> <!-- End Container -->
</div> <!-- End Footer -->

<a href="#" class="scrollup" title="Hiverina miakatra!">Scroll</a>
<div id="fb-root"></div>
<script>
    (function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = "//connect.facebook.net/fr_FR/sdk.js#xfbml=1&version=v2.8";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));
    $(document).ready(function(){
        var error = "<?=$this->session->flashdata('erreur')?>";
        if (error) {
            $("#dialog").modal();
            console.log(error);
        }
        $("input[type=file]").filestyle({
            image: "<?= base_url('assets/default/images/import.png')?>",
            imageheight : 22,
            imagewidth : 82,
            width : 250
        });
    });
</script>
<noscript><link rel="stylesheet" href="<?= base_url()?>/assets/default/css/no-js.css"></noscript> <!-- If JavaScript Disabled -->
<!--[if lt IE 9]>
<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->
<script src="<?= base_url('assets/admin/js/jquery.datetimepicker.full.js')?>"></script>
<script type='text/javascript' src='<?= base_url('assets/default/js/jquery.modal.min.js')?>'></script>
<script type='text/javascript' src='<?= base_url('assets/default/js/bootstrap.min.js')?>'></script>
<script type='text/javascript' src='<?= base_url()?>/assets/default/js/jquery.easing.js'></script>
<script type='text/javascript' src='<?= base_url()?>/assets/default/js/jquery.flexslider-min.js'></script>
<script type='text/javascript' src='<?= base_url()?>/assets/default/js/jquery.fitvids.min.js'></script>
<script type='text/javascript' src='<?= base_url()?>/assets/default/js/jquery.lazyload.mini.js'></script>
<script type='text/javascript' src='<?= base_url()?>/assets/default/js/jquery.prettyPhoto.js'></script>
<script type='text/javascript' src='<?= base_url()?>/assets/default/js/jquery.placeholder.min.js'></script>
<script type='text/javascript' src='<?= base_url()?>/assets/default/js/jquery.jticker.js' ></script>
<script type='text/javascript' src='<?= base_url()?>/assets/default/js/jquery.mobilemenu.js' ></script>
<script type='text/javascript' src='<?= base_url()?>/assets/default/js/jquery.isotope.min.js' ></script>
<script type='text/javascript' src='<?= base_url()?>/assets/default/js/jquery.hoverdir.js'  ></script>
<script type='text/javascript' src='<?= base_url()?>/assets/default/js/modernizr.custom.js' ></script>
<script type="text/javascript" src="<?= base_url()?>/assets/default/js/main.js" ></script>
<script src="<?= base_url('assets/default/js/jquery.filestyle.min.js')?>" type="text/javascript" ></script>
</body>