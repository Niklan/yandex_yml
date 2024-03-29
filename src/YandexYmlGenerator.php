<?php

namespace Drupal\yandex_yml;

use Drupal\Component\Datetime\Time;
use Drupal\Core\Datetime\DateFormatter;
use Drupal\Core\File\FileSystemInterface;
use Drupal\yandex_yml\Xml\ElementInterface;
use Drupal\yandex_yml\YandexYml\Shop\Shop;
use XMLWriter;

/**
 * Class YandexYmlGenerator.
 */
class YandexYmlGenerator implements YandexYmlGeneratorInterface {

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
   * The file system.
   *
   * @var \Drupal\Core\File\FileSystemInterface
   */
  protected $fileSystem;

  /**
   * Constructs a new YandexYmlGenerator object.
   *
   * @param \Drupal\Component\Datetime\Time $date_time
   *   The datetime.
   * @param \Drupal\Core\Datetime\DateFormatter $date_formatter
   *   The date formatter.
   * @param \Drupal\Core\File\FileSystemInterface $file_system
   *   The file system service.
   */
  public function __construct(
    Time $date_time,
    DateFormatter $date_formatter,
    FileSystemInterface $file_system
  ) {

    $this->dateTime = $date_time;
    $this->dateFormatter = $date_formatter;
    $this->fileSystem = $file_system;
  }

  /**
   * {@inheritdoc}
   *
   * @todo maybe return path URI as result. Also, maybe it is good to handle
   *   leading dashes for path.
   */
  public function generateFile($filename = 'products.xml', $destination_path = 'public://') {
    $this->prepareTemporaryFile()
      ->setWriter()
      ->buildData();

    $this->fileSystem->copy(
      $this->tempFilePath,
      $destination_path . $filename,
      FileSystemInterface::EXISTS_REPLACE
    );
  }

  /**
   * Prepare temporary file.
   */
  protected function prepareTemporaryFile() {
    $this->tempFilePath = $this->fileSystem->tempnam('temporary://yandex_yml', 'yml_');

    return $this;
  }

  /**
   * Initialize the XML writer.
   */
  protected function setWriter() {
    $this->writer = new XMLWriter();
    $this->writer->openURI($this->tempFilePath);
    $this->writer->setIndentString("\t");
    $this->writer->setIndent(TRUE);

    return $this;
  }

  /**
   * Write elements to writer object.
   */
  protected function buildData() {
    $this->writeHeader();
    $this->processElement($this->getShop());
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
   * Process XML <element> representation.
   *
   * @param \Drupal\yandex_yml\Xml\ElementInterface $element
   *   The element objects.
   */
  protected function processElement(ElementInterface $element) {
    $this->writer->startElement($element->getElementName());
    $this->processAttributes($element);
    $this->processValue($element);
    $this->processChildren($element);
    $this->writer->fullEndElement();
  }

  /**
   * Process attributes for an element.
   *
   * @param \Drupal\yandex_yml\Xml\ElementInterface $element
   *   The element which attributes must be processed.
   */
  protected function processAttributes(ElementInterface $element) {
    /** @var \Drupal\yandex_yml\Xml\AttributeInterface $attribute */
    foreach ($element->getElementAttributes() as $attribute) {
      $this->writer->writeAttribute($attribute->getName(), $attribute->getValue());
    }
  }

  /**
   * Process element plain value.
   *
   * @param \Drupal\yandex_yml\Xml\ElementInterface $element
   *   The element which value must be processed.
   */
  protected function processValue(ElementInterface $element) {
    $value = $element->getElementValue();

    if (is_bool($value)) {
      $value = $value ? 'true' : 'false';
    }

    if (!$value) {
      return;
    }

    if ($element->getCdata()) {
      $this->writer->writeCdata($value);
    }
    else {
      // Custom sanitization since XMLWriter can't handle single quote escaping.
      $value = htmlspecialchars($value, ENT_QUOTES | ENT_XML1, 'UTF-8');
      $this->writer->writeRaw($value);
    }
  }

  /**
   * Process children.
   *
   * @param \Drupal\yandex_yml\Xml\ElementInterface $element
   *   The element which children must be processed.
   */
  protected function processChildren(ElementInterface $element) {
    foreach ($element->getElementChildren() as $child) {
      $this->processElement($child);
    }
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
