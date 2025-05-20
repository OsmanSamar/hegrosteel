<?php
$post = $args['post'];
$image_id = get_post_thumbnail_id(get_the_ID());
$image = [
    'url' => get_the_post_thumbnail_url(get_the_ID()),
    'alt' => wp_get_attachment_metadata($image_id)['image_meta']['alt']
];
$categories = get_the_terms(get_the_ID(), 'project_category');
$plaats = get_the_terms(get_the_ID(), 'plaats');

$category_class = '';

if ($categories) {
    $cat_name = $categories[0]->name;
    if ($cat_name === "Project Categorieën") {
        $category_class = 'project-category';
    } elseif ($cat_name === "plaats") {
        $category_class = 'plaats';
    }
}
?>
<div class="col-md-6  col-lg-4 col-xl-6  mb-4 projectcard">
    <a href="<?= get_permalink($post) ?>" class="text-decoration-none">
        <div class="container-card project-right-top position-relative">
            <div class="project-card ">
                <?php if ($image): ?>
                    <div class="bevel-right position-relative">
                        <img src="<?= $image['url'] ?>" alt="<?= $image['alt'] ?>" class="swiper-img">
                       <div class="open-arrow">
                         <img src="<?= get_template_directory_uri(); ?>/images/white-arrow.svg" alt="Arrow" class="swiper-arrow">
                       </div>
                    </div>
                <?php endif; ?>
                <div class="project-content p-3">
                    <div class="project-content p-3">
                        <?php if ($categories): ?>
                            <?php foreach ($categories as $cat): ?>
                                <span class="lead project-categories"><?= esc_html($cat->name); ?></span>
                            <?php endforeach; ?>

                        <?php endif; ?>
                        <h4 class="mt-3"><?php the_title(); ?></h4>

                        <?php if ($plaats): ?>
                            <?php foreach ($plaats as $term): ?>
                                <span class="lead "><?= esc_html($term->name); ?></span>
                            <?php endforeach; ?>
                        <?php endif; ?>

                    </div>
                </div>
            </div>
        </div>

    </a>
</div>