<?php 
include "./connect.php";

// Kiểm tra xem có tham số ID được chuyển đến không
if (!isset($_GET['id']) || empty($_GET['id'])) {
    // Nếu không có hoặc trống, chuyển hướng người dùng đến trang không tìm thấy
    header("Location: not_found.php");
    exit();
}

// Lấy ID từ tham số truy vấn
$id = $_GET['id'];

// Tạo truy vấn SQL để lấy thông tin của cầu thủ dựa trên ID
$query = "SELECT * FROM player WHERE id = $id";
$result = mysqli_query($connect, $query);

// Kiểm tra xem có dữ liệu trả về không
if (mysqli_num_rows($result) > 0) {
    // Lặp qua từng hàng dữ liệu
    $row = mysqli_fetch_assoc($result);
    // Gán thông tin của cầu thủ vào các biến
    $name = $row['name'];
    $age = $row['age'];
    $playingposition = $row['playingposition'];
} else {
    // Nếu không tìm thấy cầu thủ với ID đã cung cấp, chuyển hướng người dùng đến trang không tìm thấy
    header("Location: not_found.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chỉnh sửa cầu thủ</title>
</head>
<body>
    <div class="container">
        <h1 style="text-align:center">Chỉnh sửa cầu thủ</h1>
        <form action="update.php?id=<?php echo $id ?>" method="post" >
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Name</label>
                <input type="text" name="name" class="form-control" id="exampleFormControlInput1" value="<?php echo $name; ?>">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">Age</label>
                <input class="form-control" name="age" id="exampleFormControlTextarea1" rows="3" value="<?php echo $age; ?>"></input>
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Playing position</label>
                <input type="text" class="form-control" name="playingposition" id="playingposition" value="<?php echo $playingposition; ?>">
            </div>

            <button type="submit" name="submit" class="btn-primary">Save</button>
            <a href="index.php" class="btn-bg-danger">Cancel</a>
        </form>
    </div>
</body>
</html>
