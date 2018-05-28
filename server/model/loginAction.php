<?php
/**
 * Created by PhpStorm.
 * User: Пользователь
 * Date: 23.05.18
 * Time: 9:16
 */

require_once '../controllers/authUser.php';


    $json_str = file_get_contents('php://input');
    $json_obj = json_decode($json_str, true);

//echo($json_obj['action']);


    if (isset($json_obj['name']) && isset($json_obj['password']) && isset($json_obj['action'])){

        $login = mysql_real_escape_string(htmlspecialchars(trim($json_obj['name'])));
        $password = md5(strip_tags($json_obj['password']));
        $action = $json_obj['action'];
        $userData = authUser ( $login ,$password, $action );

        echo json_encode($userData);

        //if($userData)

    }





