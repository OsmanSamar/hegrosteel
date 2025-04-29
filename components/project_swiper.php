<div class="container">
    <div class="card-container projecten-slider projecten-container  ">
        <div class="swiper-container swiper position-relative overflow-visible">

            <img src="<?= get_images_url('dots.svg') ?>" alt="Dots-Image" class="objects-img">

            <div class="swiperproject projecten-swiper overflow-visible">
                <div class="swiper-wrapper">
                    <!-- project_swiper Repeater -->
                    <?php if (!empty($fields['project_swiper'])): ?>
                        <?php foreach ($fields['project_swiper'] as $swiper_item): ?>

                        <div class="swiper-slide d-flex align-items-start justify-content-between">

                            <?php if (!empty($swiper_item['img'])): ?>

                                <img src="<?= $swiper_item['img']['url']; ?>" />
                            <?php endif; ?>
                            <?php if (!empty($swiper_item['sub_title'])): ?>
                                <p class=" regular mb-0 flex-shrink-0"><?= $swiper_item['sub_title']; ?></p>
                            <?php endif; ?>
                            <?php if (!empty($swiper_item['adres'])): ?>
                                <h3 class="regular mb-0"><?= $swiper_item['adres']; ?></h3>
                            <?php endif; ?>

                            <?php if (!empty($swiper_item['plaatsnaam'])): ?>
                                <h3 class="regular mb-0"><?= $swiper_item['plaatsnaam']; ?></h3>
                            <?php endif; ?>


                        </div>
                        <hr class="divider mt-3 ">

                    <?php endforeach; ?>
                    <?php endif; ?>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class=" col-8 col-lg-6 col-md-6  offset-lg-3 offset-md-3 offset-2 d-flex gap-3 mt-4">
                        <div class="swiper-btn swiper-button-prev"></div>
                        <div class="custom-swiper-scrollbar"></div>
                        <div class="swiper-btn swiper-button-next"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>