<?php
$id = $args['id'] ?? 0;
$bgImg = get_the_post_thumbnail_url($id);
?>

<div class="hero" style="margin-top: 130px">
    <div class="hero-section bg-holder d-flex align-items-start flex-column">
        <div class="bg-img" style="
            <?php if ($bgImg): ?>
                background: linear-gradient(180deg, rgba(43, 5, 4, 0.00) 0%, rgba(0, 0, 0, 0.64) 100%), url('<?= esc_url($bgImg) ?>') center / cover no-repeat;
              <?php
            else: ?>
            /* background:#1E5B80; */
            <?php
            endif; ?>
            ">
        </div>
        <div class="hero-content container <?= $bgImg ? 'text-left' : 'text-center' ?>">
            <?php get_template_part('components/breadcrumb', null, ['center' => !$bgImg]) ?>
            <!-- Added -->
            <div class="row">
                <div
                    class="col-12 
                  <?= $bgImg ? 'col-lg-8 col-md-4' : 'col-lg-8 offset-lg-2' ?> 
                         my-auto d-flex flex-column 
                     <?= $bgImg ? 'justify-content-start align-items-start align-self-start' : 'justify-content-center align-items-center align-self-center mx-auto' ?>">
                    <h1 data-aos="fade-up" data-aos-offset="100" data-aos-delay="50" data-aos-duration="1000"
                        data-aos-easing="ease-in-out">
                        <?php if ($hero_title): ?>
                            <?= get_field("hero_title", $id) ?> 
                            <?php
                        else: ?>
                            <?= get_the_title($id); ?>
                            <?php
                        endif; ?>

                        <!-- <?= get_the_title($id); ?> -->
                        <!-- <?= get_field("hero_title", $id) ?> -->
                    </h1>

                </div>
            </div>
        </div>
    </div>
</div>