<?php

/*
 * This file is part of the SnideExtraFormBundle.
 *
 * (c) Pascal DENIS <pascal.denis.75@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Snide\Bundle\ExtraFormBundle\Twig\Extension;

use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Twig Extension for ExtraForm support.
 *
 * @author Pascal DENIS <pascal.denis.75@gmail.com>
 */
class SnideExtraFormExtension extends \Twig_Extension
{
    /**
     * Container
     *
     * @var ContainerInterface
     */
    protected $container;

    /**
     * Script
     * 
     * @var string
     */
    protected $scriptContainer;

    /**
     * Initialize tinymce helper
     *
     * @param ContainerInterface $container
     */
    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
        $this->scriptContainer = array(
            'double_list' => ''
        );
    }

    /**
     * Gets a service.
     *
     * @param string $id The service identifier
     *
     * @return object The associated service
     */
    public function getService($id)
    {
        return $this->container->get($id);
    }

    /**
     * Get parameters from the service container
     *
     * @param string $name
     *
     * @return mixed
     */
    public function getParameter($name)
    {
        return $this->container->getParameter($name);
    }

    /**
     * Returns a list of functions to add to the existing list.
     *
     * @return array An array of functions
     */
    public function getFunctions()
    {
	return array(
            new \Twig_SimpleFunction('snide_extra_form_addDoubleList', array($this, 'addDoubleList'), array('is_safe' => array('html'))),
            new \Twig_SimpleFunction('snide_extra_form_init', array($this, 'init'), array('is_safe' => array('html'))),
        );
    }

    /**
     * Add double list method
     * Create a double list
     *
     * @param array $params Double list options
     */
    public function addDoubleList(array $params)
    {
        $this->scriptContainer['double_list'] .= "$('#".$params['id']."').multiselect2side({
            'search': '".$params['search']."',
            'minSize': ".$params['minSize'].",
            'selectedPosition': '".$params['selectedPosition']."',
            'moveOptions': '".$params['moveOptions']."',
            'labelTop': '".$params['labelTop']."',
            'labelBottom': '".$params['labelBottom']."',
            'labelUp': '".$params['labelUp']."',
            'labelDown': '".$params['labelDown']."',
            'labelSort': '".$params['labelSort']."',
            'maxSelected': ".$params['maxSelected'].",
            'labelsx': '".$params['labelsx']."',
            'labeldx': '".$params['labeldx']."',
            'autoSort': '".$params['autoSort']."',
            'caseSensitive': '".$params['caseSensitive']."',
            'delay': ".$params['delay']."
        });";
    }

    /**
     * Render script 
     * 
     * @return string
     */
    public function init()
    {
        $config = $this->container->getParameter('snide_extra_form.config');

        return $this->getService('templating')->render('SnideExtraFormBundle:Script:init.html.twig', array(
            'double_list_script' => $this->scriptContainer['double_list'],
            'include_jquery'     => $config['include_jquery']
        ));
    }

    /**
     * Returns the name of the extension.
     *
     * @return string The extension name
     */
    public function getName()
    {
        return 'snide_extra_form';
    }
}
