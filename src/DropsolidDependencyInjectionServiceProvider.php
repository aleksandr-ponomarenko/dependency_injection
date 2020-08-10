<?php

namespace Drupal\dropsolid_dependency_injection;

use Drupal\Core\DependencyInjection\ContainerBuilder;
use Drupal\Core\DependencyInjection\ServiceProviderBase;
use Symfony\Component\DependencyInjection\Reference;

/**
 * Class DropsolidDependencyInjectionServiceProvider.
 *
 * @package Drupal\dropsolid_dependency_injection
 */
class DropsolidDependencyInjectionServiceProvider extends ServiceProviderBase {

  /**
   * {@inheritdoc}
   */
  public function alter(ContainerBuilder $container) {
    $definition = $container->getDefinition('language_manager');
    $definition->setClass('Drupal\dropsolid_dependency_injection\LanguageManager')
      ->addArgument(new Reference('language.default'));
  }

}
