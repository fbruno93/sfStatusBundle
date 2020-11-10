<?php

namespace StatusBundle\DependencyInjection;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Extension\Extension;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;
use Symfony\Component\DependencyInjection\Reference;

class StatusExtension extends Extension
{
    /**
     * @inheritDoc
     * @param array $configs
     * @param ContainerBuilder $container
     * @throws \Exception
     */
    public function load(array $configs, ContainerBuilder $container)
    {
        // Load service.yaml
        $loader = new YamlFileLoader(
            $container,
            new FileLocator(__DIR__.'/../Resources/config')
        );
        $loader->load('services.yaml');

        // load config config/packages/status.yaml
        $configuration = new Configuration();
        $config = $this->processConfiguration($configuration, $configs);

        $definition = $container->getDefinition('status.service.status_service');

        $serviceArg = [];
        foreach ($config['services'] as $service)
        {
            $serviceArg[] = new Reference($service);
        }

        $definition->replaceArgument('$services', $serviceArg);
    }
}
