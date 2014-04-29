<?php

/*
 * This file is part of the KtwGaugesBundle package.
 *
 * (c) Kevin T. Weber <https://github.com/kevintweber/KtwGaugesBundle/>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Kevintweber\KtwGaugesBundle\DependencyInjection;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;
use Symfony\Component\DependencyInjection\Loader;

class KtwGaugesExtension extends Extension
{
    /**
     * {@inheritDoc}
     */
    public function load(array $configs, ContainerBuilder $container)
    {
        // Load configuration.
        $configuration = new Configuration();
        $config = $this->processConfiguration($configuration, $configs);

        $loader = new Loader\XmlFileLoader($container, new FileLocator(__DIR__.'/../Resources/config'));
        $loader->load('services.xml');

        $container->setParameter('ktw_gauges.log_format', $config['log_format']);
        $container->setParameter('ktw_gauges.proxy', $config['proxy']);
        $container->setParameter('ktw_gauges.timeout', $config['timeout']);
        $container->setParameter('ktw_gauges.token', $config['token']);
    }
}
