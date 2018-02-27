<?php

namespace Drupal\yandex_yml\YandexYml\Category;

use Drupal\yandex_yml\Annotation\YandexYmlElement;
use Drupal\yandex_yml\Annotation\YandexYmlAttribute;
use Drupal\yandex_yml\Annotation\YandexYmlValue;
use Drupal\yandex_yml\YandexYml\YandexYmlToArrayTrait;

/**
 * Class YandexYmlCategory.
 *
 * @YandexYmlElement(
 *   name = "category"
 * )
 *
 * @see https://yandex.ru/support/webmaster/goods-prices/technical-requirements.html#concept3__categories
 */
class YandexYmlCategory {

  use YandexYmlToArrayTrait;

  /**
   * The category ID.
   *
   * @YandexYmlAttribute()
   *
   * @var int
   */
  private $id;

  /**
   * The category parent ID.
   *
   * @YandexYmlAttribute()
   *
   * @var int
   */
  private $parentId;

  /**
   * The category name.
   *
   * @YandexYmlValue()
   *
   * @var string
   */
  private $name;

  /**
   * Set category ID.
   *
   * Category ID can't be equal 0.
   *
   * @param int $id
   *
   * @return YandexYmlCategory
   */
  public function setId($id) {
    $this->id = $id;
    return $this;
  }

  /**
   * @return int
   */
  public function getId() {
    return $this->id;
  }

  /**
   * Set parent category ID.
   *
   * This is optional parameter. If you don't set it, the category will be
   * denoted as root category. This value must represent the previous parent
   * category ID, so you must keep hierarchy.
   *
   * @param int $parentId
   *
   * @return YandexYmlCategory
   */
  public function setParentId($parentId) {
    $this->parentId = $parentId;
    return $this;
  }

  /**
   * @return int
   */
  public function getParentId() {
    return $this->parentId;
  }

  /**
   * Set category name.
   *
   * @param string $name
   *
   * @return YandexYmlCategory
   */
  public function setName($name) {
    $this->name = $name;
    return $this;
  }

  /**
   * @return string
   */
  public function getName() {
    return $this->name;
  }

}