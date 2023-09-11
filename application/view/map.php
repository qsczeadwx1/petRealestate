<!DOCTYPE html>
<html lang="ko">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>지도</title>
</head>

<body>
    <?php include_once(_PATH_VIEW._BASE_FILENAME_HEADER._EXTENSION_PHP); ?>
    <div id="map" style="width: 1000px; height: 1000px;"></div>




    <!-- 카카오 api 불러오기 -->
    <script type="text/javascript" src="//dapi.kakao.com/v2/maps/sdk.js?appkey=c3af763d949f96c4cc8cca5e5762703f&libraries=services,clusterer,drawing"></script>
    <script src="/application/view/js/map.js"></script>
</body>

</html>