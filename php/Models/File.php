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

    public function getOneImage($id){
        /*$page = new Page();
        $menu = new Menu();
        $myMenu = $page['']*/
    }

    public function getAllImages($id){
        $bdd = new Connexion();
        $pdo = $bdd->myPDO();
        $req = $pdo->prepare('SELECT label FROM t_file JOIN t_menu JOIN t_gallery WHERE t_gallery.id = t_menu.gallery_id AND t_menu.page_id = :id AND t_file.gallery_id = t_gallery.id');
        $req->execute(array(
            'id'=> $id
        ));
        return $req->fetchAll();
    }




}