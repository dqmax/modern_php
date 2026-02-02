<?php
include './inc/functions.inc.php';
include './inc/images.inc.php';

?>
<?php include './views/header.php'; ?>


<?php if (!empty($_GET['image']) && !empty($imageTitles[$_GET['image']])): ?>
    <?php $image = $_GET['image'];?>
    <h2><?php echo e($imageTitles[$image])?></h2>
    <img src="images/<?php echo rawurlencode($image)?>" alt="<?php echo e($imageTitles[$image]); ?>">
    <p><?php echo e($imageDescriptions[$image]); ?></p>
    <a href="gallery.php">Back to gallery</a>
<?php else:?>
    <div class="notice">
        <h5>this image can't be found</h5>
    </div>
<?php endif;?>

<?php include './views/footer.php'; ?>
