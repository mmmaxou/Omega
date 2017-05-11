<?php
session_start();

require ('../Models/Users.php');
$Users = new Users();

$old_password = $Users->getPassword($_SESSION['id']);

if ( $old_password['password'] != md5($_POST['old'])) {
    // handle error
    
    dump($old_password);
    dump(md5($_POST['old']));
    dump($_POST['old']);    
    
//    header('Location:Index.php?error=oldPasswordWrong');
} else {    
    if ($_POST['password'] != $_POST['confirm']) {
        header('Location:Index.php?error=passwordNoMatch');
    } else {
        $Users->change($_SESSION['id'],$_POST['password']);
        header('Location:Index.php?success=passwordChanged');
    }
}


function dump ($e) {
    echo "<pre>";
    var_dump($e);
    echo "</pre>";
}