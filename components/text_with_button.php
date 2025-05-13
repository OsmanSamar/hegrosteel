<?php
$fields = $args['fields'];
?>

<div class="text_with_button">
    <div class="container">
        <div class="row d-flex flex-wrap">

            <div class="col-12 col-md-6 col-lg-5 offset-lg-1 d-flex flex-column mb-5" data-aos="fade-up"
                data-aos-offset="100" data-aos-delay="50" data-aos-duration="1000" data-aos-easing="ease-in-out">
                <div class="regular mb-4 mt-4"><?= $fields['left_text']; ?></div>
            </div>

            <!-- Content Column -->
            <div class="col-md-6 col-lg-5  d-flex align-items-center justify-content-center mb-5">
                <div
                    class="d-flex flex-column flex-lg-row justify-content-between align-items-start align-items-lg-center">
                    <div class="content">

                        <div class="regular mb-5 mt-4"><?= $fields['right_text']; ?></div>
                        <div class="d-flex gap-3 ">

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
</div>