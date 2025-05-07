<div class="row  mt-5 mb-5">

    <div class="col-12 col-lg-7 d-flex flex-column mb-4 ">
        <h2><?= get_field("title") ?></h2>
        <div class="regular mb-5 mt-4"><?= get_field("text") ?></div>

        <div class=" d-flex  flex-lg-row gap-3 flex-wrap">
            <?php
            $buttons = get_field('buttons');
            if (!empty($buttons)): ?>
                <?php foreach ($buttons as $button_row):
                    $button = $button_row['button'];
                    $button_style = $button_row['button_style'];

                    // Convert ACF value to custom CSS class
                    $custom_class = '';
                    if ($button_style === 'btn-primary') {
                        $custom_class = 'secondary-button';
                    } elseif ($button_style === 'btn-outline-primary') {
                        $custom_class = 'primary-button';
                    }

                    if (!empty($button['url'])):
                        ?>
                        <a href="<?= esc_url($button['url']); ?>" target="<?= esc_attr($button['target'] ?: '_self'); ?>"
                            class="button <?= esc_attr($custom_class); ?>">
                            <?= esc_html($button['title']); ?>
                            <img src="<?= get_template_directory_uri(); ?>/images/vector.svg" alt="Arrow" class="dropdown-arrow">
                        </a>
                    <?php endif; endforeach; ?>
            <?php endif; ?>
        </div>

    </div>


    <div class="col-12 col-lg-4  offset-lg-1">

        <div class="shared-content  top-right-shape  position-relative">
            <h3> <?= get_field("left_title") ?></h3>
            <class class="regular mb-5 mt-4"> <?= get_field("left_text") ?></class>
            <div class="bel-of-app-container">
                <a href="https://wa.me/<?= get_field('whatsappnumber', 'option') ?>" class="d-flex align-items-center justify-content-between w-100">
                        <span class="bold">Bel of app Hermen</span>
                        <img src="<?= get_template_directory_uri() ?>/images/whatsapp.svg" alt="Open whatsapp" class="whatsappimg" />
                </a>
            </div>
        </div>
    </div>
</div>