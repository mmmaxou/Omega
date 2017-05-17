<?php
session_start();


/*
Basic controller for testing the Smarty framework
*/

// Helpers
function dump ($data) {
    echo '<pre>';
    var_dump($data);
    echo '</pre>';
}

// Import Dependencies
require_once ('../../lib/smarty/libs/Smarty.class.php');
$smarty = new Smarty;
require_once('../Models/Menu.php');
$Menu = new Menu();
require_once('../Models/Page.php');
$Page = new Page();
require_once('../Models/Gallery.php');
$Gallery = new Gallery();
require_once('../Models/File.php');
$File = new File();


// Base components
$smarty->assign("title", "Omega");
$smarty->assign("root_url", "../../");

// Find the module to load
switch ($_GET["module"]) {
    case "index":
        $file="./Index.tpl";
        break;
    case "article":
        $file="./Article.tpl";
        break;
    case "research":
        $file="./Research.tpl";
        break;
    default:
        $file="./Index.tpl";
        break;
}
$smarty->assign("file", $file);
// DB data for the menu
$menuWithChildren = [];
$menuNoChildren = [];
// Get raw data
$menu = $Menu->getMenu();
$smarty->assign("menu", $menu);
// Fill $menuNoChildren variable
foreach( $menu as $item ) {
    if ($item['parent_menu_id'] == null || $item['parent_menu_id'] == 0) {
        if ( $item['page_id'] != 0 && $item['display'] != 0 ) {
            $menuNoChildren[] = $item;
        }
        if ($item['display'] == 0) {
            $menuWithChildren[] = [$item];
        }
    }
}
// Fill $menuWithChildren variable
for ( $i=0; $i < sizeof($menuWithChildren); $i++) {
    $menuParent = $menuWithChildren[$i];
    $id = $menuParent[0]["id"];
    foreach($menu as $item) {
        if ( $item["parent_menu_id"] == $id ) {
            $menuWithChildren[$i][] = $item;
        }
    }
}
// Link images with the menu for convenience
$smarty->assign("menuNoChildren", $menuNoChildren);
$smarty->assign("menuWithChildren", $menuWithChildren);
// Session data
if(isset($_SESSION['id'])) {
	// We are connected, we send data to the page
    $smarty->assign("connected", true);
    $smarty->assign("login", $_SESSION['login']);
}

// Article data
if ($_GET['module'] == "article" && isset($_GET['id'])) {
    $id = $_GET ['id'];
    $page_data = $Page->gatherPageDataId($id);
        
    function decode ($msg) {
            $msg = html_entity_decode($msg);
            $msg = htmlspecialchars($msg);
            return $msg;
        }
        
    $content = $page_data['content'];
    $content = html_entity_decode($content);
    $title_article = $page_data['title'];
    $title_article = decode($title_article);
    $keywords = $page_data['keywords'];
    $keywords = decode($keywords);
    $description = $page_data['description'];
    $description = decode($description);
        
    // Gather all images
    $images = $File->getAllImages($id);
        
    $smarty->assign("keywords", $keywords);
    $smarty->assign("description", $description);
    $smarty->assign("title_article", $title_article);
    $smarty->assign("content", $content);
    $smarty->assign("pageId", $id);
    $smarty->assign("images", $images);
    
    if ($_GET['partial'] == "1") {
        $smarty->display('../Views/Article.tpl');
    }
}
if ($_GET['module'] == "index" || !isset($_GET['module'])) {
    if ($_GET['partial'] == "1") {
        $smarty->display('../Views/Index.tpl');
    }
}

if (empty($_GET['partial'])) {
    $smarty->display('../Views/Controller.tpl');
}

