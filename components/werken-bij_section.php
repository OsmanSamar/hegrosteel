<?php
$fields = $args['fields'];
?>
<div class="werken-bij_section">
    <div class="row">
        <div class="col-12 col-md-6 col-lg-5 offset-lg-1  mb-4 mb-lg-0" data-aos="fade-up" data-aos-offset="120"
            data-aos-delay="50" data-aos-duration="70" data-aos-easing="ease-in-out">
            <!-- Used Group -->
            <div class="shared-content right-bottom-shape">
                <a href="<?= esc_url($fields['blok_1']['link']['url']); ?>">
                    <div class="lead "><?= $fields['blok_1']['sub_title']; ?></div>
                    <h3 style="font-family: Funnel Display"><?= $fields['blok_1']['title']; ?></h3>
                    <div class="lead"><?= $fields['blok_1']['text']; ?></div>

                    <img loading="lazy" src="<?= get_template_directory_uri(); ?>/images/white-arrow.svg" alt="Arrow"
                        class="werk-bij-arrow red-arrow">
                </a>
            </div>
        </div>

        <div class="col-lg-5 col-md-6 mt-auto" data-aos="fade-up" data-aos-offset="120" data-aos-delay="50"
            data-aos-duration="70" data-aos-easing="ease-in-out">
            <div class="shared-content  left-bottom-shape  position-relative">
                <a href="<?= esc_url($fields['blok_2']['link']['url']); ?>">
                    <div class="lead  "><?= $fields['blok_2']['sub_title']; ?></div>
                    <h3 style="font-family: Funnel Display"><?= $fields['blok_2']['title']; ?></h3>
                    <div class="lead"><?= $fields['blok_2']['text']; ?></div>
                    <img loading="lazy" src="<?= get_template_directory_uri(); ?>/images/white-arrow.svg" alt="Arrow"
                        class="werk-bij-arrow white-arrow">
                </a>
            </div>
        </div>


        <div class="row">
            <div class="col-lg-5 offset-lg-6 col-xl-4 col-md-6 offset-md-6 mt-4" data-aos="fade-up"
                data-aos-offset="120" data-aos-delay="50" data-aos-duration="70" data-aos-easing="ease-in-out">
                <div class="shared-content  left-top-shape">
                    <a href="<?= esc_url($fields['blok_3']['link']['url']); ?>">
                        <div class="lead back-text"><?= $fields['blok_3']['sub_title']; ?></div>
                        <h3 class="back-text" style="font-family: Funnel Display"><?= $fields['blok_3']['title']; ?>
                        </h3>
                        <div class="lead"><?= $fields['blok_3']['text']; ?></div>
                        <img loading="lazy" src="<?= get_template_directory_uri(); ?>/images/white-arrow.svg"
                            alt="Arrow" class="werk-bij-arrow black-arrow">
                    </a>
                </div>
            </div>
        </div>


    </div>

</div>