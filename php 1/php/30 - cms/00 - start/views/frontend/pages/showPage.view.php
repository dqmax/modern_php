<h1><?php if(!empty($page)) echo e($page->title); ?></h1>
<p>
    <?php if(!empty($page)) echo nl2br(e($page->content)); ?>
</p>
