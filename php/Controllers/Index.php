<?php
session_start();


/*
Basic controller for testing the Smarty framework
*/


// Import Dependencies
require('../../lib/smarty/libs/Smarty.class.php');
$smarty = new Smarty;
require('../Models/Menu.php');
$Menu = new Menu();


// Find the module to load
switch ($_GET["module"]) {
    case "index":
        $file="./Index.tpl";
        break;
    case "article":
        $file="./Article.tpl";
        break;
    case "research":
        $file="./Research.tpl";
        break;
    default:
        $file="./Index.tpl";
        break;
}
$smarty->assign("file", $file);


// Base components
$smarty->assign("title", "Omega");
$smarty->assign("root_url", "../../");


// DB data
$menuWithChildren = $Menu->getMenuWithChildren();
$menuNoChildren = $Menu->getMenuNoChildren();
$smarty->assign("menuNoChildren", $menuNoChildren);
$smarty->assign("menuWithChildren", $menuWithChildren);


// Session data
if(isset($_SESSION['id'])) {
	// We are connected, we send data to the page
    $smarty->assign("connected", true);
    $smarty->assign("login", $_SESSION['login']);
}

//dump($_SESSION);

$smarty->display('../Views/Controller.tpl');


function dump ($e) {
    echo "<pre>";
    var_dump($e);
    echo "</pre>";
}
