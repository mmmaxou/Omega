<?php
session_start();
require_once('../Connexion.php');

class Login
{
    function myLog($login,$password){
        $bdd = new Connexion();
        $pdo = $bdd->myPDO();
        $req = $pdo->prepare('SELECT * FROM t_user WHERE login = :login or email= :login');
        $req->execute(array(
            'login' => $login
        ));
        if($req -> fetch() != 0) {
            $req = $pdo->prepare('SELECT * FROM t_user WHERE (login = :login or email= :login) && password=md5(:password)');
            $req->execute(array(
                'login' => $login,
                'password' => $password
            ));

            if ($req->fetch() != 0) {
                $req = $pdo->prepare('SELECT * FROM t_user WHERE login = :login or email= :login');
                $req->execute(array(
                    'login' => $login
                ));
                $line = $req->fetch();

                //rédiger les sessions id login
                session_start();
                $_SESSION['id'] = $line['id'];
                $_SESSION['login'] = $line['login'];
                header('Location:Index.php');
            } else {
                header('Location:Index.php?error=passlog');
            }
        }
        else {
            header('Location:Index.php?error=login');
        }
    }

}