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
        <clipPath id="border-wrap" clipPathUnits="objectBoundingBox">
            <path
                d="M0.746,0 C0.767,0,0.787,0.008,0.802,0.023 L0.804,0.025 L0.974,0.2 C0.991,0.217,1,0.24,1,0.265 V0.91 C1,0.96,0.963,1,0.917,1 H0.083 C0.037,1,0,0.96,0,0.91 V0.093 C0,0.044,0.036,0.004,0.081,0.003 L0.083,0.003 L0.746,0">
            </path>
        </clipPath>
        <clipPath id="beveled-shape-right" clipPathUnits="objectBoundingBox">
            <path
                d="M0,0.184 C0,0.086,0.042,0.005,0.095,0.005 L0.741,0 C0.766,0,0.789,0.018,0.807,0.049 L0.97,0.341 C0.989,0.375,1,0.423,1,0.472 V1 H0.095 C0.043,1,0,0.92,0,0.82 L0,0.184">
            </path>
        </clipPath>
        <clipPath id="header-shape" clipPathUnits="objectBoundingBox">
            <path
                d="M0.302,0.014 C0.308,0.005,0.314,0,0.321,0 L0.971,0 C0.987,0,1,0.025,1,0.057 V0.443 V0.943 C1,0.975,0.987,1,0.971,1 L0.029,1 C0.013,1,0,0.975,0,0.943 V0.552 C0,0.535,0.004,0.52,0.01,0.509 L0.302,0.014">
            </path>
        </clipPath>
        <clipPath id="right-bottom-shape" clipPathUnits="objectBoundingBox">
            <path
                d="M0,0.918 C0,0.962,0.039,0.998,0.088,0.998 L0.773,1 C0.795,1,0.817,0.992,0.834,0.978 L0.972,0.859 C0.99,0.844,1,0.823,1,0.801 V0.08 C1,0.036,0.96,0,0.912,0 H0.088 C0.04,0,0,0.036,0,0.08 V0.918">
            </path>
        </clipPath>
        <clipPath id="left-top-shape" clipPathUnits="objectBoundingBox">
            <path
                d="M1,0.135 C1,0.062,0.95,0.003,0.889,0.003 L0.266,0 C0.237,0,0.209,0.013,0.188,0.036 L0.035,0.209 C0.013,0.234,0,0.269,0,0.305 V0.868 C0,0.941,0.05,1,0.112,1 H0.888 C0.95,1,1,0.941,1,0.868 V0.135">
            </path>
        </clipPath>
        <clipPath id="left-bottom-shape" clipPathUnits="objectBoundingBox">
            <path
                d="M0.213,1 C0.192,1,0.172,0.999,0.156,0.977 L0.155,0.975 L0.031,0.794 C0.014,0.77,0.005,0.735,0.005,0.699 V0.142 C0.005,0.07,0.043,0.011,0.09,0.011 H0.92 C0.967,0.011,1,0.07,1,0.142 V0.877 C1,0.948,0.968,1,0.923,1 L0.92,1 L0.213,1">
            </path>
        </clipPath>
        <clipPath id="top-right-shape" clipPathUnits="objectBoundingBox"><path d="M0.75,0.004 C0.77,0.004,0.79,0.012,0.805,0.025 L0.806,0.027 L0.979,0.191 C0.995,0.206,1,0.227,1,0.25 V0.923 C1,0.968,0.968,1,0.923,1 H0.085 C0.041,1,0.004,0.968,0.004,0.923 V0.088 C0.004,0.044,0.039,0.008,0.083,0.007 L0.085,0.007 L0.75,0.004"></path></clipPath>
    </svg>
    <style>
        .svg {
            position: absolute;
            width: 0;
            height: 0;
        }

        .bevel-right {
            clip-path: url(#beveled-shape-right) !important;
        }

        .border-wrap {
            position: relative;
            --background-color: #000000;
            --border-color: #ffffff;
            --border-width: 1px;

            &::before,
            &::after {
                position: absolute;
                content: "";
                width: 100%;
                height: 100%;
                transform: translateX(-50%) translateY(-50%);
                left: 50%;
                top: 50%;
                clip-path: url(#border-wrap) !important;
            }

            &::before {
                z-index: -2;
                background-color: var(--border-color);
            }

            &::after {
                z-index: -1;
                background-color: var(--background-color);
                width: calc(100% - calc(2 * var(--border-width)));
                height: calc(100% - calc(2 * var(--border-width)));
            }

        }

        .right-bottom-shape {
            position: relative;
            --background-color: var(--Primary-600);

            &::before,
            &::after {
                position: absolute;
                content: "";
                width: 100%;
                height: 100%;
                transform: translateX(-50%) translateY(-50%);
                left: 50%;
                top: 50%;
                clip-path: url(#right-bottom-shape) !important;
            }

            &::before {
                z-index: 0;
                background-color: var(--background-color);

            }

            &::after {
                z-index: -1;
                /* background-color: var(--background-color); */
                width: calc(100% - calc(2 * var(--border-width)));
                height: calc(100% - calc(2 * var(--border-width)));
            }

            >* {
                position: relative;
                z-index: 2;
            }

        }

        .left-top-shape {
            position: relative;
            --background-color: #ffffff;

            &::before,
            &::after {
                position: absolute;
                content: "";
                width: 100%;
                height: 100%;
                transform: translateX(-50%) translateY(-50%);
                left: 50%;
                top: 50%;
                clip-path: url(#left-top-shape) !important;
            }

            &::before {
                z-index: 0;
                background-color: var(--background-color);

            }

            &::after {
                z-index: -1;
                width: calc(100% - calc(2 * var(--border-width)));
                height: calc(100% - calc(2 * var(--border-width)));

            }

            >* {
                position: relative;
                z-index: 2;
            }

        }

        .left-bottom-shape {
            --background-color: #1c1c1c;
            --border-color: #6B6B6B;
            --border-width: 2px;
            &::before,
            &::after {
                position: absolute;
                content: "";
                width: 100%;
                height: 100%;
                transform: translateX(-50%) translateY(-50%);
                left: 50%;
                top: 50%;
                clip-path: url(#left-bottom-shape) !important;
                z-index: 0;
            }

            &::before {
                /* z-index: 2; */
                background-color: var(--border-color);
            }

            &::after {
                /* z-index: 2; */
               background-color: var(--background-color);
               width: calc(100% - calc(2 * var(--border-width)));
                 height: calc(100% - calc(2 * var(--border-width)));
            }

            >* {
                position: relative !important;
                z-index: 1 !important;
            }
        }

        .top-right-shape{
            --background-color: #1c1c1c;
            --border-color: #6B6B6B;
            --border-width: 2px;
            &::before,
            &::after {
                position: absolute;
                content: "";
                width: 100%;
                height: 100%;
                transform: translateX(-50%) translateY(-50%);
                left: 50%;
                top: 50%;
                clip-path: url(#top-right-shape) !important;
                z-index: 0;
            }

            &::before {
                /* z-index: 2; */
                background-color: var(--border-color);
            }

            &::after {
                /* z-index: 2; */
               background-color: var(--background-color);
               width: calc(100% - calc(2 * var(--border-width)));
                 height: calc(100% - calc(2 * var(--border-width)));
            }

            >* {
                position: relative !important;
                z-index: 1 !important;
            }

        }

    </style>

    <?php wp_body_open(); ?>

    <header class="header  d-flex justify-content-center">
        <!-- position-absolute //position-relative-->
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
                        <ul class="navbar-nav ms-auto justify-content-center  flex-grow-1">
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