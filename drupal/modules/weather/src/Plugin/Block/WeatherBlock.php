<?php

namespace Drupal\weather\Plugin\Block;


use Drupal\Core\Annotation\Translation;
use Drupal\Core\Block\Annotation\Block;
use Drupal\Core\Block\BlockBase;

/**
 * Class WeatherBlock
 *
 * @Block(
 *   id="weather_block",
 *   admin_label=@Translation("Weather Block (No Field)"),
 *   category=@Translation("Weather")
 * )
 */
class WeatherBlock extends BlockBase {

  private $weather_service;

  public function __construct(array $configuration, $plugin_id, $plugin_definition) {
    parent::__construct($configuration, $plugin_id, $plugin_definition);
    $this->weather_service = \Drupal::service('weather.service');
  }

  /**
   * {@inheritdoc}
   */
  public function build() {
    $weather_info = $this->weather_service->getWeatherInformation(\Drupal::request()->getClientIp());

    return [
      '#theme' => 'weather',
      '#location' => $this->t('@city, @country', [
        '@city' => $weather_info->city->name,
        '@country' => $weather_info->city->country
      ]),
      '#temperature' => $weather_info->temperature->getFormatted(),
      '#weather_description' => $weather_info->weather->description,
      '#icon' => $weather_info->weather->getIconUrl()
    ];
  }
}