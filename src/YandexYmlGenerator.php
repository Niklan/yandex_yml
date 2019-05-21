<?php

namespace Drupal\yandex_yml;

use Doctrine\Common\Annotations\AnnotationReader;
use Doctrine\Common\Annotations\AnnotationRegistry;
use Drupal;
use Drupal\Component\Datetime\Time;
use Drupal\Core\Datetime\DateFormatter;
use Drupal\yandex_yml\YandexYml\AnnotatedObject;
use Drupal\yandex_yml\YandexYml\Shop\Shop;
use Traversable;
use XMLWriter;

/**
 * Class YandexYmlGenerator.
 */
class YandexYmlGenerator implements YandexYmlGeneratorInterface {

  const XML_ROOT_ELEMENT = 'Drupal\yandex_yml\Annotation\YandexYmlXmlRootElement';

  const XML_ELEMENT = 'Drupal\yandex_yml\Annotation\YandexYmlXmlElement';

  const XML_ELEMENT_WRAPPER = 'Drupal\yandex_yml\Annotation\YandexYmlXmlElementWrapper';

  const XML_ATTRIBUTE = 'Drupal\yandex_yml\Annotation\YandexYmlXmlAttribute';

  const XML_LIST = 'Drupal\yandex_yml\Annotation\YandexYmlXmlList';

  const XML_VALUE = 'Drupal\yandex_yml\Annotation\YandexYmlXmlValue';

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
   * @var \Drupal\yandex_yml\YandexYml\Shop\Shop
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
   * @var \Drupal\yandex_yml\YandexYml\Currency\Currency[]
   */
  protected $currencies = [];

  /**
   * The categories.
   *
   * @var \Drupal\yandex_yml\YandexYml\Category\Category[]
   */
  protected $categories = [];

  /**
   * The delivery options.
   *
   * @var \Drupal\yandex_yml\YandexYml\Delivery\DeliveryOption[]
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
    $this->processXmlRootElement($this->getShop());
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

  protected function processXmlRootElement($element) {
    $annotated_object = $this->getAnnotatedObject($element);
    $xml_root_element = $annotated_object->getClassAnnotation($this::XML_ROOT_ELEMENT);
    $this->writer->startElement($xml_root_element->getName());
    $this->processXmlAttribute($element, $annotated_object);
    $this->processXmlValue($element, $annotated_object);
    $this->processXmlElement($element, $annotated_object);
    $this->processXmlElementWrapper($element, $annotated_object);
    $this->processXmlList($element, $annotated_object);
    $this->writer->fullEndElement();
  }

  protected function processXmlAttribute($element, $annotated_object) {
    $attribute_methods = $annotated_object->getMethodsWithAnnotation($this::XML_ATTRIBUTE);

    foreach ($attribute_methods as $method_name) {
      $method_annotation = $annotated_object->getMethodAnnotation($method_name, $this::XML_ATTRIBUTE);


      $callable = [$element, $method_name];
      if (!$callable) {
        continue;
      }

      $method_value = call_user_func($callable);
      if (!$method_value) {
        continue;
      }

      $this->writer->writeAttribute($method_annotation->getName(), $method_value);
    }
  }

  protected function processXmlValue($element, $annotated_object) {
    $value_methods = $annotated_object->getMethodsWithAnnotation($this::XML_VALUE);
    foreach ($value_methods as $method_name) {
      $callable = [$element, $method_name];
      if (!$callable) {
        continue;
      }

      $method_value = call_user_func($callable);
      if (!$method_value) {
        continue;
      }

      $this->writer->text($method_value);
    }
  }

  protected function processXmlElement($element, $annotated_object) {
    $element_methods = $annotated_object->getMethodsWithAnnotation($this::XML_ELEMENT);
    foreach ($element_methods as $method_name) {
      $method_annotation = $annotated_object->getMethodAnnotation($method_name, $this::XML_ELEMENT);

      $callable = [$element, $method_name];
      if (!$callable) {
        continue;
      }

      $method_value = call_user_func($callable);
      if (!$method_value) {
        continue;
      }

      // If object, it must describe process itself. F.e. age in offer.
      if (is_object($method_value)) {
        $this->processXmlRootElement($method_value);
      }
      else {
        $this->preprocessValue($method_value);
        $this->writer->startElement($method_annotation->getName());
        $this->writer->text($method_value);
        $this->writer->fullEndElement();
      }
    }
  }

  protected function processXmlElementWrapper($element, $annotated_object) {
    $element_wrapper_methods = $annotated_object->getMethodsWithAnnotation($this::XML_ELEMENT_WRAPPER);
    foreach ($element_wrapper_methods as $method_name) {
      $method_annotation = $annotated_object->getMethodAnnotation($method_name, $this::XML_ELEMENT_WRAPPER);

      $callable = [$element, $method_name];
      if (!$callable) {
        continue;
      }

      // Wrappers means that value is multiple.
      $method_values = call_user_func($callable);
      if (!$method_values || !$method_values instanceof Traversable) {
        continue;
      }

      $this->writer->startElement($method_annotation->getName());
      foreach ($method_values as $method_value) {
        $this->processXmlRootElement($method_value);
      }
      $this->writer->fullEndElement();
    }
  }

  protected function processXmlList($element, $annotated_object) {
    $list_methods = $annotated_object->getMethodsWithAnnotation($this::XML_LIST);
    foreach ($list_methods as $method_name) {
      $callable = [$element, $method_name];
      if (!$callable) {
        continue;
      }

      // List means that value is multiple.
      $method_values = call_user_func($callable);
      if (!$method_values || !$method_values instanceof Traversable) {
        continue;
      }

      foreach ($method_values as $method_value) {
        $this->processXmlRootElement($method_value);
      }
    }
  }

  protected function getAnnotatedObject($object) {
    $result = &drupal_static(__CLASS__ . ':' . __METHOD__ . ':' . get_class($object));

    if (!isset($result)) {
      $result = new AnnotatedObject($object);
    }

    return $result;
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

  /**
   * {@inheritdoc}
   */
  public function getShop() {
    return $this->shopInfo;
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
  public function setShop(Shop $shop_info) {
    $this->shopInfo = $shop_info;

    return $this;
  }

  /**
   * {@inheritdoc}
   */
  public function generateMarkup() {
    $this->buildData();

    return $this->writer->outputMemory();
  }

}
