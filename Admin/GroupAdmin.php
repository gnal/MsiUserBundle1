<?php

namespace Msi\UserBundle\Admin;

use Msi\CmfBundle\Admin\Admin;
use Msi\CmfBundle\Grid\GridBuilder;
use Symfony\Component\Form\FormBuilder;
use Doctrine\ORM\QueryBuilder;

class GroupAdmin extends Admin
{
    public function configure()
    {
        $this->options = [
            'search_fields' => ['a.id', 'a.name'],
        ];
    }

    public function buildGrid(GridBuilder $builder)
    {
        $builder
            ->add('name')
            ->add('', 'action')
        ;
    }

    public function buildForm(FormBuilder $builder)
    {
        $builder
            ->add('name')
        ;

        $roles = [];
        $roles['ROLE_SUPER_ADMIN'] = 'super admin';
        $roles['ROLE_ADMIN'] = 'admin';

        foreach ($this->container->getParameter('msi_cmf.admin_ids') as $id) {
            $label = $this->container->get($id)->getLabel(1, 'en');
            $roles['ROLE_'.strtoupper($id).'_CREATE'] = $label.' | create';
            $roles['ROLE_'.strtoupper($id).'_READ'] = $label.' | read';
            $roles['ROLE_'.strtoupper($id).'_UPDATE'] = $label.' | update';
            $roles['ROLE_'.strtoupper($id).'_DELETE'] = $label.' | delete';
        }

        $builder
            ->add('roles', 'choice', [
                'choices' => $roles,
                'expanded' => true,
                'multiple' => true,
                'required' => false,
            ])
        ;
    }

    public function buildListQuery(QueryBuilder $qb)
    {
        $qb->addOrderBy('a.name', 'ASC');
    }
}
