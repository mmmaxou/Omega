<?php

/**
 * Created by PhpStorm.
 * User: alexr
 * Date: 15/05/2017
 * Time: 13:07
 */
class Gallery
{
    public function addGallery($name){
        $bdd=new Connexion();
        $req = $bdd->myPDO()->prepare('INSERT INTO t_gallery(name) VALUES(:name)');
        $req->execute(array(
            'name' => $name
        ));
        $req1 = $bdd->myPDO()->query('SELECT max(id) FROM t_gallery');
        return $req1->fetch();
    }




}