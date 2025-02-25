<?php
if (!isset($_GET["id"])) {
    header("location: users.php");
}

$id = $_GET["id"];
require_once("../db_connect_bark_bijou.php");
$sql = "SELECT * FROM users WHERE id = $id AND valid=1";
// 之後要進入在網址後加 ?id=
$result = $conn->query($sql);
// $rows=$result->fetch_all(MYSQLI_ASSOC);
// var_dump($rows[0]);
$row = $result->fetch_assoc();
$userCount = $result->num_rows;

// $sqlFavoriteProducts = "SELECT user_like.*, product.name AS product_name FROM user_like
// JOIN product ON user_like.product_id = product.id
// WHERE user_like.user_id = $id
// ";

// $resultFavoriteProducts = $conn->query($sqlFavoriteProducts);
// $favoriteProductCount = $resultFavoriteProducts->num_rows;
// $products = $resultFavoriteProducts->fetch_all((MYSQLI_ASSOC));

// var_dump($row);
?>
<!doctype html>
<html lang="en">

<head>
    <title>user</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <?php include("../css.php") ?>
</head>

<body id="page-top">
    <!-- Page Wrapper -->
    <div id="wrapper">
        <!-- Sidebar -->
        <ul class="navbar-nav sidebar sidebar-dark accordion primary" id="accordionSidebar">
            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3">Bark & Bijou</div>
            </a>
            <!-- Divider -->
            <hr class="sidebar-divider my-0">
            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="index.html">
                    <i class="fa-solid fa-user"></i>
                    <span>會員專區</span></a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="index.html">
                    <i class="fa-solid fa-user"></i>
                    <span>商品列表</span></a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="index.html">
                    <i class="fa-solid fa-user"></i>
                    <span>課程管理</span></a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="index.html">
                    <i class="fa-solid fa-user"></i>
                    <span>旅館管理</span></a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="index.html">
                    <i class="fa-solid fa-user"></i>
                    <span>文章管理</span></a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="index.html">
                    <i class="fa-solid fa-user"></i>
                    <span>優惠券管理</span></a>
            </li>
            <hr class="sidebar-divider">
        </ul>
        <!-- End of Sidebar -->
        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">
            <!-- Main Content -->
            <div id="content">
                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>
                    <!-- Topbar Search -->
                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                                aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small"
                                            placeholder="Search for..." aria-label="Search"
                                            aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-warning" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>
                        <!-- Nav Item - Alerts -->
                        <!-- Nav Item - Messages -->
                        <div class="topbar-divider d-none d-sm-block"></div>
                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">Douglas McGee</span>
                                <img class="img-profile rounded-circle" src="img/undraw_profile.svg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Settings
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Activity Log
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>
                    </ul>
                </nav>
                <!-- End of Topbar -->
                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">會員收藏列表</h1>
                    </div>
                    <div class="container-fluid">
                        <div class="py-2">
                            <a class="btn btn-warning" href="users.php"><i class="fa-solid fa-arrow-left fa-fw"></i></a>
                        </div>
                        <?php if ($userCount > 0): ?>
                            <div class="row g-3">
                                <div class="col-lg-4 col-md-9">
                                    <table class="table table-bordered">
                                        <tr>
                                            <td>id</td>
                                            <td><?= $row["id"] ?></td>
                                        </tr>
                                        <tr>
                                            <td>name</td>
                                            <td><?= $row["name"] ?></td>
                                        </tr>
                                        <tr>
                                            <td>phone</td>
                                            <td><?= $row["phone"] ?></td>
                                        </tr>
                                        <tr>
                                            <td>email</td>
                                            <td><?= $row["email"] ?></td>
                                        </tr>
                                        <tr>
                                            <td>created at</td>
                                            <td><?= $row["created_at"] ?></td>
                                        </tr>
                                    </table>
                                    <div class="">
                                        <a href="user-edit.php?id=<?= $row["id"] ?>" class="btn btn-warning"><i class="fa-solid fa-pen fa-solid fa-fw"></i></a>
                                    </div>
                                </div>
                                <div class="col-lg-8 col-md-12">
                                    <h2>收藏商品</h2>
                                    <?php if ($favoriteProductCount > 0): ?>
                                        <ul>
                                            <?php foreach ($products as $product): ?>
                                                <li>
                                                    <a href="/product/product.php?id=<?= $product["product_id"] ?>"><?= $product["product_name"] ?></a>
                                                </li>
                                            <?php endforeach; ?>
                                        </ul>
                                    <?php else: ?>
                                        尚未收藏商品
                                    <?php endif; ?>
                                </div>
                            </div>
                        <?php else: ?>
                            <h2>使用者不存在</h2>
                        <?php endif; ?>
                    </div>
                    <!-- End of Page Wrapper -->
                </div>
                <!-- Scroll to Top Button-->
            </div>
        </div>
    </div>
    <?php include("../js.php") ?>
    <script>

    </script>

</body>

</html>