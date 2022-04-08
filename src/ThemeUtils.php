<?php

declare(strict_types=1);

/*
 * nature theme bundle for Contao Open Source CMS
 *
 * Copyright (C) 2022 pdir / digital agentur <develop@pdir.de>
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
    public static function getRootDir()
    {
        return System::getContainer()->getParameter('kernel.project_dir');
    }

    public static function getWebDir()
    {
        return StringUtil::stripRootDir(System::getContainer()->getParameter('contao.web_dir'));
    }

    public static function getCombinedStylesheet()
    {
        // add stylesheets
        $combiner = new Combiner();
        $combiner->add('bundles/contaothemesnetnaturetheme/fonts/fontawesome/css/all.min.css');

        if ('WIN' === strtoupper(substr(PHP_OS, 0, 3))) {
            $combiner->add('bundles/contaothemesnetnaturetheme/scss/nature_win.scss');
        } else {
            $combiner->add('bundles/contaothemesnetnaturetheme/scss/nature.scss');
        }

        return $combiner->getCombinedFile();
    }
}
