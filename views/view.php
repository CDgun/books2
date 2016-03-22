<!DOCTYPE html>
<!-- tout codes d'affichages -->
<html>
    <head>
        <meta charset="utf-8">
        <title><?php echo $data['page_title']; ?></title>
    </head>
    <body>
        <?php include('partials/_main_navigation.php'); ?>
        <?php include($data['view']); ?>
    </body>
</html>
