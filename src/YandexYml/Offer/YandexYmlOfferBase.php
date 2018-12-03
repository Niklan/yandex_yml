<?php

namespace Drupal\yandex_yml\YandexYml\Offer;

use Drupal\Component\Utility\Unicode;
use Drupal\yandex_yml\Annotation\YandexYmlAttribute;
use Drupal\yandex_yml\Annotation\YandexYmlElement;
use Drupal\yandex_yml\Annotation\YandexYmlElementWrapper;
use Drupal\yandex_yml\Annotation\YandexYmlElementWrapperAttribute;
use Drupal\yandex_yml\YandexYml\YandexYmlToArrayTrait;

/**
 * Base object for other offers.
 *
 * @see https://yandex.ru/support/partnermarket/offers.html
 */
abstract class YandexYmlOfferBase implements YandexYmlOfferBaseInterface {

  use YandexYmlToArrayTrait;

  /**
   * The product name.
   *
   * @var string
   *
   * @YandexYmlElementWrapper()
   */
  protected $name;

  /**
   * The product id.
   *
   * @var int|string
   *
   * @YandexYmlAttribute()
   */
  protected $id;

  /**
   * The status of bidding for offer.
   *
   * @var int
   *
   * @YandexYmlAttribute()
   */
  protected $cbid;

  /**
   * The bid amount.
   *
   * @var int|float
   *
   * @YandexYmlAttribute()
   */
  protected $bid;

  /**
   * The fee for order.
   *
   * @var int|float
   *
   * @YandexYmlAttribute()
   */
  protected $fee;

  /**
   * The product status.
   *
   * @var bool
   *
   * @YandexYmlAttribute()
   */
  protected $available;

  /**
   * The product url.
   *
   * @var string
   *
   * @YandexYmlElementWrapper()
   */
  protected $url;

  /**
   * The product price.
   *
   * @var int|float
   *
   * @YandexYmlElementWrapper()
   */
  protected $price;

  /**
   * The product price from.
   *
   * @var bool
   *
   * @YandexYmlElementWrapperAttribute(
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
   * @YandexYmlElementWrapper(
   *   name = "oldprice"
   * )
   */
  protected $oldPrice;

  /**
   * The product vat.
   *
   * @var int|string
   *
   * @YandexYmlElementWrapper()
   */
  protected $vat;

  /**
   * The product currency id.
   *
   * @var string
   *
   * @YandexYmlElementWrapper()
   */
  protected $currencyId;

  /**
   * The product category id.
   *
   * @var int
   *
   * @YandexYmlElementWrapper()
   */
  protected $categoryId;

  /**
   * The product picture.
   *
   * @var string
   *
   * @YandexYmlElementWrapper()
   */
  protected $picture;

  /**
   * The product delivery.
   *
   * @var bool
   *
   * @YandexYmlElementWrapper()
   */
  protected $delivery;

  /**
   * The product delivery options.
   *
   * @var \Drupal\yandex_yml\YandexYml\Delivery\YandexYmlDelivery[]
   *
   * @YandexYmlElementWrapper(
   *   name = "delivery-options"
   * )
   */
  protected $deliveryOptions;

  /**
   * The product available for pickup.
   *
   * @var bool
   *
   * @YandexYmlElementWrapper()
   */
  protected $pickup;

  /**
   * The product in stock status.
   *
   * @var bool
   *
   * @YandexYmlElementWrapper()
   */
  protected $store;

  /**
   * The product description.
   *
   * @var string
   *
   * @YandexYmlElementWrapper()
   */
  protected $description;

  /**
   * The product sales notes.
   *
   * @var string
   *
   * @YandexYmlElementWrapper(
   *   name = "sales_notes"
   * )
   */
  protected $salesNotes;

  /**
   * The product min quantity.
   *
   * @var int|float
   *
   * @YandexYmlElementWrapper(
   *   name = "min-quantity"
   * )
   */
  protected $minQuantity;

  /**
   * The product quantity step.
   *
   * @var int|float
   *
   * @YandexYmlElementWrapper(
   *   name = "step-quantity"
   * )
   */
  protected $stepQuantity;

  /**
   * The product has manufacturer warranty.
   *
   * @var bool
   *
   * @YandexYmlElementWrapper(
   *   name = "manufacturer_warranty"
   * )
   */
  protected $manufacturerWarranty;

  /**
   * The product country of origin.
   *
   * @var string
   *
   * @YandexYmlElementWrapper(
   *   name = "country_of_origin"
   * )
   */
  protected $countryOfOrigin;

  /**
   * The product for adults.
   *
   * @var bool
   *
   * @YandexYmlElementWrapper()
   */
  protected $adult;

  /**
   * The product barcode.
   *
   * @var string
   *
   * @YandexYmlElementWrapper()
   */
  protected $barcode;

  /**
   * The product cpa.
   *
   * @var int
   *
   * @YandexYmlElementWrapper()
   */
  protected $cpa;

  /**
   * The product params.
   *
   * @var \Drupal\yandex_yml\YandexYml\Param\YandexYmlParam[]
   *
   * @YandexYmlElement()
   */
  protected $param;

  /**
   * The product expiration date.
   *
   * @var string
   *   An expiration date in ISO8601 format.
   *
   * @YandexYmlElementWrapper()
   */
  protected $expire;

  /**
   * The product weight.
   *
   * @var int|float
   *
   * @YandexYmlElementWrapper()
   */
  protected $weight;

  /**
   * The product dimensions.
   *
   * @var string
   *
   * @YandexYmlElementWrapper()
   */
  protected $dimensions;

  /**
   * The product is downloadable.
   *
   * @var bool
   *
   * @YandexYmlElementWrapper()
   */
  protected $downloadable;

  /**
   * The product age for.
   *
   * @var \Drupal\yandex_yml\YandexYml\Param\YandexYmlAge
   *
   * @YandexYmlElement()
   */
  protected $age;

  /**
   * The product group id.
   *
   * @var int
   *
   * @YandexYmlElementWrapper(
   *   name = "group-id"
   * )
   */
  protected $groupId;

  /**
   * The product recommendations.
   *
   * @var int[]
   *
   * @YandexYmlElementWrapper()
   */
  protected $rec;

  /**
   * The product vendor.
   *
   * @var string
   *
   * @YandexYmlElementWrapper()
   */
  protected $vendor;

  /**
   * The product vendor code.
   *
   * @var string
   *
   * @YandexYmlElementWrapper()
   */
  protected $vendorCode;

  /**
   * {@inheritdoc}
   */
  public function setId($id) {
    $this->id = $id;
    return $this;
  }

  /**
   * {@inheritdoc}
   */
  public function getId() {
    return $this->id;
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
  public function getCbid() {
    return $this->cbid;
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
  public function getBid() {
    return $this->bid;
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
  public function getFee() {
    return $this->fee;
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
  public function getAvailable() {
    return $this->available;
  }

  /**
   * {@inheritdoc}
   */
  public function setUrl($url) {
    $this->url = $url;
    return $this;
  }

  /**
   * {@inheritdoc}
   */
  public function getUrl() {
    return $this->url;
  }

  /**
   * {@inheritdoc}
   */
  public function setPrice($price) {
    $this->price = $price;
    return $this;
  }

  /**
   * {@inheritdoc}
   */
  public function getPrice() {
    return $this->price;
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
  public function isPriceFrom() {
    return $this->priceFrom;
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
  public function getOldPrice() {
    return $this->oldPrice;
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
  public function getVat() {
    return $this->vat;
  }

  /**
   * {@inheritdoc}
   */
  public function setCurrencyId($currency_id) {
    $this->currencyId = $currency_id;
    return $this;
  }

  /**
   * {@inheritdoc}
   */
  public function getCurrencyId() {
    return $this->currencyId;
  }

  /**
   * {@inheritdoc}
   */
  public function setCategoryId($category_id) {
    $this->categoryId = $category_id;
    return $this;
  }

  /**
   * {@inheritdoc}
   */
  public function getCategoryId() {
    return $this->categoryId;
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
  public function getPicture() {
    return $this->picture;
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
  public function getDelivery() {
    return $this->delivery;
  }

  /**
   * {@inheritdoc}
   */
  public function setDeliveryOptions(array $delivery_options) {
    $this->deliveryOptions = $delivery_options;
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
  public function setPickup($pickup) {
    $this->pickup = $pickup;
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
  public function setStore($store) {
    $this->store = $store;
    return $this;
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
  public function getDescription() {
    return $this->description;
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
  public function getSalesNotes() {
    return $this->salesNotes;
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
  public function getMinQuantity() {
    return $this->minQuantity;
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
  public function getStepQuantity() {
    return $this->stepQuantity;
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
  public function isManufacturerWarranty() {
    return $this->manufacturerWarranty;
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
  public function getCountryOfOrigin() {
    return $this->countryOfOrigin;
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
  public function getAdult() {
    return $this->adult;
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
  public function getBarcode() {
    return $this->barcode;
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
  public function getCpa() {
    return $this->cpa;
  }

  /**
   * {@inheritdoc}
   */
  public function setParam($name, $value, $unit = NULL) {
    $param = \Drupal::service('yandex_yml.param')
      ->setName($name)
      ->setValue($value);

    if ($unit) {
      $param->setUnit($unit);
    }
    $this->param[] = $param;
    return $this;
  }

  /**
   * {@inheritdoc}
   */
  public function getParam() {
    return $this->param;
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
  public function getExpire() {
    return $this->expire;
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
  public function getWeight() {
    return $this->weight;
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
  public function getDimensions() {
    return $this->dimensions;
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
  public function getDownloadable() {
    return $this->downloadable;
  }

  /**
   * {@inheritdoc}
   */
  public function setAge($age, $unit = 'year') {
    /** @var \Drupal\yandex_yml\YandexYml\Param\YandexYmlAge $param_age */
    $param_age = \Drupal::service('yandex_yml.param.age');
    $param_age->setValue($age);
    if (!empty($unit)) {
      $param_age->setUnit($unit);
    }
    $this->age[] = $param_age;
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
  public function setGroupId($group_id) {
    $this->groupId = $group_id;
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
  public function setRec(array $rec) {
    $this->rec = implode(',', $rec);
    return $this;
  }

  /**
   * {@inheritdoc}
   */
  public function getRec() {
    return explode(',', $this->rec);
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
  public function getName() {
    return $this->name;
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
  public function getVendor() {
    return $this->vendor;
  }

  /**
   * {@inheritdoc}
   */
  public function setVendorCode($vendor_code) {
    $this->vendorCode = $vendor_code;
    return $this;
  }

  /**
   * {@inheritdoc}
   */
  public function getVendorCode() {
    return $this->vendorCode;
  }

}
