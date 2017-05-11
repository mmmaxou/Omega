<?php
require ('../Models/Users.php');
$users = new Users();
$users->login($_POST['login'],$_POST['password']);


