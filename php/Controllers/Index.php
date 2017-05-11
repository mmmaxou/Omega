<?php
session_start();


/*
Basic controller for testing the Smarty framework
*/


// Import Dependencies
require('../../lib/smarty/libs/Smarty.class.php');
$smarty = new Smarty;
require_once('../Models/Menu.php');
$Menu = new Menu();
require_once('../Models/Page.php');
$Page = new Page();


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


// Base components
$smarty->assign("title", "Omega");
$smarty->assign("root_url", "../../");


// DB data for the menu
$menuWithChildren = $Menu->getMenuWithChildren();
$menuNoChildren = $Menu->getMenuNoChildren();
$smarty->assign("menuNoChildren", $menuNoChildren);
$smarty->assign("menuWithChildren", $menuWithChildren);


// Article data
if ( isset($_GET)) {
    
    if ($_GET['module'] == "article" && isset($_GET['id'])) {
        
        $id = $_GET ['id'];
        $page_data = $Page->gatherPageDataId($id);
        
//        dump($id);
//        dump($page_data);
        
        $content = $page_data['content'];
        $content = html_entity_decode($content);
        $title_article = $page_data['title'];
        $keywords = $page_data['keywords'];
        $description = $page_data['description'];
                
        $smarty->assign("keywords", $keywords);
        $smarty->assign("description", $description);
        $smarty->assign("title_article", $title_article);
        $smarty->assign("content", $content);
        $smarty->assign("pageId", $id);
        
        
    }
    
}

// Session data
if(isset($_SESSION['id'])) {
	// We are connected, we send data to the page
    $smarty->assign("connected", true);
    $smarty->assign("login", $_SESSION['login']);
}

// Display a message
if ( isset($_GET['error'])) {
    $smarty->assign("toastr", true);
    $smarty->assign("toastr-type", "error");
    
    switch ($_GET["error"]) {
    case "connect":
        $msg="Login or Mail already taken.";
        break;
    case "passwordNoMatch":
        $msg="The password and the confirmation given don't match.";
        break;
    case "passlog":
        $msg="The password is incorrect.";
        break;
    case "login":
        $msg="This login doesn't exist.";
        break;
    default:
        $msg="Error";
        break;
    }
    
    $smarty->assign("toastr-message", $msg);
    
}
if ( isset($_GET['info'])) {
    $smarty->assign("toastr", true);
    $smarty->assign("toastr-type", "info");
}
if ( isset($_GET['warning'])) {
    $smarty->assign("toastr", true);
    $smarty->assign("toastr-type", "warning");
}
if ( isset($_GET['success'])) {
    $smarty->assign("toastr", true);
    $smarty->assign("toastr-type", "success");
    
    switch ($_GET["success"]) {
    case "passwordChanged":
        $msg="Password successfully changed.";
        break;
    case "menuCreated":
        $msg="Pages or subpages successfully created. Go in the pages to edit it.";
        break;
    default:
        $msg="Success";
        break;
    }
    
    $smarty->assign("toastr-message", $msg);
}






//dump($_SESSION);

$smarty->display('../Views/Controller.tpl');


function dump ($e) {
    echo "<pre>";
    var_dump($e);
    echo "</pre>";
}
