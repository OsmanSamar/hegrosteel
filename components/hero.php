<?php 
    $id= $args['id'] ?? 0;
    $bgImg= get_the_post_thumbnail_url( $id);
?>

<div class="hero" style="margin-top: 130px">
    <div class="hero-section bg-holder d-flex align-items-start flex-column">
        <div class="bg-img"
            style="
            <?php if($bgImg): ?>
                background: linear-gradient(180deg, rgba(43, 5, 4, 0.00) 0%, rgba(0, 0, 0, 0.64) 100%), url('<?= esc_url($bgImg) ?>') center / cover no-repeat;
              <?php
            else:?>
            /* background:#1E5B80; */
            <?php
            endif; ?>
            ">
        </div>
        <div class="hero-content container text-left"> 
        <?php get_template_part('components/breadcrumb') ?>
        <div class="row">
            <div class="col-12 col-lg-4 col-md-4 my-auto align-self-start d-flex flex-column justify-content-start align-items-start">
                <h1 data-aos="fade-up" data-aos-offset="100" data-aos-delay="50"
                    data-aos-duration="1000" data-aos-easing="ease-in-out">
                    <?= get_field("hero_title",$id) ?>
                </h1>
            </div>
        </div>
    </div>
    </div>
  
</div>
