<?php

namespace Drupal\weather\Plugin\Field\FieldFormatter;


use Drupal\Core\Annotation\Translation;
use Drupal\Core\Field\Annotation\FieldFormatter;
use Drupal\Core\Field\FieldDefinitionInterface;
use Drupal\Core\Field\FieldItemListInterface;
use Drupal\Core\Field\FormatterBase;

/**
 * Class WeatherFieldFormatter
 *
 * @FieldFormatter(
 *   id="weather_default_field_formatter",
 *   label=@Translation("Weather Display"),
 *   description=@Translation("Display Weather on Page"),
 *   field_types={
 *      "weather"
 *   }
 * )
 */
class WeatherFieldFormatter extends FormatterBase {

  /**
   * @var \Drupal\weather\Service\WeatherService
   */
  private $weather_service;

  public function __construct($plugin_id, $plugin_definition, FieldDefinitionInterface $field_definition, array $settings, $label, $view_mode, array $third_party_settings) {
    parent::__construct($plugin_id, $plugin_definition, $field_definition, $settings, $label, $view_mode, $third_party_settings);
    $this->weather_service = \Drupal::service('weather.service');
  }

  /**
   * {@inheritdoc}
   */
  public function viewElements(FieldItemListInterface $items, $langcode) {
    // If field is not check, don't render element
    if (!$items->getValue()[0]['value']) {
      return [];
    }

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