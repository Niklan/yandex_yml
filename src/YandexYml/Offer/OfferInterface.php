<?php

namespace Drupal\yandex_yml\YandexYml\Offer;

use Drupal\yandex_yml\YandexYml\Delivery\DeliveryOptions;
use Drupal\yandex_yml\YandexYml\Param\Param;
use Drupal\yandex_yml\YandexYml\Param\Params;

/**
 * Defines interface with common methods for all Yandex yml offers.
 */
interface OfferInterface {

  /**
   * Sets default bid for click.
   *
   * @param int $bid
   *   The bid amount. 80 = 0.8 USD.
   *
   * @return \Drupal\yandex_yml\YandexYml\Offer\OfferInterface
   *   The current offer.
   * @see https://yandex.ru/support/partnermarket/elements/bid-cbid.html
   *
   */
  public function setBid($bid);

  /**
   * Sets product availability.
   *
   * @param bool $available
   *   The availability status.
   *
   * @return \Drupal\yandex_yml\YandexYml\Offer\OfferInterface
   *   The current offer.
   * @see https://yandex.ru/support/partnermarket/elements/id-type-available.html#available
   *
   */
  public function setAvailable($available);

  /**
   * Sets old price.
   *
   * @param int $old_price
   *   The old price.
   *
   * @return \Drupal\yandex_yml\YandexYml\Offer\OfferInterface
   *   The current offer.
   * @see https://yandex.ru/support/partnermarket/elements/oldprice.html
   *
   */
  public function setOldPrice($old_price);

  /**
   * Sets offer picture.
   *
   * @param mixed $picture
   *   The picture url.
   *
   * @return \Drupal\yandex_yml\YandexYml\Offer\OfferInterface
   *   The current offer.
   * @see https://yandex.ru/support/partnermarket/offers.html
   *
   */
  public function setPicture($picture);

  /**
   * Sets delivery.
   *
   * @param mixed $delivery
   *   The delivery status.
   *
   * @return \Drupal\yandex_yml\YandexYml\Offer\OfferInterface
   *   The current offer.
   * @see https://yandex.ru/support/partnermarket/elements/delivery.html
   *
   */
  public function setDelivery($delivery);

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
   * Sets possibility of pickup from the issuance points.
   *
   * @param bool $pickup
   *   The pickup possibility.
   *
   * @return \Drupal\yandex_yml\YandexYml\Offer\OfferInterface
   *   The current offer.
   * @see https://yandex.ru/support/partnermarket/elements/delivery.html
   *
   */
  public function setPickup($pickup);

  /**
   * Sets possibility to buy without ordering.
   *
   * @param bool $store
   *   The possibility value.
   *
   * @return \Drupal\yandex_yml\YandexYml\Offer\OfferInterface
   *   The current offer.
   * @see https://yandex.ru/support/partnermarket/elements/delivery.html
   *
   */
  public function setStore($store);

  /**
   * Sets description of the offer.
   *
   * @param string $description
   *   The description.
   *
   * @return \Drupal\yandex_yml\YandexYml\Offer\OfferInterface
   *   The current offer.
   * @see https://yandex.ru/support/partnermarket/elements/description.html
   *
   */
  public function setDescription($description);

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
   * @return \Drupal\yandex_yml\YandexYml\Offer\OfferInterface
   *   The current offer.
   * @see https://yandex.ru/support/partnermarket/elements/sales_notes.html
   *
   */
  public function setSalesNotes($sales_notes);

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
   * Sets the origin country.
   *
   * @param string $country_oforigin
   *   The country name.
   *
   * @return \Drupal\yandex_yml\YandexYml\Offer\OfferInterface
   *   The current offer.
   * @see https://partner.market.yandex.ru/pages/help/Countries.pdf
   *
   */
  public function setCountryOfOrigin($country_oforigin);

  /**
   * Sets product adult status.
   *
   * @param bool $adult
   *   The adult status.
   *
   * @return \Drupal\yandex_yml\YandexYml\Offer\OfferInterface
   *   The current offer.
   * @see https://yandex.ru/support/partnermarket/elements/adult.html
   *
   */
  public function setAdult($adult);

  /**
   * Sets barcode.
   *
   * Available barcode standards: EAN-13, EAN-8, UPC-A, UPC-E.
   *
   * @param string $barcode
   *   The barcode.
   *
   * @return \Drupal\yandex_yml\YandexYml\Offer\OfferInterface
   *   The current offer.
   * @see https://yandex.ru/support/partnermarket/elements/barcode.html
   *
   */
  public function setBarcode($barcode);

  /**
   * Sets offer param.
   *
   * @param \Drupal\yandex_yml\YandexYml\Param\Param $param
   *
   * @return \Drupal\yandex_yml\YandexYml\Offer\OfferInterface
   *   The current offer.
   */
  public function addParam(Param $param);

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
   * Sets weight.
   *
   * @param int|float $weight
   *   The weight.
   *
   * @return \Drupal\yandex_yml\YandexYml\Offer\OfferInterface
   *   The current offer.
   * @example
   *  - 1
   *  - 2.20
   *  - 0.001
   *
   */
  public function setWeight($weight);

  /**
   * Sets dimensions.
   *
   * @param string $dimensions
   *   The dimensions.
   *
   * @return \Drupal\yandex_yml\YandexYml\Offer\OfferInterface
   *   The current offer.
   * @example
   *  - 1/2/3
   *  - 30/20/20.2
   *
   */
  public function setDimensions($dimensions);

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
   * Sets vendor.
   *
   * @param string $vendor
   *   The vendor name.
   *
   * @return \Drupal\yandex_yml\YandexYml\Offer\OfferInterface
   *   The current offer.
   * @see https://yandex.ru/support/partnermarket/elements/vendor-name-model.html
   */
  public function setVendor($vendor);

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

}
