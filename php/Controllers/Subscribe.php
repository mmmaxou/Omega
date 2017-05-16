<?php
require('../Models/Users.php');
$users = new Users();
$res = $users->subscribe($_POST['login'],$_POST['email'],$_POST['password'],$_POST['confirm']);
echo json_encode($res);