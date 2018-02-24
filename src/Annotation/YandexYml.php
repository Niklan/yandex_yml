<?php

namespace Drupal\yandex_yml\Annotation;

use Drupal\Component\Annotation\Plugin;

/**
 * @Annotation
 */
class YandexYml extends Plugin {

  /**
   * @var string
   */
  public $type;

  /**
   * @var string
   * @required
   */
  public $elementName;

}