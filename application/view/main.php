<!DOCTYPE html>
<html lang="ko">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>펫방</title>
</head>

<body>
    <?php include_once(_PATH_VIEW . _BASE_FILENAME_HEADER . _EXTENSION_PHP); ?>
    <h1>펫 방</h1>
    <input type="text" placeholder="주소나 지하철명으로 검색해 주세요">
    <button>Search</button>

    <h2>최근 등록된 매물</h2>

    <a href=""><button>지도에서 매물 검색</button></a>

    <div>매물들</div>

    

asdf

<?php

$to = "qsczeadwx1@gmail.com";
$subject = "Test Email";
$message = "Hello, this is a test email from PHP!";
$headers = "From: sender@example.com";

if (mail($to, $subject, $message, $headers)) {
    echo "Email sent successfully!";
} else {
    echo "Failed to send email.";
}

?>



    <?php include_once(_PATH_VIEW . _BASE_FILENAME_FOOTER . _EXTENSION_PHP); ?>

    
</body>

</html>