<?php

namespace Drupal\yandex_yml\Annotation;

/**
 * Annotation YandexYmlXmlElementWrapper.
 *
 * @Annotation
 */
class YandexYmlXmlElementWrapper extends YandexYmlXmlBase {

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
  public function getName() {
    return isset($this->definition['name']) ? $this->definition['name'] : NULL;
  }

}
