<?php
require_once("../db_connect_bark_bijou.php");

$sqlAll = "SELECT * FROM users WHERE valid=1";
$resultAll = $conn->query($sqlAll);
$userCount = $resultAll->num_rows;

if (isset($_GET["q"])) {
    $q = $_GET["q"];
    $sql = "SELECT * FROM users WHERE name LIKE '%$q%'";
} else if (isset($_GET["p"]) && isset($_GET["order"])) {
    $p = $_GET["p"];
    $order = $_GET["order"];

    $orderClause = "";
    switch ($order) {
        case 1:
            $orderClause = "ORDER BY id ASC";
            break;
        case 2:
            $orderClause = "ORDER BY id DESC";
            break;
        case 3:
            $orderClause = "ORDER BY name ASC";
            break;
        case 4:
            $orderClause = "ORDER BY name DESC";
            break;
        case 5:
            $orderClause = "ORDER BY account ASC";
            break;
        case 6:
            $orderClause = "ORDER BY account DESC";
            break;
    }

    $perPage = 10;
    $startItem = ($p - 1) * $perPage;
    $totalPage = ceil($userCount / $perPage);
    $sql = "SELECT * FROM users WHERE valid=1 $orderClause LIMIT $startItem, $perPage";
} else {
    header("location: users.php?p=1&order=1");
}

$result = $conn->query($sql);
$rows = $result->fetch_all(MYSQLI_ASSOC);

if (isset($_GET["q"])) {
    $userCount = $result->num_rows;
}

?>
<!doctype html>
<html lang="en">

<head>
    <title>Bark & Bijou users</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <?php include("../css.php") ?>

    <style>
        .primary {
            background-color: rgba(245, 160, 23, 0.919);
        }

        .list-btn a {
            background-color: transparent;
            color: #ffc107;
            border-color: transparent;
        }

        .list-btn a:hover {
            color: #b8860b;
        }

        .list-btn a:active {
            color: rgb(219, 161, 16);
            background-color: transparent;
        }

        .list-btn a.active {
            color: rgb(219, 161, 16);
            background-color: transparent;
        }

        .list-btn .btn {
            border: none;
            box-shadow: none;
            outline: none;
        }

        .pagination .page-link {
            background-color: #ffc107;
            /* Bootstrap warning 黃色 */
            color: white;
            /* 文字顏色 */
            border-color: #ffc107;
            /* 邊框顏色 */
        }

        .pagination .page-link:hover {
            background-color: #ffca2c;
            /* 滑鼠懸停時的顏色 */
            border-color: #ffc720;
        }

        .pagination .page-link:focus {
            box-shadow: rgb(217, 164, 6);
            /* 發光效果 */
        }

        .pagination .active .page-link {
            background-color: rgb(219, 161, 16);
            border-color: rgb(219, 161, 16);
        }
    </style>
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
                    <div class="d-flex justify-content-between mb-2">
                        <h1 class="h3 mb-0 text-gray-800">會員管理</h1>
                        <div class="py-2">
                            <a class="btn btn-warning d-flex align-items-center" href="create-user.php"><i class="fa-solid fa-user-plus fa-fw"></i>Add User</a>
                        </div>
                    </div>
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <div class="container-fluid">
                            <div class="py-2 row g-3 align-items-center">
                                <div class="col-md-6">
                                    <div class="hstack gap-2 align-item-center">
                                        <?php if (isset($_GET["q"])) : ?>
                                            <a class="btn btn-warning" href="users.php"><i class="fa-solid fa-arrow-left fa-fw"></i></a>
                                        <?php endif; ?>
                                        <div>共 <?= $userCount ?> 位使用者</div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <form action="" method="get">
                                        <div class="input-group">
                                            <input type="search" class="form-control" name="q" <?php $q = "";
                                                                                                // if (isset($_GET["q"])) {
                                                                                                // $q = $_GET["q"];
                                                                                                // }
                                                                                                // $q=(isset($_GET["q"]))?
                                                                                                // $_GET["q"] : "";
                                                                                                $q = $_GET["q"] ?? ""; ?>
                                                value="<?= $q ?>">
                                            <button class="btn btn-warning"><i class="fa-solid fa-magnifying-glass fa-fw" type="submit"></i></button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <?php if ($userCount > 0): ?>
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th class="align-middle">
                                                <div class="row g-0">
                                                    <div class="d-flex align-items-center col-9">
                                                        id
                                                    </div>
                                                    <div class="col-3 list-btn">
                                                        <a href="users.php?p=<?= $p ?>&order=2" class="d-flex btn p-0 <?php if ($order == 2) echo "active" ?>"><i class="fa-solid fa-caret-up "></i></a>
                                                        <a href="users.php?p=<?= $p ?>&order=1" class="d-flex btn p-0 m-0 <?php if ($order == 1) echo "active" ?>"><i class="fa-solid fa-caret-down "></i></a>
                                                    </div>
                                                </div>
                                            </th>
                                            <th class="align-middle">
                                                <div class="row g-0">
                                                    <div class="d-flex align-items-center col-9">
                                                        name
                                                    </div>
                                                    <div class="col-3 list-btn">
                                                        <a href="users.php?p=<?= $p ?>&order=4" class="d-flex btn p-0 <?php if ($order == 4) echo "active" ?>"><i class="fa-solid fa-caret-up "></i></a>
                                                        <a href="users.php?p=<?= $p ?>&order=3" class="d-flex btn p-0 m-0 <?php if ($order == 3) echo "active" ?>"><i class="fa-solid fa-caret-down "></i></a>
                                                    </div>
                                                </div>
                                            </th>
                                            <th class="align-middle">
                                                <div class="row g-0">
                                                    <div class="d-flex align-items-center col-9">
                                                        account
                                                    </div>
                                                    <div class="col-3 list-btn">
                                                        <a href="users.php?p=<?= $p ?>&order=6" class="d-flex btn p-0 <?php if ($order == 6) echo "active" ?>"><i class="fa-solid fa-caret-up "></i></a>
                                                        <a href="users.php?p=<?= $p ?>&order=5" class="d-flex btn p-0 m-0 <?php if ($order == 5) echo "active" ?>"><i class="fa-solid fa-caret-down "></i></a>
                                                    </div>
                                                </div>
                                            </th>
                                            <th class="align-middle">phone</th>
                                            <th class="align-middle">email</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($rows as $row): ?>
                                            <tr>
                                                <td class="align-middle"><?= $row["id"] ?></td>
                                                <td class="align-middle"><?= $row["name"] ?></td>
                                                <td class="align-middle"><?= $row["account"] ?></td>
                                                <td class="align-middle"><?= $row["phone"] ?></td>
                                                <td class="align-middle"><?= $row["email"] ?></td>
                                                <td class="align-middle">
                                                    <a class="btn btn-warning" href="user.php?id=<?= $row["id"] ?>"><i class="fa-regular fa-eye"></i></a>
                                                    <a class="btn btn-warning" href="user-edit.php?id=<?= $row["id"] ?>"><i class="fa-solid fa-fw fa-pen"></i></a>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>

                                <?php if (isset($_GET["p"])): ?>
                                    <div>
                                        <nav aria-label="">
                                            <ul class="pagination">
                                                <?php for ($i = 1; $i <= $totalPage; $i++): ?>
                                                    <?php
                                                    $active = ($i == $_GET["p"]) ? "active" : "";
                                                    ?>
                                                    <li class="page-item <?= $active ?>"><a class="page-link" href="users.php?p=<?= $i ?>&order=<?= $order ?>"><?= $i ?></a></li>
                                                <?php endfor; ?>
                                            </ul>
                                        </nav>
                                    </div>
                                <?php endif ?>
                            <?php endif; ?>
                        </div>
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