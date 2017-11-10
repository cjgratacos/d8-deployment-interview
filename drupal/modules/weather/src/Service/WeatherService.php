<?php

namespace Drupal\weather\Service;

use Cmfcmf\OpenWeatherMap;
use Drupal\weather\Config\WeatherConfig;
use Drupal\weather\Service\Geo\GeoInterface;

class WeatherService {

  private $config;

  private $geo_service;

  private $open_weather_service;

  public function __construct(WeatherConfig $weather_config, GeoInterface $geo, OpenWeatherMap $open_weather_map) {
    $this->config = $weather_config;
    $this->geo_service = $geo;
    $this->open_weather_service = $open_weather_map;
  }

  public function getWeatherInformation($ip) {
    // Set API Key
    $this->open_weather_service->setApiKey($this->config->getWeatherApiKey());

    // Get GeoModel
    $geo_model = $this->geo_service->locate($ip);

    // Return false if Geo info for IP is not found
    if (!$geo_model) {
      return false;
    }

    // Get weather info based on city
    return $this->open_weather_service->getWeather($geo_model->getCity());
  }
}