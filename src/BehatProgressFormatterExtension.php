<?php

namespace cbertoni\BehatProgressFormatter;

use Behat\Testwork\ServiceContainer\Extension;
use Behat\Testwork\ServiceContainer\ExtensionManager;
use Symfony\Component\Config\Definition\Builder\ArrayNodeDefinition;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Definition;
use Symfony\Component\DependencyInjection\Reference;

class BehatProgressFormatterExtension implements Extension {

  public function process(ContainerBuilder $container) {

  }

  public function getConfigKey() {
    return "cbertoniprogress";
  }


  public function initialize(ExtensionManager $extensionManager) {

  }

  public function configure(ArrayNodeDefinition $builder) {

  }

  public function load(ContainerBuilder $container, array $config) {
    $definition = new Definition('cbertoni\BehatProgressFormatter\ProgressStatisticsPrinterFixed', array(
        new Reference('output.node.printer.counter'),
        new Reference('output.node.printer.list')
    ));
    $container->setDefinition('output.node.printer.progress.statistics', $definition);
  }
}
