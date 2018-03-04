<?php

namespace Drupal\yandex_yml\YandexYml\Param;

use Drupal\yandex_yml\Annotation\YandexYmlElement;
use Drupal\yandex_yml\Annotation\YandexYmlAttribute;
use Drupal\yandex_yml\Annotation\YandexYmlValue;
use Drupal\yandex_yml\YandexYml\YandexYmlToArrayTrait;

/**
 * Class YandexYmlDataTour
 *
 * Used as abstraction for YML element.
 *
 * @YandexYmlElement(
 *   name = "dataTour"
 * )
 */
class YandexYmlDataTour {

  use YandexYmlToArrayTrait;

  /**
   * @YandexYmlValue()
   *
   * @var string
   */
  private $value;

  /**
   * @param string $value
   *
   * @return YandexYmlDataTour
   */
  public function setValue($value) {
    $this->value = $value;
    return $this;
  }

  /**
   * @return string
   */
  public function getValue() {
    return $this->value;
  }

}