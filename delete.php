<?php 


include './connect.php';

// Lấy ID của cầu thủ cần xoá từ tham số truy vấn
$id = $_GET['id'];

// Tạo truy vấn SQL để xoá cầu thủ dựa trên ID
$query = "DELETE FROM player WHERE id = $id";

// Thực thi truy vấn
if (mysqli_query($connect, $query)) {
    // Nếu xoá thành công, chuyển hướng người dùng đến trang danh sách cầu thủ
    header("Location: index.php");
    exit();
} else {
    // Nếu có lỗi xảy ra, hiển thị thông báo lỗi
    echo "Lỗi khi xoá cầu thủ: " . mysqli_error($connect);
}

// Đóng kết nối
mysqli_close($connect);
?>