<?php

declare(strict_types=1);

/*
 * nature theme bundle for Contao Open Source CMS
 *
 * Copyright (C) 2024 pdir / digital agentur  // pdir GmbH
 *
 * @package    contao-themes-net/nature-theme-bundle
 * @link       https://github.com/contao-themes-net/nature-theme-bundle
 * @license    pdir contao theme licence
 * @author     pdir GmbH <develop@pdir.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace ContaoThemesNet\NatureThemeBundle;

use Contao\Combiner;
use Contao\CoreBundle\Exception\InvalidResourceException;
use Contao\StringUtil;
use Contao\System;

class ThemeUtils
{
    public static string $themeFolder = 'bundles/contaothemesnetnaturetheme/';
    public static string $scssFolder = 'scss/';

    public static function getRootDir(): string
    {
        return System::getContainer()->getParameter('kernel.project_dir');
    }

    public static function getWebDir(): string
    {
        return StringUtil::stripRootDir(System::getContainer()->getParameter('contao.web_dir'));
    }

    /**
     * @throws InvalidResourceException
     */
    public static function getCombinedStylesheet(null|bool|string $theme = null): string
    {
        self::$scssFolder = self::$themeFolder.self::$scssFolder;

        // for multi domain setup
        if (null !== $theme) {
            self::$scssFolder = 'files/naturetheme/scss/'.$theme.'/';
        }

        // add stylesheets
        $combiner = new Combiner();
        $combiner->add(self::$scssFolder.'nature.scss');

        return $combiner->getCombinedFile();
    }
}
