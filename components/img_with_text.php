<?php
$fields = $args['fields'];
?>
<div class="img_with_text">
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-6 col-lg-7  d-flex flex-column  mb-5" data-aos="fade-up" data-aos-offset="100"
                data-aos-delay="50" data-aos-duration="1000" data-aos-easing="ease-in-out">
                <img src="<?= esc_url($fields['image']['url']); ?>" alt="<?= esc_html($fields['image']['alt']); ?>"
                    class="img-text " />
            </div>
            <div
                class=" col-md-6 col-lg-3 offset-lg-1 col-xl-3 offset-xl-1 d-flex align-items-center justify-content-center">
                <div
                    class="d-flex flex-column flex-lg-row justify-content-between align-items-start align-items-lg-center">
                    <div class="content">
                        <h3><?= $fields['title']; ?></h3>
                        <div class="regular mb-4 mt-4">
                            <?= $fields['text']; ?>
                        </div>

                        <!-- Repeater -->
                        <?php if (!empty($fields['buttons'])): ?>
                            <?php foreach ($fields['buttons'] as $button_row):
                                $button = $button_row['button'];
                                $button_style = $button_row['button_style'];
                                ?>
                                <?php if (!empty($button['url'])): ?>
                                    <a href="<?= esc_url($button['url']); ?>"
                                        target="<?= esc_attr($button['target'] ?: '_self'); ?>"
                                        class="button primary-button <?= esc_attr($button_style); ?>">
                                        <!--   class="button primary-button <?= esc_attr($button_style); ?>" -->
                                        <?= esc_html($button['title']); ?>
                                        <img src="<?= get_template_directory_uri(); ?>/images/vector.svg" alt="Arrow"
                                            class="dropdown-arrow">
                                    </a>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>