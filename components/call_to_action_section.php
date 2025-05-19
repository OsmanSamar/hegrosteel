<?php
$fields = $args['fields'];
?>
<div class="call_to_action_section">
    <div class="">
        <div class="row">
            <div class="col-12 col-md-6 col-lg-6 col-xl-8 d-flex flex-column align-items-center justify-content-center  justify-content-lg-start align-items-lg-start mb-3 mb-lg-0"
                data-aos="fade-up" data-aos-offset="100" data-aos-delay="50" data-aos-duration="1000"
                data-aos-easing="ease-in-out">
                <div class="d-flex flex-column text-center text-lg-start   align-items-center justify-content-center justify-content-lg-between align-items-lg-start">
                        <h3><?= $fields['title']; ?></h3>
                        <div class="regular">
                            <?= $fields['text']; ?>
                        </div>
                </div>
            </div>
            <div
                class=" col-md-6 col-lg-5 offset-lg-1 col-xl-3 offset-xl-1 d-flex align-items-center justify-content-center">
                <?php if (!empty($fields['button'])): ?>
                    <a href="<?= esc_url($fields['button']['url']); ?>"
                        target="<?= esc_attr($fields['button']['target']); ?>" class="button custom-button">
                        <?= esc_html($fields['button']['title']); ?>
                        <img src="<?= get_template_directory_uri(); ?>/images/vector.svg" alt="Arrow"
                            class="dropdown-arrow">
                    </a>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>