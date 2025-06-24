<?php

$menu_id = get_nav_menu_locations()['footer-menu'];
$footer_menu = wp_get_nav_menu_items($menu_id);
$menu_id = get_nav_menu_locations()['diensten-menu'];
$diensten_menu = wp_get_nav_menu_items($menu_id);

?>

<div class="whatsapp-fixed">
    <div class=" mt-3">
        <span class="whatsapp-container">
            <a href="https://wa.me/<?= get_field('whatsappnumber', 'option') ?>?text=I am interested in the " class=""
                target="_blank">
                <!-- <?= strip_tags(get_field("whatsapp_message", 'option')) ?> -->
                <span class="d-flex justify-content-center align-items-center">
                    <span class="whatsapp-badge">1</span>
                    <img loading="lazy" src="<?= get_template_directory_uri() ?>/images/whatsapp.svg"
                        alt="Open whatsapp" class="whatsappimg" />


                </span>
            </a>
        </span>
    </div>
</div>





<footer class="footer">
    <div class="container">
        <div class="row">
            <div class="col-12 col-lg-12">

                <div class="d-flex justify-content-center  justify-content-lg-between gap-3 flex-wrap"
                    data-aos="fade-up" data-aos-offset="120" data-aos-delay="50" data-aos-duration="70"
                    data-aos-easing="ease-in-out">
                    <?php if (!is_singular('vacature')): ?>
                        <div class="d-none d-lg-flex d-md-flex">
                            <h2><?= get_field("footer_title", 'option') ?></h2>
                        </div>
                    <?php endif; ?>

                    <?php if (is_singular('vacature')): ?>
                        <h2><?= get_field("second_footer_title", 'option') ?></h2>
                    <?php endif; ?>

                    <?php if (!is_singular('vacature')): ?>
                        <div class="d-flex d-md-none d-lg-none text-center">
                            <h2><?= get_field("footer_title_on_sm", 'option') ?></h2>
                        </div>

                    <?php endif; ?>
                    <a href="<?= esc_url(get_permalink(get_page_by_path('contact'))) ?>"
                        class="button secondary-button ms-lg-3 mt-2 ">
                        App, bel of mail ons
                        <img loading="lazy" src="<?= get_template_directory_uri(); ?>/images/vector.svg" alt="Arrow"
                            class="dropdown-arrow">
                    </a>

                </div>
            </div>
        </div>

        <hr class="footer-divider">

        <div class="row">
            <!-- Logo -->
            <div
                class="col-lg-3 col-md-4 d-flex flex-lg-column flex-md-column justify-content-between justify-content-lg-start justify-content-md-start mb-4 mb-lg-0">
                <a href="<?= esc_url(get_permalink(get_page_by_path('front-page'))) ?>" data-aos="fade-up"
                    data-aos-offset="120" data-aos-delay="50" data-aos-duration="70" data-aos-easing="ease-in-out">
                    <img loading="lazy" src="<?= get_template_directory_uri() ?>/images/logo.svg" alt="Hegrosteel Logo"
                        class="footer-logo mb-3" />
                </a>
                <div class="d-flex align-items-center gap-2 mt-lg-3 media-container" data-aos="fade-up"
                    data-aos-offset="120" data-aos-delay="50" data-aos-duration="70" data-aos-easing="ease-in-out">
                    <a href="https://api.whatsapp.com/send?text=Check%20out%20this%20website:%20https://hegrosteel.develop.code-blauw.nl/"
                        target="_blank">
                        <img loading="lazy" src="<?= get_template_directory_uri() ?>/images/whatsapp-logo.svg"
                            alt="Whatsapp logo" class="media-icon" />
                    </a>
                    <a href="https://www.instagram.com/send?text=Check%20out%20this%20website:%20https://hegrosteel.develop.code-blauw.nl/"
                        target="_blank">
                        <img loading="lazy" src="<?= get_template_directory_uri() ?>/images/instagram-logo.svg"
                            alt="Instagram-logo" class="media-icon" />

                    </a>
                </div>
            </div>

            <div class="col-lg-8 offset-lg-1 col-md-8 ">
                <div class="row">
                    <!-- Contact -->
                    <div class="col-7 col-lg-4 col-md-6 mb-3" data-aos="fade-up" data-aos-offset="120"
                        data-aos-delay="100" data-aos-duration="70" data-aos-easing="ease-in-out">
                        <div class="list d-block mb-3 ">
                            <?= get_field("contact_link_title", 'option') ?>
                        </div>
                        <ul class="list-unstyled d-flex flex-column gap-2 ">
                            <li class="footer-li text-decoration-none footer-link-ltr">
                                <?= get_field("footer_adrres", 'option') ?>
                                <?php
                                $address = get_field("hegrosteel_adress", 'option');
                                $postcode = get_field("hegrosteel_postcode", 'option');
                                $full_address = $address . ', ' . $postcode;
                                ?>
                                <a href="https://www.google.com/maps/search/?api=1&query=<?= urlencode($full_address); ?>"
                                    target="_blank">
                                    <?= $address ?><br>
                                    <?= $postcode ?>
                                </a>
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
                        </ul>
                    </div>

                    <!-- Diensten -->

                    <div class="col-6 col-md-3 offset-lg-1" data-aos="fade-up" data-aos-offset="120"
                        data-aos-delay="150" data-aos-duration="70" data-aos-easing="ease-in-out">
                        <div class="d-block mb-3 list">
                            <?= get_field("diensten_link_title", 'option') ?>
                        </div>


                        <div class="d-flex flex-column">
                            <?php foreach ($diensten_menu as $item):
                                $active = get_permalink() == $item->url;
                                ?>
                                <a href="<?= $item->url; ?>"
                                    class="d-block footer-link footer-link-ltr <?= $active ? 'active' : '' ?>">
                                    <?= $item->title ?>
                                </a>
                            <?php endforeach; ?>

                        </div>

                    </div>

                    <!-- Meer weten -->
                    <div class="col-6 col-lg-3 d-md-none d-lg-block offset-lg-1" data-aos="fade-up"
                        data-aos-offset="120" data-aos-delay="200" data-aos-duration="70" data-aos-easing="ease-in-out">
                        <div class="d-block mb-3 list">
                            <?= get_field("meer_over_link_title", 'option') ?>
                        </div>

                        <div class="d-flex flex-column">
                            <?php foreach ($footer_menu as $item):
                                $active = get_permalink() == $item->url;
                                ?>
                                <a href="<?= $item->url; ?>"
                                    class="d-block footer-link footer-link-ltr <?= $active ? 'active' : '' ?>">
                                    <?= $item->title ?>
                                </a>
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
            <span class="made-with-link d-inline-flex align-items-center gap-1 footer-link-ltr">
                <?= get_field("hegrosteel", 'option') ?>
            </span>
            <span class="made-with-link d-inline-flex align-items-center gap-1 footer-link-ltr">
                <a target="_blank" href=" <?= get_field("algemenevoorwaarden", 'option')['url'] ?>">
                    <?= get_field("algemenevoorwaarden", 'option')['title'] ?>
                </a>
            </span>
            <span class="made-with-link d-inline-flex align-items-center gap-1 footer-link-ltr">
                <a target="_blank" href=" <?= get_field("privacystatement", 'option')['url'] ?>">
                    <?= get_field("privacystatement", 'option')['title'] ?>
                </a>

            </span>
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