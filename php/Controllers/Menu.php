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

require_once ('../Models/Gallery.php');
$gallery = new Gallery();


$decoded = json_decode($_POST["data"], true);

$url = "";
foreach ($decoded['added'] as $add) {
    $nl2br1 = nl2br($add['name']);
    $name = htmlspecialchars($nl2br1);
    // date
    date_default_timezone_set('UTC');
    $date = date("Y-m-d H:i:s");    
    
    $page_id = $page->sendDBpage($add['name'],null,null,null,$date);
    $gallery_id = $gallery->addGallery($add['name']);
    

    
    $menu->sendDBmenu($name, $add['parent_menu_id'], $page_id[0] , $_SESSION['id'],$gallery_id[0]);
    
    if ($add['parent_menu_id'] != null) {
        $menu->setMenuParent($add['parent_menu_id']);
    }
    $url = "module=article&id=$page_id[0]";
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
if ( $url != "") {
header('Location:Index.php?'.$url);
}
else {
header('Location:Index.php');
}