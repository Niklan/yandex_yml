<?php

namespace Drupal\yandex_yml\Annotation;

use Drupal\Component\Annotation\Plugin;

/**
 * Annotation YandexYml.
 *
 * @Annotation
 */
class YandexYmlElement extends Plugin {

  /**
   * Element name.
   *
   * @var string
   */
  public $name;

  /**
   * Gets element name.
   *
   * @return string
   *   The element name.
   */
  public function getElementName() {
    return $this->definition['name'];
  }

}
