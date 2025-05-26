<?php
$lijnen_bg = get_field('lijnen-bg'); // Get value from back-end 

get_header()

    ?>
<!-- add has-lijnen if check is on -->
<main class="diensten <?php echo ($lijnen_bg ? 'lijnen-bg' : ''); ?>">
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