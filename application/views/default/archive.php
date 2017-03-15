<div id="main" class="portofolio">
    <div class="breadcrumb clearfix">
        <span class="base">You are here</span>
        <p><a href="index.html">Home</a>&nbsp;&nbsp;&rarr;&nbsp;&nbsp;Portofolio 4 Columns</p>
    </div> <!-- End Breadcrumb -->

    <div class="margin-top40">
        <ul class="portofolio-filter">
            <li><a href="#" class="current active" data-filter="*">All</a></li>
            <li><a href="#" data-filter=".web-design">Web Design</a></li>
            <li><a href="#" data-filter=".typography">Typography</a></li>
            <li><a href="#" data-filter=".design-inspiration">Design Inspiration</a></li>
            <li><a href="#" data-filter=".wordpress">Wordpress</a></li>
        </ul> <!-- End Portofolio-Filter -->

        <div class="portofolio-items row">
            <?php foreach ($archive as $journal):?>
            <div class="span3 item web-design wordpress"> <!-- One -->
                <figure class="figure-overlay">
                    <a href="<?= base_url('accueil/detailjournal/'.$journal->idjournal)?>" title="View more detail about this project">
                        <img src="<?= base_url($journal->liencouverture)?>" alt="Thumbnail 1" />
                        <div><p>Gazety niseho ny <?= $journal->datepublication?></p></div>
                    </a>
                </figure>
                <p>Gazety niseho ny <?= $journal->datepublication?></p>
            </div>
            <?php endforeach;?>
        </div> <!-- End Portofolio-Items -->

    </div> <!-- End Margin-Top40 -->
</div> <!-- End Main -->