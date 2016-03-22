<h1><?php echo $data['editor']->name; ?></h1>

<?php if ($data['editor']->logo):?>
    <div class="logo">
        <img src="<?php echo $data['editor']->logo ?>" alt="" />
    </div>
<?php endif; ?>

<?php if ($data['editor']->summary):?>
    <div class="summary">
        <?php echo $data['editor']->summary ?>
    </div>
<?php endif; ?>

<?php if ($data['authors']): ?>
    <h2>Les auteurs</h2>
    <ul class="authors">
        <?php foreach ($data['authors'] as $author): ?>
        <li class="author">
            <a href="?a=show&e=authors&id=<?php echo $author->id; ?>&with=editors,books"><?php echo $author->name; ?></a>
        </li>
        <?php endforeach; ?>
    </ul>
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

<div class="alleditors">
    <a href="<?php echo $_SERVER['PHP_SELF'] ?>">Tous les éditeurs</a>
</div>
