<?php
require ('../Models/Login.php');
$login = new Login();


$login->myLog($_POST['login'],$_POST['password']);
