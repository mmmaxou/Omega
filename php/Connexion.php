<?php
/**
 * Created by PhpStorm.
 * User: alexr
 * Date: 05/05/2017
 * Time: 15:41
 */
class Connexion
{
    public function monPDO()
    {
        return new PDO('mysql:host=185.28.21.133;dbname= u462001126_maxel;charset=utf8', 'u462001126', 'tototiti');
    }
}
?>