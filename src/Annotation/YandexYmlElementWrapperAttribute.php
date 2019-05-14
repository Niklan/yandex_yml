<?php

namespace Drupal\yandex_yml\Annotation;

/**
 * Annotation YandexYml.
 *
 * Attribute for ElementWrapper.
 *
 * @Annotation
 */
class YandexYmlElementWrapperAttribute extends YandexYmlXmlBase {

  /**
   * Element wrapper name.
   *
   * @var string
   */
  public $name;

  /**
   * The target element name.
   *
   * @var string
   */
  public $targetElement;

}
