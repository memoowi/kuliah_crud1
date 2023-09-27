<?php
include('koneksi.php');
$query = "SELECT * FROM users";
$result = mysqli_query($koneksi,$query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add an Article</title>
</head>
<body>
    <h2>Add an Article</h2>
    <form action="save_proc.php" method="post">
        <label for="user_id">Writer :</label><br>
        <select name="user_id" id="user_id" required>
            <?php
                if(mysqli_num_rows($result) > 0){
                while($row = mysqli_fetch_assoc($result)){  
            ?>  
            <option value="<?php echo $row['user_id']; ?>">
                <?php echo $row['name']; ?>
            </option>
            <?php
                }
            }
            ?>
        </select>
        <br>
        <label for="title">Title :</label><br>
        <input type="text" name="title">
        <br>
        <label for="content">Content :</label><br>
        <textarea name="content" rows="5"></textarea>
        <br>
        <input type="submit" name="save" value="Save">
    </form>
</body>
</html>