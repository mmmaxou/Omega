<?php
require('../Models/Users.php');
$users = new Users();
$users->subscribe($_POST['login'],$_POST['email'],$_POST['password'],$_POST['confirm']);