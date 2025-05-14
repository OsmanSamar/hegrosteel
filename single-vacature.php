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

        <!-- Frst Section -->
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

        <!-- Second Section -->
        <div class="row second-row">
            <div class="col-lg-7 offset-lg-1 ">
                <div class="d-flex flex-column gap-3">
                    <!--  -->
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

        <!--Swiper  Test Code  -->
        <div class="container gallery">
            <div class="row align-items-center vacature-block mb-5 third-row">
                <!-- Left Column: Texts -->
                <div class="col-lg-6 left offset-1 d-flex flex-column gap-3">
                    <div class="detailsWrapper">
                        <?php if (have_rows('vacature_repeater')): ?>

                            <?php $index = 0; ?>

                            <?php while (have_rows('vacature_repeater')):
                                the_row(); ?>
                                <div class="details">
                                    <?php $title = get_sub_field('title'); ?>
                                    <?php $text = get_sub_field('text'); ?>
                                    <?php if ($title): ?>
                                        <h3 class="headline"><?= esc_html($title); ?></h3>
                                    <?php endif; ?>
                                    <?php if ($text): ?>
                                        <span class="regular mb- mt-"><?= esc_html($text); ?></span>
                                    <?php endif; ?>
                                </div>

                                <?php $index++; ?>

                            <?php endwhile; ?>
                        <?php endif; ?>
                    </div>
                </div>

                <!-- Right Column: Images -->
                <div class="right col-lg-4 offset-1 overflow-right">
                    <div class="photos">
                        <?php if (have_rows('vacature_repeater')): ?>

                            <?php $index = 0; ?>

                            <?php while (have_rows('vacature_repeater')):
                                the_row(); ?>
                                <div class="row">
                                    <div class="">
                                        <?php
                                        $image = get_sub_field('image');
                                        if (!empty($image)): ?>
                                            <div class="photo">
                                                <img src="<?= esc_url($image['url']); ?>" alt="<?= esc_attr($image['alt']); ?>" />
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                </div>

                                <?php $index++; ?>

                            <?php endwhile; ?>
                        <?php endif; ?>
                    </div>
                </div>
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