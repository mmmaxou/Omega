<?php

/**
 * Created by PhpStorm.
 * User: alexr
 * Date: 10/05/2017
 * Time: 11:36
 */
require_once('../Connexion.php');

class Subscribe
{
    function mySub($login,$email,$password,$confirm)
    {
        $bdd = new Connexion();
        $pdo = $bdd->myPDO();
        $sql = "SELECT login FROM t_user WHERE login=? or email=?";
        $query = $pdo->prepare($sql);
        $query->execute(array($login,$email));
        if($query -> fetch() != 0){
            header('Location:Index.php?error=connect');
        }
        else{
            if(isset($password) && isset($confirm) && $password == $confirm){
                $req = $pdo->prepare('INSERT INTO t_user(login, email, password) VALUES(:login, :email, :password)');
                $req->execute(array(
                    'login' => $login,
                    'email' => $email,
                    'password' => $password
                ));


                $sql = "SELECT * FROM t_user WHERE login=?";
                $query = $pdo-> prepare($sql);
                $query -> execute(array($login));
                $line = $query->fetch();

                //rédiger les sessions id login
                $_SESSION['id'] = $line['id'];
                $_SESSION['login'] = $login;
                header('Location:Index.php');
            }
            else{
                header('Location:Index.php?error=password');
            }
        }
    }
}