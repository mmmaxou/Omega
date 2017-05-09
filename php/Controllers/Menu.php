<?php

/**
 * Created by PhpStorm.
 * User: alexr
 * Date: 09/05/2017
 * Time: 12:10
 */
$donnees_entree = json_decode($_POST["data"] ,  true );
$donnees_entree = (array)$donnees_entree_std;