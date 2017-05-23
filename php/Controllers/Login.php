<?php
require ('../Models/Users.php');
$users = new Users();
$res = $users->login($_POST['login'],$_POST['password']);
echo json_encode($res);


