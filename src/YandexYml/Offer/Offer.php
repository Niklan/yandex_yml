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
   */
  protected $name;

  /**
   * The product id.
   *
   * @var int|string
   */
  protected $id;

  /**
   * The status of bidding for offer.
   *
   * @var int
   */
  protected $cbid;

  /**
   * The bid amount.
   *
   * @var int|float
   */
  protected $bid;

  /**
   * The fee for order.
   *
   * @var int|float
   */
  protected $fee;

  /**
   * The product status.
   *
   * @var bool
   */
  protected $available;

  /**
   * The product url.
   *
   * @var string
   */
  protected $url;

  /**
   * The product price.
   *
   * @var int|float
   */
  protected $price;

  /**
   * The product price from.
   *
   * @var bool
   *
   * @todo Price must be object than.
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
   */
  protected $oldPrice;

  /**
   * The product vat.
   *
   * @var int|string
   */
  protected $vat;

  /**
   * The product currency id.
   *
   * @var string
   */
  protected $currencyId;

  /**
   * The product category id.
   *
   * @var int
   */
  protected $categoryId;

  /**
   * The product picture.
   *
   * @var string
   */
  protected $picture;

  /**
   * The product delivery.
   *
   * @var bool
   */
  protected $delivery;

  /**
   * The list of delivery options.
   *
   * @var \Drupal\yandex_yml\YandexYml\Delivery\DeliveryOptions
   */
  protected $deliveryOptions;

  /**
   * The product available for pickup.
   *
   * @var bool
   */
  protected $pickup;

  /**
   * The product in stock status.
   *
   * @var bool
   */
  protected $store;

  /**
   * The product description.
   *
   * @var string
   */
  protected $description;

  /**
   * The product sales notes.
   *
   * @var string
   */
  protected $salesNotes;

  /**
   * The product min quantity.
   *
   * @var int|float
   */
  protected $minQuantity;

  /**
   * The product quantity step.
   *
   * @var int|float
   */
  protected $stepQuantity;

  /**
   * The product has manufacturer warranty.
   *
   * @var bool
   */
  protected $manufacturerWarranty;

  /**
   * The product country of origin.
   *
   * @var string
   */
  protected $countryOfOrigin;

  /**
   * The product for adults.
   *
   * @var bool
   */
  protected $adult;

  /**
   * The product barcode.
   *
   * @var string
   */
  protected $barcode;

  /**
   * The product cpa.
   *
   * @var int
   */
  protected $cpa;

  /**
   * The product params.
   *
   * @var \Drupal\yandex_yml\YandexYml\Param\Params
   */
  protected $params;

  /**
   * An expiration date in ISO8601 format.
   *
   * @var string
   */
  protected $expire;

  /**
   * The product weight.
   *
   * @var int|float
   */
  protected $weight;

  /**
   * The product dimensions.
   *
   * @var string
   */
  protected $dimensions;

  /**
   * The product is downloadable.
   *
   * @var bool
   */
  protected $downloadable;

  /**
   * The product age for.
   *
   * @var \Drupal\yandex_yml\YandexYml\Param\Age
   */
  protected $age;

  /**
   * The product group id.
   *
   * @var int
   */
  protected $groupId;

  /**
   * The product vendor.
   *
   * @var string
   */
  protected $vendor;

  /**
   * The product vendor code.
   *
   * @var string
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
   *
   * @YandexYmlXmlAttribute(name = "id")
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
   *
   * @YandexYmlXmlAttribute(name = "cbid")
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
   *
   * @YandexYmlXmlAttribute(name = "bid")
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
   *
   * @YandexYmlXmlAttribute(name = "fee")
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
   *
   * @YandexYmlXmlAttribute(name = "available")
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
   *
   * @YandexYmlXmlElement(name = "url")
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
   *
   * @YandexYmlXmlElement(name = "price")
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
   *
   * @YandexYmlXmlElement(name = "oldprice")
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
   *
   * @YandexYmlXmlElement(name = "vat")
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
   *
   * @YandexYmlXmlElement(name = "currencyId")
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
   *
   * @YandexYmlXmlElement(name = "categoryId")
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
   *
   * @YandexYmlXmlElement(name = "picture")
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
   *
   * @YandexYmlXmlElement(name = "delivery")
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
   *
   * @YandexYmlXmlElementWrapper(name = "delivery-options")
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
   *
   * @YandexYmlXmlElement(name = "pickup")
   */
  public function getPickup() {
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
   * {@inheritDoc}
   *
   * @todo interface
   *
   * @YandexYmlXmlElement(name = "store")
   */
  public function getStore() {
    return $this->store;
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
   *
   * @YandexYmlXmlElement(name = "description")
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
   *
   * @YandexYmlXmlElement(name = "sales_notes")
   */
  public function getSalesNotes() {
    return $this->salesNotes;
  }

  /**
   * {@inheritdoc}
   */
  public function setSalesNotes($sales_notes) {
    if (mb_strlen($sales_notes) > 50) {
      throw new \InvalidArgumentException('The sales notes must be lower than 50 chars.');
    }

    $this->salesNotes = $sales_notes;

    return $this;
  }

  /**
   * {@inheritdoc}
   *
   * @YandexYmlXmlElement(name = "min-quantity")
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
   *
   * @YandexYmlXmlElement(name = "step-quantity")
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
   *
   * @YandexYmlXmlElement(name = "manufacturer_warranty")
   */
  public function getManufacturerWarranty() {
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
   *
   * @YandexYmlXmlElement(name = "country_of_origin")
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
   *
   * @YandexYmlXmlElement(name = "adult")
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
   *
   * @YandexYmlXmlElement(name = "barcode")
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
   *
   * @YandexYmlXmlElement(name = "cpa")
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
   *
   * @YandexYmlXmlList()
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
   *
   * @YandexYmlXmlElement(name = "expire")
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
   *
   * @YandexYmlXmlElement(name = "weight")
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
   *
   * @YandexYmlXmlElement(name = "dimensions")
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
   *
   * @YandexYmlXmlElement(name = "downloadable")
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
   *
   * @YandexYmlXmlElement(name = "age")
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
   *
   * @YandexYmlXmlElement(name = "group-id")
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
   *
   * @YandexYmlXmlElement(name = "name")
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
   *
   * @YandexYmlXmlElement(name = "vendor")
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
   *
   * @YandexYmlXmlElement(name = "vendorCode")
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
