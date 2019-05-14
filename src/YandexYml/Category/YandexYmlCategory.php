<?php

namespace Drupal\yandex_yml\YandexYml\Category;

use Drupal\yandex_yml\Annotation\YandexYmlXmlAttribute;
use Drupal\yandex_yml\Annotation\YandexYmlXmlElement;
use Drupal\yandex_yml\Annotation\YandexYmlXmlValue;

/**
 * Class YandexYmlCategory.
 *
 * @see https://yandex.ru/support/partnermarket/categories.html
 *
 * @YandexYmlXmlElement(name = "category")
 */
final class YandexYmlCategory {

  /**
   * The category ID.
   *
   * @var int
   *
   * @YandexYmlXmlAttribute()
   */
  protected $id;

  /**
   * The category parent ID.
   *
   * @var int
   *
   * @YandexYmlXmlAttribute()
   */
  protected $parentId;

  /**
   * The category name.
   *
   * @var string
   *
   * @YandexYmlXmlValue()
   */
  protected $name;

  /**
   * YandexYmlCategory constructor.
   *
   * @param int $id
   *   The category ID.
   * @param string $name
   *   The category name.
   * @param null|int $parent_id
   *   The category parent ID.
   */
  public function __construct($id, $name, $parent_id = NULL) {
    $this->setId($id);
    $this->setName($name);
    $this->setParentId($parent_id);
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
  protected function setId($id) {
    $this->id = $id;

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
  protected function setParentId($parentId) {
    $this->parentId = $parentId;

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

  /**
   * Sets category name.
   *
   * @param string $name
   *   The category name.
   *
   * @return \Drupal\yandex_yml\YandexYml\Category\YandexYmlCategory
   *   The current category.
   */
  protected function setName($name) {
    $this->name = $name;

    return $this;
  }

}