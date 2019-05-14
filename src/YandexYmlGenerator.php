<?php

namespace Drupal\yandex_yml;

use Doctrine\Common\Annotations\AnnotationReader;
use Doctrine\Common\Annotations\AnnotationRegistry;
use Drupal;
use Drupal\Component\Datetime\Time;
use Drupal\Core\Datetime\DateFormatter;
use Drupal\yandex_yml\Annotation\YandexYmlElement;
use Drupal\yandex_yml\Annotation\YandexYmlXmlBase;
use Drupal\yandex_yml\Annotation\YandexYmlXmlElement;
use Drupal\yandex_yml\Annotation\YandexYmlXmlRootElement;
use Drupal\yandex_yml\Utils\Utils;
use Drupal\yandex_yml\YandexYml\Shop\YandexYmlShop;
use ReflectionClass;
use XMLWriter;

/**
 * Class YandexYmlGenerator.
 */
class YandexYmlGenerator implements YandexYmlGeneratorInterface {

  protected $counter;

  /**
   * The XML writer.
   *
   * @var \XMLWriter
   */
  protected $writer;

  /**
   * The path to temp file.
   *
   * @var string
   */
  protected $tempFilePath;

  /**
   * The shop info.
   *
   * @var \Drupal\yandex_yml\YandexYml\Shop\YandexYmlShop
   */
  protected $shopInfo;

  /**
   * The datetime.
   *
   * @var \Drupal\Component\Datetime\Time
   */
  protected $dateTime;

  /**
   * The date formatter.
   *
   * @var \Drupal\Core\Datetime\DateFormatter
   */
  protected $dateFormatter;

  /**
   * The currencies.
   *
   * @var \Drupal\yandex_yml\YandexYml\Currency\YandexYmlCurrency[]
   */
  protected $currencies = [];

  /**
   * The categories.
   *
   * @var \Drupal\yandex_yml\YandexYml\Category\YandexYmlCategory[]
   */
  protected $categories = [];

  /**
   * The delivery options.
   *
   * @var \Drupal\yandex_yml\YandexYml\Delivery\YandexYmlDelivery[]
   */
  protected $deliveryOptions = [];

  /**
   * The offers.
   *
   * @var \Drupal\yandex_yml\YandexYml\Offer\YandexYmlOfferBaseInterface[]
   */
  protected $offers = [];

  /**
   * The annotation reader.
   *
   * @var \Doctrine\Common\Annotations\AnnotationReader
   */
  protected $annotationReader;

  /**
   * Constructs a new YandexYmlGenerator object.
   *
   * @param \Drupal\Component\Datetime\Time $date_time
   *   The datetime.
   * @param \Drupal\Core\Datetime\DateFormatter $date_formatter
   *   The date formatter.
   */
  public function __construct(Time $date_time, DateFormatter $date_formatter) {
    $this->dateTime = $date_time;
    $this->dateFormatter = $date_formatter;
    // Prepare temporary file.
    $this->tempFilePath = Drupal::service('file_system')
      ->tempnam('temporary://yandex_yml', 'yml_');
    // Initialization of file.
    $this->writer = new XMLWriter();
    $this->writer->openURI($this->tempFilePath);
    $this->writer->setIndentString("\t");
    $this->writer->setIndent(TRUE);

    $this->annotationReader = new AnnotationReader();
    // Register the namespaces of classes that can be used for annotations.
    AnnotationRegistry::registerLoader('class_exists');
  }

  /**
   * {@inheritdoc}
   */
  public function generateFile($filename = 'products.xml', $destination_path = 'public://') {
    $this->buildData();
    file_unmanaged_copy($this->tempFilePath, $destination_path . $filename, FILE_EXISTS_REPLACE);
  }

  /**
   * Write elements to writer object.
   */
  protected function buildData() {
    $this->writeHeader();
    $this->processClass($this->getShopInfo());
    $this->writeFooter();
  }

  /**
   * Write document headers.
   */
  protected function writeHeader() {
    $date = $this->dateFormatter->format($this->dateTime->getRequestTime(), 'custom', 'Y-m-d H:i');
    $this->writer->startDocument('1.0', 'UTF-8');
    $this->writer->startDTD('yml_catalog', NULL, 'shops.dtd');
    $this->writer->endDTD();
    $this->writer->startElement('yml_catalog');
    $this->writer->writeAttribute('date', $date);
  }

  protected function processClass($element) {
    $class_annotation = $this->parseClassAnnotation($element);

    // If object is root xml element (contains another elements).
    if ($class_annotation instanceof YandexYmlXmlRootElement) {
      $this->writer->startElement($class_annotation->getName());
      $this->processMethods($element);
      $this->writer->fullEndElement();
    }
    else {
      $this->processMethods($element);
    }
  }

  protected function parseClassAnnotation($element) {
    $result = &drupal_static(__CLASS__ . ':class_annotation:' . get_class($element));

    if (!isset($result)) {
      $reflection = $this->getClassReflection($element);
      // Classes can be only YandexYmlXmlRootElement.
      $annotation_name = 'Drupal\yandex_yml\Annotation\YandexYmlXmlRootElement';
      $result = $this->annotationReader->getClassAnnotation($reflection, $annotation_name);
    }

    return $result;
  }

  protected function processMethods($element) {
    $reflection = $this->getClassReflection($element);
    // @todo
  }

  protected function processProperties($element) {
    $properties = $this->parsePropertiesAnnotations($element);
    // @toto this loop can be cached in static in future.
    foreach ($properties as $property_info) {
      // Only for properties that has parsed annotations.
      if (empty($property_info['annotations'])) {
        continue;
      }

      foreach ($property_info['annotations'] as $annotation) {
        // Skip if annotation is not based on our special base object.
        if (!$annotation instanceof YandexYmlXmlBase) {
          continue;
        }

        if ($annotation instanceof YandexYmlElement) {
          $callable = [
            $element,
            Utils::predictGetterName($property_info['property_name']),
          ];

          if (is_callable($callable)) {
            $value = call_user_func($callable);
            dump($value);

            if (is_object($value)) {
              $this->processClass($value);
            }
            else {
              $this->writer->startElement($annotation->getElementName());
              $this->writer->writeCdata($value);
              $this->writer->fullEndElement();
            }
          }
        }
      }
    }
  }

  protected function parsePropertiesAnnotations($element) {
    $result = &drupal_static(__CLASS__ . ':property_annotations:' . get_class($element));

    if (!isset($result)) {
      $reflection = $this->getClassReflection($element);

      foreach ($reflection->getProperties() as $property) {
        $result[] = [
          'property_name' => $property->getName(),
          'annotations' => $this->annotationReader->getPropertyAnnotations($property),
        ];
      }
    }

    return $result;
  }

  protected function getClassReflection($element) {
    $result = &drupal_static('yandex_yml:class_reflection:' . get_class($element));

    if (!isset($result)) {
      $result = new ReflectionClass($element);
    }

    return $result;
  }

  /**
   * {@inheritdoc}
   */
  public function getShopInfo() {
    return $this->shopInfo;
  }

  /**
   * {@inheritdoc}
   */
  public function setShopInfo(YandexYmlShop $shop_info) {
    $this->shopInfo = $shop_info;

    return $this;
  }

  /**
   * Write document footer.
   */
  protected function writeFooter() {
    // Close "yml_catalog".
    $this->writer->fullEndElement();
    $this->writer->endDocument();
  }

  /**
   * {@inheritdoc}
   */
  public function generateMarkup() {
    $this->buildData();

    return $this->writer->outputMemory();
  }

  /**
   * Several additional processes for values.
   *
   * @param mixed $value
   *   The value to process of.
   */
  protected function preprocessValue(&$value) {
    if (is_bool($value)) {
      $value = $value ? 'true' : 'false';
    }
    str_replace('"', '&quot;', $value);
    str_replace('&', '&amp;', $value);
    str_replace('>', '&gt;', $value);
    str_replace('<', '&lt;', $value);
    str_replace("'", '&apos;', $value);
  }

}
