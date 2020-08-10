<?php

namespace Drupal\dropsolid_dependency_injection;

use Drupal\Core\Language\LanguageManager as CoreLanguageManager;

/**
 * Class LanguageManager.
 *
 * @package Drupal\dropsolid_dependency_injection
 */
class LanguageManager extends CoreLanguageManager {

  /**
   * {@inheritdoc}
   */
  public function getLanguageName($langcode) {
    $name = parent::getLanguageName($langcode);

    return is_string($name) ? "Custom $name" : $name;
  }

}
