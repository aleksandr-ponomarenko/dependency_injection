<?php

namespace Drupal\dropsolid_dependency_injection;

/**
 * Interface RestConnectionInterface.
 */
interface RestConnectionInterface {

  /**
   * Get data from rest connection.
   *
   * @return array
   *   Result array.
   */
  public function fetchData();

}
