<?php

namespace App\Routes;

use App\Controllers\HomeController;
use App\Controllers\LoginController;
use App\Controllers\RegisterController;
use App\Controllers\RequestFriendController;

class Router{
    public static function run(){
        if(isset($_GET['page'])){
            switch ($_GET['page']) {
                case 'login':
                    (new LoginController)->login();
                    break;
                case 'register':
                    (new RegisterController)->register();
                    break;
                case 'logout':
                    session_destroy();
                    header("Location: ?page=login");
                    break;
                case 'acceptRequestFriend':
                    (new RequestFriendController)->acceptRequest($_GET['id']);
                    break;
                case 'cancelRequestFriend':
                    (new RequestFriendController)->cancelRequest($_GET['id']);
                    break;
                case 'sendRequest':
                    (new RequestFriendController)->sendRequest($_GET['id']);
                    break;
                default:
                    (new HomeController)->index();
            }
        } else {
            (new HomeController)->index();
        }
    }   
}