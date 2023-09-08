<?php

namespace application\model;

class UserModel extends Model {
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
    
    // insert User
    public function insertUser($arrUserInfo) {
        $sql = " INSERT INTO "
            . " user_info( "
            . " u_id "
            . " ,u_pw "
            . " ,u_name "
            . " ,u_signdate "
            . " ) "
            . " VALUES( "
            . " :u_id "
            . " ,:u_pw "
            . " ,:u_name "
            . " ,:u_signdate "
            ." ); "
            ;

        $prepare = [
            ":u_id" => $arrUserInfo["id"]
            , ":u_pw" => $arrUserInfo["pw"]
            , ":u_name" => $arrUserInfo["name"]
            , ":u_signdate" => DATE("Y-m-d H:i:s")
        ];

        try {
            $stmt = $this->conn->prepare($sql);
            $result = $stmt->execute($prepare);
            return $result;
        } catch (Exception $e) {
            return false;
        }
    }

    // update User
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