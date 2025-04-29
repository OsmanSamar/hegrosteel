<!DOCTYPE html>

<html>
    <head>
        <?php wp_head(); ?>
        <title><?php wp_title() ?></title>
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    </head>

    <body <?php body_class(); ?>>
        <?php wp_body_open(); ?>

        <header class="header">
            <nav>
                <div class="container">
                    <div class="navbar navbar-expand-lg navbar-light sans-serif">
                        <a href="<?= home_url() ?>" class="navbar-brand">
                            <img src="<?= get_images_url() ?>/logo.svg" alt="<?php // TODO Website name ?>">
                        </a>
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <?php
                            wp_nav_menu(array(
                                'menu'            => 'header-menu',
                                'depth'           => 2,
                                'container'       => false,
                                'menu_class'      => 'navbar-nav ms-auto',
                                'fallback_cb'     => 'WP_Bootstrap_Navwalker::fallback',
                                'walker'          => new WP_Bootstrap_Navwalker(),
                            ));
                            ?>
                        </div>
                    </div>
                </div>
            </nav>
        </header>
