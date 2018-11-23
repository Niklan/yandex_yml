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
   * The XML writer.
   *
   * @var \XMLWriter
   */
  private $writer;

  /**
   * The path to temp file.
   *
   * @var string
   */
  private $tempFilePath;

  /**
   * The shop info.
   *
   * @var \Drupal\yandex_yml\YandexYml\Shop\YandexYmlShop
   */
  private $shopInfo;

  /**
   * The datetime.
   *
   * @var \Drupal\Component\Datetime\Time
   */
  private $dateTime;

  /**
   * The date formatter.
   *
   * @var \Drupal\Core\Datetime\DateFormatter
   */
  private $dateFormatter;

  /**
   * The currencies.
   *
   * @var \Drupal\yandex_yml\YandexYml\Currency\YandexYmlCurrency[]
   */
  private $currencies = [];

  /**
   * The categories.
   *
   * @var \Drupal\yandex_yml\YandexYml\Category\YandexYmlCategory[]
   */
  private $categories = [];

  /**
   * The delivery options.
   *
   * @var \Drupal\yandex_yml\YandexYml\Delivery\YandexYmlDelivery[]
   */
  private $deliveryOptions = [];

  /**
   * The offers.
   *
   * @var \Drupal\yandex_yml\YandexYml\Offer\YandexYmlOfferBaseInterface[]
   */
  private $offers = [];

  protected $counter;

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
    $this->tempFilePath = \Drupal::service('file_system')
      ->tempnam('temporary://yandex_yml', 'yml_');
    // Initialization of file.
    $this->writer = new \XMLWriter();
    $this->writer->openURI($this->tempFilePath);
    $this->writer->setIndentString("\t");
    $this->writer->setIndent(TRUE);
  }

  /**
   * {@inheritdoc}
   */
  public function generateFile($filename = 'products.xml', $destination_path = 'public://') {
    $this->buildData();
    file_unmanaged_copy($this->tempFilePath, $destination_path . $filename, FILE_EXISTS_REPLACE);
  }

  /**
   * {@inheritdoc}
   */
  public function generateMarkup() {
    $this->buildData();
    return $this->writer->outputMemory();
  }

  /**
   * Write elements to writer object.
   */
  protected function buildData() {
    $this->writeHeader();
    $this->writeShopInfo();
    $this->writeCurrencies();
    $this->writeCategories();
    $this->writeDeliveryOptions();
    $this->writeOffers();
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
    // Close "shop".
    $this->writer->fullEndElement();
    // Close "yml_catalog".
    $this->writer->fullEndElement();
    $this->writer->endDocument();
  }

  /**
   * Write element according to YandexYml annotation.
   *
   * @param array $values
   *   The values to write from object.
   */
  protected function writeElementFromArray(array $values) {
    foreach ($values as $value) {
      $element_name = $value['name'];
      $element_value = isset($value['value']) ? $value['value'] : NULL;
      $element_attributes = isset($value['attributes']) ? $value['attributes'] : NULL;
      $element_child = isset($value['child']) ? $value['child'] : NULL;
      $this->writer->startElement($element_name);
      if ($element_attributes) {
        foreach ($element_attributes as $element_attribute) {
          $this->preprocessValue($element_attribute['value']);
          $this->writer->writeAttribute($element_attribute['name'], $element_attribute['value']);
        }
      }
      if (isset($element_value)) {
        $this->preprocessValue($element_value);
        if ($element_value != strip_tags($element_value)) {
          $this->writer->writeCData($element_value);
        }
        else {
          $this->writer->text($element_value);
        }
      }
      if ($element_child) {
        $this->writeElementFromArray($element_child);
      }
      $this->writer->endElement();
    }
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
  public function setShopInfo(YandexYmlShop $shop_info) {
    $this->shopInfo = $shop_info;
    return $this;
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
  public function addCurrency(YandexYmlCurrency $currency) {
    $this->currencies[$currency->getId()] = $currency;
    return $this;
  }

  /**
   * {@inheritdoc}
   */
  public function getCurrencies() {
    return $this->currencies;
  }

  /**
   * {@inheritdoc}
   */
  public function addCategory(YandexYmlCategory $category) {
    $this->categories[$category->getId()] = $category;
    return $this;
  }

  /**
   * {@inheritdoc}
   */
  public function getCategories() {
    return $this->categories;
  }

  /**
   * {@inheritdoc}
   */
  public function addDeliveryOption(YandexYmlDelivery $delivery_option) {
    $this->deliveryOptions[] = $delivery_option;
  }

  /**
   * {@inheritdoc}
   */
  public function getDeliveryOptions() {
    return $this->deliveryOptions;
  }

  /**
   * {@inheritdoc}
   */
  public function addOffer(YandexYmlOfferBase $offer) {
    $this->offers[] = $offer;
  }

  /**
   * {@inheritdoc}
   */
  public function getOffers() {
    return $this->offers;
  }

}
