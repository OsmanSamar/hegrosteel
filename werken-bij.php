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
    </div>



</main>

<?php get_footer() ?>