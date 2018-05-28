<?php
/**
 * Created by PhpStorm.
 * User: Пользователь
 * Date: 23.05.18
 * Time: 9:14
 */

require_once '../config/database.php';
//require_once 'mail.php';


function authUser ( $login ,$password, $action ){

    $output =[];

        switch ($action) {

            case 'auth':
                         $sql = "SELECT id FROM users WHERE password = '$password' AND login = '$login' LIMIT 1";
                         $resalt = mysql_fetch_assoc(mysql_query($sql));

                         if($resalt){
                             $output['status'] = 'succsess';
                             $output['id'] = $resalt['id'];
                         }
                         else{
                             $output['status'] = 'error';
                             $output['message'] = 'Authorization error';
                         }
                break;

               case 'register':

                   $sql = "SELECT id FROM users WHERE password = '$password' AND login = '$login' LIMIT 1";
                   $resalt = mysql_fetch_assoc(mysql_query($sql));

                   if($resalt){
                       $output['status'] = 'error';
                       $output['message'] = 'User is already exists';
                   }
                   else{
                       $sql = "INSERT INTO users  (password, login ) VALUES ('$password', '$login')";
                       $resalt =  mysql_query($sql);

                       if ($resalt === true) {
                           $output['status'] = 'succsess';
                           $output['id'] = mysql_insert_id();
                       } else {
                           $output['status'] = 'error';
                           $output['message'] = mysql_error();
                       }
                   }

                break;

        }
    mysql_close();

    return $output;

}