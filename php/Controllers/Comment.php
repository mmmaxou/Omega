<?php
session_start();


function dump ($data) {
    echo '<pre>';
    var_dump($data);
    echo '</pre>';
}


require_once('../Models/Comment.php');
$Comment = new Comment();

// Add a comment

// transform an input
function transform ($msg) {
    $nl2br = nl2br($msg);
    $html = htmlspecialchars($nl2br);
    return $html;
}
$decoded = json_decode($_POST["data"], true);

$content = transform($_POST['articleContent']);
$page_id = $_POST['id'];
$user_id = $_SESSION['id'];
// date
date_default_timezone_set('UTC');
$date = date("Y-m-d H:i:s");


if ($_POST['articleContent'] == "" || empty($_POST['articleContent'])) {
    // error content is empty
    $res = array(
        'toastr' => array (
            "type" => "error",
            "message" => "Your comment is empty.",
            ),
        "success" => false,
    );
}

$id = $Comment->sendComment($content,$page_id,$user_id,$date);

$res = array(
    'toastr' => array (
        "type" => "success",
        "message" => "Comments added",
        ),
    "success" => true,
    "comment" => array(
        "id" => $id["0"],
        "user" => $_SESSION['login'],
        "content" => $content,
        "date" => $date,
    )
);
echo json_encode($res);

