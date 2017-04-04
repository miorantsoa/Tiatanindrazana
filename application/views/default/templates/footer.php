</div><!-- end container-->
<div id="footer">
    <div class="container">

        <p class="pull-left">Copyright 2010 - <?= date('Y')?> Tia Tanindrazana</p>
        <ul class="social pull-right">
            <li><a href="#" title="Youtube"><img src="<?= base_url()?>/assets/default/images/social/f0101/youtube.png" alt="Youtube" /></a></li>
            <li><a href="#" title="LinkedIn"><img src="<?= base_url()?>/assets/default/images/social/f0101/linkedin.png" alt="LinkedIn" /></a></li>
            <li><a href="#" title="Vimeo"><img src="<?= base_url()?>/assets/default/images/social/f0101/vimeo.png" alt="Vimeo" /></a></li>
            <li><a href="#" title="Tumblr"><img src="<?= base_url()?>/assets/default/images/social/f0101/tumblr.png" alt="Tumblr" /></a></li>
            <li><a href="#" title="Flickr"><img src="<?= base_url()?>/assets/default/images/social/f0101/flickr.png" alt="Flickr" /></a></li>
            <li><a href="#" title="DeviantArt"><img src="<?= base_url()?>/assets/default/images/social/f0101/deviantart.png" alt="DeviantArt" /></a></li>
            <li><a href="#" title="Delicious"><img src="<?= base_url()?>/assets/default/images/social/f0101/delicious.png" alt="Delicious" /></a></li>
            <li><a href="#" title="Facebook"><img src="<?= base_url()?>/assets/default/images/social/f0101/facebook.png" alt="Facebook" /></a></li>
            <li><a href="#" title="Twitter"><img src="<?= base_url()?>/assets/default/images/social/f0101/twitter.png" alt="Twitter" /></a></li>
        </ul>

    </div> <!-- End Container -->
</div> <!-- End Footer -->

<a href="#" class="scrollup" title="Hiverina miakatra!">Scroll</a>
<script>
    $(document).ready(function(){
        var error = "<?=$this->session->flashdata('erreur')?>";
        if (error) {
            $("#dialog").modal();
            console.log(error);
        }
    });
</script>
<script type='text/javascript' src='<?= base_url('assets/default/js/jquery.modal.min.js')?>'></script>
<script type='text/javascript' src='<?= base_url('assets/default/js/bootstrap.min.js')?>'></script>
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
</body>