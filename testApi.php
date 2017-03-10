<?php
/**
 * Created by PhpStorm.
 * User: dsvic
 * Date: 09/03/2017
 * Time: 13:07
 */
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require_once "core/api.deckbrew.class.php";

$objAPI = new ApiDeckbrewMTG('GET', 'http://api.deckbrew.com/mtg/cards?set=KLD');

var_dump($objAPI);
