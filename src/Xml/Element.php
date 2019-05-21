<?php

namespace Drupal\yandex_yml\Xml;

class Element implements ElementInterface {

  protected $name;

  protected $value;

  protected $attributes = [];

  protected $children = [];

  public function __construct($name, $value = NULL) {
    $this->setElementName($name);
    $this->setElementValue($value);
  }

  public function getElementAttributes() {
    return $this->attributes;
  }

  public function addElementAttribute(AttributeInterface $attribute) {
    $this->attributes[] = $attribute;
  }

  public function getElementChildren() {
    return $this->children;
  }

  public function addElementChild(ElementInterface $element) {
    $this->children[] = $element;
  }

  public function getElementName() {
    return $this->name;
  }

  protected function setElementName($name) {
    $this->name = $name;
  }

  public function getElementValue() {
    return $this->value;
  }

  protected function setElementValue($value = NULL) {
    $this->value = $value;
  }

}
