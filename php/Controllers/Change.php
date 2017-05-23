<?php
session_start();

require ('../Models/Users.php');
$Users = new Users();

$old_password = $Users->getPassword($_SESSION['id']);

if ( $old_password['password'] != md5($_POST['old'])) {
    // handle error
//    header('Location:Index.php?error=oldPasswordWrong');
        $res = array(
            'toastr' => array (
                "type" => "error",
                "message" => "The password is incorrect.",
            ),
            'success'=> false,
        );
        echo json_encode( $res );
} else {    
    if ($_POST['password'] != $_POST['confirm']) {
        $res = 
//        header('Location:Index.php?error=passwordNoMatch');        
        $res = array(
            'toastr' => array (
                "type" => "error",
                "message" => "The password and the confirmation given don't match.",
            ),
            'success'=> false,
        );
        echo json_encode( $res );
    } else {
        $Users->change($_SESSION['id'],$_POST['password']);
//        header('Location:Index.php?success=passwordChanged');      
        $res = array(
            'toastr' => array (
                "type" => "success",
                "message" => "Password successfully changed.",
            ),
            'success'=> true,
        );
        echo json_encode( $res );
    }
}


function dump ($e) {
    echo "<pre>";
    var_dump($e);
    echo "</pre>";
}
