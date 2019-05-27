<?php

namespace Drupal\yandex_yml\YandexYml\Category;

use Drupal\yandex_yml\Xml\Element;
use Drupal\yandex_yml\Xml\ElementInterface;

/**
 * Class Categories.
 *
 * Contains list of categories.
 *
 * @see https://yandex.ru/support/partnermarket/elements/categories.html
 */
final class Categories extends Element {

  /**
   * {@inheritDoc}
   */
  public function __construct() {
    parent::__construct('categories');
  }

  /**
   * Adds category to the list of categories.
   *
   * @param \Drupal\yandex_yml\Xml\ElementInterface $category
   *   The category to collection.
   *
   * @return \Drupal\yandex_yml\YandexYml\Category\Categories
   *   The current instance.
   */
  public function addCategory(ElementInterface $category) {
    $this->addElementChild($category);

    return $this;
  }

}
