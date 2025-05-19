<?php
$fields = $args['fields'];
?>
<div class="services_section" id="Service-Section">
    <div class="">
        <div class="row">
            <div class="col-12 col-md-6 col-lg-4 d-flex flex-column justify-content-start align-items-start"
                data-aos="fade-up" data-aos-offset="100" data-aos-delay="50" data-aos-duration="1000"
                data-aos-easing="ease-in-out">
                <h2 class="mb-4">
                    <?= $fields['title']; ?>
                </h2>
                <div class="regular">
                    <?= $fields['text']; ?>
                </div>
                <!-- List Repeater -->
                <?php if (!empty($fields['list'])): ?>
                    <div class="repeater-list mt-5 mb-5">
                        <?php foreach ($fields['list'] as $list_item): ?>
                            <div class="repeater-item   d-flex align-items-center gap-3">
                                <?php if (!empty($list_item['text'])): ?>
                                    <img src="<?= get_template_directory_uri(); ?>/images/ckeck.svg" alt="Arrow"
                                        class="dropdown-arrow">
                                    <p class=" regular mb-2"><?= $list_item['text']; ?></p>
                                <?php endif; ?>
                            </div>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>

                <?php if (!empty($fields['button'])): ?>
                    <a href="<?= esc_url($fields['button']['url']); ?>"
                        target="<?= esc_attr($fields['button']['target']); ?>" class="button secondary-button">
                        <?= esc_html($fields['button']['title']); ?>
                        <img src="<?= get_template_directory_uri(); ?>/images/vector.svg" alt="Arrow"
                            class="dropdown-arrow">
                    </a>
                <?php endif; ?>
            </div>

            <div class="col-12 col-md-6  col-lg-6 offset-lg-2">
                <!-- work list Repeater -->
                <?php if (!empty($fields['work_list'])): ?>
                    <div class="row repeater-list mt-5 mb-5">
                        <?php foreach ($fields['work_list'] as $list_item): ?>
                            <div class="repeater-item d-flex align-items-start justify-content-between w-100">
                                <?php if (!empty($list_item['number'])): ?>
                                    <p class="number typography mb-0"><?= $list_item['number']; ?></p>
                                <?php endif; ?>

                                <?php if (!empty($list_item['text'])): ?>
                                   <div>
                                     <h3 class="mb-2 text-hover-underline"><?= $list_item['text']; ?></h3>
                                   </div>
                                <?php endif; ?>
                            </div>
                            <hr class="divider mt-4">

                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>