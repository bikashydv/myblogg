<?php
require('db.php');

require('functions.php');

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Creative - Bootstrap 3 Responsive Admin Template">
    <meta name="author" content="GeeksLabs">
    <meta name="keyword" content="Creative, Dashboard, Admin, Template, Theme, Bootstrap, Responsive, Retina, Minimal">
    <link rel="shortcut icon" href="img/favicon.png">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
    <title>update</title>

    <link rel="stylesheet" href="style.css">
    <style>
        input {
            margin: 10px;
        }
    </style>
</head>

<body>


    <section id="main-content">
        <section class="wrapper">

            <div class="row">
                <div class="col-lg-12 co-md-12">

                    <div class="col-lg-12">
                        <section class="panel">

                            <div class="panel-body">
                                <div class="form">


                                    <!--get data  -->
                                    <?php
                                    if (isset($_GET['id'])) {
                                        $id = $_GET['id'];
                                        $query = "SELECT * FROM `posts` WHERE id=$id";
                                        $run = mysqli_query($db, $query);
                                        $post = mysqli_fetch_assoc($run);

                                        // echo '<pre>';
                                        // print_r($data);
                                        // die();

                                    }
                                    ?>


                                    <!-- update -->


                                    <?php
                                    if (isset($_POST['update'])) {
                                        $post_id = $_GET['id'];
                                        // print_r($post_id);
                                        $title = $_POST['post_title'];
                                        $content = $_POST['post_content'];
                                        $category = $_POST['post_category'];

                                        $query = "update posts set title='$title', content='$content',category_id='$category' where id='$post_id'";

                                        if ($query) {
                                            mysqli_query($db, $query); // Close connection
                                            header("location:../admin/index.php?managepost"); // redirects to all records page
                                            exit;
                                        } else {
                                            echo "check if your field is filled";
                                        }
                                    }
                                    ?>


                                    <form action="" method="post" enctype="multipart/form-data" class="form-horizontal">
                                        <div class="form-group">
                                            <div class="col-sm-12">
                                                <label>Post Title</label>
                                                <input type="text" value="<?= $post['title'] ?>" class="form-control" name="post_title">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-sm-12">
                                                <label>Post Content</label>
                                                <textarea class="form-control ckeditor" value="" name="post_content" rows="6"><?= $post['content'] ?></textarea>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="form-group col-sm-6">
                                                <div class="col-sm-12">
                                                    <label>Select Post Category</label>

                                                    <select name="post_category" class="from-control">
                                                        <?php
                                                        $categories = getAllCategory($db);
                                                        foreach ($categories as $ct) {
                                                        ?>
                                                            <option value="<?= $ct['id'] ?>"><?= $ct['name'] ?></option>

                                                        <?php
                                                        }

                                                        ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group col-sm-6">
                                                <div class="col-sm-12">
                                                    <label>Upload Photo(max 5)</label>
                                                    <input type="file" class="form-control" name="post_image[]" accept="image/*" multiple />
                                                </div>
                                            </div>
                                            <input type="submit" name="update" class="btn btn-primary" style="height:40px; width:100px;" value="UPDATE">

                                        </div>

                                    </form>

                                </div>
                            </div>
                        </section>
                    </div>

                </div>
            </div>

        </section>
    </section>

</body>

</html>