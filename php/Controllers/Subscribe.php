<?php
require('../Models/Subscribe.php');
$inscription = new Subscribe();


$inscription->mySub($_POST['login'],$_POST['email'],$_POST['password'],$_POST['confirm']);