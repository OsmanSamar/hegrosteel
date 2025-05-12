<?php
$fields = $args['fields'];
$textOnLeft = !empty($fields['text_on_left']); 
?>

<div class="text">
    <div class="">
        <div class="row  mt-5 mb-5">
            <div class="col-12 <?= $textOnLeft ? 'col-lg-7 order-1' : 'col-lg-6 order-2 offset-lg-1'; ?> d-flex flex-column mb-4">
                   <h2><?= $fields['title']; ?></h2>
                    <div class="regular mb-5 mt-4"><?= $fields['text']; ?></div>
                    <div class="d-flex  flex-lg-row gap-3 flex-wrap mt-4">
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

            <div class="col-12 col-lg-4 <?= $textOnLeft ? 'order-2 offset-lg-1' : 'order-1'; ?>">

                <div class="shared-content  top-right-shape  position-relative">
                    <h3> <?= $fields['left_title']; ?></h3>
                    <class class="regular mb-5 mt-4"> <?= $fields['left_text'];?></class>
                    <div class="bel-of-app-container">
                        <a href="https://wa.me/<?= get_field('whatsappnumber', 'option') ?>"
                            class="d-flex align-items-center justify-content-between w-100">
                            <span class="bold">
                            <?= $fields['bel_of_app'];?>
                        </span>
                       
                           <span  class="whatsapp-container">
                           <img src="<?= get_template_directory_uri() ?>/images/whatsapp.svg" alt="Open whatsapp"
                           class="whatsappimg" />
                           </span>
                        </a>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>