<ul>
    <?php foreach($data['books'] as $book) :?>
    <li>
        <a href="<?php echo $_SERVER['PHP_SELF']; ?>?a=show&e=books&id=<?php echo $book->id; ?>"><?php echo $book->title; ?></a>
    </li>
<?php endforeach; ?>
</ul>
