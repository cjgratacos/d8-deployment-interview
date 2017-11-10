<?php

namespace Drupal\weather\Plugin\Block;

use Drupal\Core\Annotation\Translation;
use Drupal\Core\Block\Annotation\Block;

/**
 * Class WeatherNodeContextBlock
 *
 * @Block(
 *   id="weather_node_block",
 *   admin_label=@Translation("Weather Block with Node Context"),
 *   category=@Translation("Weather")
 * )
 */
class WeatherNodeContextBlock extends WeatherBlock {

  /**
   * {@inheritdoc}
   */
  public function build() {
    /** @var \Drupal\node\NodeInterface $node */
   $node = \Drupal::routeMatch()->getParameter('node');

    if (!isset($node)) {
     return [];
   }

    $enable_weather = false;

    foreach ($node->getFields() as $key => $val) {
     if ($val->getFieldDefinition()->getType() == 'weather' && $val->getValue()[0]['value']) {
      $enable_weather = true;
     }
   }

   if (!$enable_weather) {
     return [];
   }

   return parent::build();
  }

  public function getCacheContexts() {
    return [];
  }

  public function getCacheTags() {
   return [];
  }

  public function getCacheMaxAge() {
    return 0;
  }
}