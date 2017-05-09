<?php

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



$menuNoChildren = $Menu->getMenuNoChildren();
$menuWithChildren = $Menu->getMenuWithChildren();

$smarty->assign("title", "Omega");
$smarty->assign("root_url", "../../");
$smarty->assign("menuNoChildren", $menuNoChildren);
$smarty->assign("menuWithChildren", $menuWithChildren);

$smarty->assign("file", $file);

$smarty->display('../Views/Controller.tpl');


function dump ($e) {
    echo "<pre>";
    var_dump($e);
    echo "</pre>";
}
