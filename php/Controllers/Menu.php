<?php
session_start();
/**
 * Created by PhpStorm.
 * User: alexr
 * Date: 09/05/2017
 * Time: 12:10
 */
require_once ('../Models/Menu.php');
$menu = new Menu();

require_once ('../Models/Page.php');
$page = new Page();

$donnees_entree = json_decode($_POST["data"] ,  true );
$donnees_entree = (array)$donnees_entree_std;

function dump ($data) {
    echo '<pre>';
    var_dump($data);
    echo '<pre>';
}
//dump($_POST);

$decoded = json_decode($_POST["data"], true);
dump($decoded);

foreach ($decoded['added'] as $add) {
    $page_id = $page->sendDBpage($add['name'],null,null);
    $menu->sendDBmenu($add['name'], $add['parent_menu_id'], $page_id[0] , $_SESSION['id']);
}


foreach ($decoded['modified'] as $up) {
    $myMenu = $menu->updateBDmenu($up['id'], $up['name'], $_SESSION['id'] );
    $page->updateBDpage($myMenu['id'],$up['name'],$myMenu['content'],$myMenu['description']);
}

foreach ($decoded['deleted'] as $del) {
    $page_id = $menu->deleteBDmenu( $del['id']);
    $page->deleteBDpage($page_id[0]);

}

header('Location:Index.php');