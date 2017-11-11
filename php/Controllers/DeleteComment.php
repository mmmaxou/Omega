<?php 
session_start();

require_once('../Models/Comment.php');
$Comment = new Comment();


$user_id = $_SESSION['id'];
$comment_id = $_POST['id'];
$comment_user_id = $Comment->ownerCommentId($comment_id);
$comment_user_id = $comment_user_id['user_id'];

if($comment_user_id == $user_id || $user_id == 10) {
    $Comment->deleteCommentId($comment_id);
    $res = array(
        'toastr' => array (
            "type" => "success",
            "message" => "Comment deleted",
            ),
        "success" => true
    ); 
} else {
    $res = array(
        'toastr' => array (
            "type" => "error",
            "message" => "You can't delete the comments of an other user.",
            ),
        "success" => false,
    );
}
echo json_encode($res);