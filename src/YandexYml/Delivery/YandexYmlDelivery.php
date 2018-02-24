<?php

namespace Drupal\yandex_yml\YandexYml\Delivery;

use Drupal\yandex_yml\Annotation\YandexYml;
use Drupal\yandex_yml\YandexYml\YandexYmlToArrayTrait;

/**
 * Class YandexYmlDelivery.
 *
 * @see https://yandex.ru/support/partnermarket/elements/delivery-options.html
 */
class YandexYmlDelivery {

  use YandexYmlToArrayTrait;

  /**
   * Delivery cost.
   *
   * @YandexYml(
   *   elementName = "option",
   *   type = "property",
   *   propertyName = "cost"
   * )
   *
   * @var int
   */
  private $cost;

  /**
   * Duration of delivery.
   *
   * @YandexYml(
   *   elementName = "option",
   *   type = "property",
   *   propertyName = "days"
   * )
   *
   * @var mixed
   */
  private $days;

  /**
   * Time of order.
   *
   * @YandexYml(
   *   elementName = "option",
   *   type = "property",
   *   propertyName = "order-before"
   * )
   *
   * @var int
   */
  private $orderBefore;

  /**
   * Set cost of delivery.
   *
   * - If this delivery option will be on offer level then set cost in currency
   *   of offer, otherwise use default currency for shop.
   * - For free delivery set cost to 0.
   *
   * @param int $cost
   *
   * @return YandexYmlDelivery
   */
  public function setCost($cost) {
    $this->cost = $cost;
    return $this;
  }

  /**
   * @return int
   */
  public function getCost() {
    return $this->cost;
  }

  /**
   * Set estimated delivery time.
   *
   * - If can be delivered today, set it to 0.
   * - For tomorrow delivery set 1.
   * - Max delivery time 31 day.
   * - You can pass deliver period like "2-4". But difference between from and
   *   to days can't be more than 3, so "2-5" will be incorrect value.
   * - If you don't know delivery time or it more than 31 day, set value 32 or
   *   more. This will mean in Yandex "to order".
   *
   * @param mixed $days
   *
   * @return YandexYmlDelivery
   */
  public function setDays($days) {
    $this->days = $days;
    return $this;
  }

  /**
   * @return mixed
   */
  public function getDays() {
    return $this->days;
  }

  /**
   * Set order before time.
   *
   * Used to denote before which time delivery offer is available. If you set
   * it to 18, and delivery days to 0 (today) users before 18:00 will see
   * delivery date - today, after 18:00 they will see - tomorrow.
   *
   * - Only 0-24 values are valid. Where 18 means 18:00.
   * - Default value (if not set) 13 by Yandex.
   *
   * @param int $orderBefore
   *
   * @return YandexYmlDelivery
   */
  public function setOrderBefore($orderBefore) {
    $this->orderBefore = $orderBefore;
    return $this;
  }

  /**
   * @return int
   */
  public function getOrderBefore() {
    return $this->orderBefore;
  }

}