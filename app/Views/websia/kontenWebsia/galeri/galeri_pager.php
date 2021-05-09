<?php $pager->setSurroundCount(1) ?>
<?php if ($pager->hasPrevious()) : ?>
    <a href="<?= $pager->getFirst() ?>" class="p-1 rounded-full w-7 transform hover:scale-110">
        <img src="/img/components/icon/left-double.png" alt="">
    </a>
    <a href="<?= $pager->getPrevious() ?>" class="p-1 rounded-full w-7 transform hover:scale-110">
        <img src="/img/components/icon/left-on.png" alt="">
    </a>
<?php endif ?>

<?php foreach ($pager->links() as $link) : ?>
    <a href="<?= $link['uri'] ?>" class="p-1 hover:text-white <?= $link['active'] ? 'active' : '' ?>">
        <?= $link['title'] ?>
    </a>
<?php endforeach ?>

<?php if ($pager->hasNext()) : ?>
    <a href="<?= $pager->getNext() ?>" class="p-1 rounded-full w-7 transform hover:scale-110">
        <img src="/img/components/icon/right-on.png" alt=""></a>
    <a href="<?= $pager->getLast() ?>" class="p-1 rounded-full w-7 transform hover:scale-110">
        <img src="/img/components/icon/right-double.png" alt=""></a>
<?php endif ?>