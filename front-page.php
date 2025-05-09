<?php get_header();
//Template Name: frontpage 
$fields = get_fields();
?>

<main class="front-page">
    <div class="position-relative">
        <div class="container">
            <!-- Hero Section -->
            <div class="hero-section bg-holder">
                <img class="bg-content" src="<?= get_the_post_thumbnail_url() ?>" alt="" style="  background: linear-gradient(
        180deg,
        rgba(43, 5, 4, 0) -11.36%,
        rgba(0, 0, 0, 0.81) 82.88%
      );">
                <?php
                if ($header['image']) {
                    ?>
                    <img class="bg-content" src="<?= $header['image']['url'] ?>" alt="">
                    <?php
                } elseif ($header['video']) {
                    ?>
                    <video class="bg-content" src="<?= $header['image']['url'] ?>" alt="">
                        <?php
                }
                ?>
                    <div class="hero-content">
                        <div class="row ">
                            <div class="col-12 col-lg-5">
                                <h1>HEGRO Steel. Stand strong.</h1>
                                <div class="lead">Wij monteren staalconstructies, plaatsten daken en wanden, installeren
                                    prefab beton en bouwen huizen en bedrijfspanden vanaf nul. Als jij het kunt
                                    verzinnen,
                                    kunnen wij het bouwen. </div>
                            </div>
                            <div class="col-12 col-lg-7 d-flex justify-content-between">

                                <div class="go-down">
                                    <div class="arrow-container mt-3">
                                        <a href="#Service-Section" aria-label="Go to the content">
                                            <img src="<?= get_template_directory_uri() ?>/images/down-arrow.svg"
                                                alt="Go down" />
                                        </a>
                                    </div>
                                </div>

                                <div class="whatsapp-fixed">
                                    <div class=" mt-3">
                                        <a href="https://wa.me/<?= get_field('whatsappnumber', 'option') ?>" class="">
                                            <span class="d-flex justify-content-center align-items-center">
                                                <img src="<?= get_template_directory_uri() ?>/images/whatsapp.svg"
                                                    alt="Open whatsapp" />
                                            </span>
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