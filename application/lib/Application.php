<?php

namespace application\lib;

use application\util\UrlUtil;

class Application {
    // $arrPath는 접속한 url을 "/"단위로 잘라서 배열로 획득함
    // $arrPath[0]의 값+Contorller.php를 찾아감(예: UserController.php)
    // 찾아간 Controller에서 $arrPath[1]+Get 이라는 메소드를 찾아 뷰로 반환.
    // url은 $arrPath[0]/$arrPath[1]의 형식
    // $arrPath[0]에 들어가는 값들은 $arrPath[0]값 이름의 Model이 있어야함(예: UserModel.php)
    // 아무것도 안넘어 왔을 땐 main으로
    public function __construct() {
        $arrPath = UrlUtil::getUrlArrPath();
        
        $identityName = empty($arrPath[0]) ? "User" : ucfirst($arrPath[0]);
        
        $action = (empty($arrPath[1]) ? "main" : $arrPath[1]).ucfirst(strtolower($_SERVER["REQUEST_METHOD"]));
        // controller명 작성
        $controllerPath = _PATH_CONTROLLER.$identityName._BASE_FILENAME_CONTROLLER._EXTENSION_PHP;

        // 해당 controller 파일 존재 여부 체크
        if(!file_exists($controllerPath)) {
            echo "해당 컨트롤러 파일이 없습니다. : ".$controllerPath;
            exit;
        }

        // 해당 Controller 호출
        $controllerName = UrlUtil::replaceSlashToBackslash(_PATH_CONTROLLER.$identityName._BASE_FILENAME_CONTROLLER);
        
        new $controllerName($identityName, $action);
    }
}