<?php
require('../includes/db.php');


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS only -->


    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>


    <title>update</title>

</head>

<body>

    <div class="row">
        <div class="col-lg-6">
            <section class="panel">
                <header class="panel-heading">

                </header>
                <div class="panel-body">

                    <?php
                    $id = $_GET['id'];
                    $query = "SELECT * FROM posts WHERE id='$id' ";
                    $query_run = mysqli_query($db, $query);
                    if (mysqli_num_rows($query_run) > 0) {

                        foreach ($query_run as $row) {
                            // echo $row['id'];
                    ?>
                            <form action="../includes/index.php" method="POST" enctype="multipart/form-data">
                                <input type="hidden" name="post_id" value="<?php echo $row['id']; ?>" />

                                <div class="form-group">
                                    <div class="col-sm-12">
                                        <label>Post Title</label>
                                        <input type="text" value="<?php echo $row['title']; ?>" class="form-control" name="post-title">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-12">
                                        <label>Post Content</label>
                                        <textarea class="form-control ckeditor" value="<?php echo $row['content']; ?>" name="post-content" rows="6"></textarea>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-sm-6">
                                        <div class="col-sm-12">
                                            <label>Select Post Category</label>
                                        </div>
                                    </div>
                                    <select value="<?php echo $row['category_id']; ?>" name="post-category" class="from-control">
                                    </select>

                                </div>

                                <div class="form-group">
                                    <label>Upload Photo(max 5)</label>
                                    <input type="file" class="form-control" name="post_image" accept="image/*" multiple />
                                    <input type="hidden" name="old_post_image" value="<?php echo $row['image'] ?>">
                                </div>



                                <div class=" form-group">
                                    <button type="submit" name="update_posts" class="btn btn-primary">Update</button>
                                </div>

                            </form>


                    <?php

                        }
                    } else {

                        echo "no record Available";
                    }


                    ?>

</body>

</html>