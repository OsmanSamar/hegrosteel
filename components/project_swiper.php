<?php
$fields = $args['fields'];
$hasBackground = !empty($fields['has_background']);
$backgroundColor = $fields['background_color'] ?? ''; 
$backgroundClass= $fields['background'] ?? '';

$args = array(
    'post_type' => 'project',
    'posts_per_page' => -1,
);
$projects = new WP_Query($args);

if ($projects->have_posts()): ?>

    <div class="projecten-slider mb-5 <?= $backgroundClass ?> <?= $hasBackground ? 'with-background' : ''; ?>">
        <div class="container">
            <div class="row">
                <div class=" col-lg-12 ">
                  <div class="d-flex justify-content-between align-items-center gap-3 flex-wrap ">
                      <h2><?= $fields['title']; ?></h2>
                    <a href="<?= get_post_type_archive_link('project') ?>"
                        class="button primary-button d-none d-lg-flex"><?= __('Bekijk alle projecten', 'hegrosteel') ?>
                        <img loading="lazy" src="<?= get_template_directory_uri(); ?>/images/vector.svg" alt="Arrow"
                            class="dropdown-arrow">
                    </a>
                  </div>
                </div>
                <!-- Updated  -->
               <div class="col-lg-12  overflow-visible ">
                <!-- overflow-right -->

               <div class="swiper-container swipers projecten-swiper ">
                    <div class="swiper-wrapper">
                        <?php
                        $i=0;
                        while ($projects->have_posts()):
                            $projects->the_post();
                            $image_id = get_post_thumbnail_id(get_the_ID());
                            $image = [
                                'url' => get_the_post_thumbnail_url(get_the_ID()),
                                'alt' => wp_get_attachment_metadata($image_id)['image_meta']['alt']
                            ];
                            $categories = get_the_terms(get_the_ID(), 'project_category');
                            $plaats = get_the_terms(get_the_ID(), 'plaats');
                            ?>
                            <div class="swiper-slide" <?php 
                            if($i<6){
                                echo"";
                            }
                            ?>>
                            
                             <div class="container-card border-wrap" style="<?= $hasBackground && $backgroundColor ? '--background-color: ' . esc_attr($backgroundColor) . ';' : ''; ?>"  >
                                    <a href="<?php the_permalink(); ?>" class="text-decoration-none">
                                        <div class="project-card">
                                            <?php if ($image): ?>
                                                <div class="bevel-right position-relative">
                                                        <img loading="lazy" src="<?= esc_url($image['url']) ?>" alt="<?= esc_attr($image['alt']) ?>"
                                                        class="swiper-img" />
                                                       <div class="open-arrow">
                                                            <img loading="lazy" src="<?= get_template_directory_uri(); ?>/images/white-arrow.svg" alt="Arrow" class="swiper-arrow">
                                                      </div>
                                                </div>
                                            <?php endif; ?>

                                            <div class="project-content p-3">
                                                <?php if ($categories): ?>
                                                    <div class="project-categories">
                                                        <?php foreach ($categories as $cat): ?>
                                                            <span class="lead"><?= esc_html($cat->name); ?></span>
                                                        <?php endforeach; ?>
                                                    </div>
                                                <?php endif; ?>
                                                <h4><?php the_title(); ?></h4>

                                                <?php if ($plaats): ?>
                                                    <?php foreach ($plaats as $term): ?>
                                                        <span class="lead"><?= esc_html($term->name); ?></span>
                                                    <?php endforeach; ?>
                                                <?php endif; ?>

                                            </div>
                                        </div>
                                    </a>
                                </div>
                             
                            </div>
                        <?php
                    $i++;
                    endwhile; ?>
                    </div>

                      <div class="container">
                            <div class="row">
                                <div class="swiper-navigation col-12 col-lg-6 col-md-6  offset-lg-3 offset-md-3  d-flex gap-5">
                                  <div class="swiper-button-prev d-none d-md-flex d-lg-flex">
                                    <img loading="lazy" src="<?= get_template_directory_uri(); ?>/images/prev-btn.svg" alt="Prev arrow"
                                         class="swiper-icon">
                                  </div>
                                    <div class="custom-swiper-scrollbar"></div>
                                    <div class="swiper-button-next d-none d-md-flex d-lg-flex">
                                      <img loading="lazy" src="<?= get_template_directory_uri(); ?>/images/next-btn.svg" alt="Next arrow"
                                      class="swiper-icon">
                                   </div>
                                </div>
                            </div>
                     </div>

                </div>

               </div>

               <div class=" col-lg-12 d-flex justify-content-between gap-3 flex-wrap">
                    <a href="<?= get_post_type_archive_link('project') ?>"
                        class="button primary-button d-flex d-lg-none"><?= __('Bekijk alle projecten', 'hegrosteel') ?>
                        <img loading="lazy" src="<?= get_template_directory_uri(); ?>/images/vector.svg" alt="Arrow"
                            class="swiper-icon">
                    </a>
                </div>
            </div>
        </div>

    </div>

  <?php endif;
wp_reset_postdata();
?>