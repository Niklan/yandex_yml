<?php

namespace Drupal\yandex_yml\Annotation;

use Drupal\Component\Annotation\Plugin;

/**
 * Annotation YandexYml.
 *
 * This annotation helps to map properties of elements to it's destination
 * xml elements to make generation more easily and transparent.
 *
 * @Annotation
 */
class YandexYml extends Plugin {

  /**
   * Type of value.
   *
   * Denotes where this value will be set.
   *
   * Allowed values:
   *  - content: Value of property will be set as content of element.
   *  - property: Value of property will be set as attribute value of element.
   *  - children: Value will be childrens with processing. Must be an array of
   *              any objects with YandexYmlToArrayTrait.
   *  - array_map: An array value will be transformed to elements according to
   *               mapping.
   *
   * @var string
   */
  public $type;

  /**
   * XML element name.
   *
   * Used for naming element for property.
   *
   * @var string
   */
  public $elementName;

  /**
   * Property name.
   *
   * If type was set to "property" you must enter property name where it goes.
   * This name will be attribute name and property will it's value.
   *
   * @var string
   */
  public $propertyName;

  /**
   * Parent element name.
   *
   * If set, this element will be children for parent.
   *
   * @var string
   */
  public $parentElement;

  /**
   * Mapping for array values.
   *
   * @var array
   */
  public $array_map;

}