<?php

namespace Drupal\yandex_yml\Xml;

/**
 * Provides base element to create collection objects.
 *
 * @package Drupal\yandex_yml\Xml
 */
abstract class ListBase implements \IteratorAggregate {

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
