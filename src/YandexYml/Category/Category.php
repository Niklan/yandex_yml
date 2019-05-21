<?php

namespace Drupal\yandex_yml\YandexYml\Category;

use Drupal\yandex_yml\Annotation\YandexYmlXmlAttribute;
use Drupal\yandex_yml\Annotation\YandexYmlXmlElement;
use Drupal\yandex_yml\Annotation\YandexYmlXmlValue;
use Drupal\yandex_yml\Xml\Attribute;
use Drupal\yandex_yml\Xml\Element;

/**
 * Class Category.
 *
 * @see https://yandex.ru/support/partnermarket/categories.html
 *
 * @YandexYmlXmlElement(name = "category")
 */
final class Category extends Element {

  /**
   * Category constructor.
   *
   * @param int $id
   *   The category ID.
   * @param string $name
   *   The category name.
   */
  public function __construct($id, $name) {
    parent::__construct('category');

    $this->setId($id);
    $this->setName($name);
  }

  /**
   * Sets category id.
   *
   * Category ID must be greater than 0.
   *
   * @param int $id
   *   The category id.
   */
  protected function setId($id) {
    $this->addElementAttribute(new Attribute('id', $id));
  }

  /**
   * Set parent category id.
   *
   * This is optional parameter. If you don't set it, the category will be
   * denoted as root category. This value must represent the previous parent
   * category ID, so you must keep hierarchy.
   *
   * @param int $parent_id
   *   The parent category id.
   *
   * @return \Drupal\yandex_yml\YandexYml\Category\Category
   *   The current category.
   */
  public function setParentId($parent_id) {
    $this->addElementAttribute(new Attribute('parentId', $parent_id));

    return $this;
  }

  /**
   * Sets category name.
   *
   * @param string $name
   *   The category name.
   */
  protected function setName($name) {
    $this->setElementValue($name);
  }

}
