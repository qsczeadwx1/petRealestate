<h1>반려동물을 위한 부동산 웹사이트</h1>

1. 최초 실행 php파일 index.php - 어떤 URL로 접속해도 index.php로 접속
   <br>
2. index.php에서 설정파일 include하고 application\libs\Application 호출
   <br>
3. Application.php에서 $arrPath는 접속한 URL을 "/"단위로 잘라서 배열로 획득함
    $arrPath[0]의 값+Contorller.php를 찾아감(예: UserController.php)
    찾아간 Controller에서 $arrPath[1]+Get 이라는 메소드를 찾아 뷰로 반환.
    URL은 $arrPath[0]/$arrPath[1]의 형식이고, 이 뒤에 ?해서 GET방식으로 더 붙던가 하는건 상관 X
    $arrPath[0]에 들어가는 값들은 $arrPath[0]값 이름의 Model이 있어야함(예: UserModel.php)
    URL없이 들어왔을 땐 main으로 이동함
    <br>
4. URL 분석 php파일 application\libs\Application - URL을 분석하여 해당 Controller 호출
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
