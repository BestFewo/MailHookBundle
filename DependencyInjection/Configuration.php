<?php

namespace Swm\Bundle\MailHookBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\ArrayNodeDefinition;
use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

/**
 * This is the class that validates and merges configuration from your app/config files
 *
 * To learn more see {@link http://symfony.com/doc/current/cookbook/bundles/extension.html#cookbook-bundles-extension-config-class}
 */
class Configuration implements ConfigurationInterface
{
    /**
     * {@inheritDoc}
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder('swm_mailhook');
        if (method_exists($treeBuilder, 'getRootNode')) {
            $rootNode = $treeBuilder->getRootNode();
        } else {
            $rootNode = $treeBuilder->root('swm_mailhook');
        }

        $this->addConfig($rootNode);

        return $treeBuilder;
    }

    /**
     * Add Configuration for MailHook
     *
     * @param ArrayNodeDefinition $rootNode
     */
    private function addConfig(ArrayNodeDefinition $rootNode)
    {
        $rootNode
            ->children()
                ->variableNode('secretsalt')->defaultValue('notSecret')->end()
            ->end()
        ;
    }
}
