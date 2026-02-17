<ul>
    <?php foreach($names as $name): ?>
        <a href="name.php?<?php echo http_build_query(['name' =>  e($name)])?>">
            <li>
                <?php echo e($name)?>
            </li>
        </a>
    <?php endforeach ?>
</ul>