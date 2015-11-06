<?php

namespace AppBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;

class WorkExampleAdmin extends Admin
{
    protected $context = 'default';
    /**
     * @param DatagridMapper $datagridMapper
     */
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('clientName')
            ->add('clientSeat')
        ;
    }

    /**
     * @param ListMapper $listMapper
     */
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->add('clientName')
            ->add('clientSeat')
            ->add('clientPhoto', 'sonata_media_type', array(
                'provider' => 'sonata.media.provider.image',
                'template' => 'AppBundle:Default:image.preview.html.twig'
            ))
            ->add('_action', 'actions', array(
                'actions' => array(
                    'edit' => array(),
                    'delete' => array(),
                )
            ))
        ;
    }

    /**
     * @param FormMapper $formMapper
     */
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('clientName')
            ->add('clientSeat')
            ->add('clientPhoto', 'sonata_type_model_list', array(
                'cascade_validation' => true,
                'required' => false,
            ), array(
                'link_parameters' => array(
                    'provider' => 'sonata.media.provider.image',
                ),
                'placeholder' => 'Фото клиента'
            ))
            ->add('description', 'ckeditor')
            ->add('workMedias', 'sonata_type_collection', array(
                'cascade_validation' => true,
                'type_options' => array('delete' => false),
                'required' => false,
            ), array(
                'edit' => 'inline',
                'required' => false,
                'inline' => 'table',
                'sortable' => 'position',
                'targetEntity' => 'AppBundle\Entity\ProductHasMedia',
                'link_parameters' => array(
                    'context' => $this->context,
                ),
                'admin_code' => 'app.admin.product_has_media'
            ))
        ;
    }

    /**
     * @param ShowMapper $showMapper
     */
    protected function configureShowFields(ShowMapper $showMapper)
    {
        $showMapper
            ->add('id')
            ->add('clientName')
            ->add('clientSeat')
            ->add('description')
        ;
    }

    public function prePersist($workExample)
    {
        $workExample->setWorkMedias($workExample->getWorkMedias());
    }
    public function preUpdate($workExample)
    {
        $workExample->setWorkMedias($workExample->getWorkMedias());
    }
}
