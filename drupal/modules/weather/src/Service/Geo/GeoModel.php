<?php

namespace Drupal\weather\Service\Geo;


class GeoModel {

  private $ip;
  private $city;
  private $region;
  private $areaCode;
  private $dmaCode;
  private $countryCode;
  private $countryName;
  private $continentCode;
  private $latitude;
  private $longitude;

  /**
   * @return mixed
   */
  public function getIp() {
    return $this->ip;
  }

  /**
   * @param mixed $ip
   */
  public function setIp($ip) {
    $this->ip = $ip;
  }

  /**
   * @return mixed
   */
  public function getCity() {
    return $this->city;
  }

  /**
   * @param mixed $city
   */
  public function setCity($city) {
    $this->city = $city;
  }

  /**
   * @return mixed
   */
  public function getRegion() {
    return $this->region;
  }

  /**
   * @param mixed $region
   */
  public function setRegion($region) {
    $this->region = $region;
  }

  /**
   * @return mixed
   */
  public function getAreaCode() {
    return $this->areaCode;
  }

  /**
   * @param mixed $areaCode
   */
  public function setAreaCode($areaCode) {
    $this->areaCode = $areaCode;
  }

  /**
   * @return mixed
   */
  public function getDmaCode() {
    return $this->dmaCode;
  }

  /**
   * @param mixed $dmaCode
   */
  public function setDmaCode($dmaCode) {
    $this->dmaCode = $dmaCode;
  }

  /**
   * @return mixed
   */
  public function getCountryCode() {
    return $this->countryCode;
  }

  /**
   * @param mixed $countryCode
   */
  public function setCountryCode($countryCode) {
    $this->countryCode = $countryCode;
  }

  /**
   * @return mixed
   */
  public function getCountryName() {
    return $this->countryName;
  }

  /**
   * @param mixed $countryName
   */
  public function setCountryName($countryName) {
    $this->countryName = $countryName;
  }

  /**
   * @return mixed
   */
  public function getContinentCode() {
    return $this->continentCode;
  }

  /**
   * @param mixed $continentCode
   */
  public function setContinentCode($continentCode) {
    $this->continentCode = $continentCode;
  }

  /**
   * @return mixed
   */
  public function getLatitude() {
    return $this->latitude;
  }

  /**
   * @param mixed $latitude
   */
  public function setLatitude($latitude) {
    $this->latitude = $latitude;
  }

  /**
   * @return mixed
   */
  public function getLongitude() {
    return $this->longitude;
  }

  /**
   * @param mixed $longitude
   */
  public function setLongitude($longitude) {
    $this->longitude = $longitude;
  }

}