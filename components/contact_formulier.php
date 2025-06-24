<?php
$fields = $args['fields'];

?>

<div class="contact-formulier">
    <div class="row">
        <div class="col-12 col-lg-5 mb-5" data-aos="fade-up" data-aos-offset="120" data-aos-delay="50"
            data-aos-duration="70" data-aos-easing="ease-in-out">

            <div class="shared-content  top-right-shape  position-relative">
                <h3> <?= $fields['left_tilte']; ?></h3>
                <div class="h4 mb-4 mt-4"> <?= $fields['left_sub_title']; ?></div>
               
                <div class="contact-row">
                    <span class="regular diffrent-color"><?= $fields['adress_title']; ?></span>
                    <?php
                    $address = get_field("hegrosteel_adress", 'option');
                    $postcode = get_field("hegrosteel_postcode", 'option');
                    $full_address = $address . ', ' . $postcode;
                    ?>
                    <a href="https://www.google.com/maps/search/?api=1&query=<?= urlencode($full_address); ?>"
                        target="_blank" class="regular d-block">
                        <?= $address ?><br>
                        <?= $postcode ?>
                    </a>
                </div>


                <div class="contact-row">
                    <span class="regular diffrent-color "><?= $fields['email_title']; ?></span>
                    <a href="mailto:<?= get_field("hegrosteel_mail", 'option') ?>" class=" regular footer-link-ltr">
                        <?= get_field("hegrosteel_mail", 'option') ?>
                    </a>
                </div>

                <div class="contact-row">
                    <span class=" regular diffrent-color "><?= $fields['telephone_title']; ?></span>
                    <a href="tel:<?= get_field("hegrosteel_phone_num", 'option') ?>" class=" regular footer-link-ltr">
                        <?= get_field("hegrosteel_phone_num", 'option') ?>
                    </a>
                </div>

                <div class="contact-row">
                    <span class=" regular diffrent-color"><?= $fields['kvk']; ?></span>
                    <span class=" regular"><?= $fields['kvk_num']; ?></span>
                </div>

                <div class="contact-row">
                    <span class="regular diffrent-color"><?= $fields['btw']; ?></span>
                    <span class=" regular"><?= $fields['btw_text']; ?></span>
                </div>

                <div class="bel-of-app-container mt-4">
                    <a href="https://wa.me/<?= get_field('whatsappnumber', 'option') ?>" target="_blank"
                        class="d-flex align-items-center justify-content-between w-100">
                        <span class="bold">
                            <?= $fields['direct_contact']; ?>
                        </span>

                        <span class="whatsapp-container">
                            <span class="whatsapp-badge">1</span>
                            <img loading="lazy" src="<?= get_template_directory_uri() ?>/images/whatsapp.svg"
                                alt="Open whatsapp" class="whatsappimg" />
                        </span>
                    </a>
                </div>
            </div>
        </div>

        <div class="col-12 col-lg-7" data-aos="fade-up" data-aos-offset="120" data-aos-delay="50" data-aos-duration="70"
            data-aos-easing="ease-in-out">

            <!-- Contact form -->
            <div class="solliciteer-form">
                <div class="d-flex flex-column contact-form form-1 position-relative">
                    <h3>Contactformulier</h3>
                    <?= do_shortcode('[gravityform id="2" title="false" description="false"   cssClass="form-1"]') ?>

                </div>
            </div>
        </div>
    </div>
</div>