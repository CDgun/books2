<ul>
    <?php foreach($data['authors'] as $author) :?>
    <li>
        <a href="<?php echo $_SERVER['PHP_SELF']; ?>?a=show&e=authors&id=<?php echo $author->id; ?>"><?php echo $author->name; ?></a>
    </li>
<?php endforeach; ?>
</ul>
