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
dump($_POST);
dump($_GET);
$decoded = json_decode($_POST["data"], true);
$nl2br = nl2br($decoded["content"]);
$escaped = htmlspecialchars($nl2br);
//updateBDpage($myMenu['id'],$up['name'],$myMenu['content'],$myMenu['description']);
