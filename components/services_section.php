<?php
$fields = $args['fields'];
?>
<div class="services_section">
    <div class="container">
        <div class="row">
            <div class="col-12 col-lg-4 d-flex flex-column justify-content-start align-items-center" data-aos="fade-up"
                data-aos-offset="100" data-aos-delay="50" data-aos-duration="1000" data-aos-easing="ease-in-out">
                <h1 >
                    <?= $fields['title']; ?>
                    TEST
                </h1>
                <h2>
                    <?= $fields['text']; ?>
                </h2>
                

                <!-- List Repeater -->

                <?php if (!empty($fields['list'])): ?>
                    <div class="repeater-list">
                        <?php foreach ($fields['list'] as $list_item): ?>
                            <div class="repeater-item mb-4">
                                <?php if (!empty($list_item['text'])): ?>
                                    <img src="<?= get_template_directory_uri(); ?>/images/ckeck.svg" alt="Arrow"
                                        class="dropdown-arrow">
                                    <p class="mb-2"><?= $list_item['text']; ?></p>
                                <?php endif; ?>


                            </div>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>

                <?php if (!empty($fields['button'])): ?>
                    <a href="<?= esc_url($fields['button']['url']); ?>"
                        target="<?= esc_attr($fields['button']['target']); ?>" class="button secondary-button">
                        <?= esc_html($fields['button']['title']); ?>
                    </a>
                <?php endif; ?>


             
            </div>

            <div class="col-12 col-lg-6 offset-lg-2">

            </div>
        </div>
    </div>
</div>