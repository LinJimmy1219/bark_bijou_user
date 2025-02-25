<!doctype html>
<html lang="en">

<head>
    <title>註冊 - 步驟 2</title>
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
                <h3>註冊 - 步驟 2</h3>
                <div class="mt-3">
                    <form action="doSignup.php" method="post">
                        <!-- 步驟 1 的資料 -->
                        <input type="hidden" name="name" value="<?= $_POST['name'] ?>">
                        <input type="hidden" name="gender_id" value="<?= $_POST['gender_id'] ?>">
                        <input type="hidden" name="account" value="<?= $_POST['account'] ?>">
                        <input type="hidden" name="password" value="<?= $_POST['password'] ?>">
                        <input type="hidden" name="repassword" value="<?= $_POST['repassword'] ?>">

                        <!-- 註冊資料 -->
                        <div class="mb-2">
                            <label for="email" class="form-label">輸入電子信箱</label>
                            <input type="email" class="form-control" name="email" id="email" required>
                        </div>
                        <div class="mb-2">
                            <label for="phone" class="form-label">電話</label>
                            <input type="text" class="form-control" name="phone" id="phone" required>
                        </div>
                        <div class="mb-2">
                            <label for="birth_date" class="form-label">出生日期</label>
                            <input type="date" class="form-control" name="birth_date" id="birth_date" required>
                        </div>
                        <button class="btn btn-primary" type="submit">送出</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>