<?php get_header();
//Template Name: frontpage 
$fields = get_fields();
?>

<main class="front-page">
    <div class=" position-relative">
        <div class="container">
            <!-- Hero Section -->
            <div class="hero-section bg-holder hero-responsive position-relative">

                <!-- Background Image -->
                <!-- <img class="bg-content" src="<?= get_the_post_thumbnail_url() ?>" alt="" /> -->
                <div class="bg-content"
                    style="background: linear-gradient(180deg,  rgba(0, 0, 0, 0.00) -11.36%, rgba(0, 0, 0, 0.81) 82.88%), url('<?= get_the_post_thumbnail_url() ?>') lightgray 50% / cover no-repeat;">
                </div>

                <!-- Optional Image/Video -->
                <?php if ($header['image']): ?>
                    <img class="bg-content" src="<?= $header['image']['url'] ?>" alt="">
                <?php elseif ($header['video']): ?>
                    <video class="bg-content" autoplay muted loop>
                        <source src="<?= $header['video']['url'] ?>" type="video/mp4">
                    </video>
                <?php endif; ?>

               
                <div class="hero-content position-relative">
                    <div class="row align-items-end">
                        <div class="col-12 col-md-7 col-lg-9 col-xl-7 ">
                            <h1><span>HEGRO Steel.</span> 
                                <span>Stand strong.</span>
                            </h1>
                            <div class="lead">
                                Wij monteren staalconstructies, plaatsten daken en wanden, installeren prefab beton en
                                bouwen huizen en bedrijfspanden vanaf nul. Als jij het kunt verzinnen, kunnen wij het
                                bouwen.
                            </div>
                        </div>
                        <div
                            class="col-12 col-md-5 col-lg-3 col-xl-5 d-flex justify-content-lg-start justify-content-md-start mt-4 mt-md-0 left-col">
                            <a href="#Service-Section" aria-label="Go to the content">
                                <div class="arrow-container mt-3">
                                    <img src="<?= get_template_directory_uri() ?>/images/down-arrow.svg" alt="Go down"
                                        class="down-arrow" />
                                </div>
                            </a>
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