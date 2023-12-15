<?php
require_once "Autoloader.php";
Class userController{
    public static function login(){
        include_once "view/login.php";
    }
    public static function logout(){
        session_destroy();
        $listJobs = Job::GetJobs(1);
        include_once 'view/user/index.php';
    }
    public static function loginUser(){
        extract($_POST);
        $result=User::Login($email,$password);
        $_SESSION['idUser']=$result['userID'];
        $_SESSION['roleUser']=$result['roleuserID'];
        $listJobs = Job::GetJobs(1);
        $res1=job::JobCout();
        $res2=job::JobCoutActiveInactive(1);
        $res3=job::JobCoutActiveInactive(0);
        $res4=job::Jobapprove(1);
        if($_SESSION['roleUser']==1) include_once 'view/admin/dashboard.php';
        if($_SESSION['roleUser']==2) include_once 'view/user/index.php';
    }
    public static function admin(){
        $res1=job::JobCout();
        $res2=job::JobCoutActiveInactive(1);
        $res3=job::JobCoutActiveInactive(0);
        $res4=job::Jobapprove(1);
        include_once 'view/admin/dashboard.php';
    }
    public static function notification(){
        $id_user=$_SESSION['idUser'];
        $jobsNotif=ApplyOnline::getNotefication($id_user);
        include_once "view/user/not.php";
    } 
    public static function candidat(){
        $listUsers = User::GetUsers();
        $RoleUsers = RoleUsers::GetRoles();
        include_once 'view/admin/candidat.php';
    }
    public static function updateUser(){
        extract($_POST);
        $result=User::UpdateUser($name,$email,$roleuserID,$id_user);
        if($result){
            $listUsers = User::GetUsers();
            $RoleUsers = RoleUsers::GetRoles();
           include_once 'view/admin/candidat.php'; 
        } 
    }
}