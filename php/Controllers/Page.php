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

require_once('../Models/File.php');
$File = new File();

require_once("Upload.php");
require_once("Security.php");

function dump ($data) {
    echo '<pre>';
    var_dump($data);
    echo '<pre>';
}


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
//Ecrire un message



$decoded = json_decode($_POST["data"], true);
$nl2br1 = nl2br($decoded['title']);
$nl2br2 = nl2br($decoded['content']);
$title = htmlspecialchars($nl2br1);
$content = htmlspecialchars($nl2br2);
$id_menu = $page->updateBDpage($_GET['id'],$title,$content,null);

if(isset($_FILES['image'])){
    $f = up();

    dump($f);
    dump($_FILES['image']);

    $file = $f ? $f : null;
    if ( $file) {
        // Add in the database
        //create file
        $id_gallery = $menu->getGallery($id_menu);
        $File->addFile($id_gallery[0],$file);
    }

//    $sql = "INSERT INTO ecrit VALUES(NULL,?,?,?,?,?,?)";
//    $query =$pdo->prepare($sql);
//    $query -> execute(array($_POST['titre'],$texte,date("Y-m-d h:i:s"),$file,$_SESSION['id'],$_POST['id']));
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


