<?php get_header();
$categories = get_terms('project-category', ['hide_empty' => true]);
//Template Name: projecten
$args = [
    'post_type' => 'project',
    'posts_per_page' => 9,
    'orderby' => 'date',
    'order' => 'DESC',
];
if ($taxonomy->slug) {
    $args['tax_query'][] = [
        [
            'taxonomy' => 'project-category',
            'field' => 'slug',
            'terms' => $taxonomy->slug
        ]
    ];
}
$query = new WP_Query($args);

$posts = $query->posts;
$paginator = [
    'max_num_pages' => $query->max_num_pages,
    'current_page' => intval($_GET['page'] ?? 1),
];
?>

<main class="projecten">
    <div class="container">

        <div>
            <?= get_template_part("components/hero") ?>
        </div>

        <div class="container project-container">
            <div class="row">
                <!--  Left  col -->
                <div class="col-lg-4 col-xl-4 mb-4">
                    <!-- Filter Section -->
                    <div class=" filter-section  bottom-right-shape position-relative">
                        <!-- Woningbouw Dropdown -->
                        <div class="plaats-group mb-3">
                            <label for="woningbouw" class="bold">Categorie</label>
                            <select name="woningbouw" id="woningbouw" class="form-select filter-input">
                                <option selected value="">Woningbouw</option>
                                <option value="1">Woningbouw</option>
                                <option value="2">Woningbouw</option>
                                <option value="3">Woningbouw</option>
                            </select>
                          
                        </div>

                        <!-- Plaats Dropdown -->
                        <div class="plaats-group mb-3">
                            <label for="plaats" class="bold">Plaats</label>
                            <select name="plaats" id="woningbouw" class="form-select filter-input">
                                <option selected value="">Amersfoort</option>
                                <option value="1">Barneveld</option>
                                <option value="1">Plaatsnaam</option>
                                <option value="2">Voorthuizen</option>

                            </select>
                           
                        </div>
                    </div>
                </div>

                <!--Right col -->
                <div class="col-lg-8 col-xl-8">
                    <div class="row post-holder" data-type="project">
                        <?php
                        foreach ($posts as $post) {
                            // Fetch the "General" tab fields directly
                            get_template_part('components/projectcard', null, ['post' => $post]);
                        }
                        wp_reset_postdata();
                        ?>
                    </div>
                </div>
                <!-- End of col -->

                <!-- Pagination -->
                <div class="pagination-wrap">
                    <?= get_template_part('components/pagination', null, ['paginator' => $paginator]); ?>
                </div>
            </div>
            <!-- End of row -->
        </div>





    </div>
</main>

<?php get_footer() ?>