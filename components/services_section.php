<?php
$fields = $args['fields'];
?>
<div class="services_section" id="Service-Section">

    <div class="row">
        <div class="col-12 col-md-6 col-lg-4 d-flex flex-column justify-content-start align-items-stretch  mb-lg-0 "
            data-aos="fade-up" data-aos-offset="120" data-aos-delay="50" data-aos-duration="70"
            data-aos-easing="ease-in-out">
            <!-- mb-4 -->
            <div class="mt-5 mb-5">
                <h2 class="mb-5">
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
                                    <img loading="lazy" src="<?= get_template_directory_uri(); ?>/images/ckeck.svg" alt="Arrow"
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
                        <img loading="lazy" src="<?= get_template_directory_uri(); ?>/images/vector.svg" alt="Arrow"
                            class="dropdown-arrow">
                    </a>
                <?php endif; ?>
            </div>
        </div>

        <div class="col-12 col-md-6 col-lg-6 offset-lg-2" data-aos="fade-up" data-aos-offset="120" data-aos-delay="50"
            data-aos-duration="70" data-aos-easing="ease-in-out">
            <!-- work list Repeater -->
            <?php if (!empty($fields['work_list'])): ?>
                <div class="repeater-list mt-5 mb-5">
                    <?php foreach ($fields['work_list'] as $list_item): ?>
                        <div class="vacature-item repeater-item d-flex align-items-start justify-content-between w-100">
                            <?php if (!empty($list_item['number'])): ?>
                                <p class="number typography mb-0"><?= $list_item['number']; ?></p>
                            <?php endif; ?>

                            <?php if (!empty($list_item['text'])): ?>
                                <?php
                                // Define the correct links for each title
                                $links = [
                                    'Dak & wand' => '/diensten#dak-wand',
                                    'Prefab beton' => '/diensten#prefabbeton',
                                    'Woningbouw' => '/diensten#woningbouw',
                                    'Utiliteitsbouw' => '/diensten#utiliteitsbouw',
                                ];

                                $link = $links[$list_item['text']] ?? '#'; // Fallback to '#' if no match
                                ?>

                                <div>
                                    <a href="<?= $link; ?>">
                                        <h3 class="mb-4 text-hover-underline">
                                            <?= $list_item['text']; ?>
                                        </h3>
                                    </a>
                                </div>

                            <?php endif; ?>
                        </div>

                        <hr class="divider  ">
                        <!-- mt-4 -->
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
        </div>


    </div>

</div>