<?php

namespace Drupal\yandex_yml\YandexYml;

use Doctrine\Common\Annotations\AnnotationReader;
use Doctrine\Common\Annotations\AnnotationRegistry;
use Drupal\yandex_yml\Annotation\YandexYmlAttribute;
use Drupal\yandex_yml\Annotation\YandexYmlElement;
use Drupal\yandex_yml\Annotation\YandexYmlElementWrapper;
use Drupal\yandex_yml\Annotation\YandexYmlElementWrapperAttribute;
use Drupal\yandex_yml\Annotation\YandexYmlValue;

/**
 * Trait YandexYmlToArrayTrait.
 *
 * Help convert data to structured array.
 */
trait YandexYmlToArrayTrait {

  /**
   * The annotation reader.
   *
   * @var \Doctrine\Common\Annotations\AnnotationReader
   */
  private $reader;

  /**
   * The filtererd properties with values.
   *
   * @var array
   */
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
    return $result;
  }

  /**
   * Gets annotation reader.
   *
   * @return array|\Doctrine\Common\Annotations\AnnotationReader
   *   The annotation reader.
   *
   * @throws \Doctrine\Common\Annotations\AnnotationException
   */
  private function getAnnotationReader() {
    $reader = &drupal_static('yandex_yml_to_array_trait_annotation_reader');
    if (!isset($reader)) {
      $reader = new AnnotationReader();
      // Register the namespaces of classes that can be used for annotations.
      AnnotationRegistry::registerLoader('class_exists');
    }
    return $reader;
  }

  /**
   * Parse YandexYml annotations.
   */
  private function parseAnnotations() {
    $result = [];
    // Get all defined properties.
    $properties = get_object_vars($this);
    unset($properties['_serviceId']);
    // We don't wan't to parse properties without any values. This is cost too
    // much.
    $this->properties = array_filter($properties, function ($value) {
      return $value !== NULL;
    });

    $this->reader = $this->getAnnotationReader();

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
    $result = &drupal_static(__CLASS__);
    if (!isset($result)) {
      $reflection = new \ReflectionObject($this);
      $object_annotation = $this->reader->getClassAnnotation(
        $reflection,
        'Drupal\yandex_yml\Annotation\YandexYmlElement'
      );
      if ($object_annotation instanceof YandexYmlElement) {
        $result = $object_annotation->get();
      }
    }
    return $result;
  }

  /**
   * Looking for value of element.
   */
  private function getElementValue() {
    foreach ($this->properties as $name => $value) {
      $annotation_name = 'Drupal\yandex_yml\Annotation\YandexYmlValue';
      $property_annotation = $this->getPropertyAnnotation($name, $annotation_name);

      if ($property_annotation instanceof YandexYmlValue) {
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
      $annotation_name = 'Drupal\yandex_yml\Annotation\YandexYmlAttribute';
      $property_annotation = $this->getPropertyAnnotation($name, $annotation_name);

      if ($property_annotation instanceof YandexYmlAttribute) {
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
      $annotation_name = 'Drupal\yandex_yml\Annotation\YandexYmlElement';
      $property_annotation = $this->getPropertyAnnotation($name, $annotation_name);

      if ($property_annotation instanceof YandexYmlElement) {
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
      $annotation_name = 'Drupal\yandex_yml\Annotation\YandexYmlElementWrapper';
      $property_annotation = $this->getPropertyAnnotation($name, $annotation_name);

      if ($property_annotation instanceof YandexYmlElementWrapper) {
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
          // @todo improve performance.
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
   * Looking YandexYmlElementWrapperAttribute for YandexYmlElementWrapper.
   *
   * Note! This method is drastically reduced performance.
   */
  private function getElementWrapperAttributes($target_element) {
    $result = &drupal_static(__CLASS__ . $target_element);
    if (!isset($result)) {
      $attributes = [];
      foreach ($this->properties as $name => $value) {
        $annotation_name = 'Drupal\yandex_yml\Annotation\YandexYmlElementWrapperAttribute';
        $property_annotation = $this->getPropertyAnnotation($name, $annotation_name);

        if ($property_annotation instanceof YandexYmlElementWrapperAttribute && $property_annotation->get()['targetElement'] == $target_element) {
          $attribute_name = !empty($property_annotation->get()['name']) ? $property_annotation->get()['name'] : $name;
          $attributes[] = [
            'name' => $attribute_name,
            'value' => $value,
          ];
        }
      }
      $result = $attributes;
    }
    return $result;
  }

  /**
   * Gets property annotation.
   */
  private function getPropertyAnnotation($name, $annotation_name) {
    $property_annotation = &drupal_static(__CLASS__ . $name . $annotation_name);
    if (!isset($property_annotation)) {
      $reflection = new \ReflectionProperty($this, $name);
      $property_annotation = $this->reader->getPropertyAnnotation(
        $reflection,
        $annotation_name
      );
    }
    return $property_annotation;
  }

}
