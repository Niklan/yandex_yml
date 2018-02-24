<?php

namespace Drupal\yandex_yml\YandexYml\Shop;

use Drupal\yandex_yml\Annotation\YandexYml;
use Drupal\yandex_yml\YandexYml\YandexYmlToArrayTrait;

/**
 * Class YandexYmlShop.
 *
 * @see https://yandex.ru/support/partnermarket/export/yml.html
 */
class YandexYmlShop {

  use YandexYmlToArrayTrait;

  /**
   * @YandexYml(
   *   type = "content",
   *   elementName = "name"
   * )
   *
   * @var string
   */
  private $name;

  /**
   * @YandexYml(
   *   type = "content",
   *   elementName = "company"
   * )
   *
   * @var string
   */
  private $company;

  /**
   * @YandexYml(
   *   type = "content",
   *   elementName = "url"
   * )
   *
   * @var string
   */
  private $url;

  /**
   * @YandexYml(
   *   type = "content",
   *   elementName = "platform"
   * )
   *
   * @var string
   */
  private $platform;

  /**
   * @YandexYml(
   *   type = "content",
   *   elementName = "version"
   * )
   *
   * @var string
   */
  private $version;

  /**
   * @YandexYml(
   *   type = "content",
   *   elementName = "agency"
   * )
   *
   * @var string
   */
  private $agency;

  /**
   * @YandexYml(
   *   type = "content",
   *   elementName = "email"
   * )
   *
   * @var string
   */
  private $email;

  /**
   * @YandexYml(
   *   type = "content",
   *   elementName = "cpa"
   * )
   *
   * @var int
   */
  private $cpa;

  /**
   * @param string $name
   *
   * @return YandexYmlShop
   */
  public function setName($name) {
    $this->name = $name;
    return $this;
  }

  /**
   * @return string
   */
  public function getName() {
    return $this->name;
  }

  /**
   * @param string $company
   *
   * @return YandexYmlShop
   */
  public function setCompany($company) {
    $this->company = $company;
    return $this;
  }

  /**
   * @return string
   */
  public function getCompany() {
    return $this->company;
  }

  /**
   * @param string $url
   *
   * @return YandexYmlShop
   */
  public function setUrl($url) {
    $this->url = $url;
    return $this;
  }

  /**
   * @return string
   */
  public function getUrl() {
    return $this->url;
  }

  /**
   * @param string $platform
   *
   * @return YandexYmlShop
   */
  public function setPlatform($platform) {
    $this->platform = $platform;
    return $this;
  }

  /**
   * @return string
   */
  public function getPlatform() {
    return $this->platform;
  }

  /**
   * @param string $version
   *
   * @return YandexYmlShop
   */
  public function setVersion($version) {
    $this->version = $version;
    return $this;
  }

  /**
   * @return string
   */
  public function getVersion() {
    return $this->version;
  }

  /**
   * @param string $agency
   *
   * @return YandexYmlShop
   */
  public function setAgency($agency) {
    $this->agency = $agency;
    return $this;
  }

  /**
   * @return string
   */
  public function getAgency() {
    return $this->agency;
  }

  /**
   * @param string $email
   *
   * @return YandexYmlShop
   */
  public function setEmail($email) {
    $this->email = $email;
    return $this;
  }

  /**
   * @return string
   */
  public function getEmail() {
    return $this->email;
  }

  /**
   * @param int $cpa
   *
   * @return YandexYmlShop
   */
  public function setCpa($cpa) {
    $this->cpa = $cpa;
    return $this;
  }

  /**
   * @return int
   */
  public function getCpa() {
    return $this->cpa;
  }

  /**
   * Set default values.
   */
  public function __construct() {
    $this->setUrl(\Drupal::request()->getSchemeAndHttpHost());
    $this->setPlatform('Drupal');
    $this->setVersion(\Drupal::VERSION);
  }

}