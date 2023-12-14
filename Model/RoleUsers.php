<?php
require_once "Autoloader.php";
class RoleUsers {
    public static function GetRoles(){
        $conn = Connection::getConnection();
        $stmt=$conn->prepare("SELECT * FROM roleusers");
        $stmt->execute();
        $result=$stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
}