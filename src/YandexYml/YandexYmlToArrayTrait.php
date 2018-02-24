<?php

namespace Drupal\yandex_yml\YandexYml;

/**
 * Trait YandexYmlToArrayTrait.
 *
 * Help convert data to structured array.
 */
trait YandexYmlToArrayTrait {

  /**
   * Convert data to array.
   *
   * @todo I think it's better to implement custom annotation for parsing
   * properties.
   */
  public function toArray() {
    $properties = get_object_vars($this);
    unset($properties['_serviceId']);
    $properties = array_filter($properties, function ($value) {
      return $value !== NULL;
    });
    return $properties;
  }

}