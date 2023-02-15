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

use ContaoThemesNet\NatureThemeBundle\Element\SliderElementNature;
use ContaoThemesNet\NatureThemeBundle\Element\TabsNavElement;
use ContaoThemesNet\NatureThemeBundle\Element\TabsStartElement;
use ContaoThemesNet\NatureThemeBundle\Element\TabsStopElement;
use ContaoThemesNet\NatureThemeBundle\Element\TextModalElement;

// Insert the nature theme category
array_insert($GLOBALS['TL_CTE'], 1, ['natureTheme' => []]);

/*
 * Add content element
 */

$GLOBALS['TL_CTE']['contaoThemesNet']['ct_sliderElement'] = SliderElementNature::class;
$GLOBALS['TL_CTE']['natureTheme']['tabsNavElement'] = TabsNavElement::class;
$GLOBALS['TL_CTE']['natureTheme']['tabsStartElement'] = TabsStartElement::class;
$GLOBALS['TL_CTE']['natureTheme']['tabsStopElement'] = TabsStopElement::class;
$GLOBALS['TL_CTE']['natureTheme']['textModalElement'] = TextModalElement::class;

/*
 * Available tags for Nature Theme
 */
if (empty($GLOBALS['tl_config']['theme_tags'])) {
    $GLOBALS['tl_config']['theme_tags'] = [];
    $GLOBALS['tl_config']['theme_tags'][] = '-';
}

if (!empty($GLOBALS['tl_config']['theme_tags']) && is_array($GLOBALS['tl_config']['theme_tags'])) {
    $GLOBALS['tl_config']['theme_tags'] = array_merge($GLOBALS['tl_config']['theme_tags'], [
        'NATURE01/01',
        'NATURE01/02',
        'NATURE01/03',
        'NATURE01/04',
        'NATURE01/05',
        'NATURE02/01',
        'NATURE02/02',
        'NATURE02/03',
        'NATURE02/04',
        'NATURE02/05',
        'NATURE03/01',
        'NATURE03/02',
        'NATURE03/03',
        'NATURE03/04',
        'NATURE03/05',
    ]);
}

/*
 * Wrapper elements
 */
$GLOBALS['TL_WRAPPERS']['start'][] = 'tabsStartElement';
$GLOBALS['TL_WRAPPERS']['stop'][] = 'tabsStopElement';

/*
 * Backend Modules
 */
array_insert($GLOBALS['BE_MOD']['contaoThemesNet'], 1, [
    'natureThemeSetup' => [
        'callback' => 'ContaoThemesNet\\NatureThemeBundle\\Module\\NatureThemeSetup',
        'tables' => [],
        'stylesheet' => 'bundles/contaothemesnetnaturetheme/css/backend.css',
    ],
]);
