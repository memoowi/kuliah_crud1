<?php
include('koneksi.php');

// CREATE
if(isset($_POST['save'])){
    $writer = $_POST['user_id'];
    $title = $_POST['title'];
    $content = $_POST['content'];

    $query = "INSERT INTO `article` (`user_id`, `title`, `content`)" .
                "VALUES ('$writer', '$title', '$content')";

    if(mysqli_query($koneksi, $query)){
        // echo "Data has been added successfully!";

        header("location:index.php");
        exit;
    }else{
        echo "Error :" . $query;
    }
}

// UPDATE
if(isset($_POST['update'])){
    $article_id = $_POST['article_id'];
    $writer = $_POST['user_id'];
    $title = $_POST['title'];
    $content = $_POST['content'];

    $query = "UPDATE article " .
            "SET user_id = '$writer', title = '$title', content = '$content'" .
            "WHERE article_id = $article_id";

    if(mysqli_query($koneksi, $query)){
        // echo "Data has been updated successfully!";

        header("location:index.php");
        exit;
    }else{
        echo "Error :" . $query;
    }
}
?>