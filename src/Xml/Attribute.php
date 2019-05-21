<?php

namespace Drupal\yandex_yml\Xml;

class Attribute implements AttributeInterface {

  protected $name;

  protected $value;

  public function __construct($name, $value = NULL) {
    $this->name = $name;
    $this->value = $value;
  }

  public function getName() {
    return $this->name;
  }

  public function getValue() {
    return $this->value;
  }

}
