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

namespace ContaoThemesNet\NatureThemeBundle\Element;

use Contao\FilesModel;
use Contao\System;
use ContaoThemesNet\ThemeComponentsBundle\Element\SliderElement;

class SliderElementNature extends SliderElement
{
    /**
     * Template.
     *
     * @var string
     */
    protected $strTemplate = 'ce_slider_element_nature';

    /**
     * Generate the content element.
     */
    protected function compile(): void
    {
        parent::compile();

        if (null !== $this->ct_sliderElement_backgroundImageSRC) {
            $backgroundImageSRC = FilesModel::findByUuid($this->ct_sliderElement_backgroundImageSRC)->path;
            $this->Template->backgroundImage = "background-image:url('".$backgroundImageSRC."')";
        }

        if ($this->addImage && null !== $this->singleSRC) {
            $objModel = FilesModel::findByUuid($this->singleSRC);

            if (null !== $objModel && is_file(System::getContainer()->getParameter('kernel.project_dir').'/'.$objModel->path)) {
                $this->singleSRC = $objModel->path;
                $this->addImageToTemplate($this->Template, $this->arrData, null, null, $objModel);
            }
        }
    }
}
