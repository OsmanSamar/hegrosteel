


<?php

$args = array(
    'post_type' => 'project',
    'posts_per_page' => -1,
);
$projects = new WP_Query($args);

if ($projects->have_posts()) : ?>
    <div class="swiper-container projecten-swiper">
        <div class="swiper-wrapper">
            <?php while ($projects->have_posts()) : $projects->the_post();
                $image = get_field('image');
                $categories = get_the_terms(get_the_ID(), 'project_category');
            ?>
                <div class="swiper-slide">
                    <a href="<?php the_permalink(); ?>" class="text-decoration-none">
                        <div class="project-card">
                            <?php if ($image): ?>
                                <img src="<?= esc_url($image['url']) ?>" alt="<?= esc_attr($image['alt']) ?>" class="swiper-img" />
                            <?php endif; ?>
                            <div class="project-content p-3">
                                <h5><?php the_title(); ?></h5>
                                <?php if ($categories): ?>
                                    <div class="project-categories">
                                        <?php foreach ($categories as $cat): ?>
                                            <span><?= esc_html($cat->name); ?></span>
                                        <?php endforeach; ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </a>
                </div>
            <?php endwhile; ?>
        </div>

       
        <div class="swiper-button-prev"></div>
        <div class="swiper-pagination"></div>
        <div class="swiper-button-next"></div>
        
    </div>
<?php endif;
wp_reset_postdata();
?>