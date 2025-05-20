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
          <div class="col-lg-7 d-flex flex-column justify-content-start align-items-start gap-3 mb-5 mb-lg-0">
                   <?php if ($categories): ?>
                        <?php foreach ($categories as $term): ?>
                            <div class="project-items mb-3 gap-2">
                                <span class="lead ">
                                    <?= esc_html($term->name); ?>
                                </span>
                            </div>

                        <?php endforeach; ?>
                    <?php endif; ?>

                    <!-- <h3 class="mb-3 mt-3"><?php the_title(); ?></h3> -->
                       <h3 class="mb-3 mt-3"><?=get_field("title")?></h3>
                    <span class="regular"> <?=get_field("text")?></span>

                    <!-- Buttons -->
                    <div class="mt-4">
                            <a type="button" class="button secondary-button" href="<?=get_field("button")['url']?>" >
                            <?=get_field("button")['title']?>
                            <img src="<?= get_template_directory_uri(); ?>/images/vector.svg" alt="Arrow"
                            class="dropdown-arrow">
                            </a>
                    </div>
              </div>

             <div class="col-lg-4 offset-lg-1">
                    
                    <div class="right-section  right-bottom-border position-relative" style="padding: 50px;">
                        
                        <div class="">
                       
                         <h4>
                            Ontwerp
                            </h4>
                        <?php if ($ontwerp): ?>
                        <?php foreach ($ontwerp as $term): ?>
                            <div class=" mb-3 gap-2">
                                <span class="regular">
                                    <?= esc_html($term->name); ?>
                                </span>
                            </div>

                        <?php endforeach; ?>
                       <?php endif; ?>
                       
                          <h4>Opdrachtgever</h4>
                       <?php if ($opdrachtgever): ?>
                        <?php foreach ($opdrachtgever as $term): ?>
                            <div class=" mb-3 gap-2">
                                <span class="regular ">
                                    <?= esc_html($term->name); ?>
                                </span>
                            </div>

                        <?php endforeach; ?>
                       <?php endif; ?>
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
                    
                        <a href="#" target="_blank">
                        <img src="<?= get_template_directory_uri() ?>/images/insta-icon.svg" alt="Instagram-logo"
                            class="share-icon" />
                        </a>
                        <a href="https://www.linkedin.com/shareArticle?mini=true&url=">
                        <img src="<?= get_template_directory_uri() ?>/images/linkedinicon.svg" alt="Instagram-logo"
                        class="share-icon" />
                        </a>
                         <a href="https://www.facebook.com/sharer/sharer.php?u=">  
                            <img src="<?= get_template_directory_uri() ?>/images/facebook-icon.svg" alt="Instagram-logo"
                           class="share-icon" /></a>
                 
                      </div>
                   </div>

                       
              </div>
                



              </div>
          </div>
       </div>

        <!-- Image swiper -->
        <div class="images-swiper">

            <div class="image-slider">
                <div class="">
                    <div class="row">
                      
                        <div class="col-lg-12 ">
                            <div class="swiper-container swiper image-swiper ">
                                <div class="swiper-wrapper">
                                    <?php if (have_rows('images_swiper')): ?>
                                        <?php while (have_rows('images_swiper')):
                                            the_row(); ?>
                                            <div class="swiper-slide">
                                                    <?php
                                                    $image = get_sub_field('img');
                                                    if ($image): ?>
                                                    <div class="">
                                                        <img src="<?= esc_url($image['url']) ?>" alt="<?= esc_attr($image['alt']) ?>"
                                                            class="swiper-img " />
                                                    </div>
                                                <?php endif; ?>
                                            </div>
                                        <?php endwhile; ?>
                                    <?php endif; ?>
                                </div>
                                <div class="container">
                                    <div class="row">
                                        <div
                                            class="swiper-navigation col-12 col-lg-6 col-md-6  offset-lg-3 offset-md-3  d-flex gap-3 ">
                                            <div class="swiper-button-prev d-none d-md-flex d-lg-flex">
                                                <img src="<?= get_template_directory_uri(); ?>/images/prev-btn.svg"
                                                    alt="Prev arrow" class="dropdown-arrow">
                                            </div>
                                            <div class="custom-swiper-scrollbar"></div>
                                            <div class="swiper-button-next d-none d-md-flex d-lg-flex">
                                                <img src="<?= get_template_directory_uri(); ?>/images/next-btn.svg"
                                                    alt="Next arrow" class="dropdown-arrow">
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