<?php

/*
Basic controller for testing the Smarty framework
*/

require('../../lib/smarty/libs/Smarty.class.php');
$smarty = new Smarty;

$smarty->assign("title", "Omega", true);
$smarty->assign("root_url", "../../", true);

$smarty->display('../Views/Index.tpl');

?>