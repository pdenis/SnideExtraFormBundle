<?php
namespace Snide\ExtraFormBundle\Form\Type\Entity;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Symfony\Component\Form\FormView;
use Symfony\Component\Form\FormInterface;

class DoubleListType extends AbstractType
{
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'optGroupSearch'   => false,
            'minSize'          => 6,
            'selectedPosition' => 'right',
            'moveOptions'      => 'right',
            'labelTop'         => 'Top',
            'labelDown'        => 'Down',
            'labelBottom'      => 'Bottom',
            'labelUp'          => 'Up',
            'labelSort'        => 'Sort',
            'maxSelected'      => 1000,
            'labelsx'          => 'Selected',
            'labeldx'          => 'Available',
            'autoSort'         => false,
            'search'           => 'Search',
            'caseSensitive'    => false,
            'delay'            => 200
        ));
    }

    public function getParent()
    {
        return 'entity';
    }

    public function getName()
    {
        return 'entity_double_list';
    }

    /**
     * Pass the image url to the view
     *
     * @param FormView $view
     * @param FormInterface $form
     * @param array $options
     */
    public function buildView(FormView $view, FormInterface $form, array $options)
    {
        $view->vars['search']           = $options['search'];
        $view->vars['optGroupSearch']   = $options['optGroupSearch'];
        $view->vars['minSize']          = $options['minSize'];
        $view->vars['selectedPosition'] = $options['selectedPosition'];
        $view->vars['moveOptions']      = $options['moveOptions'];
        $view->vars['labelTop']         = $options['labelTop'];
        $view->vars['labelDown']        = $options['labelDown'];
        $view->vars['labelBottom']      = $options['labelBottom'];
        $view->vars['labelUp']          = $options['labelUp'];
        $view->vars['labelSort']        = $options['labelSort'];
        $view->vars['maxSelected']      = $options['maxSelected'];
        $view->vars['labelsx']          = $options['labelsx'];
        $view->vars['labeldx']          = $options['labeldx'];
        $view->vars['autoSort']         = $options['autoSort'];
        $view->vars['caseSensitive']    = $options['caseSensitive'];
        $view->vars['delay']            = $options['delay'];
    }
}