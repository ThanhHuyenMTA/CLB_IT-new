<?php

echo "Test Ajax 1";

if (isset($_POST["username"])) {// kiểm tra nếu người dùng đã ấn nút Đăng ký để gửi thông tin
    $username = $_POST["username"]; // lấy thông tin username

    $password = $_POST["password"]; // lấy thông tin password

    $email = $_POST["email"]; // lấy thông tin email

    $sex = $_POST["sex"]; // lấy thông tin sex

    $age = $_POST["age"]; // lấy thông tin age

    $birthday = $_POST["birthday"]; // lấy thông tin birthday

    echo $username . " | " . $password . " | " . $email . " | " . $sex . " | " . $age . " | " . $birthday; // xuất dữ liệu lấy được ra cho phía server
    //Dưới đây sẽ là những đoạn code xử lý data theo ý bạn
    //Chẳng hạn như lưu data xuống database, kiểm tra data,...
}
?>
