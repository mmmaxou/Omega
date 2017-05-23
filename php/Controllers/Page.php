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
$Page = new Page();

require_once('../Models/File.php');
$File = new File();

// ransform an input
function transform ($msg) {
    $nl2br = nl2br($msg);
    $html = htmlspecialchars($nl2br);
    return $html;
}


// AJAX CODE
if(isset($_POST['action']) && !empty($_POST['action'])) {
    var_dump($_POST);
    $action = $_POST['action'];
    switch($action) {
        case 'addFile' : addFile();break;
    }
}




$decoded = json_decode($_POST["data"], true);
//var_dump($decoded);
$title = transform($decoded['title']);
$content = transform($decoded['content']);
$keywords = transform($decoded['keywords']);
$description = transform($decoded['description']);
$id_menu = $Page->updateBDpage($_GET['id'],$title,$content,$description,$keywords);
$deleted_images = $decoded['deleted_images'];
foreach($deleted_images as $id) {
    $File->deleteId($id);
}
$added_images = $decoded['added_images'];
foreach($added_images as $file ) {
    $id_gallery = $menu->getGallery($id_menu);
    $File->addFile($id_gallery[0],$file);
}

//echo $title;
//echo $_SESSION['id'];
$menu->updateBDmenu($id_menu[0],$title,$_SESSION['id']);
header('Location:/article/'.$_GET['id']);
