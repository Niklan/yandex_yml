<?php

namespace Drupal\yandex_yml;

use Drupal\Component\Datetime\Time;
use Drupal\Core\Datetime\DateFormatter;
use Drupal\yandex_yml\YandexYml\Category\YandexYmlCategory;
use Drupal\yandex_yml\YandexYml\Currency\YandexYmlCurrency;
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
   * @var array
   */
  private $currencies = [];

  /**
   * @var array
   */
  private $categories = [];

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
    $this->writeCurrencies();
    $this->writeCategories();
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
    $this->writer->startElement('shop');
  }

  /**
   * Write ShopInfo.
   */
  protected function writeShopInfo() {
    foreach ($this->getShopInfo()->toArray() as $element_name => $data) {
      $this->writer->writeElement($element_name, $data['content']);
    }
  }

  /**
   * Write currencies.
   */
  protected function writeCurrencies() {
    if (!empty($this->currencies)) {
      $this->writer->startElement('currencies');
      foreach ($this->currencies as $currency) {
        $this->writeElementFromArray($currency->toArray());
      }
      $this->writer->endElement();
    }
  }

  /**
   * Write categories.
   */
  protected function writeCategories() {
    if (!empty($this->categories)) {
      $this->writer->startElement('categories');
      foreach ($this->categories as $category) {
        $this->writeElementFromArray($category->toArray());
      }
      $this->writer->endElement();
    }
  }

  /**
   * Write document footer.
   */
  protected function writeFooter() {
    // shop
    $this->writer->fullEndElement();
    // yml_catalog
    $this->writer->fullEndElement();
  }

  /**
   * Write element according to YandexYml annotation.
   */
  protected function writeElementFromArray(array $value) {
    $element_name = key($value);
    $content = !empty($value[$element_name]['content']) ? $value[$element_name]['content'] : NULL;
    $properties = !empty($value[$element_name]['properties']) ? $value[$element_name]['properties'] : NULL;
    $this->writer->startElement($element_name);
    if ($properties) {
      foreach ($properties as $name => $value) {
        $this->writer->writeAttribute($name, $value);
      }
    }
    $this->writer->text($content);
    $this->writer->endElement();
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

  /**
   * @param \Drupal\yandex_yml\YandexYml\Currency\YandexYmlCurrency $currency
   *
   * @return YandexYmlGenerator
   */
  public function addCurrency(YandexYmlCurrency $currency) {
    // @todo Clone used cuz php store the first object for each entry. If you
    // know workaround, pls help.
    $this->currencies[$currency->getId()] = clone $currency;
    return $this;
  }

  /**
   * @return array
   */
  public function getCurrencies() {
    return $this->currencies;
  }

  /**
   * @param array $categories
   */
  public function addCategory(YandexYmlCategory $category) {
    $this->categories[$category->getId()] = clone $category;
    return $this;
  }

  /**
   * @return array
   */
  public function getCategories() {
    return $this->categories;
  }

}
