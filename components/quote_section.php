<?php
$fields = $args['fields'];
?>
<div class="quote_section">
    <div class="">
        <div class="row">
            <div class="col-12 col-md-12 col-lg-10 offset-lg-2 col-xl-8 offset-xl-2 d-flex flex-column justify-content-center align-items-center  mb-5">
            <div  id="smooth-wrapper">
              <div class="d-flex flex-column align-items-center ">
                  
                     <div  id="smooth-content">
                         <div class="content">
                        <h2><?= $fields['text']; ?></h2>
                    </div>
                     </div>
                  
                  <!-- Button -->
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
            </div>
            </div>
        </div>
    </div>
</div>