<?php

/**
 * Created by PhpStorm.
 * User: alexr
 * Date: 05/05/2017
 * Time: 15:39
 */
require_once('../Connexion.php');


class Menu
{
    public function sendDBmenu($name, $parent_menu_id, $lang_code, $page_id, $create_user_id, $gallery_id){
        $bdd=new Connexion();
        $req = $bdd->myPDO()->prepare('INSERT INTO t_menu(name, parent_menu_id, lang_code, page_id, create_user_id, gallery_id) VALUES(:name, :parent_menu_id, :lang_code, :page_id, :create_user_id, :gallery_id)');
        $req->execute(array(
            'name' => $name,
            'parent_menu_id' => $parent_menu_id,
            'lang_code' => $lang_code,
            'page_id' => $page_id,
            'create_user_id' => $create_user_id,
            'gallery_id' => $gallery_id
        ));
    }


    public function gatherMenuData(){
        $bdd=new Connexion();
        $reponse = $bdd->query('SELECT * FROM t_menu');
        return $reponse->fetch();
    }





}