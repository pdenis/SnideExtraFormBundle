<?php

/*
 * This file is part of the SnideExtraFormBundle.
 *
 * (c) Pascal DENIS <pascal.denis.75@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Snide\ExtraFormBundle\DependencyInjection\Compiler;

use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;

/**
 * Add a new twig.form.resources
 *
 * @author Pascal DENIS <pascal.denis.75@gmail.com
 */
class FormPass implements CompilerPassInterface
{
    /**
     * {@inheritdoc}
     */
    public function process(ContainerBuilder $container)
    {
        if (($template = $container->getParameter('snide_extra_form.form.templating')) !== false) {
            $resources = $container->getParameter('twig.form.resources');
            # Ensure it wasnt already aded via config
            if (!in_array($template, $resources)) {                
                array_push($resources, $template);
                $container->setParameter('twig.form.resources', $resources);
            }
        }
    }
}