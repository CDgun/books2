<h1><?php echo $data['book']->title; ?></h1>

<?php if ($data['book']->cover):?>
    <div class="cover">
        <img src="<?php echo $data['book']->cover ?>" alt="" />
    </div>
<?php endif; ?>

<?php if ($data['book']->summary):?>
    <div class="summary">
        <?php echo $data['book']->summary ?>
    </div>
<?php endif; ?>

<div class="allbooks">
    <a href="<?php echo $_SERVER['PHP_SELF'] ?>">Tous les livres</a>
</div>
