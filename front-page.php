<?php get_header();
//Template Name: frontpage 
$fields = get_fields();
?>

<main class="front-page">
    <div class=" position-relative ">
        <div class="container">
            <!-- Hero Section -->
            <div class="hero-section-wrap">
                <div class="hero-section bg-holder hero-responsive position-relative" data-aos="fade-down"
                    data-aos-offset="120" data-aos-delay="50" data-aos-duration="70" data-aos-easing="ease-in-out">
                    <div class="bg-content fancybox fancy-video" style="--top-left:300px;">
                        <!-- Volgens David -->
                        <div class="overlay"></div>
                        <video src="<?= $fields['header_video']['url'] ?>" autoplay muted playsinline loop></video>
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
                            <div class="col-12 col-md-8 col-lg-8 col-xl-7 col-xxl-6">
                                <h1 data-aos="fade-up" data-aos-offset="120" data-aos-delay="50" data-aos-duration="70"
                                    data-aos-easing="ease-in-out">
                                    <?= get_field("header_title") ?>
                                </h1>
                                <div class="lead col-lg-9 col-xxl-12" data-aos="fade-up" data-aos-offset="120"
                                    data-aos-delay="50" data-aos-duration="70" data-aos-easing="ease-in-out">
                                    <?= get_field("header_text") ?>

                                </div>
                            </div>
                            <div
                                class="col-12 col-md-1 offset-md-3 col-lg-1 offset-lg-3 col-xl-1 offset-xl-4 col-xxl-1 offset-xxl-5 d-flex justify-content-lg-start justify-content-md-start mt-4 mt-md-0 left-col">
                                <a href="#Service-Section" aria-label="Go to the content">
                                    <div class="arrow-container mt-3">
                                        <img loading="lazy"
                                            src="<?= get_template_directory_uri() ?>/images/down-arrow.svg"
                                            alt="Go down" class="down-arrow" />
                                    </div>
                                </a>
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