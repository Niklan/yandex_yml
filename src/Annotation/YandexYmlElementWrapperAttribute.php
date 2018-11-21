<?php

namespace Drupal\yandex_yml\Annotation;

use Drupal\Component\Annotation\Plugin;

/**
 * Annotation YandexYml.
 *
 * Attribute for ElementWrapper.
 *
 * @Annotation
 */
class YandexYmlElementWrapperAttribute extends Plugin {

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
