<?php
/**
 * Created by PhpStorm.
 * User: alexr
 * Date: 05/05/2017
 * Time: 15:53
 */



require '../Connexion.php';
class Page{

    public function sendDBpage(){
        $bdd=new Connexion();

        $req = $bdd->myPDO()->prepare('INSERT INTO t_page(title, content, description) VALUES(:title, :content, :description)');
        $req->execute(array(
            'title' => 'mon titre',
            'content' => 'mon content',
            'description' => 'desiption'
        ));
    }

    public function updateBDpage($id, $title, $content, $description){
        $bdd=new Connexion();
        $req = $bdd->myPDO()->prepare('UPDATE t_page SET title = :title, content = :content, description = :description WHERE id = :id');
        $req->execute(array(
            'id' => $id,
            'title' => $title,
            'content' => $content,
            'description' => $description
        ));
    }

    public function deleteBDpage($id){
        $bdd=new Connexion();
        $req = $bdd->myPDO()->prepare('DELETE FROM t_page WHERE id= :id');
        $req->execute(array(
            'id' => $id,
        ));
    }


    public function gatherPageData(){
        $bdd=new Connexion();
        $reponse = $bdd->myPDO()->query('SELECT * FROM t_page');
        return $reponse->fetch();
    }
}

?>