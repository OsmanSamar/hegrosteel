<?php
$fields = $args['fields'];
$args = array(
    'post_type' => 'project',
    'posts_per_page' => -1,
);
$projects = new WP_Query($args);

if ($projects->have_posts()): ?>
    <div class="projecten-slider">
        <div class="d-flex justify-content-between gap-3 flex-wrap">
            <h2><?= $fields['title']; ?></h2>
            <a href="<?= get_post_type_archive_link('project') ?>"
                class="button primary-button"><?= __('Bekijk alle projecten', 'hegrosteel') ?>
                <img src="<?= get_template_directory_uri(); ?>/images/vector.svg" alt="Arrow"
                class="dropdown-arrow">
            </a>
        </div>
        <div class="swiper-container swipers projecten-swiper">
            <div class="swiper-wrapper">
                <?php while ($projects->have_posts()):
                    $projects->the_post();
                    $image_id = get_post_thumbnail_id(get_the_ID());
                    $image = [
                        'url' => get_the_post_thumbnail_url(get_the_ID()),
                        'alt' => wp_get_attachment_metadata($image_id)['image_meta']['alt']
                    ];
                    $categories = get_the_terms(get_the_ID(), 'project_category');
                    ?>
                    <div class="swiper-slide">
                    <div class="container-card">
                    <a href="<?php the_permalink(); ?>" class="text-decoration-none">
                            <div class="project-card">
                                <?php if ($image): ?>
                                   <div class="position-relative">
                                   <img src="<?= esc_url($image['url']) ?>" alt="<?= esc_attr($image['alt']) ?>"
                                   class="swiper-img " />
                                   <img src="<?= get_template_directory_uri(); ?>/images/open-btn.svg" alt="Arrow"
                                   class="open-arrow ">
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
                <?php endwhile; ?>
            </div>


            <div class="swiper-navigation d-flex justify-content-center gap-3">
                <div class="swiper-button-prev">
                    <img src="<?= get_template_directory_uri(); ?>/images/prev-btn.svg" alt="Prev arrow"
                        class="dropdown-arrow">
                </div>
                <div class="swiper-button-next">
                    <img src="<?= get_template_directory_uri(); ?>/images/next-btn.svg" alt="Next arrow"
                        class="dropdown-arrow">
                </div>
            </div>


        </div>
    </div>
<?php endif;
wp_reset_postdata();
?>