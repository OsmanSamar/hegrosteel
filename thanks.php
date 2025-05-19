<?php get_header()

    //Template Name: thank-you
    ?>

<main id="page" class="thankyou">
    <div class="container">
        <div class="row thanks-container">
            <div class="col-lg-4  d-flex flex-column justify-content-start align-items-start gap-3">
                <h2>Dankjewel!</h2>
                <span class="regular">We hebben je bericht goed ontvangen en komen zo snel mogelijk bij je terug.</span>
                <a href="<?= home_url() ?>" class="button secondary-button  mt-4 ">Terug naar home
                    <img src="<?= get_template_directory_uri(); ?>/images/vector.svg" alt="Arrow"
                        class="dropdown-arrow">
                </a>
            </div>
            <div class="col-lg-7 offset-lg-1">
                <img src="<?= get_template_directory_uri(); ?>/images/thanks.png" alt="Thanks " class="thanks-img">
            </div>
        </div>
    </div>
</main>

<?php get_footer() ?>