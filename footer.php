<?php

$menu_id = get_nav_menu_locations()['footer-menu'];
$items = wp_get_nav_menu_items($menu_id);
$footer_menu = array_chunk($items, ceil(count($items) / 2));

//1
$projects = new WP_Query([
    'post_type' => 'project',
    'posts_per_page' => -1,
]);



?>

<div class="whatsapp-fixed">
    <div class=" mt-3">
        <span class="whatsapp-container">
            <a href="https://wa.me/<?= get_field('whatsappnumber', 'option') ?>" class="">
                <span class="d-flex justify-content-center align-items-center">
                    <img src="<?= get_template_directory_uri() ?>/images/whatsapp.svg" alt="Open whatsapp"
                        class="whatsappimg" />
                </span>
            </a>
        </span>
    </div>
</div>

<footer class="footer">
    <div class="container">
        <div class="row">
            <div class="col-12 col-lg-12">
                <div class="d-flex justify-content-center  justify-content-lg-between gap-3 flex-wrap">
                    <?php if (!is_singular('vacature')): ?>
                        <div class="d-none d-lg-flex d-md-flex">
                            <h2><?= get_field("footer_title", 'option') ?></h2>
                        </div>
                    <?php endif; ?>

                    <?php if (is_singular('vacature')): ?>
                        <h2><?= get_field("second_footer_title", 'option') ?></h2>
                    <?php endif; ?>

                    <?php if (!is_singular('vacature')): ?>
                        <div class="d-flex d-md-none d-lg-none">
                            <h2><?= get_field("footer_title_on_sm", 'option') ?></h2>
                        </div>

                    <?php endif; ?>



                    <!-- <a href="<?= esc_url(get_permalink(get_page_by_path('contact'))) ?>"
                        class="button secondary-button ms-lg-3 mt-2 ">
                        App, bel of mail ons
                        <img src="<?= get_template_directory_uri(); ?>/images/vector.svg" alt="Arrow"
                            class="dropdown-arrow">
                    </a> -->

                    <!-- <a href="https://wa.me/<?= get_field('whatsappnumber', 'option') ?>" class="button secondary-button ms-lg-3 mt-2 ">
                             App, bel of mail ons
                            <img src="<?= get_template_directory_uri(); ?>/images/vector.svg" alt="Arrow"
                            class="dropdown-arrow">
                    </a> -->

                    <div class="btn-group">
                        <button type="button" class="button secondary-button dropdown-toggle" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            App, bel of mail ons
                            <img src="<?= get_template_directory_uri(); ?>/images/vector.svg" alt="Arrow"
                                class="dropdown-arrow">
                        </button>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item"
                                    href="https://wa.me/<?= get_field('whatsappnumber', 'option') ?>">WhatsApp</a></li>
                            <li><a class="dropdown-item" href="tel:<?= get_field('phonenumber', 'option') ?>">Bel</a>
                            </li>
                            <li><a class="dropdown-item" href="mailto:<?= get_field('email', 'option') ?>">Mail</a></li>
                        </ul>
                    </div>

                </div>
            </div>
        </div>

        <hr class="footer-divider">

        <div class="row">
            <!-- Logo -->
            <div
                class="col-lg-3 col-md-4 d-flex flex-lg-column flex-md-column justify-content-between justify-content-lg-start justify-content-md-start mb-4 mb-lg-0">
                <a href="<?= esc_url(get_permalink(get_page_by_path('front-page'))) ?>">
                    <img src="<?= get_template_directory_uri() ?>/images/logo.svg" alt="Hegrosteel Logo"
                        class="footer-logo mb-3" />
                </a>
                <div class="d-flex align-items-center gap-2 mt-lg-3 media-container">
                    <a href="#" target="_blank">
                        <img src="<?= get_template_directory_uri() ?>/images/whatsapp-logo.svg" alt="Whatsapp logo"
                            class="media-icon" />
                    </a>
                    <a href="#" target="_blank">

                        <img src="<?= get_template_directory_uri() ?>/images/instagram-logo.svg" alt="Instagram-logo"
                            class="media-icon" />

                    </a>
                </div>
            </div>

            <div class="col-lg-8 offset-lg-1 col-md-8 ">
                <div class="row">
                    <!-- Contact -->
                    <div class="col-7 col-lg-4 col-md-6 mb-3">
                        <div class="list d-block mb-3 ">
                            <?= get_field("contact_link_title", 'option') ?>
                        </div>

                        <ul class="list-unstyled">
                            <li class="footer-li">
                                <?= get_field("footer_adrres", 'option') ?>
                            </li>


                            <div class="d-flex flex-column gap-2">
                                <div class="footer-li">
                                    <?= get_field("hegrosteel_adress", 'option') ?>

                                </div>
                                <li class="footer-li">
                                    <?= get_field("hegrosteel_postcode", 'option') ?>
                                </li>
                                <li>
                                    <a href="tel:<?= get_field("hegrosteel_phone_num", 'option') ?>"
                                        class="footer-li text-decoration-none footer-link-ltr">
                                        <?= get_field("hegrosteel_phone_num", 'option') ?>
                                    </a>
                                </li>
                                <li>
                                    <a href="mailto:<?= get_field("hegrosteel_mail", 'option') ?>"
                                        class="footer-li text-decoration-none footer-link-ltr">
                                        <?= get_field("hegrosteel_mail", 'option') ?>
                                    </a>
                                </li>
                            </div>
                        </ul>
                    </div>



                    <!-- Diensten -->
                    <div class="col-6 col-lg-3 col-md-6 offset-lg-1">
                        <div class="d-block mb-3 list">
                            <?= get_field("diensten_link_title", 'option') ?>
                        </div>

                        <?php while ($projects->have_posts()):
                            $projects->the_post();
                            $categories = get_the_terms(get_the_ID(), 'project_category');
                            ?>

                            <ul class="list-unstyled">
                                <?php if ($categories && !is_wp_error($categories)): ?>
                                    <?php foreach ($categories as $category): ?>
                                        <li class="footer-li">
                                            <?= esc_html($cat->name); ?>
                                        </li>
                                    <?php endforeach; ?>
                                <?php endif; ?>


                            </ul>

                        <?php endwhile; ?>
                    </div>




                    <!-- Diensten -->
                    <!-- <div class="col-6 col-md-3 offset-lg-1">
                        <div class="d-block mb-3 list">
                            <?= get_field("diensten_link_title", 'option') ?>
                        </div>
                        <ul class="list-unstyled">
                            <li class="footer-li">
                               project_category
                            </li>
                            <div class="d-flex flex-column gap-2">
                                <div class="footer-li">
                                   project_category
                                </div>
                                <li class="footer-li">
                                   project_category
                                </li>
                                <li>
                                    <a href="tel:<?= get_field("hegrosteel_phone_num", 'option') ?>"
                                        class="footer-li text-decoration-none footer-link-ltr">
                                        project_category
                                    </a>
                                </li>
                                <li>
                                    <a href="mailto:<?= get_field("hegrosteel_mail", 'option') ?>"
                                        class="footer-li text-decoration-none footer-link-ltr">
                                       project_category
                                    </a>
                                </li>
                            </div>
                        </ul>
                    </div> -->

                    <!-- Meer weten -->
                    <div class="col-6 col-lg-3 d-md-none d-lg-block offset-lg-1">
                        <div class="d-block mb-3 list">
                            <?= get_field("meer_over_link_title", 'option') ?>
                        </div>

                        <div class="row">
                            <?php foreach ($footer_menu as $items): ?>
                                <div class="col-lg-12">
                                    <?php foreach ($items as $item):
                                        $active = get_permalink() == $item->url;
                                        ?>
                                        <a href="<?= $item->url; ?>"
                                            class="d-block footer-link footer-link-ltr <?= $active ? 'active' : '' ?>">
                                            <?= $item->title ?>
                                        </a>
                                    <?php endforeach; ?>
                                </div>
                            <?php endforeach; ?>
                        </div>


                    </div>

                </div>
            </div>
        </div>
    </div>


</footer>
<div class="container mt-3 mb-3">
    <div class="row">
        <div class="col-lg-5 d-flex align-items-center justify-content-between flex-column flex-lg-row gap-3 gap-lg-0">
            <span class="made-with-link d-inline-flex align-items-center gap-1 footer-link-ltr">© HegroSteel,
                2025</span>
            <span class="made-with-link d-inline-flex align-items-center gap-1 footer-link-ltr">Algemene
                voorwaarden</span>
            <span class="made-with-link d-inline-flex align-items-center gap-1 footer-link-ltr">Privacy
                statement</span>
        </div>

        <div class="col-lg-2 offset-lg-5 d-flex justify-content-lg-end justify-content-center mt-3 mt-lg-0">
            <a href="https://code-blauw.nl/" target="_blank"
                class="made-with-link d-inline-flex align-items-center gap-1 footer-link-ltr">
                Door: <span class="made-door"> Code Blauw</span>
            </a>
        </div>
    </div>
</div>



<?php wp_footer(); ?>



</body>

</html>