<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/application/view/css/common.css">
    <title>Login</title>
</head>
<body>
    <div class="div_header">
    <?php include_once(_PATH_VIEW._BASE_FILENAME_HEADER._EXTENSION_PHP); ?>
    </div>
    <h3 style="color: red;"><?php echo (isset($this->errMsg) ? $this->errMsg : ""); ?></h3>
    <div class="div_outside">
    <div class="div_contents">
    <h1>회원 로그인</h1>
    <form action="/user/login" method="post">
        <div class="div_id">
            <label for="id">ID</label>
            <input type="text" name="id" id="id" autofocus>
        </div>
            <br>
            <div class="div_pw">
            <label for="pw">PW</label>
            <input type="password" name="pw" id="pw">
        </div>
            <br>
            <br>
        </div>
            <div class="div_button">
            <button type="submit" class="btn btn-outline-dark button_1">로그인</button>
            <a href="/user/regist"><button type="button" class="btn btn-outline-secondary button_2">회원 가입</button></a>
        </div>
    </form>
        </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>