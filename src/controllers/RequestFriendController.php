<?php

namespace App\Controllers;

use App\Controllers\Main\AbstractController;
use App\Models\DemandeAmi;

final class RequestFriendController extends AbstractController {

    public function sendRequest($destinataire){

        $demandeAmiModel = new DemandeAmi;

        $demandeAmiModel->sendRequestFriend($_SESSION['user']['id'], $destinataire);

        return $this->redirection("/");
    }

    public function cancelRequest($destinataire) {
        $demandeAmiModel = new DemandeAmi;

        $demandeAmiModel->removeMyRequestFriends($_SESSION['user']['id'], $destinataire);

        return $this->redirection("/");

    }

    public function acceptRequest($destinataire) {
        $demandeAmiModel = new DemandeAmi;

        $demandeAmiModel->acceptRequestFriend($_SESSION['user']['id'], $destinataire);

        return $this->redirection("/");
    }
}