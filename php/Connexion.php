<?php
/**
 * Created by PhpStorm.
 * User: alexr
 * Date: 05/05/2017
 * Time: 15:41
 */

class Connexion
{
    public function myPDO()
    {
        return new PDO('mysql:host=mysql.hostinger.fr;dbname=u462001126_maxel;charset=utf8', 'u462001126_maxel', 'tototiti');
    }
}

//try {
//    $pdo = new PDO('mysql:host=mysql.hostinger.fr;dbname=u462001126_maxel;charset=utf8', 'u462001126_maxel', 'tototiti');
//    
//} catch (Exception $e) {
//    
//    die('Erreur : ' . $e->getMessage());
//    
//}


?>