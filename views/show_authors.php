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

<?php if ($data['books']): ?>
    <h2>Les Livres</h2>
    <ul class="books">
        <?php foreach ($data['books'] as $book): ?>
        <li class="book">
            <a href="?a=show&e=books&id=<?php echo $book->id; ?>&with=authors,editors"><?php echo $book->title; ?></a>
        </li>
        <?php endforeach; ?>
    </ul>
<?php endif; ?>

<?php if ($data['editors']): ?>
    <h2>Les editeurs</h2>
    <ul class="editors">
        <?php foreach ($data['editors'] as $editor): ?>
        <li class="editor">
            <a href="?a=show&e=editors&id=<?php echo $editor->id; ?>&with=books,authors"><?php echo $editor->name; ?></a>
        </li>
        <?php endforeach; ?>
    </ul>
<?php endif; ?>

<div class="allauthors">
    <a href="<?php echo $_SERVER['PHP_SELF'] ?>">Tous les auteurs</a>
</div>
