<?php

namespace Drupal\yandex_yml\YandexYml\Offer;

use Drupal\yandex_yml\YandexYml\YandexYmlToArrayTrait;
use Drupal\yandex_yml\Annotation\YandexYmlElement;

/**
 * Base object for simple offer.
 *
 * @YandexYmlElement(
 *   name = "offer"
 * )
 *
 */
class YandexYmlOfferSimple extends YandexYmlOfferBase {

  use YandexYmlToArrayTrait;

}