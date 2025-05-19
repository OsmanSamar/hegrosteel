<?php
$fields = $args['fields'];
?>
<div class="werken-bij_section">
    <div class="">
        <div class="row">
            <div class="col-12 col-md-6 col-lg-5 offset-lg-1  d-flex flex-column justify-content-start align-items-start mb-5"
                data-aos="fade-up" data-aos-offset="100" data-aos-delay="50" data-aos-duration="1000"
                data-aos-easing="ease-in-out">
                <div class="d-flex flex-column flex-lg-row  align-items-center ">
                    <!-- Used Group -->
                    <div class="shared-content right-bottom-shape">

                        <a href="<?= esc_url($fields['blok_1']['link']['url']); ?>">
                            <div class="lead "><?= $fields['blok_1']['sub_title']; ?></div>
                            <h3 style="font-family: Funnel Display" ><?= $fields['blok_1']['title']; ?></h3>
                            <div class="lead"><?= $fields['blok_1']['text']; ?></div>

                            <img src="<?= get_template_directory_uri(); ?>/images/white-arrow.svg" alt="Arrow"
                                class="werk-bij-arrow red-arrow">
                        </a>
                    </div>
                </div>
            </div>

            <div class="col-lg-6 col-md-6">
                <div class="row mb-4">
                    <div class="col-lg-10">
                        <div class="shared-content  left-bottom-shape  position-relative">
                            <a href="<?= esc_url($fields['blok_2']['link']['url']); ?>">
                                <div class="lead  "><?= $fields['blok_2']['sub_title']; ?></div>
                                <h3 style="font-family: Funnel Display"><?= $fields['blok_2']['title']; ?></h3>
                                <div class="lead"><?= $fields['blok_2']['text']; ?></div>
                                <img src="<?= get_template_directory_uri(); ?>/images/white-arrow.svg" alt="Arrow"
                                    class="werk-bij-arrow white-arrow">
                            </a>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-8 col-md-11">
                        <div class="shared-content  left-top-shape">
                            <a href="<?= esc_url($fields['blok_3']['link']['url']); ?>">
                                <div class="lead back-text"><?= $fields['blok_3']['sub_title']; ?></div>
                                <h3 class="back-text" style="font-family: Funnel Display"><?= $fields['blok_3']['title']; ?></h3>
                                <div class="lead"><?= $fields['blok_3']['text']; ?></div>
                                <img src="<?= get_template_directory_uri(); ?>/images/white-arrow.svg" alt="Arrow"
                                    class="werk-bij-arrow black-arrow">
                            </a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>