<?php get_header();
//Template Name: frontpage 
$fields = get_fields();
?>

<main class="front-page">
    <div class=" position-relative">
        <div class="container">
            <!-- Hero Section -->
            <div class="hero-section bg-holder hero-bevel position-relative">

                <!-- Background Image -->
                <img class="bg-content" src="<?= get_the_post_thumbnail_url() ?>" alt="" />

                <!-- Optional Image/Video -->
                <?php if ($header['image']): ?>
                    <img class="bg-content" src="<?= $header['image']['url'] ?>" alt="">
                <?php elseif ($header['video']): ?>
                    <video class="bg-content" autoplay muted loop>
                        <source src="<?= $header['video']['url'] ?>" type="video/mp4">
                    </video>
                <?php endif; ?>

                <!-- Gradient Overlay -->
                <div class="overlay"></div>

            
                <div class="hero-content position-relative">
                    <div class="row align-items-end">
                        <div class="col-12 col-md-7 col-lg-5 text-justify">
                            <h1>HEGRO Steel. Stand strong.</h1>
                            <div class="lead">
                                Wij monteren staalconstructies, plaatsten daken en wanden, installeren prefab beton en
                                bouwen huizen en bedrijfspanden vanaf nul. Als jij het kunt verzinnen, kunnen wij het
                                bouwen.
                            </div>
                        </div>

                        <div
                            class="col-12 col-md-5 col-lg-7 d-flex justify-content-lg-start justify-content-md-start  mt-4 mt-md-0">
                            <div class="go-down align-self-end">
                                <div class="arrow-container mt-3">
                                    <a href="#Service-Section" aria-label="Go to the content">
                                        <img src="<?= get_template_directory_uri() ?>/images/down-arrow.svg"
                                            alt="Go down" />
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


            </div>

            <!-- Service-section -->
            <?php
            foreach ($fields['content'] as $content) {
                get_template_part('components/' . $content['acf_fc_layout'], null, ['fields' => $content]);
            }
            ?>

        </div>
    </div>
</main>

<?php get_footer() ?>