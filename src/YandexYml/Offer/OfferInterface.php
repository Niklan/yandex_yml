<?php

namespace Drupal\yandex_yml\YandexYml\Offer;

use Drupal\yandex_yml\Xml\ElementInterface;
use Drupal\yandex_yml\YandexYml\Param\Param;

/**
 * Defines interface with common methods for all Yandex yml offers.
 */
interface OfferInterface extends ElementInterface {

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
   * Sets the origin country.
   *
   * @param string $country_of_origin
   *   The country name.
   *
   * @return \Drupal\yandex_yml\YandexYml\Offer\OfferInterface
   *   The current offer.
   * @see https://partner.market.yandex.ru/pages/help/Countries.pdf
   *
   */
  public function setCountryOfOrigin($country_of_origin);

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

}
