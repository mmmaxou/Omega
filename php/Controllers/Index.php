<?php

/*
Basic controller for testing the Smarty framework
*/

require('../../lib/smarty/libs/Smarty.class.php');
$smarty = new Smarty;

require('../Models/Menu.php');
$Menu = new Menu();

$menu = $Menu->gatherMenuData();

$smarty->assign("title", "Omega", true);
$smarty->assign("root_url", "../../", true);
$smarty->assign("menu", $menu, true);

$smarty->display('../Views/Index.tpl');

?>