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

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

class Configuration implements ConfigurationInterface
{
    /**
     * {@inheritDoc}
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('ktw_gauges');

        $rootNode
            ->children()
                ->scalarNode('token')
                ->end()
            ->end();

        return $treeBuilder;
    }
}
