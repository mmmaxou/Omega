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



function dump ($data) {
    echo '<pre>';
    var_dump($data);
    echo '<pre>';
}
//dump($_POST);

$decoded = json_decode($_POST["data"], true);

foreach ($decoded['added'] as $add) {
    $nl2br1 = nl2br($add['name']);
    $nl2br2 = nl2br($add['parent_menu_id']);
    $name = htmlspecialchars($nl2br1);
    $parent = htmlspecialchars($nl2br2);
    $page_id = $page->sendDBpage($add['name'],null,null);
    $menu->sendDBmenu($name, $parent, $page_id[0] , $_SESSION['id']);
}


foreach ($decoded['modified'] as $up) {
    $nl2br1 = nl2br($up['id']);
    $nl2br2 = nl2br($up['name']);
    $id = htmlspecialchars($nl2br1);
    $name = htmlspecialchars($nl2br2);
    $myMenu = $menu->updateBDmenu($id, $name, $_SESSION['id'] );
    $page->updateBDpage($myMenu['id'],$name,$myMenu['content'],$myMenu['description']);
}

foreach ($decoded['deleted'] as $del) {
    $nl2br1 = nl2br($del['id']);
    $id = htmlspecialchars($nl2br1);
    $page_id = $menu->deleteBDmenu( $id);
    $page->deleteBDpage($page_id[0]);

}

header('Location:Index.php?success=menuCreated');