<?php
require_once '../../functions/helpers.php';
require_once '../../functions/pdo_connection.php';
if ($_GET['cat_id'] === "" || !isset($_GET['cat_id'])) {
    dd("first if");
    redirect('panel/category');
}
global $pdo;
$query = "SELECT * FROM categories WHERE id = ? ";
$statment = $pdo->prepare($query);
$statment->execute([$_GET['cat_id']]);
$category = $statment->fetch();
if($category === false){
    redirect('panel/category');
}
if(isset($_POST['name']) && $_POST['name'] !== "" ){
    $query = "UPDATE `categories` SET `name` = ?,`updated_at`= NOW() WHERE `categories`.`id` = ?;";
    $statment = $pdo->prepare($query);
    $statment->execute([$_POST['name'],$_GET['cat_id']]);
    redirect('panel/category');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PHP panel</title>
    <link rel="stylesheet" href="../../assets/css/bootstrap.min.css" media="all" type="text/css">
    <link rel="stylesheet" href="../../assets/css/style.css" media="all" type="text/css">
</head>

<body>
    <section id="app">
        <?php require_once '../layouts/tap-nav.php'; ?>

        <section class="container-fluid">
            <section class="row">
                <section class="col-md-2 p-0">
                    <?php require_once '../layouts/sidebar.php'; ?>

                </section>
                <section class="col-md-10 pt-3">

                    <form action="<?= url('panel/category/edit.php?cat_id=') . $_GET['cat_id'] ?>" method="post">
                        <section class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" name="name" id="name" value="<?= $category->name ?>">
                        </section>
                        <section class="form-group">
                            <button type="submit" class="btn btn-primary">Create</button>
                        </section>

                    </form>

                </section>
            </section>
        </section>

    </section>

    <script src="../../assets/js/jquery.min.js"></script>
    <script src="../../assets/js/bootstrap.min.js"></script>
</body>

</html>