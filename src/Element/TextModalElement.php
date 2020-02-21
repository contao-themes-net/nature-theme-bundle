<?php

namespace ContaoThemesNet\NatureThemeBundle\Element;

class TextModalElement extends \ContentElement
{
    /**
     * Template
     * @var string
     */
    protected $strTemplate = 'ce_text_modal_nature';

    /**
     * Generate the content element
     */
    protected function compile()
    {
        $this->text = \StringUtil::toHtml5($this->text);
        $this->textModal_content = \StringUtil::toHtml5($this->textModal_content);

        $this->Template->text = \StringUtil::encodeEmail($this->text);
        $this->Template->modalContent = \StringUtil::encodeEmail($this->textModal_content);
        $this->Template->addImage = false;

        // Add an image
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
