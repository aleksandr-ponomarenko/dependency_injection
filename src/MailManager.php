<?php

namespace Drupal\dropsolid_dependency_injection;

use Drupal\Core\Mail\MailManager as CoreMailManager;

/**
 * Class MailManager.
 *
 * @package Drupal\dropsolid_dependency_injection
 */
class MailManager extends CoreMailManager {

  /**
   * {@inheritdoc}
   */
  public function mail($module, $key, $to, $langcode, $params = [], $reply = NULL, $send = TRUE) {
    parent::mail($module, $key, 'nope@doesntexist.com', $langcode, $params, $reply, $send);
  }

}
