<?php
/**
 * Created by PhpStorm.
 * @author Yann Le Scouarnec <bunkermaster@gmail.com>
 * Date: 09/05/2017
 * Time: 13:42
 */
require_once "vendor/autoload.php";

use \Yann\Classe\{Patrol, Stormtrooper};

$patrol = new Patrol();
$patrol->addToCollection(new Stormtrooper('TK-101'));
$patrol->addToCollection(new Stormtrooper('TK-METRO'));
$patrol->addToCollection(new Stormtrooper('TK-T'));
$patrol->addToCollection(new Stormtrooper('TK-TKTANTKTKTANOHEOHE'));
$patrol->addToCollection(new Stormtrooper('TK-LOLMDR'));
var_dump($patrol);
$patrol->saluer();