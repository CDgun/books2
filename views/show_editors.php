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

<div class="alleditors">
    <a href="<?php echo $_SERVER['PHP_SELF'] ?>">Tous les éditeurs</a>
</div>
