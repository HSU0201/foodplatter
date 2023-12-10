<?php
// 引入資料庫連接文件
require_once("foodplatter_connect.php");


// 從 POST 參數中獲取需要更新的優惠卷資料
$id = $_POST["coupon_id"];
$name = $_POST["coupon_name"];
$introduce = $_POST["coupon_introduce"];
$code = $_POST["coupon_code"];
$type = $_POST["coupon_type"];
$discount = $_POST["coupon_discount"];
$start = $_POST["coupon_start"];
$exp = $_POST["coupon_exp"];
$used_count = $_POST["coupon_used_count"];
// 獲取當前時間
$time = date('Y-m-d H:i:s');


// 檢查必填欄位是否為空
if (empty($name) || empty($email) || empty($phone)) {
    echo "請輸入資料";
    die;
}

// 準備 SQL 插入語句，將用戶數據插入到 "users" 表格中
$sql = "INSERT INTO coupon (coupon_name, coupon_introduce, coupon_code,coupon_type,coupon_discount,coupon_start,coupon_exp,coupon_used_count,modified_at,created_at,valid)
        VALUES ('$name', '$introduce','$code','$type','$discount','$start', '$exp', '$used_count','$time','$time',1)";

// 執行 SQL 插入語句
if ($conn->query($sql) === TRUE) {
    echo "新增資料完成";
    $last_id = $conn->insert_id;
    echo "最新一筆序號為" . $last_id;
} else {
    echo "新增資料錯誤: " . $conn->error;
}

// 關閉資料庫連接
$conn->close();

// 重定向到指定頁面
header("location:coupons.php");
