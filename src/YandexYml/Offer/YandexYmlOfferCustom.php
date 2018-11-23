<?php

namespace Drupal\yandex_yml\YandexYml\Offer;

use Drupal\yandex_yml\Annotation\YandexYmlAttribute;
use Drupal\yandex_yml\Annotation\YandexYmlElement;
use Drupal\yandex_yml\Annotation\YandexYmlElementWrapper;
use Drupal\yandex_yml\YandexYml\YandexYmlToArrayTrait;

/**
 * Custom offer.
 *
 * @see https://yandex.ru/support/partnermarket/export/vendor-model.html
 *
 * @YandexYmlElement(
 *   name = "offer"
 * )
 */
class YandexYmlOfferCustom extends YandexYmlOfferBase implements YandexYmlOfferCustomInterface {

  use YandexYmlToArrayTrait;

  /**
   * The type.
   *
   * @var string
   *
   * @YandexYmlAttribute()
   */
  protected $type;

  /**
   * The model.
   *
   * @var string
   *
   * @YandexYmlElementWrapper()
   */
  protected $model;

  /**
   * The type prefix.
   *
   * @var string
   *
   * @YandexYmlElementWrapper()
   */
  protected $typePrefix;

  /**
   * {@inheritdoc}
   */
  public function setType($type) {
    $this->type = $type;
    return $this;
  }

  /**
   * {@inheritdoc}
   */
  public function getType() {
    return $this->type;
  }

  /**
   * {@inheritdoc}
   */
  public function setModel($model) {
    $this->model = $model;
    return $this;
  }

  /**
   * {@inheritdoc}
   */
  public function getModel() {
    return $this->model;
  }

  /**
   * {@inheritdoc}
   */
  public function setTypePrefix($type_prefix) {
    $this->typePrefix = $type_prefix;
    return $this;
  }

  /**
   * {@inheritdoc}
   */
  public function getTypePrefix() {
    return $this->typePrefix;
  }

}
