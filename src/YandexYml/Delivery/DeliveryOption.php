<?php

namespace Drupal\yandex_yml\YandexYml\Delivery;

use Drupal\yandex_yml\Annotation\YandexYmlXmlAttribute;
use Drupal\yandex_yml\Annotation\YandexYmlXmlElement;

/**
 * Class DeliveryOption.
 *
 * @see https://yandex.ru/support/partnermarket/elements/delivery-options.html
 *
 * @YandexYmlXmlElement(name = "option")
 */
class DeliveryOption {

  /**
   * The delivery cost.
   *
   * @var int
   */
  protected $cost;

  /**
   * The delivery duration.
   *
   * @var int|string
   */
  protected $days;

  /**
   * The hour of order before.
   *
   * @var int
   */
  protected $orderBefore;


  public function __construct($cost, $days, $order_before = NULL) {
    $this->setCost($cost);
    $this->setDays($days);
    $this->setOrderBefore($order_before);
  }

  /**
   * Gets delivery cost.
   *
   * @return int
   *   The delivery cost.
   *
   * @YandexYmlXmlAttribute(name = "cost")
   */
  public function getCost() {
    return $this->cost;
  }

  /**
   * Sets cost of delivery.
   *
   * - If this delivery option will be on offer level then set cost in currency
   *   of offer, otherwise use default currency for shop.
   * - For free delivery set cost to 0.
   *
   * @param int $cost
   *   The delivery cost.
   *
   * @return \Drupal\yandex_yml\YandexYml\Delivery\DeliveryOption
   *   The current delivery.
   */
  protected function setCost($cost) {
    $this->cost = $cost;

    return $this;
  }

  /**
   * Gets estimated delivery time.
   *
   * @return int|string
   *   The delivery time.
   *
   * @YandexYmlXmlAttribute(name = "days")
   */
  public function getDays() {
    return $this->days;
  }

  /**
   * Sets estimated delivery time.
   *
   * - If can be delivered today, set it to 0.
   * - For tomorrow delivery set 1.
   * - Max delivery time 31 day.
   * - You can pass deliver period like "2-4". But difference between from and
   *   to days can't be more than 3, so "2-5" will be incorrect value.
   * - If you don't know delivery time or it more than 31 day, set value 32 or
   *   more. This will mean in Yandex "to order".
   *
   * @param int|string $days
   *   The delivery time.
   *
   * @return \Drupal\yandex_yml\YandexYml\Delivery\DeliveryOption
   *   The current delivery.
   */
  protected function setDays($days) {
    $this->days = $days;

    return $this;
  }

  /**
   * Gets order before time.
   *
   * @return int
   *   The order before hour.
   *
   * @YandexYmlXmlAttribute(name = "order-before")
   */
  public function getOrderBefore() {
    return $this->orderBefore;
  }

  /**
   * Sets order before time.
   *
   * Used to denote before which time delivery offer is available. If you set
   * it to 18, and delivery days to 0 (today) users before 18:00 will see
   * delivery date - today, after 18:00 they will see - tomorrow.
   *
   * - Only 0-24 values are valid. Where 18 means 18:00.
   * - Default value (if not set) 13 by Yandex.
   *
   * @param int $order_before
   *   The order before hour.
   *
   * @return \Drupal\yandex_yml\YandexYml\Delivery\DeliveryOption
   *   The current delivery.
   */
  protected function setOrderBefore($order_before) {
    $this->orderBefore = $order_before;

    return $this;
  }

}