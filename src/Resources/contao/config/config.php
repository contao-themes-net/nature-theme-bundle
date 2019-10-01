<?php

use ContaoThemesNet\NatureThemeBundle\Element\SliderElementNature;
use ContaoThemesNet\NatureThemeBundle\Element\TabsNavElement;
use ContaoThemesNet\NatureThemeBundle\Element\TabsStartElement;
use ContaoThemesNet\NatureThemeBundle\Element\TabsStopElement;

// Insert the nature theme category
array_insert($GLOBALS['TL_CTE'], 1, array('natureTheme' => array()));

/**
 * Add content element
 */

$GLOBALS['TL_CTE']['contaoThemesNet']['ct_sliderElement'] = SliderElementNature::class;
$GLOBALS['TL_CTE']['natureTheme']['tabsNavElement'] = TabsNavElement::class;
$GLOBALS['TL_CTE']['natureTheme']['tabsStartElement'] = TabsStartElement::class;
$GLOBALS['TL_CTE']['natureTheme']['tabsStopElement'] = TabsStopElement::class;

/**
 * Available tags for Nature Theme
 */
$GLOBALS['tl_config']['theme_tags'] = array(
    '-',
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
);

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
