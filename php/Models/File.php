<?php

/**
 * Created by PhpStorm.
 * User: alexr
 * Date: 15/05/2017
 * Time: 16:32
 */
class File
{
    public function addFile($gallery_id, $label){
        $bdd=new Connexion();
        $req = $bdd->myPDO()->prepare('INSERT INTO t_file(gallery_id, label) VALUES(:gallery_id, :label)');
        $req->execute(array(
            'gallery_id' => $gallery_id,
            'label' => $label
        ));
    }
}