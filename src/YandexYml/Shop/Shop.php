<?php

namespace Drupal\yandex_yml\YandexYml\Shop;

use Drupal;
use Drupal\yandex_yml\Xml\Element;
use Drupal\yandex_yml\YandexYml\Category\Categories;
use Drupal\yandex_yml\YandexYml\Currency\Currencies;
use Drupal\yandex_yml\YandexYml\Delivery\DeliveryOptions;
use Drupal\yandex_yml\YandexYml\Offer\Offers;
use Drupal\yandex_yml\YandexYml\Pickup\PickupOptions;
use InvalidArgumentException;

/**
 * Class Shop.
 *
 * @see https://yandex.ru/support/partnermarket/elements/shop.html
 */
final class Shop extends Element {

  /**
   * Shop constructor.
   *
   * @param string $name
   *   The short shop name.
   * @param string $company
   *   The full company name which owns the shop.
   * @param null|string $url
   *   The shop home page.
   */
  public function __construct(
    $name,
    $company,
    $url = NULL
  ) {

    parent::__construct('shop');

    $this->setName($name);
    $this->setCompany($company);
    $this->setUrl($url);
  }

  /**
   * Sets name.
   *
   * @param string $name
   *   The short shop name.
   *
   * @return \Drupal\yandex_yml\YandexYml\Shop\Shop
   *   The object instance.
   */
  protected function setName($name) {
    if (mb_strlen($name) > 20) {
      throw new InvalidArgumentException('The shop name must be not longer than 20 chars.');
    }

    $this->addElementChild(new Element('name', $name));

    return $this;
  }

  /**
   * Sets company.
   *
   * @param string $company
   *   The full company name which owns the shop.
   *
   * @return \Drupal\yandex_yml\YandexYml\Shop\Shop
   *   The object instance.
   */
  protected function setCompany($company) {
    $this->addElementChild(new Element('company', $company));

    return $this;
  }

  /**
   * Sets url.
   *
   * @param null|string $url
   *   The shop home page.
   *
   * @return \Drupal\yandex_yml\YandexYml\Shop\Shop
   *   The object instance.
   */
  protected function setUrl($url) {
    if (!$url) {
      $url = Drupal::request()->getSchemeAndHttpHost();
    }

    if (mb_strlen($url) > 50) {
      throw new InvalidArgumentException('The length of shop url must be lower than 50 chars.');
    }

    $this->addElementChild(new Element('url', $url));

    return $this;
  }

  /**
   * Sets platform.
   *
   * @param null|string $platform
   *   The platform name.
   *
   * @return \Drupal\yandex_yml\YandexYml\Shop\Shop
   *   The object instance.
   */
  public function setPlatform($platform) {
    $this->addElementChild(new Element('platform', $platform));

    return $this;
  }

  /**
   * Sets version.
   *
   * @param null|string $version
   *   The platform version.
   *
   * @return \Drupal\yandex_yml\YandexYml\Shop\Shop
   *   The object instance.
   */
  public function setVersion($version) {
    $this->addElementChild(new Element('version', $version));

    return $this;
  }

  /**
   * Sets agency.
   *
   * @param string $agency
   *   The agency name which provides technical support for the shop.
   *
   * @return \Drupal\yandex_yml\YandexYml\Shop\Shop
   *   The object instance.
   */
  public function setAgency($agency) {
    $this->addElementChild(new Element('agency', $agency));

    return $this;
  }

  /**
   * Sets email.
   *
   * @param string $email
   *   The email of platform developers or technical support.
   *
   * @return \Drupal\yandex_yml\YandexYml\Shop\Shop
   *   The object instance.
   */
  public function setEmail($email) {
    $this->addElementChild(new Element('email', $email));

    return $this;
  }

  /**
   * Sets currencies for the shop.
   *
   * @param \Drupal\yandex_yml\YandexYml\Currency\Currencies $currencies
   *   The currencies info.
   *
   * @return \Drupal\yandex_yml\YandexYml\Shop\Shop
   *   The object instance.
   */
  public function setCurrencies(Currencies $currencies) {
    $this->addElementChild($currencies);

    return $this;
  }

  /**
   * Sets categories.
   *
   * @param \Drupal\yandex_yml\YandexYml\Category\Categories $categories
   *   The categories info.
   *
   * @return \Drupal\yandex_yml\YandexYml\Shop\Shop
   *   The object instance.
   */
  public function setCategories(Categories $categories) {
    $this->addElementChild($categories);

    return $this;
  }

  /**
   * Sets delivery options.
   *
   * @param \Drupal\yandex_yml\YandexYml\Delivery\DeliveryOptions $deliveryOptions
   *   The delivery options.
   *
   * @return \Drupal\yandex_yml\YandexYml\Shop\Shop
   *   The object instance.
   */
  public function setDeliveryOptions(DeliveryOptions $deliveryOptions) {
    $this->addElementChild($deliveryOptions);

    return $this;
  }

  /**
   * Sets pickup options.
   *
   * @param \Drupal\yandex_yml\YandexYml\Pickup\PickupOptions $pickup_options
   *   The pickup options.
   *
   * @return \Drupal\yandex_yml\YandexYml\Shop\Shop
   *   The object instance.
   */
  public function setPickupOptions(PickupOptions $pickup_options) {
    $this->addElementChild($pickup_options);

    return $this;
  }

  /**
   * Sets auto discount status.
   *
   * @param bool $enable_auto_discounts
   *   The auto discount status.
   *
   * @return \Drupal\yandex_yml\YandexYml\Shop\Shop
   *   The object instance.
   */
  public function setEnableAutoDiscounts($enable_auto_discounts) {
    $this->addElementChild(new Element('enable_auto_discounts', $enable_auto_discounts));

    return $this;
  }

  /**
   * Sets offers.
   *
   * @param \Drupal\yandex_yml\YandexYml\Offer\Offers $offers
   *   The offers list.
   *
   * @return \Drupal\yandex_yml\YandexYml\Shop\Shop
   *   The object instance.
   */
  public function setOffers(Offers $offers) {
    $this->addElementChild($offers);

    return $this;
  }

}
