<?php
require_once "Autoloader.php";
Class jobController{
    public static function listJob(){
        $listJobs = Job::GetJobs(1);
        include_once "view/user/index.php";
    }
    public static function addOffer(){
        $Job=$_GET['applyOffre']; 
        $JobOffer = explode("/",$Job);
        $idUser=$JobOffer[0];
        $idJob=$JobOffer[1];
        $res = ApplyOnline::applyOffre($idJob,$idUser);
        if($res) echo "ok";
        else echo "non";
    }
    public static function searchJob(){
        $searchValue = $_GET['value'];
        $searchType = $_GET['type'];
        $result=Job::SearchJob($searchValue,$searchType);
        include_once "view/searchVue.php";
    }
    public static function offer(){
        $listJobs =Job::GetJobs(3);
        $tempActiveTable=[
            0=>"In Active",
            1=>"Active"
        ];
        $tempAprouveTable=[
            0=>"In Aprouve",
            1=>"Aprouve"
        ];
        require_once "view/admin/offreCrud.php";
    }
    public static function updateJobs(){
        extract($_POST);
        $result=Job::UpdateJobs($title,$description,$entreprise,$location,$IsActive,$approve,$id_Jobs);
        if($result) jobController::offer();
    }
    public static function deletOffer($offerid){
        $result =Job::DeletJob($offerid);
        if($result) jobController::offer();
    }
    public static function addOfferCrud(){
        extract($_POST);
        $currentDateTime = date("Y_m_d_H_i_s");
        $targetDir = "assest/uploads/"; 
        $imageName=$currentDateTime. basename($_FILES["photo"]["name"]);
        $targetFile = $targetDir.$imageName;
        if (move_uploaded_file($_FILES["photo"]["tmp_name"], $targetFile)) {
            $result = Job::AddJobs($title,$description,$entreprise,$location,$IsActive,$approve,$imageName);
            if($result) jobController::offer();
        } 
    }
    public static function applyOffer(){
        $listApplyOnline = ApplyOnline::getApplyOnline(0);
        require_once "view/admin/offre.php";
    }
    public static function aprouve_decline($status){
        $idOffer= $_POST["idOffer"];
        $result=ApplyOnline::AprouvOffer($idOffer,$status);
        if($result) jobController::applyOffer();
    }
}