<?php

namespace Drupal\yandex_yml\YandexYml\Offer;

use Drupal\Component\Utility\Unicode;
use Drupal\yandex_yml\Xml\Attribute;
use Drupal\yandex_yml\Xml\Element;
use Drupal\yandex_yml\YandexYml\Delivery\DeliveryOptions;
use Drupal\yandex_yml\YandexYml\Param\Param;
use InvalidArgumentException;

/**
 * Base object for other offers.
 *
 * @see https://yandex.ru/support/partnermarket/offers.html
 */
abstract class Offer extends Element implements OfferInterface {

  /**
   * Offer constructor.
   *
   * @param int|string $id
   *   The offer internal ID
   * @param $url
   *   The offer URL.
   * @param $price
   *   The offer price.
   * @param bool|null $price_from
   *   The price from or not.
   * @param $currency_id
   *   The currency for price.
   * @param $category_id
   *   The category ID.
   */
  public function __construct($id, $url, $price, $price_from, $currency_id, $category_id) {
    parent::__construct('offer');

    $this->setId($id);
    $this->setUrl($url);
    $this->setPrice($price, $price_from);
    $this->setCurrencyId($currency_id);
    $this->setCategoryId($category_id);
  }

  /**
   * Sets product id.
   *
   * @param string $id
   *   The product id.
   *
   * @see https://yandex.ru/support/partnermarket/elements/id-type-available.html
   *
   */
  protected function setId($id) {
    $this->addElementAttribute(new Attribute('id', $id));
  }

  /**
   * Sets product url.
   *
   * @param string $url
   *   The product url.
   *
   * @return \Drupal\yandex_yml\YandexYml\Offer\OfferInterface
   *   The current offer.
   */
  protected function setUrl($url) {
    $this->addElementChild(new Element('url', $url));

    return $this;
  }

  /**
   * Sets product price.
   *
   * @param int|float $price
   *   The product unit price.
   * @param bool $from
   *   The price from this value.
   *
   * @return \Drupal\yandex_yml\YandexYml\Offer\OfferInterface
   *   The current offer.
   */
  protected function setPrice($price, $from = NULL) {
    $price = new Element('price', $price);

    if ($from) {
      $price->addElementAttribute(new Attribute('from', $from));
    }

    return $this;
  }

  /**
   * Sets currency for offer.
   *
   * Can be: RUR, USD, EUR, UAH, KZT, BYN.
   * Don't forget to set price in this currency.
   *
   * @param string $currency_id
   *   The currency id.
   *
   * @return \Drupal\yandex_yml\YandexYml\Offer\OfferInterface
   *   The current offer.
   */
  protected function setCurrencyId($currency_id) {
    $this->addElementChild(new Element('currencyId', $currency_id));

    return $this;
  }

  /**
   * Sets category id.
   *
   * @param int $category_id
   *   The category id.
   *
   * @return \Drupal\yandex_yml\YandexYml\Offer\OfferInterface
   *   The current offer.
   */
  protected function setCategoryId($category_id) {
    $this->addElementChild(new Element('categoryId', $category_id));

    return $this;
  }

  /**
   * {@inheritdoc}
   */
  public function setBid($bid) {
    $this->addElementAttribute(new Attribute('bid', $bid));
  }

  /**
   * {@inheritdoc}
   */
  public function setAvailable($available) {
    $this->addElementAttribute(new Attribute('available', $available));

    return $this;
  }


  /**
   * {@inheritdoc}
   */
  public function setOldPrice($old_price) {
    $this->addElementChild(new Element('oldprice', $old_price));

    return $this;
  }

  /**
   * {@inheritdoc}
   */
  public function setPicture($picture) {
    $this->addElementChild(new Element('picture', $picture));

    return $this;
  }

  /**
   * {@inheritdoc}
   */
  public function setDelivery($delivery) {
    $this->addElementChild(new Element('delivery', $delivery));

    return $this;
  }

  /**
   * {@inheritdoc}
   */
  public function setDeliveryOptions(DeliveryOptions $delivery_options) {
    $this->addElementChild($delivery_options);

    return $this;
  }

  /**
   * {@inheritdoc}
   */
  public function setPickup($pickup) {
    $this->addElementChild(new Element('pickup', $pickup));

    return $this;
  }

  /**
   * {@inheritdoc}
   */
  public function setStore($store) {
    $this->addElementChild(new Element('store', $store));

    return $this;
  }

  /**
   * {@inheritdoc}
   */
  public function setDescription($description) {
    $description = Unicode::truncate($description, 3000);
    $this->addElementChild(new Element('description', $description));

    return $this;
  }

  /**
   * {@inheritdoc}
   */
  public function setSalesNotes($sales_notes) {
    if (mb_strlen($sales_notes) > 50) {
      throw new InvalidArgumentException('The sales notes must be lower than 50 chars.');
    }

    $this->addElementChild(new Element('sales_notes', $sales_notes));

    return $this;
  }

  /**
   * {@inheritdoc}
   */
  public function setMinQuantity($min_quantity) {
    $this->addElementChild(new Element('min-quantity', $min_quantity));

    return $this;
  }

  /**
   * {@inheritdoc}
   */
  public function setStepQuantity($step_quantity) {
    $this->addElementChild(new Element('step-quantity', $step_quantity));

    return $this;
  }

  /**
   * {@inheritdoc}
   */
  public function setManufacturerWarranty($manufacturer_warranty) {
    $this->addElementChild(new Element('manufacturer_warranty', $manufacturer_warranty));

    return $this;
  }

  /**
   * {@inheritdoc}
   */
  public function setCountryOfOrigin($country_of_origin) {
    $this->addElementChild(new Element('country_of_origin', $country_of_origin));

    return $this;
  }

  /**
   * {@inheritdoc}
   */
  public function setAdult($adult) {
    $this->addElementChild(new Element('adult', $adult));

    return $this;
  }

  /**
   * {@inheritdoc}
   */
  public function setBarcode($barcode) {
    $this->addElementChild(new Element('barcode', $barcode));

    return $this;
  }

  /**
   * {@inheritdoc}
   */
  public function addParam(Param $param) {
    $this->addElementChild($param);

    return $this;
  }

  /**
   * {@inheritdoc}
   */
  public function setExpire($expire) {
    $this->addElementChild(new Element('expire', $expire));

    return $this;
  }

  /**
   * {@inheritdoc}
   */
  public function setWeight($weight) {
    $this->addElementChild(new Element('weight', $weight));

    return $this;
  }

  /**
   * {@inheritdoc}
   */
  public function setDimensions($dimensions) {
    $this->addElementChild(new Element('dimensions', $dimensions));

    return $this;
  }

  /**
   * {@inheritdoc}
   */
  public function setDownloadable($downloadable) {
    $this->addElementChild(new Element('downloadable', $downloadable));

    return $this;
  }

  /**
   * {@inheritdoc}
   */
  public function setAge($age) {
    $this->addElementChild(new Element('age', $age));

    return $this;
  }

  /**
   * {@inheritdoc}
   */
  public function setGroupId($group_id) {
    $this->addElementChild(new Element('group-id', $group_id));

    return $this;
  }

  /**
   * {@inheritdoc}
   */
  public function setName($name) {
    $this->addElementChild(new Element('name', $name));

    return $this;
  }

  /**
   * {@inheritdoc}
   */
  public function setVendor($vendor) {
    $this->addElementChild(new Element('vendor', $vendor));

    return $this;
  }

  /**
   * {@inheritdoc}
   */
  public function setVendorCode($vendor_code) {
    $this->addElementChild(new Element('vendorCode', $vendor_code));

    return $this;
  }

}
