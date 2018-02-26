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
   *
   * @todo improve it. Multiple elements with same name is not allowed because
   * of keys of array uses. Find workaround.
   */
  public function toArray() {
    $result = $this->parseAnnotations($this);
    $result = $this->buildTree($result);
    ksm($result);
    return $result;
  }

  /**
   * Parse YaandexYml annotations.
   */
  private function parseAnnotations($class) {
    $result = [];
    // Get all defined properties which is no NULL.
    $properties = get_object_vars($class);
    unset($properties['_serviceId']);
    $properties = array_filter($properties, function ($value) {
      return $value !== NULL;
    });

    // Parse annotations.
    $reader = new AnnotationReader();
    // Clear the annotation loaders of any previous annotation classes.
    AnnotationRegistry::reset();
    // Register the namespaces of classes that can be used for annotations.
    AnnotationRegistry::registerLoader('class_exists');

    foreach ($properties as $name => $value) {
      $property = new \ReflectionProperty($class, $name);
      $annotation = $reader->getPropertyAnnotation($property, 'Drupal\yandex_yml\Annotation\YandexYml');
      if ($annotation) {
        $annotation_data = $annotation->get();
        $element_name = $annotation_data['elementName'];
        $result[$element_name]['element'] = $element_name;
        switch ($annotation_data['type']) {
          case 'content':
            $result[$element_name]['content'] = $value;
            break;

          case 'property':
            $result[$element_name]['properties'][$annotation_data['propertyName']] = $value;
            break;

          case 'children':
            foreach ($value as $item) {
              $result[$element_name]['childrens'][] = reset($item->toArray());
            }
            break;

          case 'array_map':
            $array_map = $annotation_data['array_map'];
            foreach ($value as $item) {
              foreach ($item as $k => $v) {
                foreach ($array_map as $name => $type) {
                  if ($k == $name) {
                    switch ($type) {
                      case 'property':
                        $result[$element_name]['properties'][$k] = $v;
                        break;
                    }
                  }
                }
              }
            }
            break;
        }
        if (!empty($annotation_data['parentElement'])) {
          $result[$element_name]['parentElement'] = $annotation_data['parentElement'];
        }
        else {
          $result[$element_name]['parentElement'] = NULL;
        }
      }
    }
    return $result;
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
          $element['childrens'] = $children;
        }
        $tree[] = $element;
      }
    }
    return $tree;
  }

}