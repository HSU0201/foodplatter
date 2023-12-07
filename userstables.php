<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />
    <meta name="description" content="" />
    <meta name="author" content="" />

    <title>會員管理</title>

    <!--此模板的自訂字體-->
    <link
      href="vendor/fontawesome-free/css/all.min.css"
      rel="stylesheet"
      type="text/css"
    />
    <link
      href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
      rel="stylesheet"
    />

    <!--此模板的自訂樣式-->
    <link href="css/sb-admin-2.css" rel="stylesheet" />

    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css"
    />
  </head>

  <body id="page-top">
    <!--頁面包裝器-->
    <div id="wrapper" class="goodnav">
      <!--側邊欄-->
      <ul
        class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion"
        id="accordionSidebar"
      >
        <!--側邊欄 -品牌-->
        <a
          class="sidebar-brand d-flex align-items-center justify-content-center"
          href="index.html"
        >
          <div class="sidebar-brand-icon rotate-n-15">
            <i class="bi bi-slack"></i>
          </div>
          <div class="sidebar-brand-text mx-3">foodplatter</div>
        </a>

        <!--分音器-->
        <hr class="sidebar-divider my-0" />

        <!--導航項目 -首頁-->
        <li class="nav-item active">
          <a class="nav-link" href="index.html">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>首頁</span>
          </a>
        </li>

        <!--分音器-->
        <hr class="sidebar-divider" />

        <!--標題-->
        <div class="sidebar-heading">用戶管理</div>

        <!--導航項目 -表格-->
        <li class="nav-item">
          <a class="nav-link" href="shopstables.html">
            <i class="bi bi-shop"></i>
            <span>商家管理</span></a
          >
        </li>
        <!--導航項目 -表格-->
        <li class="nav-item">
          <a class="nav-link" href="certificationtables.html">
            <i class="bi bi-patch-exclamation"></i>
            <span>認證管理</span></a
          >
        </li>
        <!--導航項目 -表格-->
        <li class="nav-item">
          <a class="nav-link" href="userstables.html">
            <i class="bi bi-person-rolodex"></i>
            <span>會員管理</span></a
          >
        </li>

        <!--分音器-->
        <hr class="sidebar-divider" />

        <!--標題-->
        <div class="sidebar-heading">策略行銷</div>

        <!--導航項目 -表格-->
        <li class="nav-item">
          <a
            class="nav-link collapsed"
            data-toggle="collapse"
            data-target="#collapseCoupon"
            aria-expanded="true"
            aria-controls="collapseCoupon"
            href="coupons.html"
          >
            <i class="bi bi-ticket-perforated"></i>
            <span>優惠卷管理</span>
          </a>
          <div
            id="collapseCoupon"
            class="collapse"
            aria-labelledby="headingCoupon"
            data-parent="#accordionSidebar"
          >
            <div class="bg-white py-2 collapse-inner rounded">
              <h6 class="collapse-header">優惠卷管理</h6>
              <a class="collapse-item" href="coupons.html">優惠卷</a>
              <a class="collapse-item" href="coupons-add.html">優惠卷新增</a>
              <a class="collapse-item" href="coupons-edit.html"
                >優惠卷修改、刪除</a
              >
            </div>
          </div>
        </li>

        <!--分音器-->
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
          <nav
            class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow"
          >
            <!--側邊欄切換（頂欄）-->
            <button
              id="sidebarToggleTop"
              class="btn btn-link d-md-none rounded-circle mr-3"
            >
              <i class="fa fa-bars"></i>
            </button>

            <!-- 搜尋列 -->
            <div class="d-flex align-items-center">
              <form
                class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search"
              >
                <div class="input-group">
                  <input
                    type="text"
                    class="form-control bg-light small"
                    placeholder="搜尋使用者"
                    aria-describedby="basic-addon2"
                  />
                  <div class="input-group-append">
                    <button class="btn btn-primary" type="button">
                      <i class="fas fa-search fa-sm"></i>
                    </button>
                  </div>
                </div>
              </form>

              <!-- 人數 -->
              <div class="mx-5">共5人</div>
            </div>

            <!--頂欄中級-->
            <ul class="navbar-nav ml-auto">
              <!--導航項目 -搜尋下拉式選單（僅 XS 可見）-->
              <li class="nav-item dropdown no-arrow d-sm-none">
                <a
                  class="nav-link dropdown-toggle"
                  href="#"
                  id="searchDropdown"
                  role="button"
                  data-toggle="dropdown"
                  aria-haspopup="true"
                  aria-expanded="false"
                >
                  <i class="fas fa-search fa-fw"></i>
                </a>
                <!--下拉式選單 -訊息-->
                <div
                  class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                  aria-labelledby="searchDropdown"
                >
                  <form class="form-inline mr-auto w-100 navbar-search">
                    <div class="input-group">
                      <input
                        type="text"
                        class="form-control bg-light border-0 small"
                        placeholder="Search for..."
                        aria-label="Search"
                        aria-describedby="basic-addon2"
                      />
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
                  <span class="mr-2 d-none d-lg-inline text-gray-600 small"
                    >Hello! administrator</span
                  >
                  <img
                    class="img-profile rounded-circle"
                    src="img/undraw_profile.svg"
                  />
                </div>

                <div class="topbar-divider d-none d-sm-block"></div>

                <!-- 登出 -->
                <a
                  class="nav-link"
                  href="#"
                  data-toggle="modal"
                  data-target="#logoutModal"
                >
                  <i
                    class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"
                  ></i>
                </a>
                <!-- 登出結束 -->
              </li>
            </ul>
          </nav>
          <!-- End of Topbar -->

          <!-- Begin Page Content -->
          <div class="container-fluid">
            <!-- Page Heading -->
            <h1 class="h3 mb-2 text-gray-800">會員管理</h1>
            <p class="mb-4">
              對平台或組織的會員進行有效監控、維護和操作的一系列功能，包括註冊、資料更新、權限管理和互動追蹤等。
            </p>

            <!-- 按鈕組 -->
            <div class="d-flex justify-content-end">
              <div class="btn-group m-2">
                <a
                  href="03user-list.php?page=1&order=1"
                  class="btn btn-success text-white"
                >
                  id
                  <i class="bi bi-sort-down-alt"></i>
                </a>
                <a
                  href="03user-list.php?page=1&order=1"
                  class="btn btn-success text-white"
                >
                  id
                  <i class="bi bi-sort-up"></i>
                </a>
              </div>
              <div class="btn-group m-2">
                <a
                  href="03user-list.php?page=1&order=1"
                  class="btn btn-success text-white"
                >
                  修改時間
                  <i class="bi bi-sort-down-alt"></i>
                </a>
                <a
                  href="03user-list.php?page=1&order=1"
                  class="btn btn-success text-white"
                >
                  修改時間
                  <i class="bi bi-sort-up"></i>
                </a>
              </div>
            </div>
            <!-- 按鈕組結束 -->

            <!-- DataTales Example -->
            <div class="card shadow mb-4">
              <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">會員列表</h6>
              </div>
              <div class="overflow-auto">
                <table class="table table-bordered text-nowrap table-striped">
                  <thead>
                    <tr>
                      <th class="align-middle text-center">ID</th>
                      <th class="align-middle text-center">名稱</th>
                      <th class="align-middle text-center">性別</th>
                      <th class="align-middle text-center">生日</th>
                      <th class="align-middle text-center">信箱</th>
                      <th class="align-middle text-center">電話</th>
                      <th class="align-middle text-center">地址</th>
                      <th class="align-middle text-center">卡號</th>
                      <th class="align-middle text-center">創建日期</th>
                      <th class="align-middle text-center">修改日期</th>
                      <th></th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td class="align-middle text-center">1</td>
                      <td class="align-middle text-center">陳昱榕</td>
                      <td class="align-middle text-center">M</td>
                      <td class="align-middle text-center">1987-09-30</td>
                      <td class="align-middle text-center">mjfceo@gmail.com</td>
                      <td class="align-middle text-center">905876397</td>
                      <td class="align-middle text-wrap">
                        台北市文山區指南路二段45巷14弄
                      </td>
                      <td class="align-middle text-center">
                        4040-0808-1082-1552
                      </td>
                      <td class="align-middle text-center">2023-12-05</td>
                      <td class="align-middle text-center">2023-12-06</td>
                      <td class="align-middle text-center">
                        <a
                          class="btn btn-outline-dark mx-1"
                          href="#"
                          title="修改優惠卷"
                          ><i class="bi bi-pencil-square"></i
                        ></a>
                        <a
                          class="btn btn-outline-danger mx-1"
                          href="#"
                          title="刪除優惠卷"
                          ><i class="bi bi-trash"></i
                        ></a>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
              <!-- 優惠卷列表結束 -->
            </div>
            <!-- 01 -->
            <div class="btn-group me-2" role="group" aria-label="First group">
              <button type="button" class="btn btn-outline-secondary">1</button>
            </div>
            <!-- 01 -->
          </div>
          <!-- /.container-fluid -->
        </div>
        <!-- End of Main Content -->

        <!-- Footer -->
        <footer class="sticky-footer bg-white">
          <div class="container my-auto">
            <div class="copyright text-center my-auto">
              <span>Foodplatter &copy; 2023</span>
            </div>
          </div>
        </footer>
        <!--頁尾結束-->
      </div>
      <!--內容包裝結束-->
    </div>
    <!--頁尾包裝器-->

    <!--捲動到頂部按鈕-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fas fa-angle-up"></i>
    </a>
    <!-- 登出彈出視窗 -->
    <div
      class="modal fade"
      id="logoutModal"
      tabindex="-1"
      role="dialog"
      aria-labelledby="exampleModalLabel"
      aria-hidden="true"
    >
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">確定要離開嗎?</h5>
            <button
              class="close"
              type="button"
              data-dismiss="modal"
              aria-label="Close"
            >
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">
            如果您準備結束目前會話，請選擇下面的「登出」。
          </div>
          <div class="modal-footer">
            <button
              class="btn btn-secondary"
              type="button"
              data-dismiss="modal"
            >
              取消
            </button>
            <a class="btn btn-primary" href="login.html">登出</a>
          </div>
        </div>
      </div>
    </div>
    <!-- 登出彈出視窗結束 -->
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
