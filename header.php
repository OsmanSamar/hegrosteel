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
        <svg class="svg">
            <clipPath id="border-wrap" clipPathUnits="objectBoundingBox"><path d="M0.746,0 C0.767,0,0.787,0.008,0.802,0.023 L0.804,0.025 L0.974,0.2 C0.991,0.217,1,0.24,1,0.265 V0.91 C1,0.96,0.963,1,0.917,1 H0.083 C0.037,1,0,0.96,0,0.91 V0.093 C0,0.044,0.036,0.004,0.081,0.003 L0.083,0.003 L0.746,0"></path></clipPath>
            <clipPath id="beveled-shape-right" clipPathUnits="objectBoundingBox"><path d="M0,0.184 C0,0.086,0.042,0.005,0.095,0.005 L0.741,0 C0.766,0,0.789,0.018,0.807,0.049 L0.97,0.341 C0.989,0.375,1,0.423,1,0.472 V1 H0.095 C0.043,1,0,0.92,0,0.82 L0,0.184"></path></clipPath>
            <clipPath id="header-shape" clipPathUnits="objectBoundingBox"><path d="M0.302,0.014 C0.308,0.005,0.314,0,0.321,0 L0.971,0 C0.987,0,1,0.025,1,0.057 V0.443 V0.943 C1,0.975,0.987,1,0.971,1 L0.029,1 C0.013,1,0,0.975,0,0.943 V0.552 C0,0.535,0.004,0.52,0.01,0.509 L0.302,0.014"></path></clipPath>
        </svg>
        <style>
            .svg{
                position: absolute;
                width: 0;
                height: 0;
            }
            .bevel-right{
                clip-path: url(#beveled-shape-right)!important;
            }
            .border-wrap{
                position:relative;
                --background-color: #000000;
                --border-color: #ffffff;
                --border-width:1px;

                &::before,&::after{
                    position: absolute;
                    content: "";
                    width: 100%;
                    height: 100%;
                    transform: translateX(-50%) translateY(-50%);
                    left: 50%;
                    top:50%;
                    clip-path: url(#border-wrap)!important;
                }
                &::before{
                    z-index: -2;
                    background-color: var(--border-color);
                }
                &::after{
                    z-index: -1;
                    background-color: var(--background-color);
                    width: calc(100% - calc(2 * var(--border-width)));
                    height: calc(100% - calc(2 * var(--border-width)) );
                }
                
            }
        </style>

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
                                        <a class="nav-link  nav-link-ltr  d-flex align-items-center <?= $active ? "active" : "" ?>"
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