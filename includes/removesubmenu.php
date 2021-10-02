<?php
require 'db.php';
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "DELETE FROM submenu WHERE id=$id";
    mysqli_query($db, $query);
    header('Location:../admin/index.php?managemenu');
}
