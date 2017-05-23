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
require_once('../Models/Comment.php');
$Comment = new Comment();


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

$smarty->assign("menuNoChildren", $menuNoChildren);
$smarty->assign("menuWithChildren", $menuWithChildren);


// GATHER IMAGES
$images = $File->getOneImage();


// Get the hot articles
$hot = $Page->getHotArticles(4);
for ( $i=0; $i < sizeof($hot); $i++) {
    $hot_menu = $Menu->getMenuPageID($hot[$i]['id']);
    $gallery_id = $hot_menu[0]['gallery_id'];
    foreach($images as $image) {
        if ($image['gallery_id'] == $gallery_id) {
            $hot[$i]['image'] = $image['label'];
        }
    }
}
$smarty->assign("hot", $hot);

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
    $view = $page_data['view'];
    $date = new DateTime($page_data['date']);
    $date = $date->format('d M Y G:i');
    
    $comments = $Comment->getCommentsId($id);
    
    if (!isset($_GET['partial'])) {
        $Page->incrementView($id);
        $view++;
    }
    
    // Gather all images
    $images = $File->getAllImages($id);
        
    $smarty->assign("keywords", $keywords);
    $smarty->assign("description", $description);
    $smarty->assign("title_article", $title_article);
    $smarty->assign("content", $content);
    $smarty->assign("pageId", $id);
    $smarty->assign("images", $images);
    $smarty->assign("view",$view);
    $smarty->assign("date",$date);
    $smarty->assign("comments", $comments);
    
    
    // Check for the write to edit
    if ( $Menu->checkWriter($_SESSION['id'],$id ) ) {
        $smarty->assign("is_author", true);
    }else{
        $smarty->assign("is_author", false);
    }
    
    
    if ($_GET['partial'] == "1") {
        $smarty->display('../Views/Article.tpl');
    }
}
if ($_GET['module'] == "index" || !isset($_GET['module'])) {
    
    $pages = $Page->gatherPageData();
    
    // Gather all data for each excerpt
    for ( $i=0; $i < sizeof($menuNoChildren); $i++) {
        $gallery_id = $menuNoChildren[$i]['gallery_id'];
        $page_id = $menuNoChildren[$i]['page_id'];
        foreach($images as $image) {
            if ($image['gallery_id'] == $gallery_id) {
                $menuNoChildren[$i]['image'] = $image['label'];
            }
        }
        foreach($pages as $page){
            if ($page['id'] == $page_id) {
                $excerpt = $page['content'];
                $excerpt = html_entity_decode($excerpt);
                $view = $page['view'];                
                $date = new DateTime($page['date']);
                $date = $date->format('d/n/y');
                
                $menuNoChildren[$i]['excerpt'] = $excerpt;
                $menuNoChildren[$i]['view'] = $view;
                $menuNoChildren[$i]['date'] = $date;
            }
        }
    }
    // Gather all data for each excerpt
    for ( $i=0; $i < sizeof($menuWithChildren); $i++) {
        for ($j=0; $j < sizeof($menuWithChildren[$i]); $j++) {
             if ( $menuWithChildren[$i][$j]['display'] == 1) {
                $gallery_id = $menuWithChildren[$i][$j]['gallery_id'];
                $page_id = $menuWithChildren[$i][$j]['page_id'];
                foreach($images as $image) {
                    if ($image['gallery_id'] == $gallery_id) {
                        $menuWithChildren[$i][$j]['image'] = $image['label'];
                    }
                }
                foreach($pages as $page){
                    if ($page['id'] == $page_id) {
                        $excerpt = $page['content'];
                        $excerpt = html_entity_decode($excerpt);
                        $view = $page['view'];   
                        $date = new DateTime($page['date']);
                        $date = $date->format('d/n/y');
                        
                        $menuWithChildren[$i][$j]['excerpt'] = $excerpt;
                        $menuWithChildren[$i][$j]['view'] = $view;
                        $menuWithChildren[$i][$j]['date'] = $date;
                    }
                }
            }
        }
        
    }
    
    
    
    // Link images with the menu for convenience
    $smarty->assign("menuNoChildren", $menuNoChildren);
    $smarty->assign("menuWithChildren", $menuWithChildren);
    
    if ($_GET['partial'] == "1") {
        $smarty->display('../Views/Index.tpl');
    }
}
if ($_GET['module'] == "research" && isset($_GET['query'])) {
    $q = $_GET['query'];
    
    $results = $Page->searchQuery($q);
    for ($i=0; $i < sizeof($results); $i++) {
        $results[$i]['content'] = html_entity_decode($results[$i]['content']);
        $results[$i]['content'] = str_ireplace($q, "<span class='underlined'>".$q."</span>", $results[$i]['content']);
        $results[$i]['title'] = str_ireplace($q, "<span class='underlined'>".$q."</span>", $results[$i]['title']);
    }
    
    $smarty->assign("query", $q);
    $smarty->assign("results", $results);
    if ($_GET['partial'] == "1") {
        $smarty->display('../Views/Research.tpl');
    }
}

if (empty($_GET['partial'])) {
    $smarty->display('../Views/Controller.tpl');
}