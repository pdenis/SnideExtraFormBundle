<?php

/*
 * This file is part of the SnideExtraFormBundle.
 *
 * (c) Pascal DENIS <pascal.denis.75@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Snide\ExtraFormBundle\Twig\Extension;

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
    protected $script;

    /**
     * Initialize tinymce helper
     *
     * @param ContainerInterface $container
     */
    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
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
            'snide_extra_form_init'     => new \Twig_Function_Method($this, 'init', array('is_safe'=> array('html'))),
            'snide_extra_form_addDoubleList'=> new \Twig_Function_Method($this, 'addDoubleList', array('is_safe'=> array('html'))),
            'snide_extra_form_renderScript'   => new \Twig_Function_Method($this, 'renderScript', array('is_safe'=> array('html')))
        );
    }

    public function addDoubleList(array $params)
    {
        $this->script .= "$('#".$params['id']."').multiselect2side({
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
     * Form initializations
     *
     * @return string
     */
    public function init()
    {

        /** @var $assets \Symfony\Component\Templating\Helper\CoreAssetsHelper */
        $assets = $this->getService('templating.helper.assets');

        return $this->getService('templating')->render('SnideExtraFormBundle:Script:init.html.twig', array());
    }

    /**
     * Render script 
     * 
     * @return string
     */
    public function renderScript()
    {
        $config = $this->container->getParameter('snide_extra_form.config');

        return $this->getService('templating')->render('SnideExtraFormBundle:Script:render.html.twig', array(
            'script'         => $this->script,
            'include_jquery' => $config['include_jquery']
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


    /**
     * Get url from config string
     *
     * @param string $inputUrl
     *
     * @return string
     */
    protected function getAssetsUrl($inputUrl)
    {
        /** @var $assets \Symfony\Component\Templating\Helper\CoreAssetsHelper */
        $assets = $this->getService('templating.helper.assets');

        $url = preg_replace('/^asset\[(.+)\]$/i', '$1', $inputUrl);

            if ($inputUrl !== $url) {
            return $assets->getUrl($this->baseUrl . $url);
        }

        return $inputUrl;
    }
}