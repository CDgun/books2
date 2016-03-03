<h1><?php echo $book->title; ?></h1>

<?php if ($book->cover):?>
    <div class="cover">
        <img src="<?php echo $book->cover ?>" alt="" />
    </div>
<?php endif; ?>

<?php if ($book->summary):?>
    <div class="summary">
        <?php echo $book->summary ?>
    </div>
<?php endif; ?>

<div class="allbooks">
    <a href="<?php echo $_SERVER['PHP_SELF'] ?>">Tous les livres</a>
</div>
