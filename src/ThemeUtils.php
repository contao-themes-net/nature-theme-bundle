<?php

declare(strict_types=1);

/*
 * nature theme bundle for Contao Open Source CMS
 *
 * Copyright (C) 2025 pdir / digital agentur  // pdir GmbH
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
use Contao\Input;
use Contao\StringUtil;
use Contao\System;

class ThemeUtils
{
    public static string $themeFolder = 'bundles/contaothemesnetnaturetheme/';
    public static string $scssFolder = 'scss/';

    /**
     * @var array<string>
     */
    public static array $colors = [
        'green_colors',
        'green_colors_contrast',
        'blue_colors',
        'blue_colors_contrast',
        'red_colors',
        'red_colors_contrast',
        'dark_colors_contrast',
        'dark_green_colors_contrast',
        'dark_blue_colors_contrast',
        'dark_red_colors_contrast',
    ];

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

        // Get session for theme switcher
        $session = System::getContainer()->get('request_stack')->getSession();

        // add stylesheets
        $combiner = new Combiner();
        $isV2 = file_exists(self::getRootDir().'/files/naturetheme/.v2');

        $request = System::getContainer()->get('request_stack')->getCurrentRequest();

        // Execute code only in preview mode
        if ($request->attributes->get('_preview') || 'nature.contao-themes.net' === $request->headers->get('host')) {
            if ('reset' === Input::get('theme-color')) {
                $session->set('nature_color', null);
            }

            if (Input::get('theme-color') && \in_array(Input::get('theme-color'), self::$colors, true)) {
                $session->set('nature_color', Input::get('theme-color'));
            }

            if ($isV2 && $session->get('nature_color') && null !== $session->get('nature_color')) {
                //$GLOBALS['TL_HEAD'][] = '<link rel="stylesheet" href="'.self::$scssFolder.'v2/color_schemes/nature_'.$session->get('nature_color').'.scss'.'">';
                $combiner->add(self::$scssFolder.'v2/preview_nature_'.$session->get('nature_color').'.scss');
            } else {
                // Check for v2 or use old stylesheets
                if ($isV2 && null === $theme) {
                    $combiner->add(self::$scssFolder.'v2/nature.scss');
                } else {
                    $combiner->add(self::$scssFolder.'nature.scss');
                }
            }
        } else {
            // Check for v2 or use old stylesheets
            if ($isV2 && null === $theme) {
                $combiner->add(self::$scssFolder.'v2/nature.scss');
            } else {
                $combiner->add(self::$scssFolder.'nature.scss');
            }
        }

        return $combiner->getCombinedFile();
    }
}
