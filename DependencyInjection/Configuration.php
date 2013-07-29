<?php

namespace Msi\UserBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;
use Symfony\Component\Config\Definition\Builder\ArrayNodeDefinition;

class Configuration implements ConfigurationInterface
{
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('msi_user');

        $rootNode
            ->children()
                ->scalarNode('user_admin_class')
                    ->cannotBeEmpty()
                    ->defaultValue('Msi\UserBundle\Admin\UserAdmin')
                ->end()
            ->end();

        return $treeBuilder;
    }
}
