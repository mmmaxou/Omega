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
        $req = Connexion::monPDO()->prepare('INSERT INTO t_page(title, content, description, keywords) VALUES(:title, :content, :description, :keywords)');
        $req->execute(array(
            'title' => 'mon titre',
            'content' => 'mon content',
            'description' => 'desiption',
            'keywords' => 'mot'
        ));
    }

    public function updateBDpage($id, $title, $content, $description){
        $bdd=new Connexion();
        $req = $bdd->myPDO()->prepare('UPDATE t_page SET name = :name, updated_user_id = :upadte_user_id WHERE id = :id');
        $req->execute(array(
            'id' => $id,
            'name' => $name,
            'update_user_id' => $updated_user_id
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