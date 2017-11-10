<?php

namespace Drupal\weather\Service\Geo;

use Drupal\Console\Bootstrap\Drupal;
use Drupal\Core\StringTranslation\StringTranslationTrait;

/**
 * Class GeoPluginService
 *
 * @package Drupal\weather\Service\Geo
 */
class GeoPluginService implements GeoInterface {
  use StringTranslationTrait;

  //the geoPlugin server
  const HOST = 'http://www.geoplugin.net/php.gp';

  const PRIVATE_IP_HOST = 'http://checkip.dyndns.com/';
  /**
   * {@inheritdoc}
   */
  public function locate($ip) {
    $current_ip = $ip;
    // Check if IP is Internal, if internal, then lets use Server's External IP
    if (!filter_var($current_ip,FILTER_VALIDATE_IP,FILTER_FLAG_NO_PRIV_RANGE|FILTER_FLAG_NO_RES_RANGE)){
      $external_ip_info = \Drupal::httpClient()->get(self::PRIVATE_IP_HOST)->getBody()->getContents();
      preg_match('/Current IP Address: ([\[\]:.[0-9a-fA-F]+)</', $external_ip_info, $current_ip);
      $current_ip = $current_ip[1];
    }

    $response = \Drupal::httpClient()->get(self::HOST, ['query' =>['ip'=>$current_ip]]);

    // If not 200, log error and return
    if ($response->getStatusCode() != '200') {
      $error_message = $this->t('Error on request to: @host, status code: @sc, body: @body',[
        '@host' => self::HOST,
        '@sc' => $response->getStatusCode(),
        '@body' => $response->getBody()->getContents()
      ]);

      \Drupal::logger('Weather:GeoPluginService')->error($error_message);
      return false;
    }

    // Unserialize result
    $data = unserialize($response->getBody()->getContents());

    // Set the GeoModel vars
    $geo_model = new GeoModel();
    $geo_model->setIp($current_ip);
    $geo_model->setCity($data['geoplugin_city']);
    $geo_model->setRegion($data['geoplugin_region']);
    $geo_model->setAreaCode($data['geoplugin_areaCode']);
    $geo_model->setDmaCode($data['geoplugin_dmaCode']);
    $geo_model->setCountryCode($data['geoplugin_countryCode']);
    $geo_model->setCountryName($data['geoplugin_countryName']);
    $geo_model->setContinentCode($data['geoplugin_continentCode']);
    $geo_model->setLatitude($data['geoplugin_latitude']);
    $geo_model->setLongitude($data['geoplugin_longitude']);

    return $geo_model;
  }
}
