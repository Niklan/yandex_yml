<?php

namespace Drupal\yandex_yml\Annotation;

/**
 * Annotation YandexYmlXmlValue.
 *
 * @Annotation
 */
class YandexYmlXmlValue extends YandexYmlXmlBase {

  /**
   * Attribute name.
   *
   * @var string
   */
  public $name;

  /**
   * Gets attribute name.
   *
   * @return string
   *   The attribute name.
   */
  public function getName() {
    return isset($this->definition['name']) ? $this->definition['name'] : NULL;
  }

}
