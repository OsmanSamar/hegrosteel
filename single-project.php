<?php
/*
Template Name: single project
*/
get_header();



$images_swiper = get_the_terms(get_the_ID(), 'images_swiper');
$categories = get_the_terms(get_the_ID(), 'project_category');
$plaats = get_the_terms(get_the_ID(), 'plaats');
$ontwerp = get_the_terms(get_the_ID(), 'ontwerp');
$opdrachtgever = get_the_terms(get_the_ID(), 'opdrachtgever');

?>

<main class="single-project">
    <div class="container">
        <div>
            <?php get_template_part("components/hero"); ?>
        </div>

        <!-- First section -->
        <div class="first-section">
            <div class="row">
                <div class="col-lg-7 d-flex flex-column justify-content-start align-items-start gap-3 mb-5 mb-lg-0"
                    data-aos="fade-up" data-aos-offset="120" data-aos-delay="50" data-aos-duration="70"
                    data-aos-easing="ease-in-out">
                    <?php if ($categories): ?>
                        <?php foreach ($categories as $term): ?>
                            <div class="project-items mb-3 gap-2">
                                <span class="lead ">
                                    <?= esc_html($term->name); ?>
                                </span>
                            </div>
                        <?php endforeach; ?>
                    <?php endif; ?>

                    <h3 class="mb-3 mt-3"><?= get_field("title") ?></h3>
                    <span class="regular"> <?= get_field("text") ?></span>

                    <!-- Buttons -->
                    <div class="mt-4">
                        <!-- Hard Code -->
                         <a type="button" class="button secondary-button" href="<?= esc_url(get_permalink(get_page_by_path('projecten'))) ?>">
                            Soortgelijk project?
                            <img loading="lazy" src="<?= get_template_directory_uri(); ?>/images/vector.svg" alt="Arrow"
                                class="dropdown-arrow">
                        </a>
                    </div>
                </div>


                <div class="col-lg-4 offset-lg-1" data-aos="fade-up" data-aos-offset="120" data-aos-delay="50"
                    data-aos-duration="70" data-aos-easing="ease-in-out">
                    <div class="right-section  right-bottom-border position-relative" style="padding: 50px;">
                        <h4>
                            Ontwerp
                        </h4>
                        <div class=" mb-3 gap-2">
                            <span class="regular">
                                <?= get_field("ontwerp_title")?>
                            </span>
                        </div>
                        <h4>Opdrachtgever</h4>
                        <div class=" mb-3 gap-2">
                            <span class="regular ">
                                <?= get_field("opdrachtgever")?>
                            </span>
                        </div>
                        <h4>Plaats</h4>
                        <?php if ($plaats): ?>
                            <?php foreach ($plaats as $term): ?>
                                <div class=" mb-3 gap-2">
                                    <span class="regular">
                                        <?= esc_html($term->name); ?>
                                    </span>
                                </div>
                            <?php endforeach; ?>
                        <?php endif; ?>
                        <h4>Delen</h4>
                        <div class="d-flex align-items-center gap-2 mt-2">
                            <a href="https://www.linkedin.com/shareArticle?mini=true&url=<?= get_permalink() ?>">
                                <img loading="lazy" src="<?= get_template_directory_uri() ?>/images/linkedinicon.svg"
                                    alt="Instagram-logo" class="share-icon" />
                            </a>
                            <a href="https://www.facebook.com/sharer/sharer.php?u=<?= get_permalink() ?>">
                                <img loading="lazy" src="<?= get_template_directory_uri() ?>/images/facebook-icon.svg"
                                    alt="Instagram-logo" class="share-icon" />
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Image swiper -->
       
        <?php if (have_rows('images_swiper')): ?>
        <div class="image-swiper">
            <div class="image-slider">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 ">

                            <div class="swiper-container swiper image-swiper ">
                                <div class="swiper-wrapper">

                                    <?php
                                    $i = 0;
                                    // if (have_rows('images_swiper')):
                                        while (have_rows('images_swiper')):
                                            the_row(); ?>
                                            <div class="swiper-slide" <?php
                                            if ($i < 7) {
                                                echo 'data-aos="fade-up" data-aos-delay="' . (100 + $i * 50) . '"';
                                            }
                                            ?>>
                                                <?php
                                                $image = get_sub_field('img');
                                                if ($image): ?>
                                                    <div class="swiper-img-container">
                                                        <img loading="lazy" src="<?= esc_url($image['url']) ?>"
                                                            alt="<?= esc_attr($image['alt']) ?>" class="swiper-img" />
                                                    </div>
                                                <?php endif; ?>
                                            </div>
                                            <?php
                                            $i++;
                                        endwhile;
                                    // endif; ?>
                                </div>
                                <div class="container">
                                    <div class="row">
                                        <div
                                            class="swiper-navigation col-12 col-lg-6 col-md-6  offset-lg-3 offset-md-3  d-flex gap-3 ">
                                            <div class="swiper-button-prev d-none d-md-flex d-lg-flex">
                                                <img loading="lazy"
                                                    src="<?= get_template_directory_uri(); ?>/images/prev-btn.svg"
                                                    alt="Prev arrow" class="swiper-arrow">
                                            </div>
                                            <div class="custom-swiper-scrollbar"></div>
                                            <div class="swiper-button-next d-none d-md-flex d-lg-flex">
                                                <img loading="lazy"
                                                    src="<?= get_template_directory_uri(); ?>/images/next-btn.svg"
                                                    alt="Next arrow" class="swiper-arrow">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
     <?php endif; ?>
         
       

        <!-- Content-section -->
        <?php
        $content = get_field('content');

        if (!empty($content) && is_array($content)) {
            foreach ($content as $block) {
                get_template_part('components/' . $block['acf_fc_layout'], null, ['fields' => $block]);
            }
        }
        ?>

    </div>
</main>

<?php get_footer(); ?>