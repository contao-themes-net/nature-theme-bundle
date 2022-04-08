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

use Contao\ContentElement;
use Contao\FilesModel;
use Contao\StringUtil;
use Contao\System;

class TextModalElement extends ContentElement
{
    /**
     * Template.
     *
     * @var string
     */
    protected $strTemplate = 'ce_text_modal_nature';

    /**
     * Generate the content element.
     */
    protected function compile(): void
    {
        $this->text = StringUtil::toHtml5($this->text);
        $this->textModal_content = StringUtil::toHtml5($this->textModal_content);

        $this->Template->text = StringUtil::encodeEmail($this->text);
        $this->Template->modalContent = StringUtil::encodeEmail($this->textModal_content);
        $this->Template->addImage = false;

        // Add an image
        if ($this->addImage && '' !== $this->singleSRC) {
            $objModel = FilesModel::findByUuid($this->singleSRC);

            if (null !== $objModel && is_file(System::getContainer()->getParameter('kernel.project_dir').'/'.$objModel->path)) {
                $this->singleSRC = $objModel->path;
                $this->addImageToTemplate($this->Template, $this->arrData, null, null, $objModel);
            }
        }
    }
}
