<ul>
    <?php foreach($books as $book) :?>
    <li><a href="<?php echo $_SERVER['PHP_SELF']; ?>?id=<?php echo $book->id; ?>"><?php echo $book->title; ?></a></li>
<?php endforeach; ?>
</ul>
