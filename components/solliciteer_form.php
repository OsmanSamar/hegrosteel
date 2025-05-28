<?php
$fields = $args['fields'];

?>
<!-- Solliciteer form -->
<div class="solliciteer-form col-12 col-lg-12" id="solliciteren"  data-aos="fade-up" data-aos-offset="120" data-aos-delay="50" data-aos-duration="70"
            data-aos-easing="ease-in-out">
    <div class="d-flex flex-column contact-form form-1 position-relative">
        <h3>Solliciteer direct op deze vacature</h3>
        <?= do_shortcode('[gravityform id="1" title="false" description="false"   cssClass="form-1"]') ?>

    </div>
</div>