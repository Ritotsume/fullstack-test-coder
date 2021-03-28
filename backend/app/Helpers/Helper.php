<?php

namespace App\Helpers;

class Helper
{  
  /**
   * Cria slugs.
   * @param   String $str     A string que dará origem ao slug.
   * @return  String          Uma string formatada.
   */
  public static function slugify($str)
  {
    $str = mb_strtolower($str);
    $regexp = [
      '/[áàãâä]+/',
      '/[éèêë]+/',
      '/[íìîï]+/',
      '/[óòõôö]+/',
      '/[úùûü]+/',
      '/[ç]+/',
      '/[\\,(),;:|!"#$%&\/=?~^><ªº\.]+/',
      '/[^A-Za-z0-9]+/'
    ];
    $separator = [
      'a',
      'e',
      'i',
      'o',
      'u',
      'c',
      '',
      '-'
    ];
    $slug = preg_replace($regexp, $separator, $str);

    return $slug;
  }
}