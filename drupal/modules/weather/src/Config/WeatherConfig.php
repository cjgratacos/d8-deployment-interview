<?php

namespace Drupal\weather\Config;

use Drupal\Core\Config\ConfigFactory;

/**
 * Class WeatherConfig
 *
 * @package Drupal\weather\Config
 */
class WeatherConfig {

  /**
   * @var \Drupal\Core\Config\Config|\Drupal\Core\Config\ImmutableConfig
   */
  private $config;

  /**
   * WeatherConfig constructor.
   *
   * @param \Drupal\Core\Config\ConfigFactory $config_factory
   * @param $config_name
   */
  public function __construct(ConfigFactory $config_factory, $config_name) {
    $this->config = $config_factory->get($config_name);
  }

  /**
   * Return the Open Weather API Key from the saved configuration
   * @return array|mixed|null
   */
  public function getWeatherApiKey() {
    return $this->config->get('api_key');
  }
}