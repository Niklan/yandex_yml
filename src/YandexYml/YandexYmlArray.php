<?php

namespace Drupal\yandex_yml\YandexYml;

/**
 * Class YandexYmlArray.
 *
 * The base class for value object contains multiple data.
 *
 * @package Drupal\yandex_yml\YandexYml
 */
abstract class YandexYmlArray implements \IteratorAggregate {

  /**
   * The container values.
   *
   * @var array
   */
  protected $values = [];

  /**
   * {@inheritDoc}
   */
  public function getIterator() {
    return new \ArrayIterator($this->values);
  }

}