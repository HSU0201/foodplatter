<?php
// 引入與資料庫連接的文件
require_once("foodplatter_connect.php");

// 檢查是否有 POST 參數 "id"
if (!isset($_GET["shop_id"])) {
    echo "請循正常管道進入此頁";
    exit;
}

// 從 POST 參數中獲取需要更新的優惠卷資料
$id = $_GET["shop_id"];

// 構建 SQL 更新語句
$sql = "UPDATE shopinfo 
        SET certified='1'
        WHERE shop_id=$id";

// 印出 SQL 語句，用於測試
// echo $sql;

// 執行 SQL 更新
if ($conn->query($sql) === TRUE) {
    echo "更新成功";
} else {
    echo "更新資料錯誤: " . $conn->error;
}

// 關閉資料庫連接
$conn->close();

// 重新導向到認證列表頁面
header("location:certificationtables.php");


