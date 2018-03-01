<?php

namespace Drupal\yandex_yml\YandexYml;

use Doctrine\Common\Annotations\AnnotationReader;
use Doctrine\Common\Annotations\AnnotationRegistry;

/**
 * Trait YandexYmlToArrayTrait.
 *
 * Help convert data to structured array.
 */
trait YandexYmlToArrayTrait {

  /**
   * @var AnnotationReader
   */
  private $reader;

  private $properties;

  /**
   * Convert data to structured array based on YandexYml annotation.
   *
   * @example
   * array(
   *   'category' => array(
   *     'content' => 'Books',
   *     'properties' => array(
   *       'id' => 17,
   *       'parentId' => 1,
   *     ),
   *   ),
   * );
   */
  public function toArray() {
    $result = $this->parseAnnotations();
    //$result = $this->buildTree($result);
    return $result;
  }

  /**
   * Parse YandexYml annotations.
   */
  private function parseAnnotations() {
    $result = [];
    // Get all defined properties which is no NULL.
    $properties = get_object_vars($this);
    unset($properties['_serviceId']);
    $this->properties = array_filter($properties, function ($value) {
      return $value !== NULL;
    });

    $this->reader = new AnnotationReader();
    // Clear the annotation loaders of any previous annotation classes.
    AnnotationRegistry::reset();
    // Register the namespaces of classes that can be used for annotations.
    AnnotationRegistry::registerLoader('class_exists');

    $element = $this->getElementFromObject();
    // If found element than object is an element.
    if ($element) {
      // Looking for value.
      $value = $this->getElementValue();
      if ($value) {
        $element['value'] = $value;
      }

      // Looking for attributes.
      $attributes = $this->getElementAttributes();
      $element['attributes'] = $attributes;

      // Looking for child values.
      $child = $this->getElementWrappers();
      $element['child'] = $child;

      $elements = $this->getElementsFromProperties();
      $element['child'] = array_merge($element['child'], $elements);

      $result[] = $element;
    }
    else {
      // If object is not element root, than we find elements in properties.
      // Used only for ShopInfo.
      $elements = $this->getElementsFromProperties();
      $result = array_merge($result, $elements);
    }

    return $result;
  }

  /**
   * Trying to find element definition in object annotation.
   */
  private function getElementFromObject() {
    $reflection = new \ReflectionObject($this);
    $object_annotation = $this->reader->getClassAnnotation($reflection, 'Drupal\yandex_yml\Annotation\YandexYmlElement');
    if ($object_annotation) {
      return $object_annotation->get();
    }
    return;
  }

  /**
   * Looking for value of element.
   */
  private function getElementValue() {
    foreach ($this->properties as $name => $value) {
      $reflection = new \ReflectionProperty($this, $name);
      $property_annotation = $this->reader->getPropertyAnnotation($reflection, 'Drupal\yandex_yml\Annotation\YandexYmlValue');
      if ($property_annotation) {
        return $value;
      }
    }
  }

  /**
   * Looking for attributes of element.
   */
  private function getElementAttributes() {
    $attributes = [];
    foreach ($this->properties as $name => $value) {
      $reflection = new \ReflectionProperty($this, $name);
      $property_annotation = $this->reader->getPropertyAnnotation($reflection, 'Drupal\yandex_yml\Annotation\YandexYmlAttribute');
      if ($property_annotation) {
        $attribute_name = !empty($property_annotation->get()['name']) ? $property_annotation->get()['name'] : $name;
        $attributes[] = [
          'name' => $attribute_name,
          'value' => $value,
        ];
      }
    }
    return $attributes;
  }

  /**
   * Looking for elements in properties. They are standalone.
   */
  private function getElementsFromProperties() {
    $elements = [];
    foreach ($this->properties as $name => $value) {
      $reflection = new \ReflectionProperty($this, $name);
      $property_annotation = $this->reader->getPropertyAnnotation($reflection, 'Drupal\yandex_yml\Annotation\YandexYmlElement');
      if ($property_annotation) {
        if (is_array($value)) {
          foreach ($value as $value_element) {
            $elements = array_merge($elements, $value_element->toArray());
          }
        }
        else {
          $element_name = !empty($property_annotation->get()['name']) ? $property_annotation->get()['name'] : $name;
          $elements[] = [
            'name' => $element_name,
            'value' => $value,
          ];
        }
      }
    }
    return $elements;
  }

  /**
   * Looking for values with wrapper.
   */
  private function getElementWrappers() {
    $elements = [];
    foreach ($this->properties as $name => $value) {
      $reflection = new \ReflectionProperty($this, $name);
      $property_annotation = $this->reader->getPropertyAnnotation($reflection, 'Drupal\yandex_yml\Annotation\YandexYmlElementWrapper');
      if ($property_annotation) {
        $element_name = !empty($property_annotation->get()['name']) ? $property_annotation->get()['name'] : $name;
        if (is_array($value)) {
          $array_element = [
            'name' => $element_name,
            'child' => [],
          ];
          foreach ($value as $value_element) {
            $array_element['child'] = array_merge($array_element['child'], $value_element->toArray());
          }
          $elements[] = $array_element;
        }
        else {
          $attributes = $this->getElementWrapperAttributes($element_name);
          $elements[] = [
            'name' => $element_name,
            'value' => $value,
            'attributes' => $attributes,
          ];
        }
      }
    }
    return $elements;
  }

  /**
   * Looking for attributes for YandexYmlElementWrapper.
   */
  private function getElementWrapperAttributes($target_element) {
    $attributes = [];
    foreach ($this->properties as $name => $value) {
      $reflection = new \ReflectionProperty($this, $name);
      $property_annotation = $this->reader->getPropertyAnnotation($reflection, 'Drupal\yandex_yml\Annotation\YandexYmlElementWrapperAttribute');
      if ($property_annotation && $property_annotation->get()['targetElement'] == $target_element) {
        $attribute_name = !empty($property_annotation->get()['name']) ? $property_annotation->get()['name'] : $name;
        $attributes[] = [
          'name' => $attribute_name,
          'value' => $value,
        ];
      }
    }
    return $attributes;
  }

  /**
   * Build tree for result.
   */
  private function buildTree(array $elements, $parent = NULL) {
    $tree = [];
    foreach ($elements as $element) {
      if ($element['parentElement'] == $parent) {
        $children = $this->buildTree($elements, $element['element']);
        if ($children) {
          $element['child'] = $children;
        }
        $tree[] = $element;
      }
    }
    return $tree;
  }

}