<?php

/**
 * Created by PhpStorm.
 * User: dsvic
 * Date: 15/03/2017
 * Time: 16:11
 */
class utils {

  public static function objToArray($object){
    if(!is_object($object) && !is_array($object))
      return $object;

    return array_map('objectToArray', (array) $object);
  }

  public static function dataFormatter($date, $format){
    ##date('d/m/Y H:i:s', strtotime($data));

    $newDate = date($format, strtotime($date));
    return $newDate;
  }

}