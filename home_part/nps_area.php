<?php
$npstoggle = ot_get_option('ceojuice_nps');

if ($npstoggle == "off") {
} else { ?>
<section id="netpromoter_area" class="netpromoter-score">
    <div class="container">
        <div class="row">
            <div class="col-md-1"></div>
            <div class="col-md-10">
                <h3>Net Promoter Score (NPS®)</h3>
                <p>Net Promoter Score (NPS®) has become the world standard for measuring customer satisfaction levels.
                    Rather than saying we have the "Best" service we use a 3rd party company to automate follow up
                    messages to our customers including getting feedback and tracking NPS®.</p>
                <p><small>Net Promoter, NPS, and Net Promoter Score are trademarks of Satmetrix Systems, Inc., Bain &
                        Company, and Fred Reichheld</small></p>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div id="netpromoter" class="nps">
                    <?php get_template_part('other_part/ceojuice-npscore/netpromoter_part'); ?>
                </div>
            </div>
        </div>
    </div>
</section>
<?php } ?>
