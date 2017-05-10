<?php
session_destroy();
$_SESSION = array();
session_register_shutdown();
header('Location:Index.php');