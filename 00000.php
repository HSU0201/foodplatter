<?php
// 引入資料庫連接文件
require_once("foodplatter_connect.php");

// 計算總筆數
$sqlTotal = "SELECT * FROM coupon WHERE valid=1";
$resultTotal = $conn->query($sqlTotal);
$totalCoupons = $resultTotal->num_rows;
$perPage = 6;
// 無條件進位相除結果，並計算總頁數
$pageCount = ceil($totalCoupons / $perPage);



// 檢查是否有 GET 請求中的 "search" 參數
if (isset($_GET["search"])) {
    // 如果有，取得 "search" 參數的值
    $search = $_GET["search"];

    // 使用 "search" 參數來篩選查詢
    $sql = "SELECT * FROM coupon WHERE coupon_name LIKE '%$search%'AND valid=1";
}
// 檢查是否有分頁參數
elseif (isset($_GET["page"]) && isset($_GET["order"])) {
    // 取得分頁參數及計算起始項目索引
    $page = $_GET["page"];
    $order = $_GET["order"];
    switch ($order) {
        case 1:
            $orderSql = "coupon_id ASC";
            break;
        case 2:
            $orderSql = "coupon_id DESC";
            break;
        case 3:
            $orderSql = "coupon_name ASC";
            break;
        case 4:
            $orderSql = "coupon_name DESC";
            break;
        default:
            $orderSql = "coupon_id ASC";
    }

    $starItem = ($page - 1) * $perPage;

    // 如果沒有 "search" 參數，使用基本的查詢
    $sql = "SELECT * FROM coupon WHERE valid = 1 ORDER BY $orderSql  LIMIT $starItem,$perPage";
    // 並不包含第一筆資料，而是包含從第二筆資料開始的$perPage筆資料。
    // LIMIT [從哪個參數開始],[獲取幾筆資料]
    // ASC 升冪排序 
    //軟刪除方法：先去資料庫開一個名為valid欄位，將所有的都改成1，如果是0代表被軟刪除掉，就查不到他
}
// 如果沒有搜尋參數也沒有分頁參數，顯示第一頁的結果
else {
    $page = 1;
    $order = 1;
    $sql = "SELECT * FROM coupon WHERE valid = 1 ORDER BY id ASC LIMIT 0,$perPage";
}

// 執行 SQL 查詢，並將結果存儲在 $result 變數中
$result = $conn->query($sql);
?>

<!doctype html>
<html lang="en">

<head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- *************************** -->
    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

    <!-- Bootstrap icon -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">


    <link rel="stylesheet" href="../css/style.css?time=<?= time() ?>">
    <!-- ************************ -->

</head>

<body>

    <div class="container">
        <?php
        $couponCount = $result->num_rows;
        ?>
        <div class="py-2 d-flex justify-content-between align-items-center">
            <div>
                <?php if (isset($_GET["search"])) : ?>
                    <a class="btn btn-info" href="03user-list.php" title="回使用者列表"><i class="
                    bi bi-arrow-left"></i></a>
                    搜尋<?= $_GET["search"] ?>的結果,
                <?php endif; ?>

                共<?= $totalCoupons ?>人

            </div>
            <a class="btn btn-info" href="01add-user.php" title="增加使用者"><i class="bi bi-person-plus-fill text-white"></i></a>
        </div>
        <div class="py-2">
            <form action="">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search.." name="search">
                    <button class="btn btn-info text-white" type="submit" id="">
                        <i class="bi bi-search"></i>
                    </button>
                </div>
            </form>
        </div>

        <?php if (!isset($_GET["search"])) : ?>

            <div class="pb-2 d-flex justify-content-end">
                <div class="btn-group">
                    <a href="03user-list.php?page=<?= $page ?>&order=1" class="btn btn-info text-white <?php if ($order == 1) echo "active" ?>">
                        id
                        <i class="bi bi-sort-down"></i>
                    </a>
                    <a href="03user-list.php?page=<?= $page ?>&order=2" class="btn btn-info text-white <?php if ($order == 2) echo "active" ?>">
                        id
                        <i class="bi bi-sort-up-alt"></i>
                    </a>
                    <a href="03user-list.php?page=<?= $page ?>&order=3" class="btn btn-info text-white <?php if ($order == 3) echo "active" ?>">
                        name
                        <i class="bi bi-sort-down"></i>
                    </a>
                    <a href="03user-list.php?page=<?= $page ?>&order=4" class="btn btn-info text-white <?php if ($order == 4) echo "active" ?>">
                        name
                        <i class="bi bi-sort-up-alt"></i>
                    </a>
                </div>

            </div>
        <?php endif; ?>
        <div>
            <?php
            // $rows = $result->fetch_all(MYSQLI_BOTH);
            $rows = $result->fetch_all(MYSQLI_ASSOC);
            // var_dump($rows);
            ?>
        </div>

        <!-- 檢查是否有使用者資料 -->
        <?php if ($couponCount > 0) : ?>
            <!-- 如果有使用者資料，顯示表格 -->
            <table class="table table-bordered">

                <thead>
                    <!-- 表格頭部 -->
                    <tr>
                        <th>id</th>
                        <th>name</th>
                        <th>email</th>
                        <th>phone</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- 迴圈顯示每一位使用者的資料 -->
                    <?php foreach ($rows as $row) : ?>
                        <tr>
                            <td><?= $row["id"] ?></td>
                            <td><?= $row["name"] ?></td>
                            <td><?= $row["email"] ?></td>
                            <td><?= $row["phone"] ?></td>
                            <!-- 生成連結按鈕，按鈕的 href 屬性指向 "05user.php" 並帶有 id 參數 -->
                            <td><a class="btn btn-info" href="05user.php?id=<?= $row["id"] ?>" title="詳細資料"><i class="bi bi-info-circle"></i></a></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>

            <!-- 檢查是否有進行搜尋，若無則顯示分頁 -->
            <?php if (!isset($_GET["search"])) : ?>
                <div class="py-2">
                    <nav aria-label="Page navigation example">
                        <ul class="pagination">
                            <!-- 迴圈顯示分頁數字 -->
                            <?php for ($i = 1; $i <= $pageCount; $i++) : ?>
                                <li class="page-item <?php if ($page == $i) echo "active" ?>">
                                    <a class="page-link" href="?page=<?= $i ?>&order=<?= $order ?>">
                                        <?= $i ?>
                                    </a>
                                </li>
                            <?php endfor; ?>
                        </ul>
                    </nav>
                </div>
            <?php endif; ?>

        <?php else : ?>
            <!-- 若無使用者資料則顯示訊息 -->
            目前無使用者
        <?php endif; ?>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js" integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
    </script>
    <script>
        let coupon = <?php echo json_encode($rows) ?>;
        console.log(coupon);
    </script>
</body>

</html>