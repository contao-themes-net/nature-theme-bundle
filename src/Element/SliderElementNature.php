<?php

declare(strict_types=1);

/*
 * nature theme bundle for Contao Open Source CMS
 *
 * Copyright (C) 2026 pdir / digital agentur  // pdir GmbH
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

        // Add background image
        if (null !== $this->ct_sliderElement_backgroundImageSRC) {
            $backgroundImageSRC = FilesModel::findByUuid($this->ct_sliderElement_backgroundImageSRC)?->path;
            $this->Template->backgroundImage = "background-image:url('".$backgroundImageSRC."')";
        }

        // Add image
        if ($this->addImage) {
            $figure = System::getContainer()
                ->get('contao.image.studio')
                ->createFigureBuilder()
                ->from($this->singleSRC)
                ->setSize($this->size)
                ->setMetadata($this->objModel->getOverwriteMetadata())
                ->enableLightbox($this->fullsize)
                ->buildIfResourceExists()
            ;

            $figure?->applyLegacyTemplateData($this->Template, null, $this->floating);

            if (null === $figure) {
                $this->Template->addImage = false;
            }
        }
    }
}
