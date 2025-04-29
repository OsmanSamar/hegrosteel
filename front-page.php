<?php get_header()
    //Template Name: frontpage 

    ?>

<main class="front-page">
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
                                prefab beton en bouwen huizen en bedrijfspanden vanaf nul. Als jij het kunt verzinnen,
                                kunnen wij het bouwen. </div>
                        </div>
                        <div class="col-12 col-lg-7"></div>




                    </div>
                </div>
        </div>

        <!-- Service-section -->
        <?php
        get_template_part('components/services_section');
        ?>



    </div>
</main>

<?php get_footer() ?>