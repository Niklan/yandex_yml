<?php

namespace Drupal\yandex_yml\YandexYml\Category;

use Drupal\yandex_yml\Annotation\YandexYmlAttribute;
use Drupal\yandex_yml\Annotation\YandexYmlElement;
use Drupal\yandex_yml\Annotation\YandexYmlValue;
use Drupal\yandex_yml\YandexYml\YandexYmlToArrayTrait;

/**
 * Class YandexYmlCategory.
 *
 * @see https://yandex.ru/support/partnermarket/categories.html
 *
 * @YandexYmlElement(
 *   name = "category"
 * )
 */
class YandexYmlCategory {

  use YandexYmlToArrayTrait;

  /**
   * The category ID.
   *
   * @var int
   *
   * @YandexYmlAttribute()
   */
  private $id;

  /**
   * The category parent ID.
   *
   * @var int
   *
   * @YandexYmlAttribute()
   */
  private $parentId;

  /**
   * The category name.
   *
   * @var string
   *
   * @YandexYmlValue()
   */
  private $name;

  /**
   * Sets category id.
   *
   * Category ID must be greater than 0.
   *
   * @param int $id
   *   The category id.
   *
   * @return \Drupal\yandex_yml\YandexYml\Category\YandexYmlCategory
   *   This category object.
   */
  public function setId($id) {
    $this->id = $id;
    return $this;
  }

  /**
   * Gets category id.
   *
   * @return int
   *   The category id.
   */
  public function getId() {
    return $this->id;
  }

  /**
   * Set parent category id.
   *
   * This is optional parameter. If you don't set it, the category will be
   * denoted as root category. This value must represent the previous parent
   * category ID, so you must keep hierarchy.
   *
   * @param int $parentId
   *   The parent category id.
   *
   * @return \Drupal\yandex_yml\YandexYml\Category\YandexYmlCategory
   *   The current category.
   */
  public function setParentId($parentId) {
    $this->parentId = $parentId;
    return $this;
  }

  /**
   * Gets parent category id.
   *
   * @return int
   *   The parent category id.
   */
  public function getParentId() {
    return $this->parentId;
  }

  /**
   * Sets category name.
   *
   * @param string $name
   *   The category name.
   *
   * @return \Drupal\yandex_yml\YandexYml\Category\YandexYmlCategory
   *   The current category.
   */
  public function setName($name) {
    $this->name = $name;
    return $this;
  }

  /**
   * Gets category name.
   *
   * @return string
   *   The current category name.
   */
  public function getName() {
    return $this->name;
  }

}