<?php
$fields = $args['fields'];
?>
<!-- <div class="row">
    <div class="col-lg-12">
        <div class="tabs tab-right">
            <nav class="border-wrap">
               <a href="#tab1" title="tab1" class="tab-link active border-wrap" data-tab="content1">
               <h4><?= '' // $fields['tab_title']; ?></h4>
            </a>
                <a href="#tab2 border-wrap" class="tab-link" data-tab="content2">Tab2</a>
                <a href="#tab3 border-wrap" class="tab-link" data-tab="content3">Tab3</a>
            </nav>

            <div class="tab-content" id="content1">Content 1 goes here.</div>
            <div class="tab-content" id="content2" style="display: none;">Content 2 goes here.</div>
            <div class="tab-content" id="content3" style="display: none;">Content 3 goes here.</div>
        </div>
    </div>
</div> -->

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