<?php

namespace cbertoni\BehatProgressFormatter;

use Behat\Testwork\ServiceContainer\Extension as ExtensionInterface;
use Behat\Testwork\ServiceContainer\ExtensionManager;
use Symfony\Component\Config\Definition\Builder\ArrayNodeDefinition;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Definition;
use Symfony\Component\DependencyInjection\Reference;
use Behat\Testwork\Exception\ServiceContainer\ExceptionExtension;
use Behat\Testwork\Translator\ServiceContainer\TranslatorExtension;

class BehatProgressFormatterExtension implements ExtensionInterface {

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
    $definition = new Definition('cbertoni\BehatProgressFormatter\ListPrinterFixed', array(
        new Reference('output.node.printer.result_to_string'),
        new Reference(ExceptionExtension::PRESENTER_ID),
        new Reference(TranslatorExtension::TRANSLATOR_ID),
        '%paths.base%'
    ));

    $container->setDefinition('output.node.printer.list', $definition);
  }
}
