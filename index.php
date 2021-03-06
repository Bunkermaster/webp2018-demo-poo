<?php
/**
 * Created by PhpStorm.
 * @author Yann Le Scouarnec <bunkermaster@gmail.com>
 * Date: 09/05/2017
 * Time: 13:42
 */
require_once "vendor/autoload.php";

use \Yann\Classe\{Patrol, Stormtrooper, Officer, DarthVader};

$patrol = new Patrol();
$patrol->addToCollection(new Officer('Bob L\'Eponge'));
$patrol->addToCollection(new Stormtrooper('TK-101'));
$patrol->addToCollection(new Stormtrooper('TK-METRO'));
$patrol->addToCollection(new Stormtrooper('TK-T'));
$patrol->addToCollection(new Stormtrooper('Phasma'));
$patrol->addToCollection(new DarthVader('Anakin Skywalker'));
$patrol->addToCollection(new Stormtrooper('FN-2187'));
$patrol->saluer();
