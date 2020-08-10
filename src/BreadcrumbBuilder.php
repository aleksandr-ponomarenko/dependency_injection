<?php

namespace Drupal\dropsolid_dependency_injection;

use Drupal\Core\Routing\RouteMatchInterface;
use Drupal\Core\Link;
use Drupal\Core\Breadcrumb\BreadcrumbBuilderInterface;
use Drupal\Core\Breadcrumb\Breadcrumb;
use Drupal\Core\StringTranslation\StringTranslationTrait;

/**
 * Class BreadcrumbBuilder.
 *
 * @package Drupal\dropsolid_dependency_injection
 */
class BreadcrumbBuilder implements BreadcrumbBuilderInterface {
  use StringTranslationTrait;

  /**
   * {@inheritdoc}
   */
  public function applies(RouteMatchInterface $route_match) {
    return $route_match->getRouteName() == 'dropsolid_dependency_injection.rest_output_controller_showPhotos';
  }

  /**
   * {@inheritdoc}
   */
  public function build(RouteMatchInterface $route_match) {
    $breadcrumb = new Breadcrumb();
    $breadcrumb->addCacheContexts(['route']);

    foreach (['Home', 'Dropsolid', 'Example'] as $value) {
      $breadcrumb->addLink(Link::createFromRoute($this->t($value), '<front>'));
    }
    $breadcrumb->addLink(Link::createFromRoute($this->t('Photos'), 'dropsolid_dependency_injection.rest_output_controller_showPhotos'));

    return $breadcrumb;
  }

}
