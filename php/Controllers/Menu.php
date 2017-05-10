<?php

/**
 * Created by PhpStorm.
 * User: alexr
 * Date: 09/05/2017
 * Time: 12:10
 */
require ('../Models/Menu.php');
$menu = new Menu();

$donnees_entree = json_decode($_POST["data"] ,  true );
$donnees_entree = (array)$donnees_entree_std;
/*
function dump ($data) {
    echo '<pre>';
    var_dump($data);
    echo '<pre>';
}
dump($_POST);
*/
$decoded = json_decode($_POST["data"], true);
//dump($decoded);

foreach ($decoded['added'] as $add) {
    $menu->sendDBmenu($add['name'], $add['parent_menu_id'], $add['create_user_id']);
}


foreach ($decoded['modified'] as $up) {
    $menu->updateBDmenu($up['id'], $up['name'], $up['updated_user_id'] );
}

foreach ($decoded['deleted'] as $del) {
    $menu->deleteBDmenu( $del['id']);
}

header('Location:Index.php');