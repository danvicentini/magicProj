<?php
/**
 * Created by PhpStorm.
 * User: dsvic
 * Date: 26/01/2017
 * Time: 00:32
 */

require_once "vendor/autoload.php";
require_once "funcoes/funcoes.php";

use GuzzleHttp\Client;

$client = new Client();

$request = $client->request('GET', 'http://api.deckbrew.com/mtg/cards?set=KLD');

$objReturn = $request->getBody();

$arrCards = json_decode($objReturn);
$countCards = sizeof($arrCards);
#C:\wamp\www\mtg\images

var_dump($arrCards); die();

for($i=1; $i<=$countCards;$i++){
  //echo "<img src = '". $arrCards[$i]->editions[0]->image_url ."' />";
  $imgName = str_replace(" ", "_", $arrCards[$i]->name);
  echo $url = $arrCards[$i]->editions[0]->image_url;
  $img = 'C:\wamp\www\mtg\images' . "/" . str_replace(" ", "_", $arrCards[$i]->name) . ".jpg";
  var_dump(urlExists($url)); die();
  $imgBase64 = base64_encode(file_get_contents($url));
  echo $imgBase64; die();
  //var_dump(file_put_contents($img, ));

}

