<!DOCTYPE html>
<html lang="ko">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>회원가입</title>
</head>

<body>
    <h1>회원가입</h1>
    <h4>일반회원과 공인중개사 중 하나를 선택하세요.</h4>
    <ul>
        <li>일반회원</li>
        <li>공인중개사</li>
    </ul>
    <div id="show_user">
        <h3>일반회원 약관</h3>
        <?php include_once(_PATH_VIEW . "/tos/termsUser" . _EXTENSION_PHP); ?>
        <label>
            <input type="checkbox" id="userCheckbox" disabled>
            약관에 동의합니다.
        </label>
        <a href="registUser"><button>회원가입</button></a>
    </div>

    <div id="show_seller">
        <h3>공인중개사 약관</h3>
        <?php include_once(_PATH_VIEW . "/tos/termsSeller" . _EXTENSION_PHP); ?>
        <label>
            <input type="checkbox" id="sellerCheckbox" disabled>
            약관에 동의합니다.
        </label>
        <a href="registSeller"><button>회원가입</button></a>
    </div>


    <script src="/application/view/js/regist.js"></script>
</body>

</html>