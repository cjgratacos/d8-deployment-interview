<?php

namespace Drupal\weather\Plugin\Field\FieldWidget;

use Drupal\Core\Annotation\Translation;
use Drupal\Core\Field\Annotation\FieldWidget;
use Drupal\Core\Field\FieldItemListInterface;
use Drupal\Core\Field\Plugin\Field\FieldWidget\BooleanCheckboxWidget;
use Drupal\Core\Field\WidgetBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * Class WeatherFieldWidget
 *
 * @FieldWidget(
 *   id="weather_checkbox",
 *   label=@Translation("Single On/Off Checkbox"),
 *   field_types={
 *    "weather"
 *   },
 *   multiple_values= FALSE
 * )
 */
class WeatherFieldWidget extends WidgetBase {

  /**
   * {@inheritdoc}
   */
  public function formElement(FieldItemListInterface $items, $delta, array $element, array &$form, FormStateInterface $form_state) {
    $element['value'] = $element + [
        '#type' => 'checkbox',
        '#default_value' => !empty($items[0]->value),
      ];

    $element['value']['#title'] = $this->t('Display Weather Information');
    $element['value']['#title_display'] = 'after';
    return $element;
  }
}