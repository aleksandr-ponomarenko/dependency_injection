<?php

namespace Drupal\dropsolid_dependency_injection\Controller;

use Drupal\Core\Controller\ControllerBase;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Drupal\dropsolid_dependency_injection\RestConnectionInterface;

/**
 * Class RestOutputController.
 *
 * @package Drupal\dropsolid_dependency_injection\Controller
 */
class RestOutputController extends ControllerBase {

  /**
   * The RestConnection service.
   *
   * @var \Drupal\dropsolid_dependency_injection\RestConnectionInterface
   */
  protected $restConnection;

  /**
   * Constructs a RestConnection object.
   *
   * @param \Drupal\dropsolid_dependency_injection\RestConnectionInterface $rest_connection
   *   The RestConnection service.
   */
  public function __construct(RestConnectionInterface $rest_connection) {
    $this->restConnection = $rest_connection;
  }

  /**
   * {@inheritdoc}
   */
  public static function create(ContainerInterface $container) {
    return new static(
      $container->get('dropsolid_dependency_injection.rest_connection')
    );
  }

  /**
   * Routing callback.
   *
   * @return array
   *   Renderable array.
   */
  public function showPhotos() {
    $build = [
      '#cache' => [
        'max-age' => 60,
        'contexts' => ['url'],
      ],
    ];

    foreach ($this->restConnection->fetchData(random_int(1, 20)) ?? [] as $item) {
      $build['rest_output_block']['photos'][] = [
        '#theme' => 'image',
        '#uri' => $item->thumbnailUrl,
        '#alt' => $item->title,
        '#title' => $item->title,
      ];
    }

    return $build;
  }

}
