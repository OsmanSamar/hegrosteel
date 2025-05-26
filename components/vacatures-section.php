<?php
$fields = $args['fields'];
$args = array(
    'post_type' => 'vacature',
    'posts_per_page' => -1,
      "order" => 'asc'
);
$vacatures = new WP_Query($args);

if ($vacatures->have_posts()): ?>

    <div class="vacatures-section">
        <div class="row">
            <div class="col-12 col-md-6 col-lg-4 d-flex flex-column justify-content-center align-items-start mb-5 mb-lg-0"
                data-aos="fade-up" data-aos-offset="100" data-aos-delay="50" data-aos-duration="1000"
                data-aos-easing="ease-in-out">
                <h2>
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
                                    <img src="<?= get_template_directory_uri(); ?>/images/ckeck.svg" alt="Arrow" class="dropdown-arrow">
                                    <p class=" regular mb-2"><?= $list_item['text']; ?></p>
                                <?php endif; ?>
                            </div>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>

                <?php if (!empty($fields['button'])): ?>
                    <a href="<?= esc_url($fields['button']['url']); ?>" target="<?= esc_attr($fields['button']['target']); ?>"
                        class="button secondary-button">
                        <?= esc_html($fields['button']['title']); ?>
                        <img src="<?= get_template_directory_uri(); ?>/images/vector.svg" alt="Arrow" class="dropdown-arrow">
                    </a>
                <?php endif; ?>
            </div>

            <div class="col-12 col-md-6 col-lg-6 offset-lg-2">
                <!-- vacatures list Repeater -->
                <?php
                $i = 1;
                while ($vacatures->have_posts()):
                    $vacatures->the_post();
                    // $salary = get_the_terms(get_the_ID(), 'salary');
                    $uren = get_the_terms(get_the_ID(), 'uren');
                    ?>
                    <a class="vacature-item" href="<?php the_permalink(); ?>">
                        <div class="repeater-list mt-4 mb-4">
                            <div class="repeater-item d-flex align-items-start justify-content-between w-100">
                                <?php if ($i): ?>
                                    <p class="number typography mb-0"><?= $i < 10 ? '0' . $i : $i ?></p>
                                <?php endif; ?>
                                <div class="d-flex flex-column ">
                                    <h3 class="mb-2 text-hover-underline"><?php the_title(); ?></h3>
                                    <div class="d-flex justify-content-end gap-3">
                                        <?php if ($uren): ?>
                                            <?php foreach ($uren as $term): ?>
                                                <div class="tag"><span class="lead">
                                                        <?= esc_html($term->name); ?></span>
                                                </div>

                                            <?php endforeach; ?>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr class="divider mt-3">
                    </a>
                    <?php
                    $i++;
                endwhile;
                ?>
            </div>
        </div>

    </div>
<?php endif;
wp_reset_postdata();
?>