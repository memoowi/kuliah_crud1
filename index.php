<?php
include('koneksi.php');

if(!$koneksi){
    die('kesalahan koneksi : ' .mysqli_connect_error());
}

$query = "SELECT * FROM article";
$result = mysqli_query($koneksi,$query);

$query2 = "SELECT users.name from users INNER JOIN article ON users.user_id = artcle.user_id";
$result2 = mysqli_query($koneksi,$query);
$dt = mysqli_fetch_assoc($result2)

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Article's Data</title>
</head>
<body>
    <a href="create.php">
        <button>Create an Article</button>
    </a>
    <table border="1">
        <tr>
            <th>Article ID</th>
            <th>Name</th>
            <th>Article Title</th>
            <th>Action</th>
        </tr>
        <?php
            if(mysqli_num_rows($result) > 0){
                while($row = mysqli_fetch_assoc($result)){
        ?>
        <tr>
            <td><?php echo $row['article_id']; ?></td>
            <td><?php echo $row['user_id']; ?></td>
            <td><?php echo $row['title']; ?></td>
            <td>
                <button onclick="detail('<?php echo $row['article_id']; ?>')">Detail</button>
                <button onclick="edit('<?php echo $row['article_id']; ?>')">Edit</button>
                <!-- Delete Button Using a tag -->
                <!-- <a href='delete.php?article_id=<?php echo $row['article_id']; ?>' onclick="return confirm('Are You Sure to delete <?php echo $row['title'] ?> ?')" style="text-decoration: none;">
                    <button>Delete</button>
                </a> -->
                <!-- End of Delete Button a tag -->
                <button onclick="askFirst('<?php echo $row['article_id']; ?>', '<?php echo $row['title']; ?>')">Delete v2</button>
            </td>
        </tr>
        <?php
            }
        }else{
        ?>
        <tr>
            <td colspan="3">No Data</td>
        </tr>
        <?php
        }
        ?>
    </table>

    <!-- JS -->
    <script>
        function askFirst(id, title){
            if(confirm('Are you sure to delete the article "' + title + '" ?')){
                window.location.href = 'delete.php?article_id=' + id;
            }
        }
        function detail(id){
            window.location.href = 'detail.php?article_id=' + id;
        }
        function edit(id){
            window.location.href = 'edit.php?article_id=' + id;
        }
    </script>
</body>
</html>