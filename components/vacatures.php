<!-- <?php get_header()

    ?>
<main class="diensten">
    <div class="container">
    </div>
</main>

<?php get_footer() ?> -->


<?php
$fields = $args['fields'];
$args = array(
    'post_type' => 'vacature',
    'posts_per_page' => -1,
);
$vacatures = new WP_Query($args);


if ($vacatures->have_posts()): ?>


    <div class="services_section" id="Service-Section">
        <div class="row">


            <div class="col-12 col-md-6  col-lg-6 offset-lg-2">
                <!-- vactures list Repeater -->
                <?php while ($vacatures->have_posts()):
                    $vacatures->the_post();

                    $salary = get_the_terms(get_the_ID(), 'salary');
                    $uren = get_the_terms(get_the_ID(), 'uren');
                    $number = get_the_terms(get_the_ID(), 'number');
                    ?>

                    <a href="<?php the_permalink(); ?>">
                        <div class="repeater-item d-flex align-items-start justify-content-between w-100">
                            <div class="">
                                <?php if ($number): ?>
                                    <div class="">
                                        <?php foreach ($number as $term): ?>
                                            <p class="number typography mb-0"><?= esc_html($cat->name); ?></p>
                                        <?php endforeach; ?>
                                    </div>
                                <?php endif; ?>

                                <h3 class="mb-0 text-hover-underline"><?php the_title(); ?></h3>

                                <?php if ($plaats): ?>
                                    <?php foreach ($plaats as $term): ?>
                                        <span class="lead"><?= esc_html($term->name); ?></span>
                                    <?php endforeach; ?>
                                <?php endif; ?>

                            </div>
                        </div>

                        <hr class="divider mt-3 ">
                    </a>

                <?php endwhile; ?>

            </div>
        </div>

    </div>
<?php endif;
wp_reset_postdata();
?>