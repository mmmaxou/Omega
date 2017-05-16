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


    public function sendDBmenu($name, $parent_menu_id, $page_id, $create_user_id,$gallery_id){
        $bdd = new Connexion();
        $pdo = $bdd->myPDO();
        $req = $pdo->prepare('INSERT INTO t_menu(name, parent_menu_id, page_id,create_user_id, gallery_id) VALUES(:name, :parent_menu_id, :page_id,:create_user_id, :gallery_id)');
        $req->execute(array(
            'name' => $name,
            'parent_menu_id' => $parent_menu_id,
            'page_id' => $page_id,
            'create_user_id' => $create_user_id,
            'gallery_id' => $gallery_id
        ));
    }
    
    public function updateBDmenu($id, $name, $updated_user_id){    
        $bdd = new Connexion();
        $pdo = $bdd->myPDO();
        $req = $pdo->prepare('UPDATE t_menu SET name = :name, updated_user_id = :updated_user_id WHERE id = :id');
        $req->execute(array(
            'name'=> $name,
            'updated_user_id'=> $updated_user_id,
            'id'=>$id
        ));
        $req = $pdo->prepare('SELECT * from t_page WHERE id in ( SELECT page_id from t_menu WHERE id = ? )');
        $req->execute(array($id));
        return $req->fetch();

    }

    public function deleteBDmenu($id){    
        $bdd = new Connexion();
        $pdo = $bdd->myPDO();
        $req = $pdo->prepare('SELECT page_id FROM t_menu where id = :id ');
        $req->execute(array(
            'id'=> $id
        ));

        $req1 = $pdo->prepare('DELETE FROM t_menu WHERE id= :id');
        $req1->execute(array(
            'id' => $id
        ));

        return $req->fetch();
    }
    
    public function setMenuParent($id) {   
        $bdd = new Connexion();
        $pdo = $bdd->myPDO();
        
        $req = $pdo->prepare('UPDATE t_menu SET page_id = NULL WHERE id = :id');
        $req->execute(array(
            'id'=> $id
        ));        
    }

    public function getMenuNoChildren()
    {
        $bdd = new Connexion();
        $pdo = $bdd->myPDO();
        $reponse = $pdo->query('SELECT * FROM t_menu WHERE id not in (select parent_menu_id from t_menu WHERE parent_menu_id is not NULL) and parent_menu_id is NULL');
        //$reponse = $pdo->query('select parent_menu_id from t_menu WHERE parent_menu_id is not NULL');
        return $reponse->fetchAll();

    }
    public function getMenuWithChildren(){
        $myArray = array();
        $bdd = new Connexion();
        $pdo = $bdd->myPDO();
        $reponse = $pdo->query('SELECT * FROM t_menu WHERE id in (select parent_menu_id from t_menu WHERE parent_menu_id is not NULL)');
        $j=0;
        while ($menu = $reponse->fetch()){
            $i=1;
            $req = $pdo->prepare('SELECT * from t_menu where parent_menu_id = ?');
            $req->execute(array($menu['id']));
            $myArray[$j][0]=$menu;
            while ($under = $req->fetch()){
                $myArray[$j][$i]=$under;
                $i+=1;
            }
            $j+=1;
        }
        return $myArray;
    }
    
    
    public function getMenu()
    {
        $bdd = new Connexion();
        $pdo = $bdd->myPDO();
        
        
        $reponse = $pdo->query('SELECT * FROM t_menu');
        //$reponse = $pdo->query('select parent_menu_id from t_menu WHERE parent_menu_id is not NULL');
        return $reponse->fetchAll();

    }
    public function getGallery($my_menu_id){
        $bdd = new Connexion();
        $pdo=$bdd->myPDO();
        $req = $pdo->prepare('SELECT gallery_id from t_menu where id = :id');
        $req->execute(array(
            'id' => $my_menu_id[0]
        ));
        return $req->fetch();
    }

}
