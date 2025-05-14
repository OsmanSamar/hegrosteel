<?php
$paginator=$args['paginator'];
if ($paginator['max_num_pages'] > 1) { ?>
    <nav class="d-flex justify-content-center w-100 mt-4 mb-5 flex-md-row align-items-center gap-3 " aria-label="Pagination">

        <?php if ($paginator['current_page'] == 1) { ?>
            <button disabled class="pagination-prev disabled" aria-disabled="true" aria-label="<?= __('Vorige', 'codeblauw') ?>">

            </button>
        <?php } else { ?>
            <button data-page="<?= $paginator['current_page'] - 1 ?>" class="pagination-prev pagination-item" aria-label="<?= __('Vorige', 'codeblauw') ?>">
            </button>
        <?php } ?>

        <div class="hidden d-flex align-items-center justify-content-center gap-2 flex-row">
            <?php foreach (range(1, $paginator['max_num_pages']) as $page) { ?>
                <?php if ($page < 3) { ?>
                    <button data-page="<?= $page ?>" class="pagination-btn pagination-item <?= $paginator['current_page'] === $page ? 'pagination-active ' : 'btn-prev' ?> ">
                        <?= $page ?>
                    </button>
                <?php } ?>

                <?php if ($page === 3 && !in_array($paginator['current_page'], [0, 1, 2, 3]) && !in_array($page, range($paginator['current_page'] - 1, $paginator['current_page'] + 1))) { ?>
                    <span class="border-0 text-gray-700 ">...</span>
                <?php } ?>

                <?php if (!in_array($page, [0, 1, 2, 3]) && $page >= ($paginator['current_page'] - 1) && $page <= ($paginator['current_page'] + 1) && $page !== $paginator['current_page']) { ?>
                    <button data-page="<?= $page ?>" class="pagination-btn pagination-item <?= $paginator['current_page'] === $page ? 'pagination-active ' : '' ?> ">
                        <?= $page ?>
                    </button>
                <?php } ?>

                <?php if ($page === ($paginator['max_num_pages'] - 3) && !in_array($paginator['current_page'], range($paginator['max_num_pages'] - 2, $paginator['max_num_pages'])) && !in_array($page, range($paginator['current_page'] - 1, $paginator['current_page'] + 1))) { ?>
                    <span class=" text-gray-700 ">...</span>
                <?php } ?>

                <?php if ($page > $paginator['max_num_pages'] - 3 && $page > $paginator['current_page'] + 1 && $page > 3) { ?>
                    <button data-page="<?= $page ?>" class=" <?= $paginator['current_page'] === $page ? 'pagination-active ' : 'btn-next' ?>  pagination-btn pagination-item ">
                        <?= $page ?>
                    </button>
                <?php } ?>
            <?php } ?>
        </div>

        <?php if ($paginator['max_num_pages'] > $paginator['current_page']) { ?>
            <button data-page="<?= $paginator['current_page'] + 1 ?>" class="pagination-next pagination-item" aria-label="<?= __('Volgende', 'codeblauw') ?>">

            </button>
        <?php } else { ?>
            <button disabled class="pagination-next" aria-label="<?= __('Volgende', 'codeblauw') ?>" aria-disabled="true">
            </button>
        <?php } ?>
    </nav>
<?php } ?>