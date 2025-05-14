<?php get_header();
$categories = get_terms('project-category', ['hide_empty' => true]);
//Template Name: projecten
$args = [
    'post_type' => 'project',
    'posts_per_page' => 8,
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

$plaaten = get_terms('plaats', ['hide_empty' => true]);
$categories = get_terms('project_category', ['hide_empty' => true]);
$projectPage= get_page_by_path('projecten');
?>

<main class="projecten">
    <div class="container">

        <div>
            <?= get_template_part("components/hero",null,['id'=>$projectPage->ID]) ?>
        </div>

        <div class="container project-container">
            <div class="row">
                <!--  Left  col -->
                <div class="col-lg-4 col-xl-4 mb-4">
                    <!-- Filter Section -->
                    <div class=" filter-section  bottom-right-shape position-relative">
                        <!-- Woningbouw Dropdown -->
                        <div class="plaats-group mb-3">
                            <label for="project_category" class="bold">Categorie</label>
                            <select name="project_category" id="project_category" class="form-select filter-input">
                                <option selected value="">Alle Categorieën</option>
                                <?php foreach ($categories as $category) { ?>
                                    <option value="<?= $category->slug ?>"><?= $category->name ?></option>
                                <?php } ?>
                            </select>
                          
                        </div>

                        <!-- Plaats Dropdown -->
                        <div class="plaats-group mb-3">
                            <label for="plaats" class="bold">Plaats</label>
                            <select name="plaats" id="plaats" class="form-select filter-input">
                                <option selected value="">Alle Plaatsen</option>
                                <?php foreach ($plaaten as $plaat) { ?>
                                    <option value="<?= $plaat->slug ?>"><?= $plaat->name ?></option>
                                <?php } ?>

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