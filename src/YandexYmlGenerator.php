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
use Drupal\yandex_yml\Annotation\YandexYmlXmlElementWrapper;
use Drupal\yandex_yml\Annotation\YandexYmlXmlRootElement;
use Drupal\yandex_yml\Utils\Utils;
use Drupal\yandex_yml\YandexYml\Shop\Shop;
use Drupal\yandex_yml\YandexYml\AnnotatedObject;
use XMLWriter;

/**
 * Class YandexYmlGenerator.
 */
class YandexYmlGenerator implements YandexYmlGeneratorInterface {

  const XML_ROOT_ELEMENT = 'Drupal\yandex_yml\Annotation\YandexYmlXmlRootElement';

  const XML_ELEMENT = 'Drupal\yandex_yml\Annotation\YandexYmlXmlElement';

  const XML_ELEMENT_WRAPPER = 'Drupal\yandex_yml\Annotation\YandexYmlXmlElementWrapper';

  const XML_ATTRIBUTE = 'Drupal\yandex_yml\Annotation\YandexYmlXmlAttribute';

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
    $this->processClass($this->getShop());
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
    $annotated_object = $this->getAnnotatedObject($element);

    // If object is root xml element (contains another elements).
    if ($xml_root_element = $annotated_object->getClassAnnotation($this::XML_ROOT_ELEMENT)) {
      $this->writer->startElement($xml_root_element->getName());
      $this->processProperties($element);
      $this->processMethods($element);
      $this->writer->fullEndElement();
    }
    elseif ($xml_element = $annotated_object->getClassAnnotation($this::XML_ELEMENT)) {
      // @todo maybe need to handle a bit differently. For example looking only
      //   for attributes and value, not allows nested elements.
      $this->writer->startElement($xml_element->getName());
      $this->processProperties($element);
      $this->processMethods($element);
      $this->writer->fullEndElement();
    }
  }

  // @todo split up method to simple or make this flexible.
  protected function processProperties($element) {
    $annotated_object = $this->getAnnotatedObject($element);
    // Attributes.
    $attribute_properties = $annotated_object->getPropertiesWithAnnotation($this::XML_ATTRIBUTE);
    foreach ($attribute_properties as $property_name) {
      $property_annotation = $annotated_object->getPropertyAnnotation($property_name, $this::XML_ATTRIBUTE);

      // Annotation can override attribute name. Property name used as default.
      $attribute_name = $property_annotation->getName() ?: $property_name;
      $callable = $this->getPropertyGetter($element, $property_name);
      if (!$callable) {
        continue;
      }

      $property_value = call_user_func($callable);
      if (!$property_value) {
        continue;
      }

      $this->writer->writeAttribute($attribute_name, $property_value);
    }

    // Elements.
    $element_properties = $annotated_object->getPropertiesWithAnnotation($this::XML_ELEMENT);
    foreach ($element_properties as $property_name) {
      $property_annotation = $annotated_object->getPropertyAnnotation($property_name, $this::XML_ELEMENT);

      // Annotation can override element name. Property name used as default.
      $element_name = $property_annotation->getName() ?: $property_name;
      $callable = $this->getPropertyGetter($element, $property_name);
      if (!$callable) {
        continue;
      }

      $property_value = call_user_func($callable);
      if (!$property_value) {
        continue;
      }

      $this->preprocessValue($property_value);
      $this->writer->startElement($element_name);
      $this->writer->text($property_value);
      $this->writer->fullEndElement();
    }

    // Wrappers.
    $element_wrapper_properties = $annotated_object->getPropertiesWithAnnotation($this::XML_ELEMENT_WRAPPER);
    foreach ($element_wrapper_properties as $wrapper_property_name) {
      $property_annotation = $annotated_object->getPropertyAnnotation($wrapper_property_name, $this::XML_ELEMENT_WRAPPER);

      // Annotation can override element name. Property name used as default.
      $element_name = $property_annotation->getName() ?: $wrapper_property_name;
      $callable = $this->getPropertyGetter($element, $wrapper_property_name);
      if (!$callable) {
        continue;
      }

      // Wrappers means that value is multiple.
      $property_values = call_user_func($callable);
      if (!$property_values || !$property_values instanceof \Traversable) {
        continue;
      }

      $this->writer->startElement($element_name);
      foreach ($property_values as $property_value) {
        $this->processClass($property_value);
      }
      $this->writer->fullEndElement();
    }
  }

  protected function getPropertyGetter($element, $property_name) {
    $callable = [
      $element,
      Utils::predictGetterName($property_name),
    ];

    return is_callable($callable) ? $callable : NULL;
  }

  protected function processMethods($element) {
    $annotated_object = $this->getAnnotatedObject($element);
    // @todo complete or remove. For now there is no methods with annotations
    //   but in theory, this must be better solution then annotated protected
    //   properties.
  }

  protected function getAnnotatedObject($object) {
    $result = &drupal_static(__CLASS__ . ':annotated_object:' . get_class($object));

    if (!isset($result)) {
      $result = new AnnotatedObject($object);
    }

    return $result;
  }

  /**
   * {@inheritdoc}
   */
  public function getShop() {
    return $this->shopInfo;
  }

  /**
   * {@inheritdoc}
   */
  public function setShop(Shop $shop_info) {
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
