<?php
require_once '../../functions/helpers.php';
require_once '../../functions/pdo_connection.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PHP panel</title>
    <link rel="stylesheet" href="<?= asset("assets/css/bootstrap.min.css") ?>" media="all" type="text/css">
    <link rel="stylesheet" href="<?= asset("assets/css/style.css") ?>" media="all" type="text/css">
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

                    <section class="mb-2 d-flex justify-content-between align-items-center">
                        <h2 class="h4">Categories</h2>
                        <a href="<?= url('/panel/category/create.php') ?>" class="btn btn-sm btn-success">Create</a>
                    </section>

                    <section class="table-responsive">
                        <table class="table table-striped table-">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>name</th>
                                    <th>setting</th>
                                </tr>
                            </thead>
                            <tbo>
                                <?php 
                                    global $pdo;
                                    $query = "SELECT * FROM categories";
                                    $statment = $pdo->prepare($query);
                                    $statment->execute();
                                    $categories = $statment->fetchAll();
                                ?>
                                <?php foreach($categories as $category){ ?>
                                <tr>
                                    <td><?= $category->id ?></td>
                                    <td><?= $category->name ?></td>
                                    <td>
                                        <a href="<?= url('panel/category/edit.php') . '?cat_id=' . $category->id ?>" class="btn btn-info btn-sm">Edit</a>
                                        <a href="<?= url('panel/category/delete.php') . '?cat_id=' . $category->id ?>" class="btn btn-danger btn-sm">Delete</a>
                                    </td>
                                </tr>
                                <?php } ?>

                            </tbody>
                        </table>
                    </section>


                </section>
            </section>
        </section>





    </section>

    <script src="<?= asset('assets/js/jquery.min.js') ?>"></script>
    <script src="<?= asset('assets/js/bootstrap.min.js') ?>"></script>
</body>

</html>