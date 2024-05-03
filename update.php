<?php
    include "./connect.php";
    
if (isset($_POST['submit'])) {
    $id= $_GET['id'];
    $name = $_POST['name'];
    $age = $_POST['age'];
    $playingposition = $_POST['playingposition'];

    // Tạo truy vấn SQL để cập nhật thông tin cầu thủ
    $query = "UPDATE player SET name ='$name', age= '$age', playingposition='$playingposition' where id= $id ";                          
    // Thực thi truy vấn
    if (mysqli_query($connect, $query)) {
        // Nếu cập nhật thành công, chuyển hướng người dùng đến trang danh sách cầu thủ
        header("Location: index.php");
        exit();
    } else {
        // Nếu có lỗi xảy ra, hiển thị thông báo lỗi
        echo "Lỗi khi cập nhật thông tin cầu thủ: " . mysqli_error($connect);
    }

    // Đóng kết nối
    mysqli_close($connect);
}
