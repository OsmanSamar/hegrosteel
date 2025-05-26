<?php
/*
Template Name: single vacature
*/
get_header();


$uren = get_the_terms(get_the_ID(), 'uren');
$salary = get_the_terms(get_the_ID(), 'salary');
$vakantiedagen = get_the_terms(get_the_ID(), 'vakantiedagen');
$pensioenregeling = get_the_terms(get_the_ID(), 'pensioenregeling');
$text = get_the_terms(get_the_ID(), 'text');
$buttons = get_the_terms(get_the_ID(), 'buttons');
$vacature_repeater = get_the_terms(get_the_ID(), 'vacature_repeater');

?>

<main class="vacatures">
  <div class="container">
    <div>
      <?php get_template_part("components/hero"); ?>
    </div>

    <!-- First Section -->
    <div class="first-row">
      <div class="row g-3 ">
        <div class="col-6 col-lg-3 ">
          <?php if ($salary): ?>
            <?php foreach ($salary as $term): ?>
              <div class="vacture-items mb-3 gap-2">
                <span class="lead">
                  <?= esc_html($term->name); ?>
                </span>
              </div>

            <?php endforeach; ?>
          <?php endif; ?>
        </div>

        <div class="col-6 col-lg-3">
          <?php if ($uren): ?>
            <?php foreach ($uren as $term): ?>
              <div class="vacture-items mb-3 gap-2">
                <span class="lead">
                  <?= esc_html($term->name); ?>
                </span>
              </div>
            <?php endforeach; ?>
          <?php endif; ?>
        </div>

        <div class="col-6 col-lg-3 ">
          <?php if ($vakantiedagen): ?>
            <?php foreach ($vakantiedagen as $term): ?>
              <div class="vacture-items mb-3 gap-2">
                <span class="lead">
                  <?= esc_html($term->name); ?>
                </span>
              </div>
            <?php endforeach; ?>
          <?php endif; ?>
        </div>

        <div class="col-6 col-lg-3 ">
          <?php if ($pensioenregeling): ?>
            <?php foreach ($pensioenregeling as $term): ?>
              <div class="vacture-items mb-3 gap-2">
                <span class="lead">
                  <?= esc_html($term->name); ?>
                </span>
              </div>
            <?php endforeach; ?>
          <?php endif; ?>
        </div>
      </div>
    </div>

    <!-- Second Section -->
    <div class="row second-row">
      <div class="col-lg-7 offset-lg-1 ">
        <div class="d-flex flex-column gap-3">
          <!--  -->
          <span class="regular left-text">
            <?= get_field("text"); ?>
          </span>


          <!-- Buttons -->
          <div class="d-flex  gap-3 mt-5 flex-wrap">
            <a type="button" class="button secondary-button" href="#solliciteren">Direct solliciteren
              <img loading="lazy" src="<?= get_template_directory_uri(); ?>/images/vector.svg" alt="Arrow"
                class="dropdown-arrow">
            </a>
            <a type="button " class="button primary-button"
              href="https://wa.me/<?= get_field('whatsappnumber', 'option') ?>" target="_blank">
              Vragen? App Hermen
              <img loading="lazy" src="<?= get_template_directory_uri() ?>/images/white-whatsapp-icon.svg"
                alt="Open whatsapp" class="whatsappimg" />
            </a>
          </div>
        </div>
      </div>
    </div>






    <?php if (have_rows('vacature_repeater')): ?>
      <?php $index = 0; ?>

      <!-- For Lg Screen-->
      <div class="container gallery d-none d-lg-block">
        <div class="row align-items-center vacature-block mb-5 third-row">
          <!-- Left Column: Texts -->
          <div class="col-lg-6 left offset-1 d-flex flex-column gap-3">
            <div class="detailsWrapper">
              <?php while (have_rows('vacature_repeater')):
                the_row(); ?>
                <div class="details">
                  <?php $title = get_sub_field('title'); ?>
                  <?php $text = get_sub_field('text'); ?>
                  <?php $hasalist = get_sub_field('has_a_list'); ?>
                  <?php $image = get_sub_field('image'); ?>
                  <?php $hasabutton = get_sub_field('has_a_button'); ?>

                  <?php if ($title): ?>
                    <h3 class="mb-4"><?= esc_html($title); ?></h3>
                  <?php endif; ?>
                  <?php if ($text): ?>
                    <span class="regular"><?= esc_html($text); ?></span>
                  <?php endif; ?>

                  <?php if ($hasalist && have_rows('list')): ?>
                    <div class="mt-4">
                      <?php while (have_rows('list')):
                        the_row(); ?>
                        <?php $list_item = get_sub_field('text'); ?>
                        <?php if (!empty($list_item)): ?>
                          <div class="repeater-item d-flex align-items-center gap-2 w-100">
                            <img loading="lazy" src="<?= get_template_directory_uri(); ?>/images/ckeck.svg" alt="Arrow" class="dropdown-arrow">
                            <p class="regular mb-2"><?= esc_html($list_item); ?></p>
                          </div>
                        <?php endif; ?>
                      <?php endwhile; ?>
                    </div>
                  <?php endif; ?>

                  <?php if ($hasabutton): ?>
                    <div class="d-flex flex-row gap-3 mt-5">
                      <a type="button" class="button secondary-button" href="#solliciteren">
                        Direct solliciteren
                        <img loading="lazy" src="<?= get_template_directory_uri(); ?>/images/vector.svg" alt="Arrow" class="dropdown-arrow">
                      </a>
                      <a type="button" class="button primary-button"
                        href="https://wa.me/<?= get_field('whatsappnumber', 'option') ?>" target="_blank">
                        Vragen? App Hermen
                        <img loading="lazy" src="<?= get_template_directory_uri(); ?>/images/white-whatsapp-icon.svg" alt="Open whatsapp"
                          class="whatsappimg" />
                      </a>
                    </div>
                  <?php endif; ?>
                </div>
              <?php endwhile; ?>
            </div>
          </div>

          <!-- Right Column: Images -->
          <div class="right col-lg-4 offset-1 overflow-right">
            <div class="photos">
              <?php while (have_rows('vacature_repeater')):
                the_row(); ?>
                <?php $image = get_sub_field('image'); ?>
                <?php if (!empty($image)): ?>
                  <div class="photo">
                    <img loading="lazy"  src="<?= esc_url($image['url']); ?>" alt="<?= esc_attr($image['alt']); ?>" />
                  </div>
                <?php endif; ?>
              <?php endwhile; ?>
            </div>
          </div>
        </div>
      </div>




      <!-- For sm and md screens only -->
      <div class="container d-lg-none">
        <?php while (have_rows('vacature_repeater')):
          the_row(); ?>
          <div class="vacature-block mb-5">


            <div class="details mb-5">
              <?php $title = get_sub_field('title'); ?>
              <?php $text = get_sub_field('text'); ?>
              <?php $hasalist = get_sub_field('has_a_list'); ?>
              <?php $hasabutton = get_sub_field('has_a_button'); ?>

              <?php if ($title): ?>
                <h3 class="mb-3"><?= esc_html($title); ?></h3>
              <?php endif; ?>

              <?php if ($text): ?>
                <p class="regular"><?= esc_html($text); ?></p>
              <?php endif; ?>

              <?php if ($hasalist && have_rows('list')): ?>
                <ul class="list-unstyled mt-3">
                  <?php while (have_rows('list')):
                    the_row(); ?>
                    <?php $list_item = get_sub_field('text'); ?>
                    <?php if (!empty($list_item)): ?>
                      <li class="d-flex align-items-start gap-2 mb-2">
                        <img loading="lazy" src="<?= get_template_directory_uri(); ?>/images/ckeck.svg" alt="Check" class="dropdown-arrow">
                        <span class="regular"><?= esc_html($list_item); ?></span>
                      </li>
                    <?php endif; ?>
                  <?php endwhile; ?>
                </ul>
              <?php endif; ?>

              <?php if ($hasabutton): ?>
                <div class="d-flex flex-row flex-wrap gap-3 mt-3">
                  <a href="#solliciteren" class="button secondary-button">
                    Direct solliciteren
                    <img loading="lazy" src="<?= get_template_directory_uri(); ?>/images/vector.svg" alt="Arrow" class="dropdown-arrow">
                  </a>
                  <a href="https://wa.me/<?= get_field('whatsappnumber', 'option'); ?>" target="_blank" class="button primary-button">
                    Vragen? App Hermen
                    <img loading="lazy" src="<?= get_template_directory_uri(); ?>/images/white-whatsapp-icon.svg" alt="WhatsApp"
                      class="whatsappimg" />
                  </a>
                </div>
              <?php endif; ?>
            </div>

            <?php $image = get_sub_field('image'); ?>
            <?php if (!empty($image)): ?>
              <div class="photo mt-5">
                <img loading="lazy" src="<?= esc_url($image['url']); ?>" alt="<?= esc_attr($image['alt']); ?>" class="img-fluid rounded">
              </div>
            <?php endif; ?>

          </div>
        <?php endwhile; ?>
      </div>



    <?php endif; ?>











    <!-- Image swiper -->
    <div class="images-swiper">

      <div class="images-slider">
        <div class="container">
          <div class="row">
            <div class=" col-lg-12 ">
              <div class="d-flex align-items-center justify-content-between gap-3 flex-wrap">
                <h2><?= get_field("swiper_title") ?></h2>
                <a href="<?= get_field("button")['url'] ?>" class="button primary-button ">
                  <?= get_field("button")['title'] ?>
                  <img loading="lazy" src="<?= get_template_directory_uri(); ?>/images/vector.svg" alt="Arrow" class="dropdown-arrow">
                </a>
              </div>
            </div>

            <div class="col-lg-12 ">
              <div class="swiper-container swiper images-swiper ">
                <div class="swiper-wrapper">
                  <?php if (have_rows('images_repeater')): ?>
                    <?php while (have_rows('images_repeater')):
                      the_row(); ?>
                      <div class="swiper-slide">
                        <?php
                        $image = get_sub_field('img');
                        if ($image): ?>
                          <div class="">
                            <img loading="lazy" src="<?= esc_url($image['url']) ?>" alt="<?= esc_attr($image['alt']) ?>"
                              class="swiper-img " />
                          </div>
                        <?php endif; ?>
                      </div>
                    <?php endwhile; ?>
                  <?php endif; ?>
                </div>
                <div class="container">
                  <div class="row">
                    <div class="swiper-navigation col-12 col-lg-6 col-md-6  offset-lg-3 offset-md-3  d-flex gap-3 ">
                      <div class="swiper-button-prev d-none d-md-flex d-lg-flex">
                        <img loading="lazy" src="<?= get_template_directory_uri(); ?>/images/prev-btn.svg" alt="Prev arrow"
                          class="dropdown-arrow">
                      </div>
                      <div class="custom-swiper-scrollbar"></div>
                      <div class="swiper-button-next d-none d-md-flex d-lg-flex">
                        <img loading="lazy" src="<?= get_template_directory_uri(); ?>/images/next-btn.svg" alt="Next arrow"
                          class="dropdown-arrow">
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




    <!-- Service-section -->
    <div class="solliciteer-form col-12 col-lg-12" id="solliciteren">
      <div class="d-flex flex-column contact-form form-1 position-relative">
        <h3>Meer weten of solliciteren?</h3>
        <?= do_shortcode('[gravityform id="3" title="false" description="false"   cssClass="form-1"]') ?>
      </div>
    </div>

  </div>
</main>

<?php get_footer(); ?>