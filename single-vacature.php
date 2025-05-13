<?php
/*
Template Name: single vacature
*/
get_header();


$uren = get_the_terms(get_the_ID(), 'uren');
$salary = get_the_terms(get_the_ID(), 'salary');
$vakantiedagen = get_the_terms(get_the_ID(), 'vakantiedagen');
$pensioenregeling = get_the_terms(get_the_ID(), 'pensioenregeling');
$text = get_the_terms(get_the_ID(), 'text');
$buttons = get_the_terms(get_the_ID(), 'buttons');
$vacature_repeater = get_the_terms(get_the_ID(), 'vacature_repeater');

?>

<main class="vacatures">
    <div class="container">
        <div>
            <?php get_template_part("components/hero"); ?>
        </div>

        <div class="first-row">
            <div class="row g-3 ">
                <div class="col-6 col-lg-3 ">
                    <?php if ($salary): ?>
                        <?php foreach ($salary as $term): ?>
                            <div class="vacture-items mb-3 gap-2">
                                <span class="lead">
                                    <?= esc_html($term->name); ?>
                                </span>
                            </div>

                        <?php endforeach; ?>
                    <?php endif; ?>
                </div>

                <div class="col-6 col-lg-3">
                    <?php if ($uren): ?>
                        <?php foreach ($uren as $term): ?>
                            <div class="vacture-items mb-3 gap-2">
                                <span class="lead">
                                    <?= esc_html($term->name); ?>
                                </span>
                            </div>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </div>

                <div class="col-6 col-lg-3 ">
                    <?php if ($vakantiedagen): ?>
                        <?php foreach ($vakantiedagen as $term): ?>
                            <div class="vacture-items mb-3 gap-2">
                                <span class="lead">
                                    <?= esc_html($term->name); ?>
                                </span>
                            </div>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </div>

                <div class="col-6 col-lg-3 ">
                    <?php if ($pensioenregeling): ?>
                        <?php foreach ($pensioenregeling as $term): ?>
                            <div class="vacture-items mb-3 gap-2">
                                <span class="lead">
                                    <?= esc_html($term->name); ?>
                                </span>
                            </div>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>

        <div class="row second-row">
            <div class="col-lg-7 offset-lg-1">
                <div class="d-flex flex-column gap-3">
                    <span class="regular">
                        <?= get_field("text"); ?>
                    </span>

                    <!-- Buttons on just repeater  -->
                    <div class="d-flex flex-row gap-3 mt-4">
                        <?php if (have_rows('buttons')): ?>
                            <?php while (have_rows('buttons')):
                                the_row();
                                $button = get_sub_field('button');
                                $button_style = get_sub_field('button_style');

                                // Convert ACF value to custom CSS class
                                $custom_class = '';
                                if ($button_style === 'btn-primary') {
                                    $custom_class = 'secondary-button';
                                } elseif ($button_style === 'btn-outline-primary') {
                                    $custom_class = 'primary-button';
                                }

                                if (!empty($button['url'])): ?>
                                    <a href="<?= esc_url($button['url']); ?>"
                                        target="<?= esc_attr($button['target'] ?: '_self'); ?>"
                                        class="button <?= esc_attr($custom_class); ?>">
                                        <?= esc_html($button['title']); ?>
                                        <img src="<?= get_template_directory_uri(); ?>/images/vector.svg" alt="Arrow"
                                            class="dropdown-arrow">
                                    </a>
                                <?php endif;
                            endwhile; ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
        <!-- Swiper -->

        <div class="row align-items-center vacature-block mb-5 third-row">
            <div class="col-lg-6 offset-1 ">
                <?php if (have_rows('vacature_repeater')): ?>
                    <?php while (have_rows('vacature_repeater')):
                        the_row(); ?>
                        <?php
                        $title = get_sub_field('title');
                        $text = get_sub_field('text');
                        $hasalist = get_sub_field('has_a_list');
                        $image = get_sub_field('image');
                        ?>
                        <?php if (!empty($title)): ?>
                            <h3 class=""><?= esc_html($title); ?></h3>
                        <?php endif; ?>
                        <?php if (!empty($text)): ?>
                            <div class="regular mb-5 mt-5"><?= esc_html($text); ?></div>
                        <?php endif; ?>
                        <?php if ($hasalist && have_rows('list')): ?>
                            <div>
                                <?php while (have_rows('list')):
                                    the_row(); ?>
                                    <?php $list_item = get_sub_field('text'); ?>
                                    <?php if (!empty($list_item)): ?>
                                        <div class="repeater-item  d-flex  align-items-center gap-2 w-100">
                                            <img src="<?= get_template_directory_uri(); ?>/images/ckeck.svg" alt="Arrow"
                                                class="dropdown-arrow">
                                            <p class=" regular mb-2"><?= esc_html($list_item); ?></p>
                                        </div>
                                    <?php endif; ?>
                                <?php endwhile; ?>
                            </div>
                        <?php endif; ?>
                        <?php if (have_rows('buttons')): ?>
                            <div class="d-flex flex-row gap-3 mt-5">
                                <?php while (have_rows('buttons')):
                                    the_row(); ?>
                                    <?php
                                    $button = get_sub_field('button');
                                    $button_style = get_sub_field('button_style');

                                    $custom_class = '';
                                    if ($button_style === 'btn-primary') {
                                        $custom_class = 'secondary-button';
                                    } elseif ($button_style === 'btn-outline-primary') {
                                        $custom_class = 'primary-button';
                                    }
                                    ?>
                                    <?php if (!empty($button['url'])): ?>
                                        <a href="<?= esc_url($button['url']); ?>" target="<?= esc_attr($button['target'] ?: '_self'); ?>"
                                            class="button <?= esc_attr($custom_class); ?>">
                                            <?= esc_html($button['title']); ?>
                                            <img src="<?= get_template_directory_uri(); ?>/images/vector.svg" alt="Arrow"
                                                class="dropdown-arrow">
                                        </a>
                                    <?php endif; ?>
                                <?php endwhile; ?>
                            </div>
                        <?php endif; ?>
                    <?php endwhile; ?>
                <?php endif; ?>
            </div>
            <div class="col-lg-4 offset-1">
                <?php if (have_rows('vacature_repeater')): ?>
                    <?php while (have_rows('vacature_repeater')):
                        the_row(); ?>
                        <div class="row">
                            <div class="">
                                <?php
                                $image = get_sub_field('image');
                                if (!empty($image)): ?>
                                    <img src="<?= esc_url($image['url']); ?>" alt="<?= esc_attr($image['alt']); ?>"
                                        class="vacature-img">
                                <?php endif; ?>
                            </div>
                        </div>
                    <?php endwhile; ?>
                <?php endif; ?>
            </div>
        </div>
        <!-- Service-section -->
        <div class="solliciteer-form col-12 col-lg-12 mt-5">
            <div class="d-flex flex-column contact-form form-1 position-relative">
                <h3>Meer weten of solliciteren?</h3>
                <?= do_shortcode('[gravityform id="3" title="false" description="false"   cssClass="form-1"]') ?>

            </div>
        </div>

    </div>
</main>

<?php get_footer(); ?>