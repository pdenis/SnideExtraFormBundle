<?php

/*
 * This file is part of the SnideExtraFormBundle.
 *
 * (c) Pascal DENIS <pascal.denis.75@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
 
namespace Snide\Bundle\ExtraFormBundle;
 
use Symfony\Component\HttpKernel\Bundle\Bundle;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Snide\Bundle\ExtraFormBundle\DependencyInjection\Compiler\FormPass;
 
/**
 * 
 * @author Pascal DENIS <pascal.denis.75@gmail.com
 */
class SnideExtraFormBundle extends Bundle
{
	/**
     * {@inheritdoc}
     */
	public function build(ContainerBuilder $container)
    {
        parent::build($container);
        $container->addCompilerPass(new FormPass());
    }
}