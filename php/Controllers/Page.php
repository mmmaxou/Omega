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

require_once("Upload.php");
require_once("Security.php");


// FILES
function up() {
    
    $config['upload_path'] = '../../uploads';
    $config['allowed_types'] = '*';
    
    $temp = explode(".", $_FILES["image"]["name"]);
    $newfilename = round(microtime(true)) . '.' . end($temp);
    
    $config['file_name'] = $newfilename;
    
    $upload = new Upload($config);
    
    if ($upload->do_upload('image')) {
        return $upload->file_name;
    } else {
        return false;
    }
    
}
// transform an input
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



if(isset($_FILES['image'])){
    $f = up();

    $file = $f ? $f : null;
    if ( $file) {
        // Add in the database
        //create file
        $id_gallery = $menu->getGallery($id_menu);
        $File->addFile($id_gallery[0],$file);
    }
}


//echo $title;
//echo $_SESSION['id'];
$menu->updateBDmenu($id_menu[0],$title,$_SESSION['id']);
//header('Location:Index.php?module=article&id='.$_GET['id']);
