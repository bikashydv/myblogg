<?php
require 'db.php';
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "DELETE FROM category WHERE id=$id";
    mysqli_query($db, $query);
    header('Location:../admin/index.php?managecategory');
}
