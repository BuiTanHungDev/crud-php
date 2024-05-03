<?php

include './connect.php';

// nhân dữ liệu
$error = "";
if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $age = $_POST['age'];
    $playingposition = $_POST['playingposition'];

    if (empty($name) || empty($age) || empty($playingposition)) {
        echo " Vùi lòng điền đầy đủ thông tin";
    }
    elseif (!is_numeric($age)) {
        echo "Tuổi phải là một số nguyên.";
    }
     else {
        $query = "INSERT INTO player (name,age,playingposition) VALUES ('$name','$age','$playingposition')";
        $data = mysqli_query($connect, $query);

        if ($data) {
            echo " Thêm cầu thủ thành công";
            header("Location: ./index.php");
        } else {
            echo "Lỗi: " . $query . "<br>" . mysqli_error($connect);
        }
    }
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm Sinh viên</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>

<body>
    <div class="container">
        <h1 style="text-align:center">Thêm cầu thủ</h1>
        <form action="create.php" method="post" >
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Name</label>
                <input type="text" name="name" class="form-control" id="exampleFormControlInput1">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">Age</label>
                <input class="form-control" name="age" id="exampleFormControlTextarea1" rows="3"></input>
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Playing position</label>
                <input type="text" class="form-control" name="playingposition" id="playingposition">
            </div>

            <button type="submit" name="submit" class="btn-primary">Save</button>
            <button class="btn-bg-danger">Cancle </button>


        </form>


    </div>

</body>

</html>