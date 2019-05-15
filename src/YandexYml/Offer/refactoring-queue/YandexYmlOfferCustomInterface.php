<?php

namespace Drupal\yandex_yml\YandexYml\Offer;

/**
 * Custom offer.
 *
 * @see https://yandex.ru/support/partnermarket/export/vendor-model.html
 */
interface YandexYmlOfferCustomInterface extends YandexYmlOfferBaseInterface {

  /**
   * Sets type.
   *
   * @param string $type
   *   The type.
   *
   * @return \Drupal\yandex_yml\YandexYml\Offer\YandexYmlOfferCustomInterface
   *   The current offer.
   */
  public function setType($type);

  /**
   * Gets type.
   *
   * @return string
   *   The type.
   */
  public function getType();

  /**
   * Sets model.
   *
   * @param string $model
   *   The model.
   *
   * @return \Drupal\yandex_yml\YandexYml\Offer\YandexYmlOfferCustomInterface
   *   The current offer.
   */
  public function setModel($model);

  /**
   * Gets model.
   *
   * @return string
   *   The model.
   */
  public function getModel();

  /**
   * Sets type prefix.
   *
   * @param string $type_prefix
   *   The type prefix.
   *
   * @return \Drupal\yandex_yml\YandexYml\Offer\YandexYmlOfferCustomInterface
   *   The current offer.
   */
  public function setTypePrefix($type_prefix);

  /**
   * Gets type prefix.
   *
   * @return string
   *   The type prefix.
   */
  public function getTypePrefix();

}
