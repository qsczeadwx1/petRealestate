<?php

namespace application\model;

use Exception;
class UserModel extends Model {
    // 유저정보 조회
    public function getUser($arrUserInfo, $pwFlg = true) {
        $sql = " SELECT "
            ." * "
            ." FROM "
            ." user_info "
            ." where "
            ." u_id = :id "
            ;

        if($pwFlg) {
            $sql .= " and u_pw = :pw ";
        }

        $arr_prepare = [
            ":id" => $arrUserInfo["id"]
        ];

        if($pwFlg) {
            $arr_prepare[":pw"] = $arrUserInfo["pw"];
        }

        try {
            $stmt = $this->conn->prepare($sql);
            $stmt->execute($arr_prepare);
            $result = $stmt->fetchAll();
        } catch (Exception $e) {
            echo "UserModel -> getUser Error: ".$e->getMessage();
            exit();
        }
        return $result;
    }
    
    // 유저생성
    public function insertUser($arrUserInfo) {
        $sql = " INSERT INTO "
            . " user( "
            . " u_id "
            . " ,u_password "
            . " ,email "
            . " ,name "
            . " ,phone_no "
            . " ,u_add "
            . " ,pw_question "
            . " ,pw_answer "
            . " ,created_at "
            . " ,updated_at "
            ;
        if($arrUserInfo["seller_license"]) {
            $sql .= " ,seller_license "
                    ." ,b_name ";
        } else if($arrUserInfo["animal_size"]) {
            $sql .= ",animal_size";
        }
            $sql .= " ) "
            . " VALUES( "
            . " :u_id "
            . " ,:u_password "
            . " ,:email "
            . " ,:name "
            . " ,:phone_no "
            . " ,:u_add "
            . " ,:pw_question "
            . " ,:pw_answer "
            . " ,:created_at "
            . " ,:updated_at "
            ;
        if($arrUserInfo["seller_license"]) {
            $sql .= " ,:seller_license "
                    ." ,:b_name ";
        } else if($arrUserInfo["animal_size"]) {
            $sql .= " ,:animal_size ";
        }
            $sql .=" ); "
            ;

        

        $prepare = [
            ":u_id" => $arrUserInfo["id"]
            , ":u_password" => $arrUserInfo["pw"]
            , ":email" => $arrUserInfo["email"]
            , ":name" => $arrUserInfo["name"]
            , ":phone_no" => $arrUserInfo["phone_no"]
            , ":u_add" => $arrUserInfo["addr"]
            , ":pw_question" => $arrUserInfo["pw_question"]
            , ":pw_answer" => $arrUserInfo["pw_answer"]
            , ":created_at" => date("Y-m-d H:i:s")
            , ":updated_at" => date("Y-m-d H:i:s")
        ];
        if($arrUserInfo["seller_license"]) {
            $prepare[":seller_license"] = $arrUserInfo["seller_license"];
            $prepare[":b_name"] = $arrUserInfo["b_name"];
        } else if($arrUserInfo["animal_size"]) {
            $prepare[":animal_size"] = $arrUserInfo["animal_size"];
        }

        try {
            $stmt = $this->conn->prepare($sql);
            $result = $stmt->execute($prepare);
            return $result;
        } catch (Exception $e) {
            return false;
        }
    }

    // 유저 정보 업데이트
    public function updateUser($arrUserInfo) {
        $sql = 
        " UPDATE "
        ." user_info "
        ." SET "
        ." u_pw = :u_pw "
        ." ,u_name = :u_name "
        ." WHERE "
        ." u_id = :u_id "
        ;

        $prepare = [
            ":u_pw" => $arrUserInfo["pw"]
            , ":u_name" => $arrUserInfo["name"]
            , ":u_id" => $arrUserInfo["id"]
        ];

        try {
            $stmt = $this->conn->prepare($sql);
            $result = $stmt->execute($prepare);
            return $result;
        } catch (Exception $e) {
            return false;
        }
    }

}

?>