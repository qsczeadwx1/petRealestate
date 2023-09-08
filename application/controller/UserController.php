<?php

namespace application\controller;

class UserController extends Controller {
    public function loginGet() {
        return "login"._EXTENSION_PHP;
    }

    public function loginPost() {
        $result = $this->model->getUser($_POST); // DB에서 유저정보 습득
        $this->model->close(); // DB파기
        if(count($result) === 0) {
            $errMsg = "입력하신 회원 정보가 없습니다.";
            $this->addDynamicProperty("errMsg", $errMsg);
            // 로그인 페이지 리턴
            return "login"._EXTENSION_PHP;
        }
        $_SESSION[_STR_LOGIN_ID] = $_POST["id"];

        // 리스트 페이지로 이동
        return "main"._EXTENSION_PHP;
        // return "_BASE_REDIRECT./shop/main";
    }
    // 로그아웃 메소드
    public function logout() {
        session_unset();
        session_destroy();
        // // 로그인페이지 리턴
        // return "main"._EXTENSION_PHP;
    }
    // 로그아웃 페이지로
    public function logoutGet() {
        return "logout"._EXTENSION_PHP;
    }
    public function mainGet() {
        return "main"._EXTENSION_PHP;
    }

    // 회원가입
    public function registGet() {
        return "regist"._EXTENSION_PHP;
    }

    public function registCmpGet() {
        return "registCmp"._EXTENSION_PHP;
    }

    public function detailGet() {
        return "detail"._EXTENSION_PHP;
    }

    public function updateGet() {
        $sessInfo = [ "id" => $_SESSION["u_id"] ];
        return "update"._EXTENSION_PHP;
    }


    public function registPost() {
        $arrPost = $_POST;
        $arrChkErr = [];

        // 유효성체크
        // ID 글자수 체크
        if(mb_strlen($arrPost["id"]) === 0 || mb_strlen($arrPost["id"]) > 12) {
            $arrChkErr["id"] = "ID는 12글자 이하로 입력해 주세요.";
            $arrPost["id"] = "";
        }
        // ID 영문 숫자 체크
        $pattern = "/[^a-zA-Z0-9]/";
        if(preg_match($pattern, $arrPost["id"]) !== 0) {
            $arrChkErr["id"] = "ID는 영어 대문자, 영어 소문자, 숫자로만 입력해 주세요.";
        }
        // PW 글자수 체크
        if(mb_strlen($arrPost["pw"]) <= 8 || mb_strlen($arrPost["pw"]) >= 20) {
            $arrChkErr["pw"] = "PW는 8~20글자로 입력해 주세요.";
            // $arrPost["pw"] = "";
        }
        // PW 영문 숫자 특문 체크
        $num = preg_match("/[0-9]/", $arrPost["pw"]);
        $eng = preg_match("/[a-zA-Z]/", $arrPost["pw"]);
        $spe = preg_match("/[!@#$%^&*]/",$arrPost["pw"]);
        $vaildChk = preg_match("/[^0-9a-zA-Z!@#$%^&*]/", $arrPost["pw"]);
        if( $num === 0 || $eng === 0 || $spe === 0 || $vaildChk !== 0 ) {
            $arrChkErr["pw"] = "PW는 영문, 숫자, 특수문자를 혼합하여 입력해 주세요.";
        }

        // 비밀번호와 비밀번호 체크 확인
        if($arrPost["pw"] !== $arrPost["pwChk"]) {
            $arrChkErr["pwChk"] = "비밀번호와 비밀번호 확인이 일치하지 않습니다.";
        }

        // 이름 글자수 체크
        if(mb_strlen($arrPost["name"]) === 0 || mb_strlen($arrPost["name"]) > 30) {
            $arrChkErr["name"] = "이름은 30글자 이내로 입력해 주세요.";
        }

        // 유효성 체크 에러일 경우
        if(!empty($arrChkErr)) {
            // 에러 메세지 셋팅
            $this->addDynamicProperty('arrError', $arrChkErr);
            return "regist"._EXTENSION_PHP;
        }
        
        $result = $this->model->getUser($arrPost, false);

        // 유저유무 체크
        if(count($result) !== 0) {
            $errMsg = "입력하신 ID가 사용중입니다.";
            $this->addDynamicProperty("errMsg", $errMsg);
            // 회원가입 페이지 리턴
            return "regist"._EXTENSION_PHP;
        }
        // **************** transaction start
        $this->model->beginTransaction();
        // user insert
        if(!$this->model->insertUser($arrPost)) {
            // 예외처리 롤백
            $this->model->rollback();
            echo "User Regist Error";
            exit();
        }
        $this->model->commit(); // 정상처리 커밋
        // 가입완료 페이지로 이동
        // *************** transcation end
        return _BASE_REDIRECT."/user/registCmp";
    }

    public function updatePost() {
        // $userInfo = $this->model->getUser($_SESSION["u_id"]);
        $arrPost = $_POST;
        $sessInfo = [ "id" => $_SESSION["u_id"] ];
        $arrChkErr = [];
        // 유효성체크
        // PW 글자수 체크
        if(mb_strlen($arrPost["pw"]) <= 8 || mb_strlen($arrPost["pw"]) >= 20) {
            $arrChkErr["pw"] = "PW는 8~20글자로 입력해 주세요.";
        }
        // PW 영문 숫자 특문 체크
        $num = preg_match("/[0-9]/", $arrPost["pw"]);
        $eng = preg_match("/[a-zA-Z]/", $arrPost["pw"]);
        $spe = preg_match("/[!@#$%^&*]/",$arrPost["pw"]);
        $vaildChk = preg_match("/[^0-9a-zA-Z!@#$%^&*]/", $arrPost["pw"]);
        if( $num === 0 || $eng === 0 || $spe === 0 || $vaildChk !== 0 ) {
            $arrChkErr["pw"] = "PW는 영문, 숫자, 특수문자를 혼합하여 입력해 주세요.";
        }
        // 비밀번호와 비밀번호 체크 확인
        if($arrPost["pw"] !== $arrPost["pwChk"]) {
            $arrChkErr["pwChk"] = "비밀번호와 비밀번호 확인이 일치하지 않습니다.";
        }
        // 이름 글자수 체크
        if(mb_strlen($arrPost["name"]) === 0 || mb_strlen($arrPost["name"]) > 30) {
            $arrChkErr["name"] = "이름은 30글자 이내로 입력해 주세요.";
        }

        // 유효성 체크 에러일 경우
        if(!empty($arrChkErr)) {
            // 에러 메세지 셋팅
            $this->addDynamicProperty('arrError', $arrChkErr);
            return "update"._EXTENSION_PHP;
        }
        
        $result = $this->model->getUser($sessInfo, false);

        // **************** transaction start
        $this->model->beginTransaction();
        // user update
        if(!$this->model->updateUser($arrPost)) {
            // 예외처리 롤백
            $this->model->rollback();
            echo "User update Error";
            exit();
        }
        $this->model->commit(); // 정상처리 커밋
        // 회원 상세 페이지 이동
        // *************** transcation end
        return _BASE_REDIRECT."/user/detail";
    }
}


?>