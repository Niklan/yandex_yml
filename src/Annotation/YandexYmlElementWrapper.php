<?php

namespace Drupal\yandex_yml\Annotation;

use Drupal\Component\Annotation\Plugin;

/**
 * Annotation YandexYml.
 *
 * @Annotation
 */
class YandexYmlElementWrapper extends YandexYmlXmlBase {

  /**
   * Element wrapper name.
   *
   * @var string
   */
  public $name;

}
