<?php

use ContaoThemesNet\NatureThemeBundle\Element\SliderElementNature;
use ContaoThemesNet\NatureThemeBundle\Element\TabsNavElement;
use ContaoThemesNet\NatureThemeBundle\Element\TabsStartElement;
use ContaoThemesNet\NatureThemeBundle\Element\TabsStopElement;
use ContaoThemesNet\NatureThemeBundle\Element\TextModalElement;

// Insert the nature theme category
array_insert($GLOBALS['TL_CTE'], 1, array('natureTheme' => array()));

/**
 * Add content element
 */

$GLOBALS['TL_CTE']['contaoThemesNet']['ct_sliderElement'] = SliderElementNature::class;
$GLOBALS['TL_CTE']['natureTheme']['tabsNavElement'] = TabsNavElement::class;
$GLOBALS['TL_CTE']['natureTheme']['tabsStartElement'] = TabsStartElement::class;
$GLOBALS['TL_CTE']['natureTheme']['tabsStopElement'] = TabsStopElement::class;
$GLOBALS['TL_CTE']['natureTheme']['textModalElement'] = TextModalElement::class;

/**
 * Available tags for Nature Theme
 */
array_push($GLOBALS['tl_config']['theme_tags'], '-');
$GLOBALS['tl_config']['theme_tags'][] = 'NATURE01/01';
$GLOBALS['tl_config']['theme_tags'][] = 'NATURE01/02';
$GLOBALS['tl_config']['theme_tags'][] = 'NATURE01/03';
$GLOBALS['tl_config']['theme_tags'][] = 'NATURE01/04';
$GLOBALS['tl_config']['theme_tags'][] = 'NATURE01/05';
$GLOBALS['tl_config']['theme_tags'][] = 'NATURE02/01';
$GLOBALS['tl_config']['theme_tags'][] = 'NATURE02/02';
$GLOBALS['tl_config']['theme_tags'][] = 'NATURE02/03';
$GLOBALS['tl_config']['theme_tags'][] = 'NATURE02/04';
$GLOBALS['tl_config']['theme_tags'][] = 'NATURE02/05';
$GLOBALS['tl_config']['theme_tags'][] = 'NATURE03/01';
$GLOBALS['tl_config']['theme_tags'][] = 'NATURE03/02';
$GLOBALS['tl_config']['theme_tags'][] = 'NATURE03/03';
$GLOBALS['tl_config']['theme_tags'][] = 'NATURE03/04';
$GLOBALS['tl_config']['theme_tags'][] = 'NATURE03/05';

/**
 * Wrapper elements
 */
$GLOBALS['TL_WRAPPERS']['start'][] = 'tabsStartElement';
$GLOBALS['TL_WRAPPERS']['stop'][] = 'tabsStopElement';

/**
 * Backend Modules
 */
array_insert($GLOBALS['BE_MOD']['contaoThemesNet'], 1, array
(
    'natureThemeSetup' => array
    (
        'callback'          => 'ContaoThemesNet\\NatureThemeBundle\\Module\\NatureThemeSetup',
        'tables'            => array(),
        'stylesheet'		=> 'bundles/contaothemesnetnaturetheme/css/backend.css'
    ),
));
