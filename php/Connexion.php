<?php
/**
 * Created by PhpStorm.
 * User: alexr
 * Date: 05/05/2017
 * Time: 15:41
 */

class Connexion
{
    public $host = "mysql.hostinger.fr";
//    public $host = "localhost";
    public $dbname = "u271338863_omega";
//    public $login = "domurat_t2";
    public $login = "u271338863_max";
//    public $login = "root";
    public $password = "password";
//    public $password = "Omega";
    
    public function myPDO()
    {
        return new PDO('mysql:host='.$this->host.';dbname='.$this->dbname.';charset=utf8', $this->login, $this->password);
    }
}


?>
