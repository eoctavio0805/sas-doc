<?php

use CodeIgniter\Pager\PagerRenderer;

/**
 * @var PagerRenderer $pager
 */
$pager->setSurroundCount(0);
?>
<nav>
    <?= $pager->getNextPageNumber() !== 0 ? $pager->getPreviousPageNumber() + 1 :  $pager->getNextPageNumber() ?> <span class="hidden-lg-down"> de <?= $pager->getPageCount(); ?> </span>
    <a class="btn btn-icon rounded-circle <?= $pager->hasPrevious() ? '' : "disabled" ?>" href="<?= $pager->getFirst() ?? '#' ?>" aria-label="<?= lang('Pager.previous') ?>">
        <i class="fal fa-chevron-left fs-lg"></i>
    </a>
    <a class="btn btn-icon rounded-circle <?= $pager->hasPrevious() ? '' : "disabled" ?>" href="<?= $pager->getPrevious() ?? '#' ?>" aria-label="<?= lang('Pager.previous') ?>">
        <i class="fal fa-chevron-left fs-md"></i>
    </a>

    <a class="btn btn-icon rounded-circle <?= $pager->hasNext() ? '' : "disabled" ?>" href="<?= $pager->getnext() ?? '#' ?>" aria-label="<?= lang('Pager.next') ?>">
        <i class="fal fa-chevron-right fs-md"></i>
    </a>
    <a class="btn btn-icon rounded-circle <?= $pager->hasNext() ? '' : "disabled" ?>" href="<?= $pager->getLast() ?? '#' ?>" aria-label="<?= lang('Pager.next') ?>">
        <i class="fal fa-chevron-right fs-lg"></i>
    </a>
</nav>