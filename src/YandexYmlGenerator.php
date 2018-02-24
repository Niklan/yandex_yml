<?php

namespace Drupal\yandex_yml;

use Drupal\Component\Datetime\Time;
use Drupal\Core\Datetime\DateFormatter;
use Drupal\yandex_yml\YandexYml\Shop\YandexYmlShop;

/**
 * Class YandexYmlGenerator.
 */
class YandexYmlGenerator implements YandexYmlGeneratorInterface {

  /**
   * @var \XMLWriter
   */
  private $writer;

  /**
   * @var string
   */
  private $tempFilePath;

  /**
   * @var \Drupal\yandex_yml\YandexYml\Shop\YandexYmlShop
   */
  private $shopInfo;

  /**
   * @var \Drupal\Component\Datetime\Time
   */
  private $dateTime;

  /**
   * @var \Drupal\Core\Datetime\DateFormatter
   */
  private $dateFormatter;

  /**
   * Constructs a new YandexYmlGenerator object.
   */
  public function __construct(Time $date_time, DateFormatter $date_formatter) {
    $this->dateTime = $date_time;
    $this->dateFormatter = $date_formatter;
    // Prepare temporary file.
    $this->tempFilePath = \Drupal::service('file_system')
      ->tempnam('yandex_yml', 'yml_');
    // Initialization of file.
    $this->writer = new \XMLWriter();
    $this->writer->openURI($this->tempFilePath);
    $this->writer->setIndentString("\t");
    $this->writer->setIndent(TRUE);
  }

  /**
   * Generate file on all provided data.
   */
  public function generateFile() {
    $this->writeHeader();
    $this->writeShopInfo();
    $this->writeFooter();
    $this->writer->endDocument();
    file_unmanaged_copy($this->tempFilePath, 'public://test-yandex-yml.xml', FILE_EXISTS_REPLACE);
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
  protected function writeShopInfo() {
    foreach ($this->getShopInfo()->toArray() as $name => $value) {
      $this->writer->writeElement($name, $value);
    }
  }

  /**
   * Write document footer.
   */
  protected function writeFooter() {
    // yml_catalog
    $this->writer->fullEndElement();
  }

  /**
   * Set shop info.
   *
   * @param \Drupal\yandex_yml\YandexYml\Shop\YandexYmlShop $shop_info
   */
  public function setShopInfo(YandexYmlShop $shop_info) {
    $this->shopInfo = $shop_info;
    return $this;
  }

  /**
   * @return \Drupal\yandex_yml\YandexYml\Shop\YandexYmlShop
   */
  public function getShopInfo() {
    return $this->shopInfo;
  }

}
