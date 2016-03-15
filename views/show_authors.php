<h1><?php echo $data['author']->name; ?></h1>

<?php if ($data['author']->photo):?>
    <div class="photo">
        <img src="<?php echo $data['author']->photo ?>" alt="" />
    </div>
<?php endif; ?>

<?php if ($data['author']->bio):?>
    <div class="bio">
        <?php echo $data['author']->bio ?>
    </div>
<?php endif; ?>

<div class="allauthors">
    <a href="<?php echo $_SERVER['PHP_SELF'] ?>">Tous les auteurs</a>
</div>
