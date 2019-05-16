<?php

namespace Drupal\yandex_yml\YandexYml\Offer;

use Drupal;
use Drupal\Component\Utility\Unicode;
use Drupal\yandex_yml\Annotation\YandexYmlXmlAttribute;
use Drupal\yandex_yml\Annotation\YandexYmlXmlElement;
use Drupal\yandex_yml\Annotation\YandexYmlXmlElementWrapper;
use Drupal\yandex_yml\Annotation\YandexYmlXmlList;
use Drupal\yandex_yml\Annotation\YandexYmlXmlValue;
use Drupal\yandex_yml\YandexYml\Delivery\DeliveryOptions;
use Drupal\yandex_yml\YandexYml\Param\Params;

/**
 * Base object for other offers.
 *
 * @see https://yandex.ru/support/partnermarket/offers.html
 */
abstract class Offer implements OfferInterface {

  /**
   * The product name.
   *
   * @var string
   *
   * @YandexYmlXmlElement()
   */
  protected $name;

  /**
   * The product id.
   *
   * @var int|string
   *
   * @YandexYmlXmlAttribute()
   */
  protected $id;

  /**
   * The status of bidding for offer.
   *
   * @var int
   *
   * @YandexYmlXmlAttribute()
   */
  protected $cbid;

  /**
   * The bid amount.
   *
   * @var int|float
   *
   * @YandexYmlXmlAttribute()
   */
  protected $bid;

  /**
   * The fee for order.
   *
   * @var int|float
   *
   * @YandexYmlXmlAttribute()
   */
  protected $fee;

  /**
   * The product status.
   *
   * @var bool
   *
   * @YandexYmlXmlAttribute()
   */
  protected $available;

  /**
   * The product url.
   *
   * @var string
   *
   * @YandexYmlXmlElement()
   */
  protected $url;

  /**
   * The product price.
   *
   * @var int|float
   *
   * @YandexYmlXmlElement()
   */
  protected $price;

  /**
   * The product price from.
   *
   * @var bool
   *
   * @YandexYmlXmlAttribute(
   *   name = "from",
   *   targetElement = "price"
   * )
   */
  protected $priceFrom;

  /**
   * The product old price.
   *
   * @var int|float
   *
   * @YandexYmlXmlElement(
   *   name = "oldprice"
   * )
   */
  protected $oldPrice;

  /**
   * The product vat.
   *
   * @var int|string
   *
   * @YandexYmlXmlElement()
   */
  protected $vat;

  /**
   * The product currency id.
   *
   * @var string
   *
   * @YandexYmlXmlElement()
   */
  protected $currencyId;

  /**
   * The product category id.
   *
   * @var int
   *
   * @YandexYmlXmlElement()
   */
  protected $categoryId;

  /**
   * The product picture.
   *
   * @var string
   *
   * @YandexYmlXmlElement()
   */
  protected $picture;

  /**
   * The product delivery.
   *
   * @var bool
   *
   * @YandexYmlXmlElement()
   */
  protected $delivery;

  /**
   * The list of delivery options.
   *
   * @var \Drupal\yandex_yml\YandexYml\Delivery\DeliveryOptions
   *
   * @YandexYmlXmlElementWrapper(name = "delivery-options")
   */
  protected $deliveryOptions;

  /**
   * The product available for pickup.
   *
   * @var bool
   *
   * @YandexYmlXmlElement()
   */
  protected $pickup;

  /**
   * The product in stock status.
   *
   * @var bool
   *
   * @YandexYmlXmlElement()
   */
  protected $store;

  /**
   * The product description.
   *
   * @var string
   *
   * @YandexYmlXmlElement()
   */
  protected $description;

  /**
   * The product sales notes.
   *
   * @var string
   *
   * @YandexYmlXmlElement(
   *   name = "sales_notes"
   * )
   */
  protected $salesNotes;

  /**
   * The product min quantity.
   *
   * @var int|float
   *
   * @YandexYmlXmlElement(
   *   name = "min-quantity"
   * )
   */
  protected $minQuantity;

  /**
   * The product quantity step.
   *
   * @var int|float
   *
   * @YandexYmlXmlElement(
   *   name = "step-quantity"
   * )
   */
  protected $stepQuantity;

  /**
   * The product has manufacturer warranty.
   *
   * @var bool
   *
   * @YandexYmlXmlElement(
   *   name = "manufacturer_warranty"
   * )
   */
  protected $manufacturerWarranty;

  /**
   * The product country of origin.
   *
   * @var string
   *
   * @YandexYmlXmlElement(
   *   name = "country_of_origin"
   * )
   */
  protected $countryOfOrigin;

  /**
   * The product for adults.
   *
   * @var bool
   *
   * @YandexYmlXmlElement()
   */
  protected $adult;

  /**
   * The product barcode.
   *
   * @var string
   *
   * @YandexYmlXmlElement()
   */
  protected $barcode;

  /**
   * The product cpa.
   *
   * @var int
   *
   * @YandexYmlXmlElement()
   */
  protected $cpa;

  /**
   * The product params.
   *
   * @var \Drupal\yandex_yml\YandexYml\Param\Params
   *
   * @YandexYmlXmlList()
   */
  protected $params;

  /**
   * The product expiration date.
   *
   * @var string
   *   An expiration date in ISO8601 format.
   *
   * @YandexYmlXmlElement()
   */
  protected $expire;

  /**
   * The product weight.
   *
   * @var int|float
   *
   * @YandexYmlXmlElement()
   */
  protected $weight;

  /**
   * The product dimensions.
   *
   * @var string
   *
   * @YandexYmlXmlElement()
   */
  protected $dimensions;

  /**
   * The product is downloadable.
   *
   * @var bool
   *
   * @YandexYmlXmlElement()
   */
  protected $downloadable;

  /**
   * The product age for.
   *
   * @var \Drupal\yandex_yml\YandexYml\Param\Age
   *
   * @YandexYmlXmlElement()
   */
  protected $age;

  /**
   * The product group id.
   *
   * @var int
   *
   * @YandexYmlXmlElement(name = "group-id")
   */
  protected $groupId;

  /**
   * The product vendor.
   *
   * @var string
   *
   * @YandexYmlXmlElement()
   */
  protected $vendor;

  /**
   * The product vendor code.
   *
   * @var string
   *
   * @YandexYmlXmlElement()
   */
  protected $vendorCode;

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
   */
  public function __construct($id, $url, $price, $currency_id, $category_id) {
    $this->setId($id);
    $this->setUrl($url);
    $this->setPrice($price);
    $this->setCurrencyId($currency_id);
    $this->setCategoryId($category_id);
  }

  /**
   * {@inheritdoc}
   */
  public function getId() {
    return $this->id;
  }

  /**
   * Sets product id.
   *
   * @param string $id
   *   The product id.
   *
   * @return \Drupal\yandex_yml\YandexYml\Offer\OfferInterface
   *   The current offer.
   * @see https://yandex.ru/support/partnermarket/elements/id-type-available.html
   *
   */
  protected function setId($id) {
    $this->id = $id;

    return $this;
  }

  /**
   * {@inheritdoc}
   */
  public function getCbid() {
    return $this->cbid;
  }

  /**
   * {@inheritdoc}
   */
  public function setCbid($cbid) {
    $this->cbid = $cbid;

    return $this;
  }

  /**
   * {@inheritdoc}
   */
  public function getBid() {
    return $this->bid;
  }

  /**
   * {@inheritdoc}
   */
  public function setBid($bid) {
    $this->bid = $bid;

    return $this;
  }

  /**
   * {@inheritdoc}
   */
  public function getFee() {
    return $this->fee;
  }

  /**
   * {@inheritdoc}
   */
  public function setFee($fee) {
    $this->fee = $fee;

    return $this;
  }

  /**
   * {@inheritdoc}
   */
  public function getAvailable() {
    return $this->available;
  }

  /**
   * {@inheritdoc}
   */
  public function setAvailable($available) {
    $this->available = $available;

    return $this;
  }

  /**
   * {@inheritdoc}
   */
  public function getUrl() {
    return $this->url;
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
    $this->url = $url;

    return $this;
  }

  /**
   * {@inheritdoc}
   */
  public function getPrice() {
    return $this->price;
  }

  /**
   * Sets product price.
   *
   * @param int|float $price
   *   The product unit price.
   *
   * @return \Drupal\yandex_yml\YandexYml\Offer\OfferInterface
   *   The current offer.
   */
  protected function setPrice($price) {
    $this->price = $price;

    return $this;
  }

  /**
   * {@inheritdoc}
   */
  public function isPriceFrom() {
    return $this->priceFrom;
  }

  /**
   * {@inheritdoc}
   */
  public function setPriceFrom($price_from) {
    $this->priceFrom = $price_from;

    return $this;
  }

  /**
   * {@inheritdoc}
   */
  public function getOldPrice() {
    return $this->oldPrice;
  }

  /**
   * {@inheritdoc}
   */
  public function setOldPrice($old_price) {
    $this->oldPrice = $old_price;

    return $this;
  }

  /**
   * {@inheritdoc}
   */
  public function getVat() {
    return $this->vat;
  }

  /**
   * {@inheritdoc}
   */
  public function setVat($vat) {
    $this->vat = $vat;

    return $this;
  }

  /**
   * {@inheritdoc}
   */
  public function getCurrencyId() {
    return $this->currencyId;
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
    $this->currencyId = $currency_id;

    return $this;
  }

  /**
   * {@inheritdoc}
   */
  public function getCategoryId() {
    return $this->categoryId;
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
    $this->categoryId = $category_id;

    return $this;
  }

  /**
   * {@inheritdoc}
   */
  public function getPicture() {
    return $this->picture;
  }

  /**
   * {@inheritdoc}
   */
  public function setPicture($picture) {
    $this->picture = $picture;

    return $this;
  }

  /**
   * {@inheritdoc}
   */
  public function getDelivery() {
    return $this->delivery;
  }

  /**
   * {@inheritdoc}
   */
  public function setDelivery($delivery) {
    $this->delivery = $delivery;

    return $this;
  }

  /**
   * {@inheritdoc}
   */
  public function getDeliveryOptions() {
    return $this->deliveryOptions;
  }

  /**
   * {@inheritdoc}
   */
  public function setDeliveryOptions(DeliveryOptions $delivery_options) {
    $this->deliveryOptions = $delivery_options;

    return $this;
  }

  /**
   * {@inheritdoc}
   */
  public function isPickup() {
    return $this->pickup;
  }

  /**
   * {@inheritdoc}
   */
  public function setPickup($pickup) {
    $this->pickup = $pickup;

    return $this;
  }

  /**
   * {@inheritdoc}
   */
  public function setStore($store) {
    $this->store = $store;

    return $this;
  }

  /**
   * {@inheritdoc}
   */
  public function getDescription() {
    return $this->description;
  }

  /**
   * {@inheritdoc}
   */
  public function setDescription($description) {
    $description = Unicode::truncate($description, 3000);
    $this->description = $description;

    return $this;
  }

  /**
   * {@inheritdoc}
   */
  public function getSalesNotes() {
    return $this->salesNotes;
  }

  /**
   * {@inheritdoc}
   */
  public function setSalesNotes($sales_notes) {
    $this->salesNotes = Unicode::truncate($sales_notes, 50);

    return $this;
  }

  /**
   * {@inheritdoc}
   */
  public function getMinQuantity() {
    return $this->minQuantity;
  }

  /**
   * {@inheritdoc}
   */
  public function setMinQuantity($min_quantity) {
    $this->minQuantity = $min_quantity;

    return $this;
  }

  /**
   * {@inheritdoc}
   */
  public function getStepQuantity() {
    return $this->stepQuantity;
  }

  /**
   * {@inheritdoc}
   */
  public function setStepQuantity($step_quantity) {
    $this->stepQuantity = $step_quantity;

    return $this;
  }

  /**
   * {@inheritdoc}
   */
  public function isManufacturerWarranty() {
    return $this->manufacturerWarranty;
  }

  /**
   * {@inheritdoc}
   */
  public function setManufacturerWarranty($manufacturer_warranty) {
    $this->manufacturerWarranty = $manufacturer_warranty;

    return $this;
  }

  /**
   * {@inheritdoc}
   */
  public function getCountryOfOrigin() {
    return $this->countryOfOrigin;
  }

  /**
   * {@inheritdoc}
   */
  public function setCountryOfOrigin($countryOfOrigin) {
    $this->countryOfOrigin = $countryOfOrigin;

    return $this;
  }

  /**
   * {@inheritdoc}
   */
  public function getAdult() {
    return $this->adult;
  }

  /**
   * {@inheritdoc}
   */
  public function setAdult($adult) {
    $this->adult = $adult;

    return $this;
  }

  /**
   * {@inheritdoc}
   */
  public function getBarcode() {
    return $this->barcode;
  }

  /**
   * {@inheritdoc}
   */
  public function setBarcode($barcode) {
    $this->barcode = $barcode;

    return $this;
  }

  /**
   * {@inheritdoc}
   */
  public function getCpa() {
    return $this->cpa;
  }

  /**
   * {@inheritdoc}
   */
  public function setCpa($cpa) {
    $this->cpa = $cpa;

    return $this;
  }

  /**
   * {@inheritdoc}
   */
  public function getParams() {
    return $this->params;
  }

  /**
   * {@inheritdoc}
   */
  public function setParams(Params $params) {
    $this->params = $params;

    return $this;
  }

  /**
   * {@inheritdoc}
   */
  public function getExpire() {
    return $this->expire;
  }

  /**
   * {@inheritdoc}
   */
  public function setExpire($expire) {
    $this->expire = $expire;

    return $this;
  }

  /**
   * {@inheritdoc}
   */
  public function getWeight() {
    return $this->weight;
  }

  /**
   * {@inheritdoc}
   */
  public function setWeight($weight) {
    $this->weight = $weight;

    return $this;
  }

  /**
   * {@inheritdoc}
   */
  public function getDimensions() {
    return $this->dimensions;
  }

  /**
   * {@inheritdoc}
   */
  public function setDimensions($dimensions) {
    $this->dimensions = $dimensions;

    return $this;
  }

  /**
   * {@inheritdoc}
   */
  public function getDownloadable() {
    return $this->downloadable;
  }

  /**
   * {@inheritdoc}
   */
  public function setDownloadable($downloadable) {
    $this->downloadable = $downloadable;

    return $this;
  }

  /**
   * {@inheritdoc}
   */
  public function getAge() {
    return $this->age;
  }

  /**
   * {@inheritdoc}
   */
  public function setAge($age) {
    $this->age = $age;

    return $this;
  }

  /**
   * {@inheritdoc}
   */
  public function getGroupId() {
    return $this->groupId;
  }

  /**
   * {@inheritdoc}
   */
  public function setGroupId($group_id) {
    $this->groupId = $group_id;

    return $this;
  }

  /**
   * {@inheritdoc}
   */
  public function getName() {
    return $this->name;
  }

  /**
   * {@inheritdoc}
   */
  public function setName($name) {
    $this->name = $name;

    return $this;
  }

  /**
   * {@inheritdoc}
   */
  public function getVendor() {
    return $this->vendor;
  }

  /**
   * {@inheritdoc}
   */
  public function setVendor($vendor) {
    $this->vendor = $vendor;

    return $this;
  }

  /**
   * {@inheritdoc}
   */
  public function getVendorCode() {
    return $this->vendorCode;
  }

  /**
   * {@inheritdoc}
   */
  public function setVendorCode($vendor_code) {
    $this->vendorCode = $vendor_code;

    return $this;
  }

}
