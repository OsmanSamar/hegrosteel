<?php
$fields = $args['fields'];
?>
<?php if ($fields['tab']): ?>
    <div class="row">
        <div class="col-lg-12">
            <div class="tabs tab-right">
                <div class="row">
                    <div class="col-lg-12">
                        <nav class="border-wrap d-flex flex-wrap">
                            <?php
                            foreach ($fields['tab'] as $i => $tab):
                                ;
                                $tab_title = $tab['tab_title'];
                                ?>
                                <div class="col-lg-4">
                                    <a href="#tab<?= $i; ?>" class="tab-link <?= $i == 0 ? 'active' : ''; ?>"
                                        data-tab="content<?= $i; ?>">
                                        <h4><?= $tab_title; ?></h4>
                                    </a>
                                </div>
                            <?php endforeach; ?>
                        </nav>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12">
                        <?php
                        foreach ($fields['tab'] as $i => $tab):
                            ?>
                            <div class="tab-content" <?= $i == 0 ? "" : 'style="display: none;"' ?> id="content<?= $i ?>">
                            <div class="row">
                                <div class="col-lg-6">

                                </div>

                            </div>

                                <h3><?= $tab['title']; ?></h3>
                                <h4><?=$tab['text']; ?></h4>
                            </div>
                        <?php endforeach; ?>
                       
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>