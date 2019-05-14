<?php

namespace Drupal\yandex_yml\Utils;

/**
 * Helper methods for utility purposes.
 *
 * @package Drupal\yandex_yml\Utils
 */
class Utils {

  /**
   * Camelize a string.
   *
   * @param $string
   *   String to camelize.
   *
   * @return string
   *   The camelized string.
   */
  public static function camelize($string) {
    $output = preg_replace('/([^A-Z])([A-Z])/', '$1 $2', $string);
    $output = strtolower($output);
    $output = preg_replace('/[^a-z0-9]/', ' ', $output);
    $output = trim($output);
    $output = ucwords($output);
    $output = str_replace(' ', '', $output);

    return $output;
  }

  /**
   * Predicts getter method name for property.
   *
   * @param string $property_name
   *  The property name.
   *
   * @return string
   *   Assumed getter name.
   */
  public static function predictGetterName($property_name) {
    $result = 'get' . Utils::camelize($property_name);

    return $result;
  }

}
