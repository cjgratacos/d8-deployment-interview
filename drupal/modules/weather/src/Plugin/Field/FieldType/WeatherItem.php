<?php

namespace Drupal\weather\Plugin\Field\FieldType;

use Drupal\Core\Annotation\Translation;
use Drupal\Core\Field\Annotation\FieldType;
use Drupal\Core\Field\FieldStorageDefinitionInterface;
use Drupal\Core\Field\Plugin\Field\FieldType\BooleanItem;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Session\AccountInterface;
use Drupal\Core\TypedData\DataDefinition;

/**
 * Class WeatherPluginFieldType
 *
 * @FieldType(
 *   id = "weather",
 *   label = @Translation("Weather"),
 *   description = @Translation("An entity field for displaying weather."),
 *   default_widget = "weather_checkbox",
 *   default_formatter = "weather_default_field_formatter"
 * )
 */
class WeatherItem extends BooleanItem {

  /**
   * {@inheritdoc}
   */
  public static function propertyDefinitions(FieldStorageDefinitionInterface $field_definition) {
    $properties['value'] = DataDefinition::create('boolean')
      ->setLabel(t('Display Weather'))
      ->setRequired(true);
    return $properties;
  }

  /**
   * {@inheritdoc}
   */
  public static function defaultFieldSettings() {
    return [
        'on_label' => t('On'),
        'off_label' => t('Off'),
      ] + parent::defaultFieldSettings();
  }

  /**
   * {@inheritdoc}
   */
  public static function schema(FieldStorageDefinitionInterface $field_definition) {
    return [
      'columns' => [
        'value' => [
          'type' => 'int',
          'size' => 'tiny',
          'not null' => true,
          'default' => 0,
          'unsigned' => true,
        ]
      ]
    ];
  }

  /**
   * {@inheritdoc}
   */
  public function getPossibleOptions(AccountInterface $account = NULL) {
    return [
      0 => $this->getSetting('off_label'),
      1 => $this->getSetting('on_label')
    ];
  }

  public function fieldSettingsForm(array $form, FormStateInterface $form_state) {
    return [];
  }
}