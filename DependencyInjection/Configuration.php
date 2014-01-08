<?php

namespace Ob\CampaignBundle\DependencyInjection;

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
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('ob_campaign');

        $rootNode
            ->children()
                ->scalarNode('from')
                    ->isRequired()
                    ->cannotBeEmpty()
                    ->info('The email address used to send campaigns')
                ->end()
                ->scalarNode('reply_to')
                    ->defaultNull()
                    ->info('The campaigns\' reply-to email, defaults to email_from')
                ->end()
                ->booleanNode('use_premailer')
                    ->defaultFalse()
                    ->info('Run the pre-mailer on email code')
                ->end()
                ->scalarNode('image_folder')
                    ->defaultNull()
                    ->info('The folder where snapshot images will be saved')
                ->end()
                ->scalarNode('binary_path')
                    ->defaultValue('/usr/local/bin/wkhtmltoimage')
                    ->info('The wkhtmltoimage binary path')
                ->end()
            ->end();


        return $treeBuilder;
    }
}
