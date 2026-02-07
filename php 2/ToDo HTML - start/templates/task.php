<?php
    $titleCSSclass = 'todo-item-text';
    if($task['status'] === 'ready'){
        $titleCSSclass .= ' done';
    }
?>

<li class="list-group-item d-flex justify-content-between">
    <span class="<?php echo $titleCSSclass?>"><?php echo $task['title']?></span>
    <div class="btn-group">
        <?php if($task['status'] === 'ready'): ?>
            <button role="button" class="btn btn-outline-dark btn-sm">Вернуть</button>
        <?php else: ?>
            <button role="button" class="btn btn-outline-success btn-sm">Готово</button>
        <?php endif;?>
        <button role="button" class="btn btn-outline-danger btn-sm">Удалить</button>
    </div>
</li>
