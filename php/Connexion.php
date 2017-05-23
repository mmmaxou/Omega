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
        // Hostinger
//        return new PDO('mysql:host=mysql.hostinger.fr;dbname=u462001126_maxel;charset=utf8', 'u462001126_maxel', 'tototiti');
        
        // Hostinger
        return new PDO('mysql:host=mysql5;dbname=domurat_t2;charset=utf8', 'domurat_t2', 'Omega');
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