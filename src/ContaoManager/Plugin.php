<?php

/*
 * This file is part of [package name].
 *
 * (c) John Doe
 *
 * @license LGPL-3.0-or-later
 */

namespace ContaoThemesNet\NatureThemeBundle\ContaoManager;

use Contao\CoreBundle\ContaoCoreBundle;
use Contao\ManagerPlugin\Bundle\BundlePluginInterface;
use Contao\ManagerPlugin\Bundle\Config\BundleConfig;
use Contao\ManagerPlugin\Bundle\Parser\ParserInterface;
use ContaoThemesNet\NatureThemeBundle\ContaoThemesNetNatureThemeBundle;
use ContaoThemesNet\ThemeComponentsBundle\ThemeComponentsBundle;

class Plugin implements BundlePluginInterface
{
    /**
     * {@inheritdoc}
     */
    public function getBundles(ParserInterface $parser)
    {
        return [
            BundleConfig::create(ContaoThemesNetNatureThemeBundle::class)
                ->setLoadAfter([
                    ContaoCoreBundle::class,
                    ThemeComponentsBundle::class
                ]),
        ];
    }
}
