<?php

/**
 * Created by PhpStorm.
 * User: alexr
 * Date: 05/05/2017
 * Time: 15:39
 */
require('../Connexion.php');

class Menu
{
    public function menu(){
        $pdo=new Connexion();
        $req = $pdo->monPDO()->prepare('INSERT INTO t_page(title, content, description, keywords) VALUES(:title, :content, :description, :keywords)');

    }
}