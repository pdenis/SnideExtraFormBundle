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

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

/**
 * SnideExtraFormBundle configuration structure.
 *
 * @author Pascal DENIS <pascal.denis.75@gmail.com
 */
class Configuration implements ConfigurationInterface
{
    /**
     * Generates the configuration tree.
     *
     * @return TreeBuilder
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();

        return $treeBuilder
            ->root('snide_extra_form', 'array')
                ->children()
                    // Include jQuery (true) library or not (false)
                    ->booleanNode('include_jquery')->defaultFalse()->end()
                ->end()
            ->end();

    }
}