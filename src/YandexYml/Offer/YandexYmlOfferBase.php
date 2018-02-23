<?php

namespace Drupal\yandex_yml\YandexYml\Offer;

use Drupal\Component\Utility\Unicode;

/**
 * Base object for other offers.
 */
abstract class YandexYmlOfferBase {

  /**
   * @var string
   */
  protected $id;

  /**
   * @var int
   */
  protected $cbid;

  /**
   * @var int
   */
  protected $bid;

  /**
   * @var int
   */
  protected $fee;

  /**
   * @var bool
   */
  protected $available;

  /**
   * @var string
   */
  protected $url;

  /**
   * @var int
   */
  protected $price;

  /**
   * @var bool
   */
  protected $priceFrom;

  /**
   * @var int
   */
  protected $oldPrice;

  /**
   * @var string
   */
  protected $vat;

  /**
   * @var string
   */
  protected $currencyId;

  /**
   * @var int
   */
  protected $categoryId;

  /**
   * @var string
   */
  protected $picture;

  /**
   * @var bool
   */
  protected $delivery;

  /**
   * @var array of \Drupal\yandex_yml\YandexYml\Delivery\YandexYmlDelivery
   */
  protected $deliveryOptions;

  /**
   * @var bool
   */
  protected $pickup;

  /**
   * @var bool
   */
  protected $store;

  /**
   * @var string
   */
  protected $description;

  /**
   * @var string
   */
  protected $salesNotes;

  /**
   * @var int
   */
  protected $minQuantity;

  /**
   * @var int
   */
  protected $stepQuantity;

  /**
   * @var bool
   */
  protected $manufacturerWarranty;

  /**
   * @var string
   */
  protected $countryOfOrigin;

  /**
   * @var bool
   */
  protected $adult;

  /**
   * @var string
   */
  protected $barcode;

  /**
   * @var int
   */
  protected $cpa;

  /**
   * @var array
   */
  protected $param;

  /**
   * @var string
   */
  protected $expire;

  /**
   * @var float
   */
  protected $weight;

  /**
   * @var string
   */
  protected $dimensions;

  /**
   * @var bool
   */
  protected $downloadable;

  /**
   * @var array
   */
  protected $age;

  /**
   * @var int
   */
  protected $groupId;

  /**
   * @var array
   */
  protected $rec;

  /**
   * Set offer id.
   *
   * Can contain only latin chars and numbers. The limit is 20 chars for id.
   *
   * @param string $id
   *
   * @return YandexYmlOfferBase
   */
  public function setId($id) {
    $this->id = $id;
    return $this;
  }

  /**
   * @return string
   */
  public function getId() {
    return $this->id;
  }

  /**
   * Set click bid for current offer.
   *
   * Value must be in integer, where 80 is equals 0.8 USD;
   *
   * @param int $cbid
   *
   * @return YandexYmlOfferBase
   */
  public function setCbid($cbid) {
    $this->cbid = $cbid;
    return $this;
  }

  /**
   * @return int
   */
  public function getCbid() {
    return $this->cbid;
  }

  /**
   * Set default bid for click.
   *
   * @param mixed $bid
   *
   * @return YandexYmlOfferBase
   */
  public function setBid($bid) {
    $this->bid = $bid;
    return $this;
  }

  /**
   * @return mixed
   */
  public function getBid() {
    return $this->bid;
  }

  /**
   * Set commission for the order on the Yandex.Market.
   *
   * - Value must be integer.
   * - 220 equals 2,2% of offer price.
   * - 1220 equals 12,2% of offer price and so on.
   *
   * @param mixed $fee
   *
   * @return YandexYmlOfferBase
   */
  public function setFee($fee) {
    $this->fee = $fee;
    return $this;
  }

  /**
   * @return mixed
   */
  public function getFee() {
    return $this->fee;
  }

  /**
   * Set availability of the offer.
   *
   * - TRUE - in stock, ready to ship.
   * - FALSE - to order only.
   *
   * @param mixed $available
   *
   * @return YandexYmlOfferBase
   */
  public function setAvailable($available) {
    $this->available = $available;
    return $this;
  }

  /**
   * @return mixed
   */
  public function getAvailable() {
    return $this->available;
  }

  /**
   * Set URL of the offer.
   *
   * - Max length for link is 512 chars.
   * - Cyrillic chars is also allowed.
   *
   * @param mixed $url
   *
   * @return YandexYmlOfferBase
   */
  public function setUrl($url) {
    $this->url = $url;
    return $this;
  }

  /**
   * @return mixed
   */
  public function getUrl() {
    return $this->url;
  }

  /**
   * Set price for offer.
   *
   * @param int $price
   *
   * @return YandexYmlOfferBase
   */
  public function setPrice($price) {
    $this->price = $price;
    return $this;
  }

  /**
   * @return int
   */
  public function getPrice() {
    return $this->price;
  }

  /**
   * Set price type.
   *
   * If set to TRUE, this means the price is from, otherwise price is exact.
   * This only allowed for special categories of the products.
   *
   * @param bool $priceFrom
   *
   * @return YandexYmlOfferBase
   */
  public function setPriceFrom($priceFrom) {
    $this->priceFrom = $priceFrom;
    return $this;
  }

  /**
   * @return bool
   */
  public function isPriceFrom() {
    return $this->priceFrom;
  }

  /**
   * Set old price.
   *
   * Discount will be calculated automatically by Yandex. This value must be
   * lower than price.
   *
   * @param int $oldPrice
   *
   * @return YandexYmlOfferBase
   */
  public function setOldPrice($oldPrice) {
    $this->oldPrice = $oldPrice;
    return $this;
  }

  /**
   * @return int
   */
  public function getOldPrice() {
    return $this->oldPrice;
  }

  /**
   * Set vat formula.
   *
   * - 18%: 1 or VAT_18
   * - 18/118: 3 or VAT_18_118
   * - 10%: 2 or VAT_10
   * - 10/110: 4 or VAT_10_110
   * - 0%: 5 or VAT_0
   * - No vat: 6 or NO_VAT
   *
   * @param mixed $vat
   *
   * @return YandexYmlOfferBase
   */
  public function setVat($vat) {
    $this->vat = $vat;
    return $this;
  }

  /**
   * @return mixed
   */
  public function getVat() {
    return $this->vat;
  }

  /**
   * Set currency for offer.
   *
   * Can be: RUR, USD, EUR, UAH, KZT, BYN.
   * Don't forget to set price in this currency.
   *
   * @param string $currencyId
   *
   * @return YandexYmlOfferBase
   */
  public function setCurrencyId($currencyId) {
    $this->currencyId = $currencyId;
    return $this;
  }

  /**
   * @return string
   */
  public function getCurrencyId() {
    return $this->currencyId;
  }

  /**
   * Set category id.
   *
   * @param int $categoryId
   *
   * @return YandexYmlOfferBase
   */
  public function setCategoryId($categoryId) {
    $this->categoryId = $categoryId;
    return $this;
  }

  /**
   * @return int
   */
  public function getCategoryId() {
    return $this->categoryId;
  }

  /**
   * Set offer picture.
   *
   * @param mixed $picture
   *
   * @return YandexYmlOfferBase
   */
  public function setPicture($picture) {
    $this->picture = $picture;
    return $this;
  }

  /**
   * @return string
   */
  public function getPicture() {
    return $this->picture;
  }

  /**
   * Set the possibility of courier delivery to the region of the store.
   *
   * @param mixed $delivery
   *
   * @return YandexYmlOfferBase
   */
  public function setDelivery($delivery) {
    $this->delivery = $delivery;
    return $this;
  }

  /**
   * @return mixed
   */
  public function getDelivery() {
    return $this->delivery;
  }

  /**
   * Set delivery options.
   *
   * @param mixed $deliveryOptions
   *
   * @return YandexYmlOfferBase
   */
  public function setDeliveryOptions($deliveryOptions) {
    $this->deliveryOptions = $deliveryOptions;
    return $this;
  }

  /**
   * @return mixed
   */
  public function getDeliveryOptions() {
    return $this->deliveryOptions;
  }

  /**
   * Set the possibility of pickup from the issuance points.
   *
   * @param bool $pickup
   *
   * @return YandexYmlOfferBase
   */
  public function setPickup($pickup) {
    $this->pickup = $pickup;
    return $this;
  }

  /**
   * @return bool
   */
  public function isPickup() {
    return $this->pickup;
  }

  /**
   * Set can be this offer bought without order.
   *
   * @param bool $store
   *
   * @return YandexYmlOfferBase
   */
  public function setStore($store) {
    $this->store = $store;
    return $this;
  }

  /**
   * Set description of the product.
   *
   * @param string $description
   *
   * @return YandexYmlOfferBase
   */
  public function setDescription($description) {
    $description = strip_tags($description);
    $description = Unicode::truncate($description, 3000);
    $this->description = strip_tags($description);
    return $this;
  }

  /**
   * @return string
   */
  public function getDescription() {
    return $this->description;
  }

  /**
   * Set sales notes.
   *
   * Can be used for:
   * - Set minimal total for order.
   * - Set minimal quantity for order.
   * - Required prepayment.
   *
   * @param string $salesNotes
   *
   * @return YandexYmlOfferBase
   */
  public function setSalesNotes($salesNotes) {
    $this->salesNotes = Unicode::truncate($salesNotes, 50);
    return $this;
  }

  /**
   * @return string
   */
  public function getSalesNotes() {
    return $this->salesNotes;
  }

  /**
   * Set minimal quantity for order.
   *
   * This value used only in "Tires", "Truck tires", "Motor tires",
   * "Disks (car)".
   *
   * @param int $minQuantity
   *
   * @return YandexYmlOfferBase
   */
  public function setMinQuantity($minQuantity) {
    $this->minQuantity = $minQuantity;
    return $this;
  }

  /**
   * @return int
   */
  public function getMinQuantity() {
    return $this->minQuantity;
  }

  /**
   * Set step for quantity.
   *
   * @param int $stepQuantity
   *
   * @return YandexYmlOfferBase
   */
  public function setStepQuantity($stepQuantity) {
    $this->stepQuantity = $stepQuantity;
    return $this;
  }

  /**
   * @return int
   */
  public function getStepQuantity() {
    return $this->stepQuantity;
  }

  /**
   * Set manufacturer warranty.
   *
   * @param bool $manufacturerWarranty
   *
   * @return YandexYmlOfferBase
   */
  public function setManufacturerWarranty($manufacturerWarranty) {
    $this->manufacturerWarranty = $manufacturerWarranty;
    return $this;
  }

  /**
   * @return bool
   */
  public function isManufacturerWarranty() {
    return $this->manufacturerWarranty;
  }

  /**
   * Set the origin country.
   *
   * @see https://partner.market.yandex.ru/pages/help/Countries.pdf
   *
   * @param string $countryOfOrigin
   *
   * @return YandexYmlOfferBase
   */
  public function setCountryOfOrigin($countryOfOrigin) {
    $this->countryOfOrigin = $countryOfOrigin;
    return $this;
  }

  /**
   * @return string
   */
  public function getCountryOfOrigin() {
    return $this->countryOfOrigin;
  }

  /**
   * Set is product for adult.
   *
   * @param bool $adult
   *
   * @return YandexYmlOfferBase
   */
  public function setAdult($adult) {
    $this->adult = $adult;
    return $this;
  }

  /**
   * @return mixed
   */
  public function getAdult() {
    return $this->adult;
  }

  /**
   * Set barcode for offer.
   *
   * Available barcode standards: EAN-13, EAN-8, UPC-A, UPC-E.
   *
   * @param string $barcode
   *
   * @return YandexYmlOfferBase
   */
  public function setBarcode($barcode) {
    $this->barcode = $barcode;
    return $this;
  }

  /**
   * @return string
   */
  public function getBarcode() {
    return $this->barcode;
  }

  /**
   * Set if product can be sold on Yandex.Market directly.
   *
   * - 1: can be sold on Yandex.Market
   * - 0: can't be sold on Yandex.Market
   *
   * By default Yandex set it to 1.
   *
   * @param int $cpa
   *
   * @return YandexYmlOfferBase
   */
  public function setCpa($cpa) {
    $this->cpa = $cpa;
    return $this;
  }

  /**
   * @return int
   */
  public function getCpa() {
    return $this->cpa;
  }

  /**
   * @param mixed $param
   *
   * @return YandexYmlOfferBase
   */
  public function setParam($name, $value, $unit = NULL) {
    $this->param = ['name' => $name, 'value' => $value, 'unit' => $unit];
    return $this;
  }

  /**
   * @return mixed
   */
  public function getParam() {
    return $this->param;
  }

  /**
   * Set expiry date.
   *
   * Must be in ISO8601 format.
   *
   * - For expiration date / service life — P1Y2M10DT2H30M. 1 year, 2 months, 10
   *   days, 2 hours and 30 minutes.
   * - For expiration date / service life — YYYY-MM-DDThh:mm.
   *
   * @param string $expire
   *
   * @return YandexYmlOfferBase
   */
  public function setExpire($expire) {
    $this->expire = $expire;
    return $this;
  }

  /**
   * @return mixed
   */
  public function getExpire() {
    return $this->expire;
  }

  /**
   * Set weight.
   *
   * @example
   *  - 1
   *  - 2.20
   *  - 0.001
   *
   * @param mixed $weight
   *
   * @return YandexYmlOfferBase
   */
  public function setWeight($weight) {
    $this->weight = $weight;
    return $this;
  }

  /**
   * @return mixed
   */
  public function getWeight() {
    return $this->weight;
  }

  /**
   * Set dimensions.
   *
   * @example
   *  - 1/2/3
   *  - 30/20/20.2
   *
   * @param mixed $dimensions
   *
   * @return YandexYmlOfferBase
   */
  public function setDimensions($dimensions) {
    $this->dimensions = $dimensions;
    return $this;
  }

  /**
   * @return mixed
   */
  public function getDimensions() {
    return $this->dimensions;
  }

  /**
   * Set if product downloadable.
   *
   * @param mixed $downloadable
   *
   * @return YandexYmlOfferBase
   */
  public function setDownloadable($downloadable) {
    $this->downloadable = $downloadable;
    return $this;
  }

  /**
   * @return mixed
   */
  public function getDownloadable() {
    return $this->downloadable;
  }

  /**
   * Set offer age.
   *
   * @param array $age
   *
   * @param string $unit
   *   Can be yar or month.
   *
   * @return YandexYmlOfferBase
   */
  public function setAge($age, $unit = 'year') {
    $this->age = ['age' => $age, 'unit' => $unit];
    return $this;
  }

  /**
   * @return array
   */
  public function getAge() {
    return $this->age;
  }

  /**
   * Set group id.
   *
   * @param int $groupId
   *
   * @return YandexYmlOfferBase
   */
  public function setGroupId($groupId) {
    $this->groupId = $groupId;
    return $this;
  }

  /**
   * @return int
   */
  public function getGroupId() {
    return $this->groupId;
  }

  /**
   * Set id's of recommended products.
   *
   * @param array $rec
   *
   * @return YandexYmlOfferBase
   */
  public function setRec(array $rec) {
    $this->rec = $rec;
    return $this;
  }

  /**
   * @return array
   */
  public function getRec() {
    return $this->rec;
  }

}