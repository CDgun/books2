<ul>
    <?php foreach($data['editors'] as $editor) :?>
    <li>
        <a href="<?php echo $_SERVER['PHP_SELF']; ?>?a=show&e=editors&id=<?php echo $editor->id; ?>"><?php echo $editor->name; ?></a>
    </li>
<?php endforeach; ?>
</ul>
