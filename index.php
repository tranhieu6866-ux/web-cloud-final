<?php include 'db.php'; ?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Quản lý Sản phẩm</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <h2 class="text-center mb-4 text-primary">QUẢN LÝ SẢN PHẨM TRÊN RENDER</h2>
        
        <a href="add.php" class="btn btn-success mb-3">+ Thêm sản phẩm mới</a>

        <div class="card shadow">
            <div class="card-body">
                <table class="table table-bordered table-hover">
                    <thead class="table-dark">
                        <tr>
                            <th>ID</th>
                            <th>Hình ảnh</th>
                            <th>Tên sản phẩm</th>
                            <th>Giá (VNĐ)</th>
                            <th>Mô tả</th>
                            <th>Hành động</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        // Xử lý Xóa sản phẩm nếu có yêu cầu
                        if (isset($_GET['delete_id'])) {
                            $id = $_GET['delete_id'];
                            $conn->query("DELETE FROM Products WHERE id=$id");
                            echo "<script>window.location.href='index.php';</script>";
                        }

                        // Lấy dữ liệu từ Database
                        $sql = "SELECT * FROM Products";
                        $result = $conn->query($sql);

                        if ($result->num_rows > 0) {
                            while($row = $result->fetch_assoc()) {
                                echo "<tr>
                                    <td>" . $row["id"] . "</td>
                                    <td><img src='" . $row["image_url"] . "' width='60' height='60' style='object-fit:cover'></td>
                                    <td><b>" . $row["name"] . "</b></td>
                                    <td class='text-danger'>" . number_format($row["price"]) . "</td>
                                    <td>" . $row["description"] . "</td>
                                    <td>
                                        <a href='index.php?delete_id=" . $row["id"] . "' class='btn btn-danger btn-sm' onclick='return confirm(\"Bạn có chắc muốn xóa?\")'>Xóa</a>
                                    </td>
                                </tr>";
                            }
                        } else {
                            echo "<tr><td colspan='6' class='text-center'>Chưa có sản phẩm nào</td></tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="text-center mt-3 text-muted">Demo Cloud Computing - Nhóm sinh viên</div>
    </div>
</body>
</html>