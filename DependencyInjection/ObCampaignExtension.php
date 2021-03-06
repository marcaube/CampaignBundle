<?php

namespace Ob\CampaignBundle\DependencyInjection;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;
use Symfony\Component\DependencyInjection\Loader;

/**
 * This is the class that loads and manages your bundle configuration
 *
 * To learn more see {@link http://symfony.com/doc/current/cookbook/bundles/extension.html}
 */
class ObCampaignExtension extends Extension
{
    /**
     * {@inheritDoc}
     */
    public function load(array $configs, ContainerBuilder $container)
    {
        $configuration = new Configuration();
        $config = $this->processConfiguration($configuration, $configs);

        $loader = new Loader\YamlFileLoader($container, new FileLocator(__DIR__.'/../Resources/config'));
        $loader->load('services.yml');

        $container->setParameter('ob_campaign.from', $config['from']);
        $container->setParameter('ob_campaign.reply_to', $config['reply_to']);
        $container->setParameter('ob_campaign.use_premailer', $config['use_premailer']);
        $container->setParameter('ob_campaign.binary_path', $config['binary_path']);

        if (null !== $config['image_folder']) {
            $container->setParameter('ob_campaign.image_folder', $config['image_folder']);
        }
    }
}
