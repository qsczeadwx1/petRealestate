<h1>반려동물을 위한 부동산 웹사이트</h1>

최초 실행 php파일 index.php - 어떤 URL로 접속해도 index.php로 접속
<br>
- 설정파일 include후 application\libs\Application 호출
<br>
URL 분석 php파일 application\libs\Application - URL을 분석하여 해당 Controller 호출
<br>
컨트롤러 application\controllers\Controller.php && application\controllers[처리명]Controller.php - 세션 체크, 유저 권한 체크 - 해당 모델 호출
<br>
모델 application\models\Model.php && application\models[처리명]Model.php - DB 접속 및 결과를 컨트롤러에 리턴
<br>
컨트롤러 application\controllers\Controller.php && application\controllers[처리명]Controller.php - 해당 뷰 호출 또는 API response
<br>
6_1. 뷰 호출의 경우 application\controllers\Controller.php && application\controllers[처리명]Controller.php - 해당 뷰 호출 
<br>
6_2. API response의 경우 application\controllers\Controller.php && application\controllers\apiController.php - json Response