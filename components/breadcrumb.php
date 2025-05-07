<?php
// $breadcrumb = get_field('breadcrumb_groep');
?>

<div class="breadcrumb-wrap" data-aos="fade-up" data-aos-offset="100" data-aos-delay="50" data-aos-duration="1000"
    data-aos-easing="ease-in-out">

    <div class="align-self-start d-flex flex-column justify-content-start align-items-start">
        <div class="d-flex align-items-start justify-content-start   ">
            <?php
            if (function_exists('yoast_breadcrumb')) {
                yoast_breadcrumb('<p id="breadcrumbs" >', '</p>');
            }
            ?>
        </div>


    </div>

</div>