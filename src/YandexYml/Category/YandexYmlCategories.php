<?php

namespace Drupal\yandex_yml\YandexYml\Category;

use Drupal\yandex_yml\YandexYml\YandexYmlArray;

/**
 * Class YandexYmlCategories.
 *
 * Contains list of categories.
 *
 * @see https://yandex.ru/support/partnermarket/elements/categories.html
 */
final class YandexYmlCategories extends YandexYmlArray {

  /**
   * Adds category.
   *
   * @param \Drupal\yandex_yml\YandexYml\Category\YandexYmlCategory $category
   *   The category info.
   *
   * @return \Drupal\yandex_yml\YandexYml\Category\YandexYmlCategories
   *   The current object instance.
   */
  public function addCategory(YandexYmlCategory $category) {
    $this->values[] = $category;

    return $this;
  }

}
