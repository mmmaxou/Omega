<?php
/**
 * Created by PhpStorm.
 * User: alexr
 * Date: 11/05/2017
 * Time: 12:24
 */
session_start();

require_once ('../Models/Menu.php');
$menu = new Menu();

require_once ('../Models/Page.php');
$page = new Page();

function dump ($data) {
    echo '<pre>';
    var_dump($data);
    echo '<pre>';
}
$decoded = json_decode($_POST["data"], true);
$nl2br1 = nl2br($decoded['title']);
$nl2br2 = nl2br($decoded['content']);
$title = htmlspecialchars($nl2br1);
$content = htmlspecialchars($nl2br2);
$id_menu = $page->updateBDpage($_GET['id'],$title,$content,null);
//echo $title;
//echo $_SESSION['id'];
$menu->updateBDmenu($id_menu[0],$title,$_SESSION['id']);
header('Location:Index.php?module=article&id='.$_GET['id']);