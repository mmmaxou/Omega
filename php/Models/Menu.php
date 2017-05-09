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
        $bdd = new Connexion();
        $pdo = $bdd->myPDO();
        $req = $pdo->prepare('INSERT INTO t_menu(name, parent_menu_id, lang_code, page_id, create_user_id, gallery_id) VALUES(:name, :parent_menu_id, :lang_code, :page_id, :create_user_id, :gallery_id)');
        $req->execute(array(
            'name' => $name,
            'parent_menu_id' => $parent_menu_id,
            'lang_code' => $lang_code,
            'page_id' => $page_id,
            'create_user_id' => $create_user_id,
            'gallery_id' => $gallery_id
        ));
    }

    public function updateBDmenu($id, $name, $updated_user_id){    
        $bdd = new Connexion();
        $pdo = $bdd->myPDO();
        $req = $pdo->prepare('UPDATE t_menu SET name = :name, updated_user_id = :upadte_user_id WHERE id = :id');
        $req->execute(array(
            'id' => $id,
            'name' => $name,
            'update_user_id' => $updated_user_id
        ));
    }

    public function deleteBDmenu($id){    
        $bdd = new Connexion();
        $pdo = $bdd->myPDO();
        $req = $pdo->prepare('DELETE FROM t_menu WHERE id= :id');
        $req->execute(array(
            'id' => $id,
        ));
    }


    public function gatherMenuData(){    
        $bdd = new Connexion();
        $pdo = $bdd->myPDO();
        $reponse = $pdo->query('SELECT * FROM t_menu');
        return $reponse->fetchAll();
    }

    public function getMenuNoChildren(){
        $bdd = new Connexion();
        $pdo = $bdd->myPDO();
        $reponse = $pdo->query('SELECT * FROM t_menu WHERE parent_menu_id IS NULL');
        return $reponse->fetchAll();
    }
}
