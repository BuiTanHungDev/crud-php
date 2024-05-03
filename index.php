<?php
include './connect.php';

$query = "Select * from player";

$player = mysqli_query($connect, $query);




?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<style>
    .header {
        text-align: center;
    }
</style>

<body>
    <div class="container">
        <div class="header">
            <h1>Quản Lý danh sách cầu thủ</h1>
        </div>
        <div class="btn-create">
            <a href="create.php">Thêm cầu thủ</a>
        </div>
        <table class="table" border="1">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Age</th>
                    <th scope="col">Class</th>
                    <th scope="col">Action</th>

                </tr>
            </thead>
            <tbody>
                <?php
                if (mysqli_num_rows($player) > 0) {
                    foreach ($player as $row) : ?>
                        <tr>
                            <th scope="row"><?php echo $row['id']; ?></th>
                            <td><?php echo $row['name']; ?></td>
                            <td><?php echo $row['age']; ?></td>
                            <td><?php echo $row['playingposition']; ?></td>
                            <td>
                                <a href="edit.php?id=<?php echo $row['id']; ?>">edit</a>
                                <a href="delete.php?id=<?php echo $row['id']; ?>">Delete</a>
                            </td>
                        </tr>
                <?php endforeach;
                } else {
                    // Nếu không có dữ liệu, hiển thị thông báo "Not found"
                    echo "<tr><td colspan='5'>Not found</td></tr>";
                }
                ?>
          
            </tbody>
        </table>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>