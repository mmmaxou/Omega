<?php
/**
 * Created by PhpStorm.
 * User: alexr
 * Date: 05/05/2017
 * Time: 15:53
 */



require '../Connexion.php';
class Ctr_page{
    public function envoie(){
        $req = Connexion::monPDO()->prepare('INSERT INTO t_page(title, content, description, keywords) VALUES(:title, :content, :description, :keywords)');
        $req->execute(array(
            'title' => 'mon titre',
            'content' => 'mon content',
            'description' => 'desiption',
            'keywords' => 'mot'
        ));
    }
}

?>