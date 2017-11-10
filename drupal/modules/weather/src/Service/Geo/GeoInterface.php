<?php

namespace Drupal\weather\Service\Geo;

/**
 * Interface GeoInterface
 *
 * @package Drupal\weather\Service\Geo
 */
interface GeoInterface {

  /**
   * Return GeoModel representing the Geo Information from where the IP Originates.
   * It will return null if IP if no Geo Information was found
   * @param string $ip IP Address
   *
   * @return bool|\Drupal\weather\Service\Geo\GeoModel
   */
  function locate($ip);

}