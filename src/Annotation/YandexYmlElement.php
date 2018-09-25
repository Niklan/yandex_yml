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

}
