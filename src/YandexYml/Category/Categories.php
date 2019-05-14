<?php

namespace Drupal\yandex_yml\YandexYml\Category;

use Drupal\yandex_yml\YandexYml\YandexYmlArray;

/**
 * Class Categories.
 *
 * Contains list of categories.
 *
 * @see https://yandex.ru/support/partnermarket/elements/categories.html
 */
final class Categories extends YandexYmlArray {

  /**
   * Adds category.
   *
   * @param \Drupal\yandex_yml\YandexYml\Category\Category $category
   *   The category info.
   *
   * @return \Drupal\yandex_yml\YandexYml\Category\Categories
   *   The current object instance.
   */
  public function addCategory(Category $category) {
    $this->values[] = $category;

    return $this;
  }

}
