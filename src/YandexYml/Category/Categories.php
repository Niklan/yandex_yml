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

  public function __construct() {
    parent::__construct('categories');
  }

  public function addCategory(ElementInterface $category) {
    $this->addElementChild($category);
  }

}
