<?php get_header()

    //Template Name: werken bij

    ?>

<main class="werken-bij">
    <div class="container">
        <div>
            <?= get_template_part("components/hero") ?>
        </div>



        <!-- Service-section -->
        <?php
        $content = get_field('content');

        if (!empty($content) && is_array($content)) {
            foreach ($content as $block) {
                get_template_part('components/' . $block['acf_fc_layout'], null, ['fields' => $block]);
            }
        }
        ?>
        <div>
            <!-- [gravityform id="1" title="true"] -->
        </div>
        <!-- Contact form -->
        <div class="col-12 col-lg-12">
            <div class="d-flex flex-column contact-form form-1 position-relative">
                <h3>Solliciteer direct op deze vacature</h3>
                <?= do_shortcode('[gravityform id="1" title="false" description="false"   cssClass="form-1"]') ?>
            </div>
        </div>


</main>

<?php get_footer() ?>