<?php
/**
 * Created by PhpStorm.
 * User: alexr
 * Date: 05/05/2017
 * Time: 15:53
 */



//require_once ('../Connexion.php');
class Page{

    public function sendDBpage($title,$content,$description,$keywords,$date){
        $bdd=new Connexion();
        $req = $bdd->myPDO()->prepare('INSERT INTO t_page(title, content, description, keywords, date) VALUES(:title, :content, :description, :keywords, :date)');
        $req->execute(array(
            'title' => $title,
            'content' => $content,
            'description' => $description,
            'keywords' => $keywords,
            'date' => $date,
        ));
        $req1 = $bdd->myPDO()->query('SELECT max(id) FROM t_page');
        return $req1->fetch();
    }

    public function updateBDpage($id, $title, $content, $description, $keywords){
        $bdd=new Connexion();
        $req = $bdd->myPDO()->prepare('UPDATE t_page SET title = :title, content = :content, description = :description, keywords = :keywords WHERE id = :id');
        $req->execute(array(
            'id' => $id,
            'title' => $title,
            'content' => $content,
            'description' => $description,
            'keywords' => $keywords,
        ));
        $req1 = $bdd->myPDO()->prepare(' SELECT id from t_menu where page_id = :id ');
        $req1->execute(array(
            'id'=>$id
        ));
        return $req1->fetch();
    }

    public function deleteBDpage($id){
        $bdd=new Connexion();
        $req = $bdd->myPDO()->prepare('DELETE FROM t_page WHERE id= :id');
        $req->execute(array(
            'id' => $id,
        ));
    }

    public function gatherPageDataId($id){
        $bdd = new Connexion();
        $pdo = $bdd->myPDO();
             
        $reponse = $pdo->prepare('SELECT * FROM t_page WHERE id= :id');
        $reponse->execute(array(
            'id' => $id,
        ));
        return $reponse->fetch();
    }

    public function gatherPageData(){
        $bdd=new Connexion();
        $reponse = $bdd->myPDO()->query('SELECT * FROM t_page');
        return $reponse->fetchAll();
    }
    
    function incrementView($id) {
        
        $bdd = new Connexion();
        $pdo = $bdd->myPDO();
        $query = $pdo->prepare('UPDATE t_page SET view = view + 1 WHERE id = :id');
        $query->execute(array(
            'id' => $id,
        ));
        
    }
}

?>