<?php get_header()  //Template Name: privacystatement  ?>

<main class="privacy_statement">
    <div class="container">
         <!-- Hero Section -->
        <div>
            <?= get_template_part("components/hero") ?>
        </div>
       <div class="mt-5 mb-5">
         <?php if(have_posts()) : while(have_posts()) : the_post(); ?>

            <?php the_content(); ?>
        <?php endwhile; endif; ?>
       </div>
    </div>
     
</main>



<?php get_footer() ?>