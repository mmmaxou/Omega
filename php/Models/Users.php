<?php
session_start();
/**
 * Created by PhpStorm.
 * User: alexr
 * Date: 10/05/2017
 * Time: 11:36
 */
require_once('../Connexion.php');

class Users
{
    function subscribe($login,$email,$password,$confirm)
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
                $req = $pdo->prepare('INSERT INTO t_user(login,email,password) VALUES(:login, :email, md5(:password))');
                $req->execute(array(
                    'login'=> $login,
                    'email'=>$email,
                    'password'=>$password
                ));


                $req = $pdo->prepare( "SELECT * FROM t_user WHERE login= 'toto'");
                $req->execute(array(
                    'login' => $login
                ));
                $line = $req->fetch();

                //rédiger les sessions id login

                $_SESSION['id'] = $line['id'];
                $_SESSION['login'] = $login;
                echo $_SESSION['id'];
                echo $login;
                echo $email;
                echo $password;
                header('Location:Index.php');
            }
            else{
                header('Location:Index.php?error=passwordNoMatch');
            }
        }
    }
    
    function login($login,$password){
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
    
    function getPassword($id) {
        
        $bdd = new Connexion();
        $pdo = $bdd->myPDO();
        
        $req = $pdo->prepare('SELECT password FROM t_user WHERE id= :id');
        $req->execute(array(
            'id' => $id
        ));
        
        return $req->fetch();
    }
    
    function change($id, $password) {
        $bdd = new Connexion();
        $pdo = $bdd->myPDO();
        
        $req = $pdo->prepare('UPDATE t_user SET password= md5(:password) WHERE id = :id');
        $req->execute(array(
                'id' => $id,
                'password' => $password
            ));
    }
}