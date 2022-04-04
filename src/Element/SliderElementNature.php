<?php

declare(strict_types=1);

namespace ContaoThemesNet\NatureThemeBundle\Element;

use ContaoThemesNet\ThemeComponentsBundle\Element\SliderElement;

class SliderElementNature extends SliderElement
{
    /**
     * Template
     * @var string
     */
    protected $strTemplate = 'ce_slider_element_nature';

    /**
     * Generate the content element
     */
    protected function compile(): void
    {
        parent::compile();

        if($this->ct_sliderElement_backgroundImageSRC != '') {
            $backgroundImageSRC = \FilesModel::findByUuid($this->ct_sliderElement_backgroundImageSRC)->path;
            $this->Template->backgroundImage = "background-image:url('".$backgroundImageSRC."')";
        }

        if ($this->addImage && $this->singleSRC != '')
        {
            $objModel = \FilesModel::findByUuid($this->singleSRC);
            if ($objModel !== null && is_file(\System::getContainer()->getParameter('kernel.project_dir') . '/' . $objModel->path))
            {
                $this->singleSRC = $objModel->path;
                $this->addImageToTemplate($this->Template, $this->arrData, null, null, $objModel);
            }
        }
    }
}
