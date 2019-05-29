<?php

namespace Drupal\yandex_yml\YandexYml\Offer;

use Drupal\Component\Utility\Unicode;
use Drupal\yandex_yml\Xml\Attribute;
use Drupal\yandex_yml\Xml\Element;
use Drupal\yandex_yml\YandexYml\Param\Param;
use Drupal\yandex_yml\YandexYml\Pickup\PickupOptions;
use InvalidArgumentException;

/**
 * Base object for other offers.
 *
 * The base offer contains all available information valid to all offer types.
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
   * @param $currency_id
   *   The currency for price.
   * @param $category_id
   *   The category ID.
   * @param bool|null $price_from
   *   The price from or not.
   */
  public function __construct($id, $url, $price, $currency_id, $category_id, $price_from = NULL) {
    parent::__construct('offer');

    $this->setId($id);
    $this->setUrl($url);
    $this->setCurrencyId($currency_id);
    $this->setCategoryId($category_id);
    $this->setPrice($price, $price_from);
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

    $this->addElementChild($price);

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
  public function setDescription($description, $contains_html = FALSE) {
    $description = Unicode::truncate($description, 3000);
    $this->addElementChild(new Element('description', $description, $contains_html));

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
  public function setCountryOfOrigin($country_of_origin) {
    $this->addElementChild(new Element('country_of_origin', $country_of_origin));

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
  public function setExpiry($expiry) {
    $this->addElementChild(new Element('expiry', $expiry));

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

  public function setEnableAutoDiscounts($enable_auto_discounts) {
    $this->addElementChild(new Element('enable_auto_discounts', $enable_auto_discounts));
  }

  /**
   * Sets pickup options.
   *
   * @param \Drupal\yandex_yml\YandexYml\Pickup\PickupOptions $pickup_options
   *   The pickup options.
   *
   * @return \Drupal\yandex_yml\YandexYml\Offer\Offer
   *   The object instance.
   */
  public function setPickupOptions(PickupOptions $pickup_options) {
    $this->addElementChild($pickup_options);

    return $this;
  }

}
