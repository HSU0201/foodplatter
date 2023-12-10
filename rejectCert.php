<?php
// 引入與資料庫連接的文件
require_once("foodplatter_connect.php");


// 已下架店家
$certAll = "SELECT * FROM shopinfo WHERE shop_valid=0 AND certified=2";
$certTotal = $conn->query($certAll);
$certshop = $certTotal->num_rows;

// 認證不通過店家
$notCertTotal = "SELECT * FROM shopinfo WHERE shop_valid=1 AND certified=2";
$resultTotal = $conn->query($notCertTotal);
$totalshops = $resultTotal->num_rows;

// 每頁顯示的商家數
$perPage = 10;
// 進行無條件進位的相除操作，計算總頁數
$pageCount = ceil($totalshops / $perPage);

// ----------------------------------------------------------------------------------------
// 檢查是否有 GET 請求中的 "search" 參數
if (isset($_GET["search"])) {
  // 如果有，取得 "search" 參數的值
  $search = $_GET["search"];

  // 使用 "search" 參數來篩選查詢
  $sql = "SELECT * FROM shopinfo WHERE shop_name LIKE '%$search%' AND shop_valid IN (0, 1) AND certified=2";
}
// 檢查是否有分頁參數
elseif (isset($_GET["page"]) && isset($_GET["order"])) {
  // 取得分頁參數及計算起始項目索引
  $page = $_GET["page"];
  $order = $_GET["order"];
  switch ($order) {
    case 1:
      $orderSql = "shop_id ASC";
      break;
    case 2:
      $orderSql = "shop_id DESC";
      break;
    case 3:
      $orderSql = "shop_name ASC";
      break;
    case 4:
      $orderSql = "shop_name DESC";
      break;
    default:
      $orderSql = "shop_id ASC";
  }

  $startItem = ($page - 1) * $perPage;

  // 如果沒有 "search" 參數，使用基本的查詢
  $sql = "SELECT * FROM shopinfo WHERE shop_valid IN (0, 1) AND certified=2 ORDER BY $orderSql LIMIT $startItem, $perPage";
}
// 如果沒有搜尋參數也沒有分頁參數，顯示第一頁的結果
else {
  $page = 1;
  $order = 1;
  $sql = "SELECT * FROM shopinfo WHERE shop_valid IN (0, 1) AND certified=2 ORDER BY shop_id ASC LIMIT 0, $perPage";
}

// 執行 SQL 查詢，並將結果存儲在 $result 變數中
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <meta name="description" content="" />
  <meta name="author" content="" />

  <title>商家管理</title>

  <!--此模板的自訂字體-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css" />
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet" />

  <!--此模板的自訂樣式-->
  <link href="css/sb-admin-2.css" rel="stylesheet" />

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css" />
</head>

<body id="page-top">
  <!--頁面包裝器-->
  <div id="wrapper" class="goodnav">
    <!--側邊欄-->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
      <!--側邊欄 -品牌-->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
        <div class="sidebar-brand-icon rotate-n-15">
          <i class="bi bi-slack"></i>
        </div>
        <div class="sidebar-brand-text mx-3">foodplatter</div>
      </a>

      <!--分隔線-->
      <hr class="sidebar-divider my-0" />

      <!--導航項目 -首頁-->
      <li class="nav-item active">
        <a class="nav-link" href="index.php">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>首頁</span>
        </a>
      </li>

      <!--分隔線-->
      <hr class="sidebar-divider" />

      <!--標題-->
      <div class="sidebar-heading">用戶管理</div>

      <!--側邊攔項目-->
      <li class="nav-item">
        <a class="nav-link" href="shopstables.php">
          <i class="bi bi-shop"></i>
          <span>商家管理</span></a>
      </li>
      <!--側邊攔項目-->
      <li class="nav-item">
        <a class="nav-link" href="certificationtables.php">
          <i class="bi bi-patch-exclamation"></i>
          <span>認證管理</span></a>
      </li>
      <!--側邊攔項目-->
      <li class="nav-item">
        <a class="nav-link" href="userstables.php">
          <i class="bi bi-person-rolodex"></i>
          <span>會員管理</span></a>
      </li>

      <!--分隔線-->
      <hr class="sidebar-divider" />

      <!--標題-->
      <div class="sidebar-heading">策略行銷</div>

      <!--側邊攔項目-->
      <li class="nav-item">
        <a class="nav-link collapsed" data-toggle="collapse" data-target="#collapseCoupon" aria-expanded="true" aria-controls="collapseCoupon" href="coupons.php">
          <i class="bi bi-ticket-perforated"></i>
          <span>優惠卷管理</span>
        </a>
        <div id="collapseCoupon" class="collapse" aria-labelledby="headingCoupon" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">優惠卷管理</h6>
            <a class="collapse-item" href="coupons.php">優惠卷</a>
            <a class="collapse-item" href="coupons-add.php">優惠卷新增</a>
            <a class="collapse-item" href="coupons.php">優惠卷修改、刪除</a>
          </div>
        </div>
      </li>

      <!--分隔線-->
      <hr class="sidebar-divider d-none d-md-block" />

      <!--側邊欄切換器（側邊欄）-->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>
    </ul>
    <!--側邊欄末尾-->

    <!--內容包裝器-->
    <div id="content-wrapper" class="d-flex flex-column">
      <!--主要內容-->
      <div id="content">
        <!--nav-->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
          <!--側邊欄切換（頂欄）-->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>
          <!-- 搜尋列 -->
          <div class="d-flex align-items-center">
            <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
              <div class="input-group">
                <input type="text" class="form-control bg-light small" placeholder="搜尋商家" aria-describedby="basic-addon2" name="search" />
                <div class="input-group-append">
                  <button class="btn btn-primary" type="submit">
                    <i class="fas fa-search fa-sm"></i>
                  </button>
                </div>
              </div>
            </form>

            <!-- 人數 -->
            <?php
            $shopCount = $result->num_rows;
            ?>
            <div class="mx-5 d-flex">
              <?php if (isset($_GET["search"])) : ?>
                搜尋 <p class="text-success"> <?= $_GET["search"] ?> </p> 的結果,
              <?php endif; ?>
              共<?= $shopCount ?>家
            </div>
          </div>

          <!--頂欄中級-->
          <ul class="navbar-nav ml-auto">
            <!--導航項目 -搜尋下拉式選單（僅 XS 可見）-->
            <li class="nav-item dropdown no-arrow d-sm-none">
              <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-search fa-fw"></i>
              </a>
              <!--下拉式選單 -訊息-->
              <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                <form class="form-inline mr-auto w-100 navbar-search">
                  <div class="input-group">
                    <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2" />
                    <div class="input-group-append">
                      <button class="btn btn-primary" type="button">
                        <i class="fas fa-search fa-sm"></i>
                      </button>
                    </div>
                  </div>
                </form>
              </div>
            </li>

            <!--導航項目 -使用者資訊-->
            <li class="nav-item dropdown no-arrow d-flex">
              <div class="nav-link" href="#" id="">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small">Hello! administrator</span>
                <img class="img-profile rounded-circle" src="img/undraw_profile.svg" />
              </div>

              <div class="topbar-divider d-none d-sm-block"></div>

              <!-- 登出 -->
              <a class="nav-link" href="#" data-toggle="modal" data-target="#logoutModal">
                <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
              </a>
              <!-- 登出結束 -->
            </li>
          </ul>
        </nav>
        <!-- End of Topbar -->
        <!-- Begin Page Content -->
        <div class="container-fluid">
          <div class="d-flex justify-content-between">
            <h1 class="h3 mb-2 text-gray-800">下架管理</h1>

          </div>
          <!-- Page Heading -->



          <div class="row">

            <!-- Earnings (Annual) Card Example -->
            <button class="col-xl-6 col-md-6 mb-4">
              <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                        未通過認證店家
                      </div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">
                        <?= $certshop ?>
                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="bi bi-patch-check-fill fa-2x text-green-800"></i>
                    </div>
                  </div>
                </div>
              </div>
            </button>

            <!-- Tasks Card Example -->
            <div class="col-xl-6 col-md-6 mb-4">
              <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                        已下架店家
                      </div>
                      <div class="row no-gutters align-items-center">
                        <div class="col-auto">
                          <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">
                            <?= $totalshops ?>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="bi bi-patch-exclamation-fill fa-2x text-red-800"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div>
            <?php
            // $rows = $result->fetch_all(MYSQLI_BOTH);
            $rows = $result->fetch_all(MYSQLI_ASSOC);
            // var_dump($rows);
            ?>
          </div>

          <?php if ($shopCount > 0) : ?>
            <!-- DataTales Example -->
            <div class="card shadow mb-4">
              <div class="card-header d-flex align-items-center">
                <h6 class="m-0 font-weight-bold text-primary">商家列表</h6>
                <!-- 按鈕組 -->
                <?php if (!isset($_GET["search"])) : ?>
                  <div class="d-flex justify-content-end">
                    <div class="btn-group m-2">
                      <a href="certificationtables.php?page=<?= $page ?>&order=1" class="btn btn-success text-white <?php if ($order == 1) echo "active" ?>">
                        id
                        <i class="bi bi-sort-down-alt"></i>
                      </a>
                      <a href="certificationtables.php?page=<?= $page ?>&order=2" class="btn btn-success text-white <?php if ($order == 2) echo "active" ?>">
                        id
                        <i class="bi bi-sort-up"></i>
                      </a>
                    </div>
                    <div class="btn-group m-2">
                      <a href="certificationtables.php?page=<?= $page ?>&order=3" class="btn btn-success text-white <?php if ($order == 3) echo "active" ?>">
                        最後更新
                        <i class="bi bi-sort-down-alt"></i>
                      </a>
                      <a href="certificationtables.php?page=<?= $page ?>&order=4" class="btn btn-success text-white <?php if ($order == 4) echo "active" ?>">
                        最後更新
                        <i class="bi bi-sort-up"></i>
                      </a>
                    </div>
                  </div>
                <?php endif; ?>
                <!-- 按鈕組結束 -->
              </div>
              <div class="overflow-auto">
                <table class="table table-bordered text-nowrap table-striped">
                  <thead>
                    <tr>
                      <th class="align-middle text-center">ID</th>
                      <th class="align-middle text-center">圖片</th>
                      <th class="align-middle text-center">商家名稱</th>
                      <th class="align-middle text-center">主分類</th>
                      <th class="align-middle text-center">副分類</th>
                      <th class="align-middle text-center">統編</th>
                      <th class="align-middle text-center">信箱</th>
                      <th class="align-middle text-center">電話</th>
                      <th class="align-middle text-center">詳細地址</th>
                      <th class="align-middle text-center">銀行帳戶</th>
                      <th class="align-middle text-center">修改時間</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($rows as $row) : ?>
                      <tr>
                        <td class="align-middle text-center"><?= $row["shop_id"] ?></td>
                        <td class="align-middle text-center">
                          <img src="img/shop/<?= $row["shop_img"] ?>" style="width: 30px" alt="" />
                        </td>
                        <td class="align-middle text-center"><?= $row["shop_name"] ?></td>
                        <td class="align-middle text-center">
                          <?php
                          // 獲取主類別值
                          $mainCategory = $row["main_category"];

                          // 定義主類別到文本的映射
                          $mainCategoryMapping = [
                            1 => "中式",
                            2 => "西式",
                            3 => "異式",
                          ];

                          // 輸出主類別文本，如果未知則輸出默認值
                          echo isset($mainCategoryMapping[$mainCategory]) ? $mainCategoryMapping[$mainCategory] : "未知類型";
                          ?>
                        </td>
                        <td class="align-middle text-center">
                          <?php
                          // 獲取子類別值
                          $subCategory = $row["sub_category"];

                          // 定義子類別到文本的映射
                          $subCategoryMapping = [
                            1 => ["中式" => "中台", "西式" => "速食", "異式" => "印度菜"],
                            2 => ["中式" => "日菜", "西式" => "麵包", "異式" => "墨西哥菜"],
                            3 => ["中式" => "韓菜", "西式" => "義菜", "異式" => "越菜"],
                            4 => ["中式" => "港菜", "西式" => "法菜", "異式" => "泰菜"],
                          ];

                          // 輸出子類別文本，如果未知則輸出默認值
                          echo isset($subCategoryMapping[$subCategory][$mainCategoryMapping[$mainCategory]]) ? $subCategoryMapping[$subCategory][$mainCategoryMapping[$mainCategory]] : "未知類型";
                          ?>
                        </td>


                        <td class="align-middle text-center"><?= $row["shop_tax"] ?></td>
                        <td class="align-middle text-center"><?= $row["shop_email"] ?></td>
                        <td class="align-middle text-center">0<?= $row["shop_tel"] ?></td>
                        <td class="align-middle text-wrap">
                          <?= $row["address"] ?>
                        </td>
                        <td class="align-middle text-center"><?= $row["bank_account"] ?></td>
                        <td class="align-middle text-center"><?= $row["modified_at"] ?></td>

                        <td class="align-middle text-center">
                          <a class="btn btn-success mx-1" href="doUpdateCert.php?shop_id=<?= $row["shop_id"] ?>" title="通過認證"><i class="bi bi-check-lg"></i></a>
                          <!-- 刪除按鈕，觸發刪除確認視窗 -->
                          <a class="btn btn-danger mx-1" title="不通過認證" type="button" data-toggle="modal" data-target="#exampleModalLong"><i class="bi bi-ban"></i></a>
                        </td>
                      </tr>
                      <!-- 刪除彈出視窗 -->
                      <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="deletetable" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="deletetable">不通過認證</h5>
                              <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                              </button>
                            </div>
                            <div class="modal-body">
                              確認此廠商要不通過認證嗎?
                            </div>
                            <div class="modal-footer">
                              <a class="btn btn-secondary" type="button" data-dismiss="modal">
                                取消
                              </a>
                              <a class="btn btn-primary" href="doUpdateNotCert.php?shop_id=<?= $row["shop_id"] ?>">
                                確定不通過
                              </a>
                            </div>
                          </div>
                        </div>
                      </div>
                      <!-- 刪除彈出視窗結束 -->
                    <?php endforeach; ?>
                  </tbody>
                </table>
                <!-- 分頁列 -->
                <!-- 檢查是否有進行搜尋，若無則顯示分頁 -->
                <?php if (!isset($_GET["search"])) : ?>
                  <div class="mx-2 py-2">
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
                <!-- 分頁列結束 -->

              </div>
              <!-- 商家列表結束 -->
            </div>
          <?php else : ?>
            <!-- 若無商家資料則顯示訊息 -->
            目前無未認證商家
          <?php endif; ?>
        </div>
      </div>
      <!-- /.container-fluid -->
    </div>
    <!-- End of Main Content -->

  </div>
  <!-- End of Content Wrapper -->
  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>



  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <script src="vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="js/demo/datatables-demo.js"></script>

</body>

</html>