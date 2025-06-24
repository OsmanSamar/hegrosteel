<!-- 
 

   _____          _        _     _                      
  / ____|        | |      | |   | |                     
 | |     ___   __| | ___  | |__ | | __ _ _   ___      __
 | |    / _ \ / _` |/ _ \ | '_ \| |/ _` | | | \ \ /\ / /
 | |___| (_) | (_| |  __/ | |_) | | (_| | |_| |\ V  V / 
  \_____\___/ \__,_|\___| |_.__/|_|\__,_|\__,_| \_/\_/  
                                                        
                                                        
Copyright © Code Blauw
code-blauw.nl



-->

<!DOCTYPE html>

<html>

<head>
    <?php wp_head(); ?>
    <title><?php wp_title() ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <!-- Swiper -->
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css">
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script> -->
    <!-- Swiper -->


    <!-- Load GSAP and ScrollTrigger -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/ScrollTrigger.min.js"></script>

    <!--ScrollTrigger Text Reveal  -->
    <script src="https://unpkg.co/gsap@3/dist/gsap.min.js"></script>
    <script src="https://unpkg.com/gsap@3/dist/ScrollTrigger.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/gsap@3.13.0/dist/SplitText.min.js"></script>




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





    <svg style="visibility: hidden; position: absolute;" width="0" height="0" xmlns="http://www.w3.org/2000/svg"
        version="1.1">
        <defs>
            <filter id="round">
                <feGaussianBlur in="SourceGraphic" stdDeviation="20" result="blur" />
                <feColorMatrix in="blur" mode="matrix" values="1 0 0 0 0  0 1 0 0 0  0 0 1 0 0  0 0 0 19 -9"
                    result="goo" />
                <feComposite in="SourceGraphic" in2="goo" operator="atop" />
            </filter>
            <filter id="semiround">
                <feGaussianBlur in="SourceGraphic" stdDeviation="10" result="blur" />
                <feColorMatrix in="blur" mode="matrix" values="1 0 0 0 0  0 1 0 0 0  0 0 1 0 0  0 0 0 19 -9"
                    result="goo" />
                <feComposite in="SourceGraphic" in2="goo" operator="atop" />
            </filter>
        </defs>
    </svg>

    <svg class="svg">
        <clipPath id="hero-wrap-sm" clipPathUnits="objectBoundingBox">
            <path
                d="M1,0.046 C1,0.021,0.96,0.001,0.911,0.001 L0.257,0 C0.234,0,0.211,0.004,0.195,0.012 L0.028,0.091 C0.01,0.099,0,0.111,0,0.123 V0.956 C0,0.98,0.04,1,0.09,1 H0.91 C0.96,1,1,0.98,1,0.956 L1,0.046">
            </path>
        </clipPath>
        <clipPath id="hero-wrap" clipPathUnits="objectBoundingBox">
            <path
                d="M0.301,0.017 C0.307,0.007,0.316,0.001,0.324,0.001 L0.967,0.001 C0.985,0.001,1,0.026,1,0.058 V0.444 V0.944 C1,0.975,0.985,1,0.967,1 L0.033,1 C0.015,1,0,0.975,0,0.944 V0.55 C0,0.535,0.004,0.521,0.01,0.51 L0.301,0.017 M0.301,0.017 C0.307,0.007,0.316,0.001,0.324,0.001 L0.967,0.001 C0.985,0.001,1,0.026,1,0.058 V0.444 V0.944 C1,0.975,0.985,1,0.967,1 L0.033,1 C0.015,1,0,0.975,0,0.944 V0.55 C0,0.535,0.004,0.521,0.01,0.51 L0.301,0.017">
            </path>
        </clipPath>

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
        <clipPath id="tab-path" clipPathUnits="objectBoundingBox">
            <path
                d="M0.77,0 H0.086 C0.039,0,0,0.238,0,0.53 v0.47 h1 l-0.142,-0.788 c-0.024,-0.135,-0.056,-0.21,-0.089,-0.21">
            </path>
        </clipPath>
        <clipPath id="top-right-shape" clipPathUnits="objectBoundingBox">
            <path
                d="M0.75,0.004 C0.77,0.004,0.79,0.012,0.805,0.025 L0.806,0.027 L0.979,0.191 C0.995,0.206,1,0.227,1,0.25 V0.923 C1,0.968,0.968,1,0.923,1 H0.085 C0.041,1,0.004,0.968,0.004,0.923 V0.088 C0.004,0.044,0.039,0.008,0.083,0.007 L0.085,0.007 L0.75,0.004">
            </path>
        </clipPath>
        <clipPath id="bottom-right-shape" clipPathUnits="objectBoundingBox">
            <path
                d="M0.75,1 C0.77,1,0.79,0.997,0.805,0.981 L0.806,0.98 L0.979,0.795 C0.995,0.778,1,0.754,1,0.729 V0.096 C1,0.046,0.968,0.005,0.923,0.005 H0.085 C0.041,0.005,0.004,0.046,0.004,0.096 V0.91 C0.004,0.96,0.039,1,0.083,1 L0.085,1 L0.75,1">
            </path>
        </clipPath>
        <clipPath id="project-right-top" clipPathUnits="objectBoundingBox">
            <path
                d="M0.747,0.002 C0.768,0.002,0.788,0.01,0.804,0.025 L0.805,0.026 L0.975,0.201 C0.992,0.218,1,0.242,1,0.267 V0.912 C1,0.961,0.964,1,0.918,1 H0.085 C0.039,1,0.001,0.961,0.001,0.912 V0.094 C0.001,0.046,0.037,0.006,0.082,0.004 L0.084,0.004 L0.747,0.002">
            </path>
        </clipPath>
        <clipPath id="right-bottom-border" clipPathUnits="objectBoundingBox">
            <path
                d="M0.75,1 C0.77,1,0.79,0.997,0.805,0.985 L0.806,0.984 L0.979,0.833 C0.995,0.819,1,0.799,1,0.779 V0.079 C1,0.037,0.968,0.004,0.923,0.004 H0.085 C0.041,0.004,0.004,0.037,0.004,0.079 V0.927 C0.004,0.967,0.039,1,0.083,1 L0.085,1 L0.75,1">
            </path>
        </clipPath>
        <clipPath id="beveled-shape-left" clipPathUnits="objectBoundingBox">
            <path
                d="M0.292,0.027 C0.304,0.01,0.32,0.001,0.337,0.001 L0.937,0.001 C0.972,0.001,1,0.042,1,0.092 V0.377 V0.91 C1,0.96,0.972,1,0.937,1 L0.063,1 C0.028,1,0,0.96,0,0.91 V0.486 C0,0.461,0.007,0.438,0.019,0.421 L0.292,0.027">
            </path>
        </clipPath>
    </svg>
    <style>
        * {
            scroll-margin-top: 100px;
            &[data-aos]:not(.aos-animate){
                scroll-margin:200px;
            }
        }
        
        .svg {
            position: absolute;
            width: 0;
            height: 0;
        }


        .bevel-right {
            clip-path: url(#beveled-shape-right) !important;
        }

        .beveled-left {
            clip-path: url(#beveled-shape-left) !important;

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
            --background: var(--Primary-600);

            >* {
                position: relative;
                z-index: 2;
            }

        }

        .left-top-shape {
            position: relative;
            --background: #ffffff;
        }

        .left-bottom-shape {
            --background: #6B6B6B;
        }

        .bottom-right-shape {
            --background-color: #1c1c1c;
            --border-color: #6B6B6B;
            --border-width: 2px;
            transition: .5s ease;

            &::before,
            &::after {
                position: absolute;
                content: "";
                width: 100%;
                height: 100%;
                transform: translateX(-50%) translateY(-50%);
                left: 50%;
                top: 50%;
                clip-path: url(#bottom-right-shape) !important;
                z-index: 0;
                transition: .5s ease;

            }

            &::before {
                /* z-index: 2; */
                background-color: var(--border-color);
                transition: .5s ease;
            }

            &::after {
                /* z-index: 2; */
                background-color: var(--background-color);
                width: calc(100% - calc(2 * var(--border-width)));
                height: calc(100% - calc(2 * var(--border-width)));
                transition: .5s ease;
            }

            >* {
                position: relative !important;
                z-index: 1 !important;
            }


        }


        .right-bottom-border {
            --background-color: #1c1c1c;
            --border-color: #6B6B6B;
            --border-width: 2px;
            transition: .5s ease;


            &::before,
            &::after {
                position: absolute;
                content: "";
                width: 100%;
                height: 100%;
                transform: translateX(-50%) translateY(-50%);
                left: 50%;
                top: 50%;
                clip-path: url(#right-bottom-border) !important;
                z-index: 0;
                transition: .5s ease;

            }

            &::before {
                /* z-index: 2; */
                background-color: var(--border-color);
                transition: .5s ease;
            }

            &::after {
                /* z-index: 2; */
                background-color: var(--background-color);
                width: calc(100% - calc(2 * var(--border-width)));
                height: calc(100% - calc(2 * var(--border-width)));
                transition: .5s ease;
            }

            >* {
                position: relative !important;
                z-index: 1 !important;
            }

        }


        .project-right-top {
            --background-color: #1c1c1c;
            --border-color: #6B6B6B;
            --border-width: 2px;
            transition: .5s ease;


            &::before,
            &::after {
                position: absolute;
                content: "";
                width: 100%;
                height: 100%;
                transform: translateX(-50%) translateY(-50%);
                left: 50%;
                top: 50%;
                clip-path: url(#project-right-top) !important;
                z-index: 0;
                transition: .5s ease;
            }

            &::before {
                /* z-index: 2; */
                background-color: var(--border-color);
                transition: .5s ease;
            }

            &::after {
                /* z-index: 2; */
                background-color: var(--background-color);
                width: calc(100% - calc(2 * var(--border-width)));
                height: calc(100% - calc(2 * var(--border-width)));
                transition: .5s ease;
            }

            >* {
                position: relative !important;
                z-index: 1 !important;
            }

        }

        .top-right-shape {
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
                transition: .5s ease;
            }

            &::before {
                /* z-index: 2; */
                background-color: var(--border-color);
                transition: .5s ease;
            }

            &::after {
                /* z-index: 2; */
                background-color: var(--background-color);
                width: calc(100% - calc(2 * var(--border-width)));
                height: calc(100% - calc(2 * var(--border-width)));
                transition: .5s ease;
            }

            >* {
                position: relative !important;
                z-index: 1 !important;
            }

        }
    </style>

    <?php wp_body_open(); ?>

    <!-- Scrollbar-indicatior -->
    <div id="scrollbar-indicator" class=" top-0 w-0 left-0 position-fixed"></div>



    <header class="header  d-flex justify-content-center">
        <!-- position-absolute //position-relative-->
        <nav class="w-100">
            <div class="container">
                <div class="navbar navbar-expand-xl  navbar-light sans-serif w-100" data-aos="slide-down"
                    data-aos-duration="70" data-aos-easing="bounce">
                    <!--Added padding-left and right :20px -->
                    <a href="<?= esc_url(get_permalink(get_page_by_path('front-page'))) ?>" class="navbar-brand d-flex">
                        <img src="<?= get_template_directory_uri() ?>/images/logo.svg" alt="Logo" class=" logo" />
                    </a>


                    <!-- Hamburger button for mobile -->
                    <div class="d-xl-none wrapper">
                        <button id="box" class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                            aria-expanded="false" aria-label="Toggle navigation">
                            <div class="hamburger">
                                <span class="one"></span>
                                <span class="two"></span>
                                <span class="three"></span>
                            </div>
                        </button>
                    </div>



                    <!-- Navigation Menu -->
                    <div class="collapse navbar-collapse ul-bg " id="navbarSupportedContent">
                        <ul class="navbar-nav ms-auto justify-content-center  flex-grow-1">
                            <?php foreach ($menu as $item):
                                $active = get_permalink() == $item->url;
                                if (is_archive()) {
                                    $post_type = get_post_type();
                                    $active = $item->url == get_post_type_archive_link($post_type);
                                }
                                ?>
                                <li class="nav-item dropdown">

                                    <?php if ($item->children): ?>
                                        <a class="nav-link nav-link-ltr dropdown-toggle d-flex align-items-center <?= $active ? "active" : "" ?>"
                                            role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                            <?= $item->title ?>
                                            <img src="<?= get_template_directory_uri(); ?>/images/downarrow.svg"
                                                alt="Dropdown Icon" style="" class="dropdownarrow">
                                        </a>
                                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">

                                            <?php foreach ($item->children as $child): ?>
                                                <li>
                                                    <a class="dropdown-item  d-flex justify-content-between align-items-center"
                                                        href="<?= $child->url; ?>">
                                                        <!-- nav-link-ltr -->
                                                        <?= $child->title ?>

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
                        <a href="<?= get_field("btn", 'option')['url'] ?>"
                            class="button secondary-button ms-lg-3 mt-2 mb-3 mb-lg-0">
                            <?= get_field("btn", 'option')['title'] ?>
                            <img src="<?= get_template_directory_uri(); ?>/images/vector.svg" alt="Arrow"
                                class="dropdown-arrow">
                        </a>

                    </div>


                </div>
            </div>
        </nav>
    </header>