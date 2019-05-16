<?php

namespace Drupal\yandex_yml\YandexYml\Offer;

use Drupal\yandex_yml\Annotation\YandexYmlXmlAttribute;
use Drupal\yandex_yml\Annotation\YandexYmlXmlElement;
use Drupal\yandex_yml\Annotation\YandexYmlXmlRootElement;

/**
 * Custom offer.
 *
 * @see https://yandex.ru/support/partnermarket/export/vendor-model.html
 *
 * @YandexYmlXmlRootElement(name = "offer")
 */
class OfferCustom extends Offer {

  /**
   * The type.
   *
   * @var string
   *
   * @YandexYmlXmlAttribute()
   */
  protected $type;

  /**
   * The model.
   *
   * @var string
   *
   * @YandexYmlXmlElement()
   */
  protected $model;

  /**
   * The type prefix.
   *
   * @var string
   *
   * @YandexYmlXmlElement()
   */
  protected $typePrefix;

  /**
   * {@inheritDoc}
   */
  public function __construct($id, $url, $price, $currency_id, $category_id, $model, $vendor) {
    parent::__construct($id, $url, $price, $currency_id, $category_id);

    $this->setType('vendor.model');
    $this->setModel($model);
    $this->setVendor($vendor);
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
  public function setType($type) {
    $this->type = $type;

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
  public function setModel($model) {
    $this->model = $model;

    return $this;
  }

  /**
   * {@inheritdoc}
   */
  public function getTypePrefix() {
    return $this->typePrefix;
  }

  /**
   * {@inheritdoc}
   */
  public function setTypePrefix($type_prefix) {
    $this->typePrefix = $type_prefix;

    return $this;
  }

}
