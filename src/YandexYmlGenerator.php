<?php

namespace Drupal\yandex_yml;

use Drupal\Component\Datetime\Time;
use Drupal\Core\Datetime\DateFormatter;
use Drupal\yandex_yml\YandexYml\Category\YandexYmlCategory;
use Drupal\yandex_yml\YandexYml\Currency\YandexYmlCurrency;
use Drupal\yandex_yml\YandexYml\Delivery\YandexYmlDelivery;
use Drupal\yandex_yml\YandexYml\Offer\YandexYmlOfferBase;
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
   * @var array
   */
  private $deliveryOptions = [];

  /**
   * @var array
   */
  private $offers = [];

  /**
   * Constructs a new YandexYmlGenerator object.
   */
  public function __construct(Time $date_time, DateFormatter $date_formatter) {
    $this->dateTime = $date_time;
    $this->dateFormatter = $date_formatter;
    // Prepare temporary file.
    $this->tempFilePath = @\Drupal::service('file_system')
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
    $this->writeDeliveryOptions();
    $this->writeOffers();
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
    $this->writeElementFromArray($this->getShopInfo()->toArray());
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
   * Write delivery options.
   */
  protected function writeDeliveryOptions() {
    if (!empty($this->deliveryOptions)) {
      $this->writer->startElement('delivery-options');
      foreach ($this->deliveryOptions as $delivery_option) {
        $this->writeElementFromArray($delivery_option->toArray());
      }
      $this->writer->endElement();
    }
  }

  /**
   * Write offers.
   */
  protected function writeOffers() {
    if (!empty($this->offers)) {
      $this->writer->startElement('offers');
      foreach ($this->offers as $offer) {
        $this->writeElementFromArray($offer->toArray());
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
  protected function writeElementFromArray(array $values) {
    foreach ($values as $value) {
      $element_name = $value['name'];
      $element_value = !empty($value['value']) ? $value['value'] : NULL;
      $element_attributes = !empty($value['attributes']) ? $value['attributes'] : NULL;
      $element_child = !empty($value['child']) ? $value['child'] : NULL;
      $this->writer->startElement($element_name);
      if ($element_attributes) {
        foreach ($element_attributes as $element_attribute) {
          $this->preprocessValue($element_attribute['value']);
          $this->writer->writeAttribute($element_attribute['name'], $element_attribute['value']);
        }
      }
      if ($element_value) {
        $this->preprocessValue($element_value);
        $this->writer->text($element_value);
      }
      if ($element_child) {
        $this->writeElementFromArray($element_child);
      }
      $this->writer->endElement();
    }
  }

  /**
   * Several additional processes for values.
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
    $this->currencies[$currency->getId()] = $currency;
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
    $this->categories[$category->getId()] = $category;
    return $this;
  }

  /**
   * @return array
   */
  public function getCategories() {
    return $this->categories;
  }

  /**
   * @param array $deliveryOptions
   */
  public function addDeliveryOption(YandexYmlDelivery $delivery_option) {
    $this->deliveryOptions[] = $delivery_option;
  }

  /**
   * @return array
   */
  public function getDeliveryOptions() {
    return $this->deliveryOptions;
  }

  /**
   * @param \Drupal\yandex_yml\YandexYml\Offer\YandexYmlOfferBase $offer
   */
  public function addOffer(YandexYmlOfferBase $offer) {
    $this->offers[] = $offer;
  }

  /**
   * @return array
   */
  public function getOffers() {
    return $this->offers;
  }

}
