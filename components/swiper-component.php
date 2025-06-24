<?php
$swiper_title = get_field("swiper_title");
$button = get_field("button");
$images_repeater = 'images_swiper';

if (have_rows($images_repeater)): ?>
  <div class="image-swiper">
    <div class="image-slider">
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <div class="d-flex align-items-center justify-content-between gap-3 flex-wrap">
              <h2><?= esc_html($swiper_title) ?></h2>
              <a href="<?= esc_url($button['url']) ?>" class="button primary-button">
                <?= esc_html($button['title']) ?>
                <img loading="lazy" src="<?= get_template_directory_uri(); ?>/images/vector.svg" alt="Arrow"
                  class="dropdown-arrow">
              </a>
            </div>
          </div>
          <div class="col-lg-12">
            <div class="swiper-container swiper image-swiper">
              <div class="swiper-wrapper">
                <?php $i = 0;
                while (have_rows($images_repeater)):
                  the_row();
                  $image = get_sub_field('img'); ?>
                  <div class="swiper-slide" <?= $i < 7 ? 'data-aos="fade-up" data-aos-delay="' . (100 + $i * 50) . '"' : '' ?>>
                    <?php if ($image): ?>
                      <div class="swiper-img-container">
                        <img loading="lazy" src="<?= esc_url($image['url']) ?>" alt="<?= esc_attr($image['alt']) ?>"
                          class="swiper-img" />
                      </div>
                    <?php endif; ?>
                  </div>
                  <?php $i++; endwhile; ?>
              </div>

              <div class="container">
                <div class="row">
                  <div class="swiper-navigation col-12 col-lg-6 col-md-6  offset-lg-3 offset-md-3  d-flex gap-3 ">
                    <div class="swiper-button-prev d-none d-md-flex d-lg-flex">
                      <img loading="lazy" src="<?= get_template_directory_uri(); ?>/images/prev-btn.svg" alt="Prev arrow"
                        class="swiper-arrow">
                    </div>
                    <div class="custom-swiper-scrollbar"></div>
                    <div class="swiper-button-next d-none d-md-flex d-lg-flex">
                      <img loading="lazy" src="<?= get_template_directory_uri(); ?>/images/next-btn.svg" alt="Next arrow"
                        class="swiper-arrow">
                    </div>
                  </div>
                </div>
              </div>

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
<?php endif; ?>