<?php

namespace Drupal\yandex_yml;

use Doctrine\Common\Annotations\AnnotationReader;
use Doctrine\Common\Annotations\AnnotationRegistry;
use Drupal;
use Drupal\Component\Datetime\Time;
use Drupal\Core\Datetime\DateFormatter;
use Drupal\yandex_yml\Annotation\YandexYmlElement;
use Drupal\yandex_yml\YandexYml\Shop\YandexYmlShop;
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
    $this->writeElement($this->getShopInfo());
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

  /**
   * Write ShopInfo.
   */
  protected function writeElement($element) {
    $this->processClass($element);
  }

  protected function processClass($element) {
    $class_annotation = $this->parseClassAnnotation($element);

    // Process <element>.
    if ($class_annotation instanceof YandexYmlElement) {
      $this->writer->startElement($class_annotation->getElementName());
      $this->processProperties($element);
      $this->writer->fullEndElement();
    }
  }

  protected function processProperties($element) {
    $result = &drupal_static(__CLASS__ . ':property_annotation:' . get_class($element));

    if (!isset($result)) {
      $reflection = new \ReflectionClass($element);
      foreach ($reflection->getProperties() as $property) {
        $annotation = $this->annotationReader->getPropertyAnnotations($property);
        dump($annotation);
      }
    }

    return $result;
  }

  /**
   * Parse YandexYml elements.
   */
  protected function parseClassAnnotation($element) {
    $result = &drupal_static(__CLASS__ . ':class_annotation:' . get_class($element));

    if (!isset($result)) {
      $reflection = new \ReflectionClass($element);
      $annotation_name = 'Drupal\yandex_yml\Annotation\YandexYmlElement';
      $result = $this->annotationReader->getClassAnnotation($reflection, $annotation_name);
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

}
