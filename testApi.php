<?php
/**
 * Created by PhpStorm.
 * User: dsvic
 * Date: 09/03/2017
 * Time: 13:07
 */
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ERROR);
require_once "core/api.deckbrew.class.php";

$objAPI = new ApiDeckbrewMTG(null, null, null, null, true);

var_dump($objAPI);
var_dump($objAPI->getCardSetFromObject());
