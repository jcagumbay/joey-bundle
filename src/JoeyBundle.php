<?php

declare(strict_types=1);

namespace Jcagumbay\JoeyBundle;

use Symfony\Component\HttpKernel\Bundle\AbstractBundle;
use Symfony\Component\Config\Definition\Configurator\DefinitionConfigurator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;
use Jcagumbay\JoeyBundle\Entity\Joey;

class JoeyBundle extends AbstractBundle
{
    public function configure(DefinitionConfigurator $definition): void
    {
        $definition->rootNode()
            ->children()
                ->scalarNode('pickup_line')->defaultValue('Hey, How you doin?')->info('Joey\'s pickup line')->end() // set default if not overridden by the app
            ->end()
        ;
    }

    public function loadExtension(array $config, ContainerConfigurator $containerConfigurator, ContainerBuilder $containerBuilder): void
    {
        // load an XML, PHP or Yaml file
        $containerConfigurator->import('../config/services.xml');
        
        // Set dynamic value to your service's constructor
        $containerConfigurator->services()
            ->get(Joey::class) // Jcagumbay\JoeyBundle\Entity\Joey
            ->arg(0, $config['pickup_line'])
        ;
    }
}