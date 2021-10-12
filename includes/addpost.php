<?php
require('db.php');
require('../includes/functions.php');
$admin = getAdminInfo($db, $_SESSION['email']);
if (isset($_POST['addpost'])) {
    $ptitle = mysqli_real_escape_string($db, $_POST['post_title']);
    $pcontent = mysqli_real_escape_string($db, $_POST['post_content']);
    $cid = $_POST['post_category'];
    $author = $admin['full_name'];
    $query = "INSERT INTO posts (title,content,category_id,author) VALUES('$ptitle','$pcontent',$cid,'$author')";
    $run = mysqli_query($db, $query);
    $post_id = mysqli_insert_id($db);
    echo '<PRE>';
    $image_name = $_FILES['post_image']['name'];
    $img_tmp = $_FILES['post_image']['tmp_name'];
    print_r($image_name);
    print_r($img_tmp);

    foreach ($image_name as $index => $img) {
        if (move_uploaded_file($img_tmp[$index], "../images/$img")) {
            $query = "INSERT INTO images(post_id,image) VALUES($post_id,'$img'  )";
            $run = mysqli_query($db, $query);
        }
    }
    header('location:../admin/index.php?managepost');
}
