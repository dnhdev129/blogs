<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Include các file cần thiết
include "Admin/database/database.php";
include "Admin/database/mailsettings.php";
include "Admin/database/subscribers.php";

// Kết nối đến cơ sở dữ liệu
$database = new database();
$db = $database->connect();

// Tạo đối tượng cài đặt email và đọc cài đặt từ cơ sở dữ liệu
$mailsettings = new mailsettings($db);
$mailsettings->id = 1;
$mailsettings->read();

// Load Composer's autoloader
require 'Admin/mail/vendor/autoload.php';

// Tạo một instance của PHPMailer
$mail = new PHPMailer(true);

try {
    // Cài đặt các thông số server SMTP
    $mail->isSMTP();
    $mail->Host       = $mailsettings->mail_server;
    $mail->SMTPAuth   = true;
    $mail->Username   = $mailsettings->mail_username;
    $mail->Password   = $mailsettings->mail_password;
    $mail->Port       = $mailsettings->mail_port;
    $mail->CharSet    = 'utf-8';


    // Thiết lập địa chỉ gửi
    $mail->setFrom($mailsettings->email, 'Support');

    // Nhận dữ liệu từ form gửi qua POST
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];
    $subject = isset($_POST['subject']) ? $_POST['subject'] : 'Message from Contact Form'; // Chọn tiêu đề mặc định nếu không có subject

    // Thiết lập nội dung email
    $mail->addAddress($email, $name);
    $mail->isHTML(true);
    $mail->Subject = $subject;
    $mail->Body    = $message;

    // Gửi email và xử lý kết quả
    if ($mail->send()) {
        echo "success";
    } else {
        echo "Mailer Error: " . $mail->ErrorInfo;
    }
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
?>

