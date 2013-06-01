<?php

namespace Snide\ExtraFormBundle\DependencyInjection;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;
use Symfony\Component\Config\FileLocator;

class SnideExtraFormExtension extends Extension
{
    /**
     * Load configuration of Bundle
     * 
     * @param array $configs Configuration parameters
     * @param \Symfony\Component\DependencyInjection\ContainerBuilder $container
     * @throws \InvalidArgumentException
     */
    public function load(array $configs, ContainerBuilder $container)
    {
         $loader = new YamlFileLoader($container, new FileLocator(__DIR__.'/../Resources/config'));
         $loader->load('config.yml');
         $loader->load('type.yml');
    }

    /**
     * 
     * @return string Extension's alias
     */
    public function getAlias()
    {
        return 'snide_extra_form';
    }
}