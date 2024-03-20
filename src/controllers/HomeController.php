<?php

namespace App\Controllers;

use App\Controllers\Main\AbstractController;
use App\Models\Ami;
use App\Models\DemandeAmi;

final class HomeController extends AbstractController {

    public function index(){
        if(!isset($_SESSION["user"])) {
            return $this->redirection("?page=login");
        }

        $userId = $_SESSION["user"]["id"];

        $amiModel = new Ami;
        $demandeAmiModel = new DemandeAmi;
        
        return $this->render("home/hello", [
            "notMyFriends" => $amiModel->notMyFriends(),
            "myFriends" => $amiModel->myFriends(),
            "myRequestFriends" => $demandeAmiModel->myRequestFriend($userId),
            "myRequestFriendReceived" => $demandeAmiModel->myRequestFriendReceived($userId)
        ]);
    }
    
}