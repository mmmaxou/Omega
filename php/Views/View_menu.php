<?php
try{
    $bdd = new PDO('mysql:host=mysql.hostinger.fr;dbname=u462001126_maxel;charset=utf8', 'u462001126_maxel', 'tototiti');
}
catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}

$result = $bdd->query('SELECT * FROM t_menu');
$t_menu = $result->fetch();


//dump($t_menu);


function dump ($data) {
    echo '<pre>';
    var_dump($data);
    echo '<pre>';
}




/*
$donnees_entree = json_decode($_POST["data"] ,  true );
//$added = json_decode($donnees_entree["added"] ,  false , 512 ,  0 );
//$modified = json_decode($donnees_entree["modified"] ,  false , 512 ,  0 );
//$deleted = json_decode($donnees_entree["deleted"] ,  false , 512 ,  0 );

//$donnees_entree = (array)$donnees_entree_std;
dump($donnees_entree);
dump( $donnees_entree['modified'][0]["name"]);
$deleted = $donnees_entree['deleted'];
*/
dump($_POST);

$decoded = json_decode($_POST["data"], true);
dump($decoded);

$nl2br = nl2br($decoded["content"]);
dump($nl2br);

$escaped = htmlspecialchars($nl2br);
dump($escaped);



