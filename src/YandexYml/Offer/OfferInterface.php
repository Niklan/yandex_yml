<?php

namespace Drupal\yandex_yml\YandexYml\Offer;

use Drupal\yandex_yml\YandexYml\Delivery\DeliveryOptions;
use Drupal\yandex_yml\YandexYml\Param\Params;

/**
 * Defines interface with common methods for all Yandex yml offers.
 */
interface OfferInterface {

  /**
   * Gets product id.
   *
   * @return string
   *   The product id.
   */
  public function getId();

  /**
   * Sets click bid.
   *
   * @param int $cbid
   *   The bid amount. 80 = 0.8 USD.
   *
   * @see https://yandex.ru/support/partnermarket/elements/bid-cbid.html
   *
   * @return \Drupal\yandex_yml\YandexYml\Offer\OfferInterface
   *   The current offer.
   */
  public function setCbid($cbid);

  /**
   * Gets click bid.
   *
   * @return int
   *   The bid amount.
   */
  public function getCbid();

  /**
   * Sets default bid for click.
   *
   * @param int $bid
   *   The bid amount. 80 = 0.8 USD.
   *
   * @see https://yandex.ru/support/partnermarket/elements/bid-cbid.html
   *
   * @return \Drupal\yandex_yml\YandexYml\Offer\OfferInterface
   *   The current offer.
   */
  public function setBid($bid);

  /**
   * Gets default bid.
   *
   * @return int
   *   The bid amount.
   */
  public function getBid();

  /**
   * Sets commissions for the order on Yandex.Market.
   *
   * Values sets as integer, but then convert to percentages where:
   *   - 220 equals 2,2% of offer price.
   *   - 1220 equals 12,2% of offer price.
   *
   * @param int $fee
   *   The fee amount.
   *
   * @return \Drupal\yandex_yml\YandexYml\Offer\OfferInterface
   *   The current offer.
   */
  public function setFee($fee);

  /**
   * Gets product fee.
   *
   * @return int
   *   The fee amount.
   */
  public function getFee();

  /**
   * Sets product availability.
   *
   * @param bool $available
   *   The availability status.
   *
   * @see https://yandex.ru/support/partnermarket/elements/id-type-available.html
   *
   * @return \Drupal\yandex_yml\YandexYml\Offer\OfferInterface
   *   The current offer.
   */
  public function setAvailable($available);

  /**
   * Gets product availability.
   *
   * @return bool
   *   The availability status.
   */
  public function getAvailable();

  /**
   * Gets product url.
   *
   * @return string
   *   The product url.
   */
  public function getUrl();

  /**
   * Gets product price.
   *
   * @return int|float
   *   The product unit price.
   */
  public function getPrice();

  /**
   * Sets flag price from.
   *
   * If set to TRUE, this means the price is from, otherwise price is exact.
   * This only allowed for special categories of the products.
   *
   * @param bool $price_from
   *   The product price from status.
   *
   * @return \Drupal\yandex_yml\YandexYml\Offer\OfferInterface
   *   The current offer.
   */
  public function setPriceFrom($price_from);

  /**
   * Gets price from status.
   *
   * @return bool
   *   THe product price from status.
   */
  public function isPriceFrom();

  /**
   * Sets old price.
   *
   * @param int $old_price
   *   The old price.
   *
   * @see https://yandex.ru/support/partnermarket/elements/oldprice.html
   *
   * @return \Drupal\yandex_yml\YandexYml\Offer\OfferInterface
   *   The current offer.
   */
  public function setOldPrice($old_price);

  /**
   * Gets the old price.
   *
   * @return int
   *   The old price.
   */
  public function getOldPrice();

  /**
   * Sets vat formula type.
   *
   * Available values:
   * - 18%: 1 or VAT_18
   * - 18/118: 3 or VAT_18_118
   * - 10%: 2 or VAT_10
   * - 10/110: 4 or VAT_10_110
   * - 0%: 5 or VAT_0
   * - No vat: 6 or NO_VAT.
   *
   * @param int|string $vat
   *   The formula type.
   *
   * @see https://yandex.ru/support/partnermarket/elements/vat.html
   *
   * @return \Drupal\yandex_yml\YandexYml\Offer\OfferInterface
   *   The current offer.
   */
  public function setVat($vat);

  /**
   * Gets vat formula.
   *
   * @return int|string
   *   The formula type.
   */
  public function getVat();

  /**
   * Gets currency id.
   *
   * @return string
   *   The currency id.
   */
  public function getCurrencyId();

  /**
   * Gets category id.
   *
   * @return int
   *   The category id.
   */
  public function getCategoryId();

  /**
   * Sets offer picture.
   *
   * @param mixed $picture
   *   The picture url.
   *
   * @see https://yandex.ru/support/partnermarket/offers.html
   *
   * @return \Drupal\yandex_yml\YandexYml\Offer\OfferInterface
   *   The current offer.
   */
  public function setPicture($picture);

  /**
   * Gets picture url.
   *
   * @return mixed
   *   The picture url.
   */
  public function getPicture();

  /**
   * Sets delivery.
   *
   * @param mixed $delivery
   *   The delivery status.
   *
   * @see https://yandex.ru/support/partnermarket/elements/delivery.html
   *
   * @return \Drupal\yandex_yml\YandexYml\Offer\OfferInterface
   *   The current offer.
   */
  public function setDelivery($delivery);

  /**
   * Gets delivery status.
   *
   * @return mixed
   *   The delivery status.
   */
  public function getDelivery();

  /**
   * Sets delivery options.
   *
   * @param \Drupal\yandex_yml\YandexYml\Delivery\DeliveryOptions $delivery_options
   *   The delivery options.
   *
   * @return \Drupal\yandex_yml\YandexYml\Offer\OfferInterface
   *   The current offer.
   */
  public function setDeliveryOptions(DeliveryOptions $delivery_options);

  /**
   * Gets delivery options.
   *
   * @return \Drupal\yandex_yml\YandexYml\Delivery\DeliveryOption[]
   *   The delivery options.
   */
  public function getDeliveryOptions();

  /**
   * Sets possibility of pickup from the issuance points.
   *
   * @param bool $pickup
   *   The pickup possibility.
   *
   * @see https://yandex.ru/support/partnermarket/elements/delivery.html
   *
   * @return \Drupal\yandex_yml\YandexYml\Offer\OfferInterface
   *   The current offer.
   */
  public function setPickup($pickup);

  /**
   * Gets pickup possibility.
   *
   * @return bool
   *   The pickup possibillity.
   */
  public function isPickup();

  /**
   * Sets possibility to buy without ordering.
   *
   * @param bool $store
   *   The possibility value.
   *
   * @see https://yandex.ru/support/partnermarket/elements/delivery.html
   *
   * @return \Drupal\yandex_yml\YandexYml\Offer\OfferInterface
   *   The current offer.
   */
  public function setStore($store);

  /**
   * Sets description of the offer.
   *
   * @param string $description
   *   The description.
   *
   * @see https://yandex.ru/support/partnermarket/elements/description.html
   *
   * @return \Drupal\yandex_yml\YandexYml\Offer\OfferInterface
   *   The current offer.
   */
  public function setDescription($description);

  /**
   * Gets description.
   *
   * @return string
   *   The offer description.
   */
  public function getDescription();

  /**
   * Sets sales notes.
   *
   * Can be used for:
   * - Set minimal total for order.
   * - Set minimal quantity for order.
   * - Required prepayment.
   *
   * Max length is 50 chars. Will be truncated if longer.
   *
   * @param string $sales_notes
   *   The sales notes.
   *
   * @see https://yandex.ru/support/partnermarket/elements/sales_notes.html
   *
   * @return \Drupal\yandex_yml\YandexYml\Offer\OfferInterface
   *   The current offer.
   */
  public function setSalesNotes($sales_notes);

  /**
   * Gets sales notes.
   *
   * @return string
   *   The sale notes.
   */
  public function getSalesNotes();

  /**
   * Sets minimal quantity for order.
   *
   * This value used only in "Tires", "Truck tires", "Motor tires",
   * "Disks (car)".
   *
   * @param int|float $min_quantity
   *   The minimum order quantity.
   *
   * @return \Drupal\yandex_yml\YandexYml\Offer\OfferInterface
   *   The current offer.
   */
  public function setMinQuantity($min_quantity);

  /**
   * Gets minimum order quantity.
   *
   * @return int|float
   *   The minimum order quantity.
   */
  public function getMinQuantity();

  /**
   * Sets step for quantity.
   *
   * @param int|float $step_quantity
   *   The step quantity.
   *
   * @return \Drupal\yandex_yml\YandexYml\Offer\OfferInterface
   *   The current offer.
   */
  public function setStepQuantity($step_quantity);

  /**
   * Gets step quantity.
   *
   * @return int|float
   *   The step quantity.
   */
  public function getStepQuantity();

  /**
   * Sets manufacturer warranty.
   *
   * @param bool $manufacturer_warranty
   *   The manufacturer warranty status.
   *
   * @return \Drupal\yandex_yml\YandexYml\Offer\OfferInterface
   *   The current offer.
   */
  public function setManufacturerWarranty($manufacturer_warranty);

  /**
   * Gets manufacturer warranty status.
   *
   * @return bool
   *   The manufacturer warranty status.
   */
  public function isManufacturerWarranty();

  /**
   * Sets the origin country.
   *
   * @param string $country_of_origin
   *   The country name.
   *
   * @see https://partner.market.yandex.ru/pages/help/Countries.pdf
   *
   * @return \Drupal\yandex_yml\YandexYml\Offer\OfferInterface
   *   The current offer.
   */
  public function setCountryOfOrigin($country_of_origin);

  /**
   * Gets country of origin.
   *
   * @return string
   *   The country name.
   */
  public function getCountryOfOrigin();

  /**
   * Sets product adult status.
   *
   * @param bool $adult
   *   The adult status.
   *
   * @see https://yandex.ru/support/partnermarket/elements/adult.html
   *
   * @return \Drupal\yandex_yml\YandexYml\Offer\OfferInterface
   *   The current offer.
   */
  public function setAdult($adult);

  /**
   * Gets adult status.
   *
   * @return bool
   *   The adult status.
   */
  public function getAdult();

  /**
   * Sets barcode.
   *
   * Available barcode standards: EAN-13, EAN-8, UPC-A, UPC-E.
   *
   * @param string $barcode
   *   The barcode.
   *
   * @see https://yandex.ru/support/partnermarket/elements/barcode.html
   *
   * @return \Drupal\yandex_yml\YandexYml\Offer\OfferInterface
   *   The current offer.
   */
  public function setBarcode($barcode);

  /**
   * Gets barcode.
   *
   * @return string
   *   The barcode.
   */
  public function getBarcode();

  /**
   * Sets CPA status.
   *
   * - 1: can be sold on Yandex.Market.
   * - 0: can't be sold on Yandex.Market.
   *
   * @param int $cpa
   *   The CPA.
   *
   * @return \Drupal\yandex_yml\YandexYml\Offer\OfferInterface
   *   The current offer.
   */
  public function setCpa($cpa);

  /**
   * Gets CPA status.
   *
   * @return int
   *   The CPA.
   */
  public function getCpa();

  /**
   * Sets offer param.
   *
   * @param \Drupal\yandex_yml\YandexYml\Param\Params $params
   *   The params list.
   *
   * @return \Drupal\yandex_yml\YandexYml\Offer\OfferInterface
   *   The current offer.
   */
  public function setParams(Params $params);

  /**
   * Gets params.
   *
   * @return \Drupal\yandex_yml\YandexYml\Param\Params
   *   The param objects.
   */
  public function getParams();

  /**
   * Sets expiry date.
   *
   * Must be in ISO8601 format.
   *
   * - For expiration date / service life — P1Y2M10DT2H30M. 1 year, 2 months, 10
   *   days, 2 hours and 30 minutes.
   * - For expiration date / service life — YYYY-MM-DDThh:mm.
   *
   * @param string $expire
   *   The expiration date.
   *
   * @return \Drupal\yandex_yml\YandexYml\Offer\OfferInterface
   *   The current offer.
   */
  public function setExpire($expire);

  /**
   * Gets expiry date.
   *
   * @return string
   *   The expiration date.
   */
  public function getExpire();

  /**
   * Sets weight.
   *
   * @param int|float $weight
   *   The weight.
   *
   * @example
   *  - 1
   *  - 2.20
   *  - 0.001
   *
   * @return \Drupal\yandex_yml\YandexYml\Offer\OfferInterface
   *   The current offer.
   */
  public function setWeight($weight);

  /**
   * Gets weight.
   *
   * @return int|float
   *   The weight.
   */
  public function getWeight();

  /**
   * Sets dimensions.
   *
   * @param string $dimensions
   *   The dimensions.
   *
   * @example
   *  - 1/2/3
   *  - 30/20/20.2
   *
   * @return \Drupal\yandex_yml\YandexYml\Offer\OfferInterface
   *   The current offer.
   */
  public function setDimensions($dimensions);

  /**
   * Gets dimensions.
   *
   * @return string
   *   The dimensions.
   */
  public function getDimensions();

  /**
   * Sets downloadable.
   *
   * @param bool $downloadable
   *   The downloadable status.
   *
   * @return \Drupal\yandex_yml\YandexYml\Offer\OfferInterface
   *   The current offer.
   */
  public function setDownloadable($downloadable);

  /**
   * Gets downloadable.
   *
   * @return bool
   *   The downloadable status.
   */
  public function getDownloadable();

  /**
   * Sets offer age for.
   *
   * @param string $age
   *   The age value.
   *
   * @return \Drupal\yandex_yml\YandexYml\Offer\OfferInterface
   *   The current offer.
   */
  public function setAge($age);

  /**
   * Gets offer age.
   *
   * @return \Drupal\yandex_yml\YandexYml\Param\Age
   *   The age.
   */
  public function getAge();

  /**
   * Sets group id.
   *
   * @param int $group_id
   *   The group id.
   *
   * @return \Drupal\yandex_yml\YandexYml\Offer\OfferInterface
   *   The current offer.
   */
  public function setGroupId($group_id);

  /**
   * Gets group id.
   *
   * @return int
   *   The group id.
   */
  public function getGroupId();

  /**
   * Sets name.
   *
   * @param string $name
   *   The offer name.
   *
   * @return \Drupal\yandex_yml\YandexYml\Offer\OfferInterface
   *   The current offer.
   */
  public function setName($name);

  /**
   * Gets name.
   *
   * @return string
   *   The offer name.
   */
  public function getName();

  /**
   * Sets vendor.
   *
   * @param string $vendor
   *   The vendor name.
   *
   * @see https://yandex.ru/support/partnermarket/elements/vendor-name-model.html
   *
   * @return \Drupal\yandex_yml\YandexYml\Offer\OfferInterface
   *   The current offer.
   */
  public function setVendor($vendor);

  /**
   * Gets vendor name.
   *
   * @return string
   *   The vendor name.
   */
  public function getVendor();

  /**
   * Sets vendor code.
   *
   * @param string $vendor_code
   *   The vendor code.
   *
   * @return \Drupal\yandex_yml\YandexYml\Offer\OfferInterface
   *   The current offer.
   */
  public function setVendorCode($vendor_code);

  /**
   * Gets vendor code.
   *
   * @return string
   *   The vendor code.
   */
  public function getVendorCode();

}
