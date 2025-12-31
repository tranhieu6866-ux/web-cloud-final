<?php include 'db.php'; ?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Thêm Sản phẩm</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container mt-5" style="max-width: 600px;">
        <div class="card shadow">
            <div class="card-header bg-primary text-white">
                <h4>Thêm Sản phẩm mới</h4>
            </div>
            <div class="card-body">
                <?php
                // Xử lý khi bấm nút Lưu
                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    $name = $_POST['name'];
                    $price = $_POST['price'];
                    $desc = $_POST['description'];
                    $img = $_POST['image_url'];

                    $sql = "INSERT INTO Products (name, price, description, image_url) VALUES ('$name', '$price', '$desc', '$img')";

                    if ($conn->query($sql) === TRUE) {
                        echo "<div class='alert alert-success'>Thêm thành công! Đang quay lại...</div>";
                        header("refresh:1;url=index.php");
                    } else {
                        echo "Lỗi: " . $sql . "<br>" . $conn->error;
                    }
                }
                ?>

                <form method="post">
                    <div class="mb-3">
                        <label>Tên sản phẩm</label>
                        <input type="text" name="name" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label>Giá tiền (VNĐ)</label>
                        <input type="number" name="price" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label>Link hình ảnh (URL)</label>
                        <input type="text" name="image_url" class="form-control" placeholder="https://...">
                    </div>
                    <div class="mb-3">
                        <label>Mô tả</label>
                        <textarea name="description" class="form-control" rows="3"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary w-100">Lưu sản phẩm</button>
                    <a href="index.php" class="btn btn-secondary w-100 mt-2">Quay lại</a>
                </form>
            </div>
        </div>
    </div>
</body>
</html>