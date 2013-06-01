<?php

/*
 * This file is part of the SnideExtraFormBundle.
 *
 * (c) Pascal DENIS <pascal.denis.75@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Snide\ExtraFormBundle\DependencyInjection;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;
use Symfony\Component\Config\FileLocator;

/**
 * 
 * @author Pascal DENIS <pascal.denis.75@gmail.com
 */
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
         $loader->load('type.yml');
         $loader->load('config.yml');

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