<?php use application\controller\UserController; ?>

<!DOCTYPE html>
<html lang="ko">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    유저입니다
    <span><?php echo (isset($this->errMsg) ? $this->errMsg : "") ?></span>

    <form action="/user/registUser" method="post">
        <label for="id">아이디</label>
        <input type="text" id="id" name="id">
        <br>

        <label for="pw">비밀번호</label>
        <input type="password" id="pw" name="pw">
        <br>

        <label for="pwChk">비밀번호 확인</label>
        <input type="password" id="pwChk" name="pwChk">
        <br>
        
        <label for="">이메일</label>
        <input type="text">
        <br>
        
        <label for="name">이름</label>
        <input type="text" id="name" name="name">
        <br>

        <label for="">전화번호</label>
        <input type="text">
        <br>
    
        <label for="">주소</label>
        <input type="text">
        <br>

        <label for="">비밀번호 찾기 전용 질문</label>
        <input type="text">
        <br>
        <label for="">답변</label>
        <input type="text">

        <button>회원가입</button>
    </form>
    <?php

    // $to = "qsczeadwx1@gmail.com";
    // $subject = "이메일 한글 테스트";
    // $message = "한글도 잘되는지 테스트 ㅂ ㅁ ㅋ ㅌ ㅊ ㅈ ㄴ ㅇ ㄷ ㄱㄹ
    // 가 나 다 라 마 바사 아자 차 카 타 파 하 기 니디리 미 비 시 밦 몫 봆";
    // $headers = "From: qsczeadwx1@gmail.com";
    // $send_mail = mail($to, $subject, $message, $headers);
    // if (mail($to, $subject, $message, $headers)) {
    //     echo "Email sent successfully!";
    // } else {
    //     echo "Failed to send email.";
    // }

    ?>
</body>

</html>