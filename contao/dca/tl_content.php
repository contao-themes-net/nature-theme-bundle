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

use Contao\Backend;
use Contao\DataContainer;

$GLOBALS['TL_DCA']['tl_content']['palettes']['ct_sliderElement'] = str_replace(
    'ct_sliderElement_linkText;',
    'ct_sliderElement_linkText;{background_image_legend},ct_sliderElement_backgroundImageSRC;',
    $GLOBALS['TL_DCA']['tl_content']['palettes']['ct_sliderElement']
);

$GLOBALS['TL_DCA']['tl_content']['palettes']['tabsNavElement'] = '{type_legend},type;{tabs_nav_legend},tabs_navigation;{expert_legend:hide},cssID;{invisible_legend:hide},invisible,start,stop;';
$GLOBALS['TL_DCA']['tl_content']['palettes']['tabsStartElement'] = '{type_legend},type;{tabs_nav_legend},tabs_element;{expert_legend:hide},cssID;{invisible_legend:hide},invisible,start,stop;';
$GLOBALS['TL_DCA']['tl_content']['palettes']['tabsStopElement'] = '{type_legend},type;{invisible_legend:hide},invisible,start,stop;';
$GLOBALS['TL_DCA']['tl_content']['palettes']['textModalElement'] = '{type_legend},type,headline;{text_legend},text;{modal_legend},textModal_content;{image_legend},addImage;{template_legend:hide},textModal_customTpl;{protected_legend:hide},protected;{expert_legend:hide},guests,cssID;{invisible_legend:hide},invisible,start,stop;';

/*
 * Add fields to tl_content
 */
$GLOBALS['TL_DCA']['tl_content']['fields']['ct_sliderElement_backgroundImageSRC'] = [
    'label' => &$GLOBALS['TL_LANG']['tl_content']['ct_sliderElement_backgroundImageSRC'],
    'exclude' => true,
    'inputType' => 'fileTree',
    'eval' => ['tl_class' => 'w50', 'fieldType' => 'radio', 'files' => true],
    'sql' => 'blob NULL',
];

$GLOBALS['TL_DCA']['tl_content']['fields']['tabs_navigation'] = [
    'label' => &$GLOBALS['TL_LANG']['tl_content']['tabs_nav_bulma'],
    'exclude' => true,
    'inputType' => 'optionWizard',
    'eval' => ['allowHtml' => true, 'tl_class' => 'clr'],
    'sql' => 'blob NULL',
];

$GLOBALS['TL_DCA']['tl_content']['fields']['tabs_element'] = [
    'label' => &$GLOBALS['TL_LANG']['tl_content']['tabs_element'],
    'exclude' => true,
    'inputType' => 'text',
    'eval' => ['tl_class' => 'w50'],
    'sql' => 'text NULL',
];

$GLOBALS['TL_DCA']['tl_content']['fields']['textModal_content'] = [
    'label' => &$GLOBALS['TL_LANG']['tl_content']['textModal_content'],
    'exclude' => true,
    'search' => true,
    'inputType' => 'textarea',
    'eval' => ['mandatory' => true, 'rte' => 'tinyMCE', 'helpwizard' => true],
    'explanation' => 'insertTags',
    'sql' => 'mediumtext NULL',
];

$GLOBALS['TL_DCA']['tl_content']['fields']['textModal_customTpl'] = [
    'label' => &$GLOBALS['TL_LANG']['tl_content']['textModal_customTpl'],
    'exclude' => true,
    'inputType' => 'select',
    'options_callback' => ['tl_content_nature', 'getTextModalTemplates'],
    'eval' => ['includeBlankOption' => true, 'chosen' => true, 'tl_class' => 'w50'],
    'sql' => "varchar(64) NOT NULL default ''",
];

class tl_content_nature extends Backend
{
    /**
     * Return all content element templates as array.
     *
     * @return array
     */
    public function getTextModalTemplates(DataContainer $dc)
    {
        return $this->getTemplateGroup('ce_text_modal_nature');
    }
}
