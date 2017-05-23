<?php

/**
 * Created by PhpStorm.
 * User: alexr
 * Date: 05/05/2017
 * Time: 15:39
 */
require_once('../Connexion.php');


class Comment
{
    public function sendComment($content,$page_id,$user_id,$date){
        $bdd=new Connexion();
        $req = $bdd->myPDO()->prepare('INSERT INTO t_comment ( content, page_id, user_id, date) VALUES(:content, :page_id, :user_id, :date)');
        $req->execute(array(
            'content' => $content,
            'page_id' => $page_id,
            'user_id' => $user_id,
            'date' => $date,
        ));
        $req1 = $bdd->myPDO()->query('SELECT max(id) FROM t_comment');
        return $req1->fetch();
    }
    
    public function getCommentsId($id){
        $bdd = new Connexion();
        $pdo = $bdd->myPDO();
             
        $reponse = $pdo->prepare('SELECT t_comment.id, t_comment.content, t_comment.date, t_user.login  FROM t_comment JOIN t_user ON t_comment.user_id = t_user.id WHERE t_comment.page_id= :id');
        $reponse->execute(array(
            'id' => $id,
        ));
        return $reponse->fetchAll();
    }
    
    public function ownerCommentId($id) {
        
        $bdd = new Connexion();
        $pdo = $bdd->myPDO();
             
        $reponse = $pdo->prepare('SELECT user_id FROM t_comment WHERE id= :id');
        $reponse->execute(array(
            'id' => $id,
        ));
        return $reponse->fetch();
        
    }
    
    public function deleteCommentId($id){
        $bdd=new Connexion();
        $req = $bdd->myPDO()->prepare('DELETE FROM t_comment WHERE id= :id');
        $req->execute(array(
            'id' => $id,
        ));
    }

}
