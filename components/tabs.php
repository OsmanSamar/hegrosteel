<?php
$fields = $args['fields'];
?>
<?php if ($fields['tab']): ?>
    <div class="row">
        <div class="col-lg-12">
            <div class="tabs tab-right">
                <div class="row">
                    <div class="col-lg-12">
                        <nav class="tab-wrap d-flex flex-wrap">
                            <!-- Repeater inside Flexible content -->
                            <?php
                            foreach ($fields['tab'] as $i => $tab):
                                ;
                                $tab_title = $tab['tab_title'];
                                ?>
                                <div class="col-4 col-lg-4">
                                    <a href="#tab<?= $i; ?>" class="tab-link <?= $i == 0 ? 'active' : ''; ?>"
                                        data-tab="content<?= $i; ?>">
                                        <h4><?= $tab_title; ?></h4>
                                    </a>
                                </div>
                            <?php endforeach; ?>
                        </nav>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12">
                        <?php
                        foreach ($fields['tab'] as $i => $tab):
                            ?>
                            <div class="tab-content" <?= $i == 0 ? "" : 'style="display: none;"' ?> id="content<?= $i ?>">
                                <div class="row">
                                    <div class="col-lg-5 mb-4 mb-lg-0">
                                        <h3 class="mb-4"><?= $tab['title']; ?></h3>
                                        <div class="regular mb-4"><?= $tab['text']; ?></div>


                                        <?php if (!empty($tab['buttons'])): ?>
                                            <?php foreach ($tab['buttons'] as $button_row):
                                                $button = $button_row['button'];
                                                $button_style = $button_row['button_style'];

                                                // Convert ACF value to custom CSS class
                                                $custom_class = '';
                                                if ($button_style === 'btn-primary') {
                                                    $custom_class = 'secondary-button';
                                                } elseif ($button_style === 'outline-white-button') {
                                                    $custom_class = 'outline-white-button';
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
                                    <div class="col-lg-6 offset-lg-1">
                                        <div class="tabs-img">
                                            <img src="<?= $tab['image']['url'] ?>" alt="<?= $tab['image']['alt'] ?>" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>

                </div>
            </div>
        </div>
    </div>
<?php endif; ?>