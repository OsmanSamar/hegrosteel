<?php
$fields = $args['fields'];
$imageOnLeft = !empty($fields['image_on_the_left']); 
$hasBackground = !empty($fields['has_background']); 
?>

<div class="img_with_text  <?= $hasBackground ? 'with-background' : ''; ?>">
    <div class="container">
        <div class="row d-flex flex-wrap">
            <!-- Image Column -->
            <div class="col-12 col-md-6 col-lg-6 d-flex flex-column mb-5 <?= $imageOnLeft ? 'order-1' : 'order-2'; ?>"
                data-aos="fade-up" data-aos-offset="100" data-aos-delay="50" data-aos-duration="1000" data-aos-easing="ease-in-out">
                <img src="<?= esc_url($fields['image']['url']); ?>" alt="<?= esc_html($fields['image']['alt']); ?>" class="img-text" />
            </div>

            <!-- Content Column -->
            <div class="col-md-6 col-lg-5 offset-lg-1 d-flex align-items-center justify-content-center mb-5 <?= $imageOnLeft ? 'order-2' : 'order-1'; ?>">
                <div class="d-flex flex-column flex-lg-row justify-content-between align-items-start align-items-lg-center">
                    <div class="content">
                        <h3><?= $fields['title']; ?></h3>
                        <div class="regular mb-4 mt-4"><?= $fields['text']; ?></div>

                        <?php if (!empty($fields['list'])): ?>
                            <div class="repeater-list mt-5 mb-5">
                                <?php foreach ($fields['list'] as $list_item): ?>
                                    <div class="repeater-item d-flex align-items-center gap-3">
                                        <img src="<?= get_template_directory_uri(); ?>/images/ckeck.svg" alt="Check" class="dropdown-arrow">
                                        <p class="regular mb-2"><?= $list_item['text']; ?></p>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        <?php endif; ?>

                        
                        <?php if (!empty($fields['buttons'])): ?>
                            <?php foreach ($fields['buttons'] as $button_row):
                                $button = $button_row['button'];
                                $button_style = $button_row['button_style'];

                                // Convert ACF value to custom CSS class
                                $custom_class = '';
                                if ($button_style === 'btn-primary') {
                                    $custom_class = 'secondary-button';
                                } elseif ($button_style === 'btn-outline-primary') {
                                    $custom_class = 'primary-button ';
                                }

                                if (!empty($button['url'])):
                                    ?>
                                    <a href="<?= esc_url($button['url']); ?>"
                                        target="<?= esc_attr($button['target'] ?: '_self'); ?>"
                                        class="button <?= esc_attr($custom_class); ?>">
                                        <?= esc_html($button['title']); ?>
                                        <img src="<?= get_template_directory_uri(); ?>/images/vector.svg" alt="Arrow"
                                            class="dropdown-arrow">
                                    </a>
                                <?php endif; endforeach; ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>