<?php

namespace Drupal\dropsolid_dependency_injection;

use GuzzleHttp\Client;

/**
 * Class RestConnection.
 *
 * @package Drupal\dropsolid_dependency_injection
 */
class RestConnection implements RestConnectionInterface {

  /**
   * The Guzzle HTTP Client service.
   *
   * @var \GuzzleHttp\Client
   */
  protected $httpClient;

  /**
   * Constructs a Client object.
   *
   * @param \GuzzleHttp\Client $http_client
   *   The Guzzle HTTP Client service.
   */
  public function __construct(Client $http_client) {
    $this->httpClient = $http_client;
  }

  /**
   * {@inheritdoc}
   */
  public function fetchData($albumId = NULL) {
    try {
      $albumId = ($albumId === NULL) ? random_int(1, 20) : $albumId;
      $response = $this->httpClient->request('GET', "https://jsonplaceholder.typicode.com/albums/$albumId/photos");
      $data = $response->getBody()->getContents();
      // We can do it with serialization.json service as well.
      $decoded = json_decode($data);
      if (!$decoded) {
        throw new \Exception('Invalid data returned from API');
      }
      return is_array($decoded) ? $decoded : [];
    }
    catch (\Exception $e) {
      return [];
    }
  }

}
