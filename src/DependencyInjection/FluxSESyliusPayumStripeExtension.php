<?php

declare(strict_types=1);

namespace FluxSE\SyliusPayumStripePlugin\DependencyInjection;

use Exception;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Extension\Extension;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;

class FluxSESyliusPayumStripeExtension extends Extension
{
    /**
     * @throws Exception
     */
    public function load(array $configs, ContainerBuilder $container): void
    {
        $configuration = $this->getConfiguration([], $container);
        assert(null !== $configuration);
        $configs = $this->processConfiguration($configuration, $configs);

        $container->setParameter(
            'flux_se_sylius_payum_stripe.line_item_image.imagine_filter',
            $configs['line_item_image']['imagine_filter']
        );
        $container->setParameter(
            'flux_se_sylius_payum_stripe.line_item_image.fallback_image',
            $configs['line_item_image']['fallback_image']
        );

        $loader = new YamlFileLoader(
            $container,
            new FileLocator(dirname(__DIR__) . '/Resources/config')
        );
        $loader->load('services.yaml');
    }
}
