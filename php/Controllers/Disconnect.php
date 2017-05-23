<?php
session_start();

session_destroy();
$_SESSION = array();
session_register_shutdown();

$res = array(
     "toastr" => array (
         "type" => "warning",
         "message" => "Disconnected",
         ),
     "success" => true,
 );
echo json_encode($res);
