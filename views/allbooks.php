<ul>
    <?php foreach($data['books'] as $data['book']) :?>
    <li><a href="<?php echo $_SERVER['PHP_SELF']; ?>?id=<?php echo $data['book']->id; ?>"><?php echo $data['book']->title; ?></a></li>
<?php endforeach; ?>
</ul>
