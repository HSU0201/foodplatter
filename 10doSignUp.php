<?php
// 引入資料庫連接檔案
require("../db_connect.php");

// 檢查是否有 POST 請求中的 email 參數
if (!isset($_POST["email"])) {
    echo "請循正常管道進入此頁";
    exit;
}

// 從 POST 請求中獲取用戶輸入的資訊
$email = $_POST["email"];
$name = $_POST["name"];
$password = $_POST["password"];
$repassword = $_POST["repassword"];

// echo "$email,$name,$password,$repassword";

// 檢查是否有未填寫的必填欄位
if (empty($email) || empty($name) || empty($password) || empty($repassword)) {
    echo "請輸入必填欄位";
    exit;
}
// echo "$email,$name,$password,$repassword";

// 檢查兩次輸入的密碼是否一致
if ($password != $repassword) {
    echo "前後密碼不一致";
    exit;
}

// 檢查帳號是否存在
// 從 POST 請求中取得 email 參數的值
$email = $_POST['email'];
// 資料庫查詢語句，選擇 users 表中所有欄位，其中 email 欄位的值等於從 POST 請求中取得的 email 參數值
$sql = "SELECT * FROM users WHERE email='$email'";
// 執行資料庫查詢，並將結果存儲在 $result 變數中
$result = $conn->query($sql);
// 獲取查詢結果的行數
$rowCount = $result->num_rows;
if ($rowCount > 0) {
    die("此帳號已經存在");
}

$password = md5($password);

$time = date('Y-m-d H:i:s');
$sql = "INSERT INTO users (name, password, email, created_at,valid)
        VALUES ('$name', '$password', '$email', '$time',1)";
// echo $sql;

// 執行 SQL 插入語句
if ($conn->query($sql) === TRUE) {
    echo "新增資料完成";
    // 獲取最新插入的資料的序號
    $last_id = $conn->insert_id;
    echo "最新一筆序號為" . $last_id;
} else {
    echo "新增資料錯誤: " . $conn->error;
};

// 導向至註冊頁面
header("location:09sign-up.php");
