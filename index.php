<?php
    session_start();
    require 'Autoloader.php';
    if(isset($_GET["action"])){
        $action = $_GET["action"];
        switch($action){
            case "home": jobController::listJob(); break;
            case "login": userController::login(); break;
            case "logout": userController::logout();  break;
            case "addOffer": jobController::addOffer();  break;
            case "searchJob" : jobController::searchJob(); break;
            case "notification" : userController::notification(); break;
            case "adminDash" : userController::admin(); break;
            case "candidat" : userController::candidat(); break;
            case "offer" : jobController::offer(); break;
            case "applyOffer" : jobController::applyOffer(); break;
            case "deletJob" : $offerid=$_GET['deletJob']; jobController::deletOffer($offerid); break;
            
        }
    }else
    if(isset($_POST["submit"])){
        $action = $_POST["submit"];
        switch($action){
            case "login" : userController::loginUser(); break;
            case "updateUser" : userController::updateUser(); break;
            case "updateJobs" : jobController::updateJobs(); break;
            case "addOfferCrud" : jobController::addOfferCrud(); break;
            case "aprouve" : jobController::aprouve_decline(1); break;
            case "decline" : jobController::aprouve_decline(2); break;
            
        }
    }else{
        if(isset($_SESSION['roleUser']) && $_SESSION['roleUser']==2){
            jobController::listJob();
        }else{
            userController::admin();
        }
        if(!isset($_SESSION['roleUser'])){
            jobController::listJob();
        }
        
    }
    
?>