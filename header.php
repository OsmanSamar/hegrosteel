<!DOCTYPE html>

<html>

<head>
    <?php wp_head(); ?>
    <title><?php wp_title() ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <!-- Swiper -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css">
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <!-- Swiper -->
</head>
<?php
$menu_id = get_nav_menu_locations()['header-menu'];
$items = wp_get_nav_menu_items($menu_id);
$menu_items = array();
foreach ((array) $items as $key => $menu_item) {
    $menu_items[$menu_item->menu_item_parent][] = $menu_item;
}
$menu = [];
foreach ($items as $item) {
    if ($item->menu_item_parent == 0) {
        $menu[] = $item;
    }
    if (isset($menu_items[$item->ID])) {
        $item->children = $menu_items[$item->ID];
    }
}
unset($menu_items);
?>

<body <?php body_class(); ?>>
    <?php wp_body_open(); ?>

    <header class="header position-absolute d-flex justify-content-center">
        <nav class="w-100">
            <div class="container">
                <div class="navbar navbar-expand-lg navbar-light sans-serif w-100">
                    <a href="<?= esc_url(get_permalink(get_page_by_path('front-page'))) ?>" class="navbar-brand d-flex">
                        <img src="<?= get_template_directory_uri() ?>/images/logo.svg" alt="Logo" class=" logo" />
                    </a>


                    <!-- Hamburger button for mobile -->
                    <div class="d-xl-none navbar-toggler-wrapper ">
                        <button class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                            aria-expanded="false" aria-label="Toggle navigation" style="">
                            <span class="toggler-icon top-bar"></span>
                            <span class="toggler-icon middle-bar"></span>
                            <span class="toggler-icon bottom-bar"></span>
                        </button>
                    </div>
                    <!-- Navigation Menu -->

                    <div class="collapse navbar-collapse ul-bg " id="navbarSupportedContent">
                        <ul class="navbar-nav ms-auto justify-content-start justify-content-xl-end flex-grow-1">
                            <?php foreach ($menu as $item):
                                $active = get_permalink() == $item->url;
                                ?>
                                <li class="nav-item dropdown">

                                    <?php if ($item->children): ?>
                                        <a class="nav-link nav-link-ltr dropdown-toggle d-flex align-items-center <?= $active ? "active" : "" ?>"
                                            role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                            <?= $item->title ?>
                                            <img src="<?= get_template_directory_uri(); ?>/images/downarrow.svg"
                                                alt="Dropdown Icon" style="" class="dropdownarrow">
                                        </a>
                                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown"
                                            style="top:52px; left: 11px;">
                                            <?php foreach ($item->children as $child): ?>
                                                <li>
                                                    <a class="dropdown-item nav-link-ltr d-flex justify-content-between align-items-center"
                                                        href="<?= $child->url; ?>">
                                                        <?= $child->title ?>
                                                        <!-- <img src="<?= get_template_directory_uri(); ?>/images/nextarrow.svg"
                                                            alt="Arrow" class="dropdown-arrow"> -->
                                                    </a>
                                                </li>
                                            <?php endforeach; ?>
                                        </ul>
                                        <?php
                                    else:
                                        ?>
                                        <a class="nav-link  d-flex align-items-center <?= $active ? "active" : "" ?>"
                                            href="<?= $item->url; ?>" role="button">
                                            <?= $item->title ?> </a>
                                        <?php
                                    endif; ?>
                                </li>
                            <?php endforeach; ?>

                        </ul>
                        <a href="<?= esc_url(get_permalink(get_page_by_path('contact'))) ?>"
                            class="button secondary-button ms-lg-3 mt-2 ">
                            Neem contact op
                            <img src="<?= get_template_directory_uri(); ?>/images/vector.svg" alt="Arrow"
                                class="dropdown-arrow">
                        </a>

                    </div>
                </div>
            </div>
        </nav>
    </header>