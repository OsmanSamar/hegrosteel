<?php

$menu_id = get_nav_menu_locations()['footer-menu'];
$items = wp_get_nav_menu_items($menu_id);
$footer_menu = array_chunk($items, ceil(count($items) / 2));
?>

<div class="whatsapp-fixed">
    <div class=" mt-3">
        <span class="whatsapp-container"> <a href="https://wa.me/<?= get_field('whatsappnumber', 'option') ?>" class="">
                <span class="d-flex justify-content-center align-items-center">
                    <img src="<?= get_template_directory_uri() ?>/images/whatsapp.svg" alt="Open whatsapp"
                        class="whatsappimg" />
                </span>
            </a></span>
    </div>
</div>

<footer class="footer">
    <div class="container">
        <div class="row">
            <div class="col-lg-10">
                <div class="d-flex justify-content-between gap-3 flex-wrap">
                    <h2>Kunnen wij het bouwen?</h2>
                    <a href="<?= esc_url(get_permalink(get_page_by_path('contact'))) ?>"
                        class="button secondary-button ms-lg-3 mt-2 ">
                        Neem contact op
                        <img src="<?= get_template_directory_uri(); ?>/images/vector.svg" alt="Arrow"
                            class="dropdown-arrow">
                    </a>
                </div>
            </div>
        </div>

        <hr class="footer-divider">

        <div class="row">

            <div class="col-lg-3 col-md-3 ">
                <a href="<?= esc_url(get_permalink(get_page_by_path('front-page'))) ?>">
                    <img src="<?= get_template_directory_uri() ?>/images/logo.svg" alt="Hegrosteel Logo"
                        class="footer-logo mb-3" />
                </a>
                <div class="d-flex align-items-center gap-2 mt-3 media-container">
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

            <div class="col-lg-8 offset-lg-1 col-md-8 offset-md-1">
                <div class="row">

                    <div class="col-md-3 mb-3">
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

                    <div class="col-md-3 offset-lg-1">
                        <div class="d-block mb-3 list">
                            <?= get_field("diensten_link_title", 'option') ?>
                        </div>

                    </div>

                    <div class="col-md-3 offset-lg-1">
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
        <div class="col-lg-5 d-flex align-items-center justify-content-between">
            <span class="made-with-link d-inline-flex align-items-center gap-1 footer-link-ltr">© HegroSteel,
                2025</span>
            <span class="made-with-link d-inline-flex align-items-center gap-1 footer-link-ltr">Algemene
                voorwaarden</span>
            <span class="made-with-link d-inline-flex align-items-center gap-1 footer-link-ltr">Privacy
                statement</span>
        </div>

        <div class="col-lg-2 offset-lg-5 d-flex justify-content-end">
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