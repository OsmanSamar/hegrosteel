<?php get_header() ?> 
   
<main id="page" class="p404">
   
 <div class="container">
        <div class="row p404-container">
            <div class="col-lg-4  d-flex flex-column justify-content-start align-items-start gap-3 mb-5">
                <h2>Deze pagina staat nog in de steigers</h2>
                <a href="<?= home_url() ?>" class="button secondary-button  mt-4 ">Terug naar home
                    <img src="<?= get_template_directory_uri(); ?>/images/vector.svg" alt="Arrow"
                        class="dropdown-arrow">
                </a>
            </div>
            <div class="col-lg-8  beveled-left position-relative">
                <img src="<?= get_template_directory_uri(); ?>/images/404.png" alt="404" class="p404-img">
            </div>
        </div>
    </div>
    
</main>

<?php get_footer() ?>
