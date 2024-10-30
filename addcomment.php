<?php
include "Admin/database/database.php";
include "Admin/database/comments.php";

// Kiểm tra kết nối CSDL
$database = new database();
$db = $database->connect();

if ($db) {
    $comment = new comments($db);

    // Lấy dữ liệu từ form
    $comment->name = $_POST['name'];
    $comment->email = $_POST['email'];
    $comment->comment = $_POST['comment'];
    $comment->created_at = date('Y-m-d H:i:s');
    $comment->updated_at = date('Y-m-d H:i:s');

    // Lưu comment vào CSDL
    if ($comment->create()) {
        // Đã lưu thành công
        header("Location: index.php"); // Chuyển hướng về trang comment sau khi lưu
        exit();
    } else {
        // Lỗi khi lưu comment
        echo "Failed to submit comment.";
    }
} else {
    echo "Database connection failed.";
}
?>
