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
   */
  public function toArray() {
    $result = [];
    $properties = get_object_vars($this);
    unset($properties['_serviceId']);
    $properties = array_filter($properties, function ($value) {
      return $value !== NULL;
    });

    $reader = new AnnotationReader();
    // Clear the annotation loaders of any previous annotation classes.
    AnnotationRegistry::reset();
    // Register the namespaces of classes that can be used for annotations.
    AnnotationRegistry::registerLoader('class_exists');
    foreach ($properties as $name => $value) {
      $property = new \ReflectionProperty($this, $name);
      $annotation = $reader->getPropertyAnnotation($property, 'Drupal\yandex_yml\Annotation\YandexYml');
      if ($annotation) {
        $property_info = $annotation->get();

        switch ($property_info['type']) {
          case 'content':
            $result[$property_info['elementName']]['content'] = $value;
            break;

          case 'property':
            $result[$property_info['elementName']]['properties'][$property_info['propertyName']] = $value;
            break;
        }
      }
    }
    return $result;
  }

}