<?php
/**
 * Created by PhpStorm.
 * User: dsvic
 * Date: 09/03/2017
 * Time: 13:04
 */
require_once "vendor/autoload.php";
require_once "utils.php";

use GuzzleHttp\Client;

class ApiDeckbrewMTG extends Client{


  private $method;
  private $url;
  public  $objReturn;
  public $colors;
  public $types;
  public $superTypes;
  public $subTypes;
  public $cardSets;


  public function __construct($loadColor = null, $loadType = null, $loadSuperType = null, $loadSubType = null, $loadCardSet = true)
  {
    $this->setMethod("GET");
    $this->setURL('http://api.deckbrew.com/mtg');
    parent::__construct();

    $this->objReturn = '';
    if(!is_null($loadColor)){
      $this->colors = $this->getCardColors();
    }
    if(!is_null($loadType)){
      $this->types = $this->getCardType();
    }
    if(!is_null($loadSuperType)){
      $this->superTypes = $this->getCardSuperTypes();
    }
    if(!is_null($loadSubType)){
      $this->subTypes = $this->getCardSubTypes();
    }
    if(!is_null($loadCardSet)){
      $this->cardSets = $this->getCardSets();
    }

    /*$request = $this->request($this->method, $this->url);
    $objReturn = $request->getBody();
    $this->objReturn = $objReturn;*/
  }

  public function execConsult($consult){

    $request = $this->request($this->method, $this->url);
    $objReturn = $request->getBody();
    $this->objReturn = $objReturn;
  }

  public function getCardType(){
    $this->setURL('http://api.deckbrew.com/mtg/types');

    $request = $this->request($this->method, $this->url);
    $objReturn = $request->getBody();
    $arrCards = json_decode($objReturn);
    return $arrCards;
  }

  public function getCardSubTypes(){
    $this->setURL('http://api.deckbrew.com/mtg/subtypes');

    $request = $this->request($this->method, $this->url);
    $objReturn = $request->getBody();
    $arrCards = json_decode($objReturn);
    return $arrCards;
  }



  public function getCardSuperTypes(){
    $this->setURL('http://api.deckbrew.com/mtg/supertypes');

    $request = $this->request($this->method, $this->url);
    $objReturn = $request->getBody();
    $arrCards = json_decode($objReturn);
    return $arrCards;
  }

  public function getCardColors(){
    $this->setURL('http://api.deckbrew.com/mtg/colors');

    $request = $this->request($this->method, $this->url);
    $objReturn = $request->getBody();
    $arrCards = json_decode($objReturn);
    return $arrCards;
  }

  public function getCardSets(){
    $this->setURL('http://api.deckbrew.com/mtg/sets');

    $request = $this->request($this->method, $this->url);
    $objReturn = $request->getBody();
    $arrCards = json_decode($objReturn);
    $returnSize = sizeof($arrCards);
    $arrSets = array();

    for($i = 0; $i <= $returnSize; $i++){
      $arrSets[$i]['id'] = $arrCards[$i]->id;
      $arrSets[$i]['name'] = $arrCards[$i]->name;
      $arrSets[$i]['type'] = $arrCards[$i]->type;
    }

    return $arrSets;
  }


  private function setMethod($method){
    $this->method = $method;
  }

  private function setURL($url){
    $this->url = $url;
  }

  public function getMethod(){
    return $this->method;
  }

  public function getURL(){
    return $this->url;
  }
  public function getObject(){
    return $this->objReturn;
  }

  public function getCardSetFromObject(){
    return $this->cardSets;
  }


}