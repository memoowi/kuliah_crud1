<?php
include('koneksi.php');
$query2 = "SELECT * FROM users";
$result = mysqli_query($koneksi,$query2);

if ($_GET['article_id']) {
    $id = $_GET['article_id'];
    $query = "SELECT * FROM article WHERE article_id=$id";
    $data = mysqli_query($koneksi, $query);

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add an Article</title>
</head>
<body>
    <h2>Edit Article</h2>
    <?php
    while($dt = mysqli_fetch_array($data)){
    ?>
    <form action="save_proc.php" method="post">
        <input type="hidden" name="article_id" value="<?php echo $dt['article_id']; ?>">
        <label for="user_id">Writer :</label><br>
        <select name="user_id" id="user_id" required>
            <?php
                if(mysqli_num_rows($result) > 0){
                while($row = mysqli_fetch_assoc($result)){  
                    $selected = ($row['user_id'] == $dt['user_id']) ? 'selected' : '';
            ?>  
            <option <?php echo $selected ?> value="<?php echo $row['user_id']; ?>">
                <?php echo $row['name']; ?>
            </option>
            <?php
                }
            }
            ?>
        </select>
        <br>
        <label for="title">Title :</label><br>
        <input type="text" name="title" value="<?php echo $dt['title']; ?>">
        <br>
        <label for="content">Content :</label><br>
        <textarea name="content" rows="5"><?php echo $dt['content']; ?></textarea>
        <br>
        <input type="submit" name="update" value="Update">
    </form>
    <?php
    }
    ?>
</body>
</html>