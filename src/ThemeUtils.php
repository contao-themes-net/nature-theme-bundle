<?php

declare(strict_types=1);

/*
 * nature theme bundle for Contao Open Source CMS
 *
 * Copyright (C) 2023 pdir / digital agentur <develop@pdir.de>
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
use Contao\StringUtil;
use Contao\System;

class ThemeUtils
{
    public static string $themeFolder = 'bundles/contaothemesnetnaturetheme/';
    public static string $scssFolder = 'scss/';

    public static function getRootDir()
    {
        return System::getContainer()->getParameter('kernel.project_dir');
    }

    public static function getWebDir()
    {
        return StringUtil::stripRootDir(System::getContainer()->getParameter('contao.web_dir'));
    }

    public static function getCombinedStylesheet($theme = null)
    {
        self::$scssFolder = self::$themeFolder.self::$scssFolder;

        // for multi domain setup
        if (null !== $theme) {
            self::$scssFolder = 'files/naturetheme/scss/'.$theme.'/';
        }

        // add stylesheets
        $combiner = new Combiner();

        if ('WIN' === strtoupper(substr(PHP_OS, 0, 3))) {
            $combiner->add(self::$scssFolder.'nature_win.scss');
        } else {
            $combiner->add(self::$scssFolder.'nature.scss');
        }

        $GLOBALS['TL_CSS']['fontawesome'] = 'bundles/contaothemesnetnaturetheme/fonts/fontawesome/css/all.min.css|static';

        return $combiner->getCombinedFile();
    }
}
