<?php
include('koneksi.php');
if ( isset($_GET['article_id'])) {
    $id = $_GET['article_id'];

    $query = "DELETE FROM article WHERE article_id=$id";
    mysqli_query($koneksi, $query);
    header("location:index.php");
}
?>