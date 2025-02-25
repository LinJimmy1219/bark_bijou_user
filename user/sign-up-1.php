<!doctype html>
<html lang="en">

<head>
    <title>註冊 - 步驟 1</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <?php include("../css.php") ?>
</head>

<body>
    <div class="container">
        <div class="row justify-content-start align-items-center vh-100">
            <div class="col-lg-4 col-md-6">
                <h3>註冊 - 步驟 1</h3>
                <div class="mt-3">
                    <form action="sign-up-2.php" method="post">
                        <!-- 基本資料 -->
                        <div class="mb-2">
                            <label for="name" class="form-label">使用者名稱</label>
                            <input type="text" class="form-control" name="name" id="name" required>
                        </div>
                        <div class="mb-2">
                            <label for="gender" class="form-label">性別</label>
                            <select name="gender_id" class="form-control" required>
                                <option value="" selected>未填寫</option>
                                <option value="1">男</option>
                                <option value="2">女</option>
                            </select>
                        </div>
                        <div class="mb-2">
                            <label for="account" class="form-label">帳號</label>
                            <input type="text" class="form-control" name="account" id="account" required minlength="4" maxlength="20">
                            <div class="form-text">請輸入4~20字元的帳號</div>
                        </div>
                        <div class="mb-2">
                            <label for="password" class="form-label">密碼</label>
                            <input type="password" class="form-control" name="password" id="password" required minlength="4" maxlength="20">
                            <div class="form-text">請輸入4~20字元的密碼</div>
                        </div>
                        <div class="mb-2">
                            <label for="repassword" class="form-label">確認密碼</label>
                            <input type="password" class="form-control" name="repassword" id="repassword" required>
                        </div>
                        <button class="btn btn-primary" type="submit">下一步</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>