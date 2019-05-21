<?php

namespace Drupal\yandex_yml\YandexYml;

use Doctrine\Common\Annotations\AnnotationReader;
use Doctrine\Common\Annotations\AnnotationRegistry;
use Drupal\yandex_yml\Annotation\YandexYmlXmlBase;
use InvalidArgumentException;
use ReflectionClass;

/**
 * Contains annotations for an object in value object manner.
 *
 * @package Drupal\yandex_yml\YandexYml
 */
class AnnotatedObject {

  protected $className;

  protected $annotationReader;

  protected $classAnnotations = [];

  protected $propertyAnnotations = [];

  protected $methodAnnotations = [];

  public function __construct($object) {
    if (!is_object($object)) {
      throw new InvalidArgumentException('The argument must be of object type.');
    }

    $this->className = get_class($object);
    $this->annotationReader = new AnnotationReader();
    // Register the namespaces of classes that can be used for annotations.
    AnnotationRegistry::registerLoader('class_exists');

    $this->processReflections($object);

    // Help GC to free memory when needed.
    unset($this->annotationReader);
  }

  protected function processReflections($object) {
    $reflection = new ReflectionClass($object);
    $this->setClassAnnotations($reflection);
    $this->setPropertyAnnotations($reflection);
    $this->setMethodAnnotations($reflection);

    if ($parent_object = $reflection->getParentClass()) {
      $this->processReflections($parent_object);
    }

    unset($reflection);
  }

  protected function setClassAnnotations(ReflectionClass $reflection) {
    $class_annotations = $this->annotationReader->getClassAnnotations($reflection);

    foreach ($class_annotations as $class_annotation) {
      if ($class_annotation instanceof YandexYmlXmlBase) {
        $this->classAnnotations[] = $class_annotation;
      }
    }
  }

  protected function setPropertyAnnotations(ReflectionClass $reflection) {
    foreach ($reflection->getProperties() as $property) {
      $property_annotations = $this->annotationReader->getPropertyAnnotations($property);

      foreach ($property_annotations as $property_annotation) {
        if ($property_annotation instanceof YandexYmlXmlBase) {
          $this->propertyAnnotations[$property->getName()][] = $property_annotation;
        }
      }
    }
  }

  // @todo maybe store values by annotation class name as key.
  protected function setMethodAnnotations(ReflectionClass $reflection) {
    foreach ($reflection->getMethods() as $method) {
      $method_annotations = $this->annotationReader->getMethodAnnotations($method);

      foreach ($method_annotations as $method_annotation) {
        if ($method_annotation instanceof YandexYmlXmlBase) {
          $this->methodAnnotations[$method->getName()][] = $method_annotation;
        }
      }
    }
  }

  public function getClassAnnotation($annotation) {
    foreach ($this->classAnnotations as $class_annotation) {
      if (get_class($class_annotation) === $annotation) {
        return $class_annotation;
      }
    }
  }

  public function getPropertyAnnotation($property_name, $annotation) {
    if (!isset($this->propertyAnnotations[$property_name])) {
      return NULL;
    }

    foreach ($this->propertyAnnotations[$property_name] as $property_annotation) {
      if (get_class($property_annotation) === $annotation) {
        return $property_annotation;
      }
    }
  }

  public function getPropertiesWithAnnotation($annotation) {
    $result = &drupal_static(__CLASS__ . ':' . __METHOD__ . ':' . $this->className . ':' . $annotation, []);

    if (empty($result)) {
      foreach ($this->propertyAnnotations as $property_name => $property_annotations) {
        foreach ($property_annotations as $property_annotation) {
          if (get_class($property_annotation) === $annotation) {
            $result[] = $property_name;
          }
        }
      }
    }

    return $result;
  }

  public function getMethodsWithAnnotation($annotation) {
    $result = &drupal_static(__CLASS__ . ':' . __METHOD__ . ':' . $this->className . ':' . $annotation, []);

    if (empty($result)) {
      foreach ($this->methodAnnotations as $method_name => $method_annotations) {
        foreach ($method_annotations as $method_annotation) {
          if (get_class($method_annotation) === $annotation) {
            $result[] = $method_name;
          }
        }
      }
    }

    return $result;
  }

  public function getMethodAnnotation($method_name, $annotation) {
    if (!isset($this->methodAnnotations[$method_name])) {
      return NULL;
    }

    foreach ($this->methodAnnotations[$method_name] as $method_annotation) {
      if (get_class($method_annotation) === $annotation) {
        return $method_annotation;
      }
    }

    return NULL;
  }

}
